<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Admin_Controller {
    function __construct() {
        parent::__construct(); 
        $this->table_name = $this->uri->segment(2);     
        $this->record_id = $this->uri->segment(2).'_id';     
        $this->record_status = $this->uri->segment(2).'_status';     
        

        //To use CRUD or not. (TRUE to make CRUD enable) 
        $this->is_crud = true;

        $this->form_validations = array(
            array(
                'field' => 'contact_name',
                'label' => 'Customer Name',
                'rules' => 'trim|min_length[1]|max_length[300]'
            ),
            array(
                'field' => 'contact_email',
                'label' => 'Customer Email',
                'rules' => 'trim|min_length[1]|max_length[300]'
            ),
            array(
                'field' => 'contact_phone',
                'label' => 'Customer Phone',
                'rules' => 'trim|min_length[1]|max_length[300]'
            ),
            array(
                'field' => 'contact_message',
                'label' => 'Customer Message',
                'rules' => 'trim|min_length[1]'
            )
        );

        $this->image_fields = array(

        );

    } 

    public function index(){
     if($this->is_crud == false){
         redirect('admin/'.$this->table_name.'/form/edit/1');
     }

     $data['table'] = $this->table_name;  
     $data['output_type'] = 'result';    
     // $content['title'] = $this->title;          
     $content['records']  = $this->general->get($data);
     $content['main_content'] = $this->table_name.'/list';           
     $this->load->view('admin/inc/view',$content);   
 }


public function view($id)
{
    if($this->is_crud == true){
        $data['where'] = array($this->record_id => $id); 
        $data['table'] = $this->table_name;   
        $data['output_type'] = 'row';   
        // $content['title'] = $this->title;  
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

