<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sample_crud extends Admin_Controller {
    function __construct() {
        parent::__construct();     
    }  

    public function index(){    
        $data['table'] = 'sample_crud';  
        $data['output_type'] = 'result';    
        $content['title'] = 'Sample Crud';         
        $content['records']  = $this->general->get($data);
        $content['main_content'] = 'sample_crud/list';           
        $this->load->view('admin/inc/view',$content);   
    }
    public function add()
    {
        if($_POST){
            $this->form_validation->set_rules('sample_crud_column_1', 'Column Size', 'trim|min_length[1]|max_length[300]');
            if (!$this->form_validation->run() == FALSE){
                $content = array(
                    'sample_crud_column_1' => $this->input->post('sample_crud_column_1',TRUE),
                    'sample_crud_column_2' => json_encode($this->input->post('sample_crud_column_2',TRUE)),
                );
                $data['table'] = 'sample_crud'; 
                $this->general->insert($data,$content);        
                $this->session->set_flashdata('success', 'Added Successfully.');
                redirect('admin/sample_crud');
            }else{        
                
                $content['title'] = 'Sample Crud';  
                $content['main_content'] = 'sample_crud/add';           
                $this->load->view('admin/inc/view',$content);   
            } 
        }else{         
         
            $content['title'] = 'Sample Crud';    
            $content['main_content'] = 'sample_crud/add';           
            $this->load->view('admin/inc/view',$content); 
        } 
    }
    

    public function edit($id){ 
        if($_POST){

            $this->form_validation->set_rules('sample_crud_column_1', 'Column Size', 'trim|min_length[1]|max_length[300]');
            if (!$this->form_validation->run() == FALSE){
                $content = array(
                    'sample_crud_column_1' => $this->input->post('sample_crud_column_1',TRUE),
                    'sample_crud_column_2' => json_encode($this->input->post('sample_crud_column_2',TRUE)),
                );
                $data['where'] = array('sample_crud_id' => $id); 
                $data['table'] = 'sample_crud'; 
                $this->general->update($data,$content);        
                $this->session->set_flashdata('success', 'Updated Successfully.');
                redirect('admin/sample_crud');
            }else{        
                $data['where'] = array('sample_crud_id' => $id);     
                $data['table'] = 'sample_crud';  
                $data['output_type'] = 'row';   
                $content['title'] = 'Sample Crud';  
                $content['record']  = $this->general->get($data);
                $content['main_content'] = 'sample_crud/edit';           
                $this->load->view('admin/inc/view',$content);   
            } 
        }else{ 
            $data['where'] = array('sample_crud_id' => $id); 
            $data['table'] = 'sample_crud';  
            $data['output_type'] = 'row';   
            $content['title'] = 'Sample Crud';   
            $content['record']  = $this->general->get($data);
            $content['main_content'] = 'sample_crud/edit';           
            $this->load->view('admin/inc/view',$content); 
        } 
    }

    public function duplicate($id){ 
        if($_POST){

            $this->form_validation->set_rules('sample_crud_column_1', 'Column Size', 'trim|min_length[1]|max_length[300]');
            if (!$this->form_validation->run() == FALSE){
                $content = array(
                    'sample_crud_column_1' => $this->input->post('sample_crud_column_1',TRUE),
                    'sample_crud_column_2' => json_encode($this->input->post('sample_crud_column_2',TRUE)),
                );
                $data['table'] = 'sample_crud'; 
                $this->general->insert($data,$content);        
                $this->session->set_flashdata('success', 'Updated Successfully.');
                redirect('admin/sample_crud');
            }else{        
                $data['where'] = array('sample_crud_id' => $id);     
                $data['table'] = 'sample_crud';  
                $data['output_type'] = 'row';   
                $content['title'] = 'Sample Crud';  
                $content['record']  = $this->general->get($data);
                $content['main_content'] = 'sample_crud/duplicate';           
                $this->load->view('admin/inc/view',$content);   
            } 
        }else{ 
            $data['where'] = array('sample_crud_id' => $id); 
            $data['table'] = 'sample_crud';  
            $data['output_type'] = 'row';   
            $content['title'] = 'Sample Crud';   
            $content['record']  = $this->general->get($data);
            $content['main_content'] = 'sample_crud/duplicate';           
            $this->load->view('admin/inc/view',$content); 
        } 
    }

    
    public function view($id)
    {
        $data['where'] = array('sample_crud_id' => $id); 
        $data['table'] = 'sample_crud';   
        $data['output_type'] = 'row';   
        $content['title'] = 'Sample Crud'; 
        $content['record']  = $this->general->get($data);
        $content['main_content'] = 'sample_crud/view';           
        $this->load->view('admin/inc/view',$content); 


    }
    public function delete($id)
    {
        $content = array(
            'sample_crud_status' => 'disable',
        );    
        $data['where'] = array('sample_crud_id' => $id); 
        $data['table'] = 'sample_crud';  
        $this->general->update($data,$content);        
        $this->session->set_flashdata('success', 'Deleted Successfully.');
        redirect('admin/sample_crud');
    } 
}

