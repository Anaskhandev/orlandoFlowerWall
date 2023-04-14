<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {
    function __construct() {
        parent::__construct(); 
        $this->table_name = 'master_admin';     
        $this->record_id = 'master_admin_id';     
        $this->record_status = 'master_admin_status';     
        $this->title = ucwords(str_replace('_', ' ', $this->uri->segment(2)));

        //To use CRUD or not. (TRUE to make CRUD enable) 
        $this->is_crud = true;

        $pass = $this->input->post('master_admin_password');

        $encr_pass = $this->encryption->encrypt($pass);

        $this->form_validations = array(

            array(
                'field' => 'master_admin_name',
                'label' => 'User Name',
                'rules' => 'required|trim|min_length[1]|max_length[300]'
            ), 

            array(
                'field' => 'master_admin_email',
                'label' => 'User Email',
                'rules' => 'required|trim|min_length[1]|max_length[300]'
            ), 

            array(
                'field' => 'master_admin_phone',
                'label' => 'User Phone',
                'rules' => 'required|trim|min_length[1]|max_length[300]'
            ), 

            array(
                'field' => 'master_admin_password',
                'label' => 'User Password',
                'rules' => 'required|trim|min_length[1]|max_length[300]'
            ),

            array(
                'field' => 'master_admin_address',
                'label' => 'User Address',
                'rules' => 'required|trim|min_length[1]|max_length[300]'
            ),

            array(
                'field' => 'master_admin_role',
                'label' => 'User Role',
                'rules' => 'required|trim|min_length[1]|max_length[300]'
            ),

            array(
                'field' => 'master_admin_created_by',
                'label' => 'User Created By',
                'rules' => 'required|trim|min_length[1]|max_length[300]'
            ),


        );

        $this->image_fields = array(
            array(
               'field_name' => 'master_admin_image',
               'path' => './uploads/users'
           ),
        );

    } 

    public function index(){
        if($this->is_crud == false){
         redirect('admin/user/form/edit/1');
     }

     $data['table'] = $this->table_name;  
     $data['output_type'] = 'result';    
     $content['title'] = $this->title;          
     $content['records']  = $this->general->get($data);
     $content['main_content'] = 'user/list';           
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

        $content=array(
            'master_admin_name'=>$this->input->post('master_admin_name'),
            'master_admin_email'=>$this->input->post('master_admin_email'),
            'master_admin_phone'=>$this->input->post('master_admin_phone'),
            'master_admin_address'=>$this->input->post('master_admin_address'),
            'master_admin_role'=>$this->input->post('master_admin_role'),
            'master_admin_created_by'=>$this->input->post('master_admin_created_by'),
            'master_admin_password' => $this->encryption->encrypt($this->input->post('master_admin_password')) 

        );
      

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

    $data['table'] = $this->table_name; 
    if($form_type == 'edit'){
        $data['where'] = array($this->record_id => $id);

        $this->general->update($data,$content); 
        $this->session->set_flashdata('success', 'Updated Successfully.');
        redirect('admin/user');
    }
    else if($form_type == 'add' || $form_type == 'duplicate'){
      
        $this->general->insert($data,$content);                     
        $this->session->set_flashdata('success', 'Added Successfully.');
        redirect('admin/user');
    }
}else{        
    $data['where'] = array($this->record_id => $id);     
    $data['table'] = $this->table_name;  
    $data['output_type'] = 'row';   
    $content['title'] = $this->title;  
    $content['record']  = $this->general->get($data);
    $content['main_content'] = 'user/form';           
    $this->load->view('admin/inc/view',$content);   
} 
}else{              
    $data['where'] = array($this->record_id => $id); 
    $data['table'] = $this->table_name;  
    $data['output_type'] = 'row';   
    $content['title'] = $this->title;  
    $content['record']  = $this->general->get($data);
    $content['main_content'] = 'user/form';           
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
        $content['main_content'] = 'user/view';           
        $this->load->view('admin/inc/view',$content); 
    }
    else{
        redirect('admin/user');
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
        redirect('admin/user');
    }
    else{
        redirect('admin/user');
    }        
} 
}

