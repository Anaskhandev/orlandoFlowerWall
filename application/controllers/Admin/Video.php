<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends Admin_Controller {
    function __construct() {
        parent::__construct(); 
        $this->table_name = $this->uri->segment(2);     
        $this->record_id = $this->uri->segment(2).'_id';     
        $this->record_status = $this->uri->segment(2).'_status';     
        $this->title = ucwords(str_replace('_', ' ', $this->uri->segment(2)));

        //To use CRUD or not. (TRUE to make CRUD enable) 
        $this->is_crud = false;

        $this->form_validations = array(
            array(
                'field' => 'video_name',
                'label' => 'Name',
                'rules' => 'trim|min_length[1]|max_length[300]'
            )
        );

        $this->image_fields = array(
            // array(
            //     'field_name' => 'video_image',
            //     'path' => './uploads/video'
            // ),
        );

        $this->video_fields = array(
            array(
                'field_name' => 'video_first',
                'path' => './uploads/video'
            ),
            array(
                'field_name' => 'video_second',
                'path' => './uploads/video'
            ),
            array(
                'field_name' => 'video_third',
                'path' => './uploads/video'
            ),
            array(
                'field_name' => 'video_fourth',
                'path' => './uploads/video'
            ),
            array(
                'field_name' => 'video_fifth',
                'path' => './uploads/video'
            ),
            array(
                'field_name' => 'video_sixth',
                'path' => './uploads/video'
            )
        );

    } 

    public function index(){
        if($this->is_crud == false){
           redirect('admin/'.$this->table_name.'/form/edit/1');
       }

       $data['table'] = $this->table_name;  
       $data['output_type'] = 'result';    
       $content['title'] = $this->title;          
       $content['records']  = $this->general->get($data);
       $content['main_content'] = $this->table_name.'/list';           
       $this->load->view('admin/inc/view',$content);   
   }


   public function form($form_type="" , $id =""){
    if($this->is_crud == false){
       $id = 1;
   }
   if($_POST){
    $this->form_validation->set_rules($this->form_validations);
    if (!$this->form_validation->run() == FALSE){
        $this->input->post();

        $content = $this->input->post();

                //Image Uploding
        foreach ($this->image_fields as $image_field) {
            if($_FILES[$image_field['field_name']]['size'] > 0){
              $image = single_image_upload($_FILES[$image_field['field_name']],$image_field['path']);
              if(is_array($image)){            
                $this->session->set_flashdata('error', $image);
            }else{
                $content[$image_field['field_name']] = $image;
            }
        }  

    }
                // VIDEO UPLOADING
     foreach ($this->video_fields as $video_field) {
            if($_FILES[$video_field['field_name']]['size'] > 0){
              $video = single_video_upload($_FILES[$video_field['field_name']],$video_field['path']);
              if(is_array($video)){            
                $this->session->set_flashdata('error', $video);
            }else{
                $content[$video_field['field_name']] = $video;
            }
        }  

    }

    $data['table'] = $this->table_name; 
    if($form_type == 'edit'){
        $data['where'] = array($this->record_id => $id);
        $this->general->update($data,$content); 
        $this->session->set_flashdata('success', 'Updated Successfully.');
        redirect('admin/'.$this->table_name);
    }
    else if($form_type == 'add' || $form_type == 'duplicate'){
        $this->general->insert($data,$content);                     
        $this->session->set_flashdata('success', 'Added Successfully.');
        redirect('admin/'.$this->table_name);
    }
}else{        
    $data['where'] = array($this->record_id => $id);     
    $data['table'] = $this->table_name;  
    $data['output_type'] = 'row';   
    $content['title'] = $this->title;  
    $content['record']  = $this->general->get($data);
    $content['main_content'] = $this->table_name.'/form';           
    $this->load->view('admin/inc/view',$content);   
} 
}else{              
    $data['where'] = array($this->record_id => $id); 
    $data['table'] = $this->table_name;  
    $data['output_type'] = 'row';   
    $content['title'] = $this->title;  
    $content['record']  = $this->general->get($data);
    $content['main_content'] = $this->table_name.'/form';           
    $this->load->view('admin/inc/view',$content); 
}
}

public function view($id)
{
    if($this->is_crud == true){
        $data['where'] = array($this->record_id => $id); 
        $data['table'] = $this->table_name;   
        $data['output_type'] = 'row';   
        $content['title'] = $this->title;  
        $content['record']  = $this->general->get($data);
        $content['main_content'] = $this->table_name.'/view';           
        $this->load->view('admin/inc/view',$content); 
    }
    else{
        redirect('admin/'.$this->table_name);
    }

}
public function delete($id)
{
    if($this->is_crud == true){
        $content = array(
            $this->record_status => 'disable',
        );    
        $data['where'] = array($this->record_id => $id); 
        $data['table'] = $this->table_name;  
        $this->general->update($data,$content);        
        $this->session->set_flashdata('success', 'Deleted Successfully.');
        redirect('admin/'.$this->table_name);
    }
    else{
        redirect('admin/'.$this->table_name);
    }        
} 
}