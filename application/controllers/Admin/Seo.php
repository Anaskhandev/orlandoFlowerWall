<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seo extends Admin_Controller {
    function __construct() {
        parent::__construct();      
    }  

    public function index(){    
        if($this->adminrole == 'client'){
            redirect('admin');
        }
        $data['table'] = 'seo';  
        $data['output_type'] = 'result';    
        $content['title'] = 'SEO';          
        $content['records']  = $this->general->get($data);
        $content['main_content'] = 'seo/list';           
        $this->load->view('admin/inc/view',$content);   
    }
    public function add()
    {
        if($this->adminrole == 'client'){
            redirect('admin');
        }
        if($_POST){

            $this->form_validation->set_rules('seo_page_name', 'Page Name', 'trim|min_length[1]|max_length[300]');
            $this->form_validation->set_rules('seo_page_link', 'PageLink', 'trim|min_length[1]|max_length[300]');
            $this->form_validation->set_rules('seo_page_title', 'Page Title', 'trim|min_length[1]|max_length[300]');
            $this->form_validation->set_rules('seo_meta_title', 'Meta Title', 'trim|min_length[1]|max_length[300]');
            $this->form_validation->set_rules('seo_meta_description', 'Meta Description', 'trim|min_length[1]');
            $this->form_validation->set_rules('seo_meta_keyword', 'Meta Keyword', 'trim|min_length[1]');
            $this->form_validation->set_rules('seo_meta_canonical', 'Meta Canonical', 'trim|min_length[1]|max_length[300]');
            if (!$this->form_validation->run() == FALSE){
                $content = array(
                    'seo_page_name' => $this->input->post('seo_page_name',TRUE),
                    'seo_page_link' => $this->input->post('seo_page_link',TRUE),
                    'seo_page_title' => $this->input->post('seo_page_title',TRUE),
                    'seo_meta_title' => $this->input->post('seo_meta_title',TRUE),
                    'seo_meta_description' => $this->input->post('seo_meta_description',TRUE),
                    'seo_meta_keyword' => $this->input->post('seo_meta_keyword',TRUE),
                    'seo_meta_canonical' => $this->input->post('seo_meta_canonical',TRUE),
                    'seo_meta_index' => $this->input->post('seo_meta_index',TRUE),
                    'seo_status' => 'enable',
                    'seo_updated_by' => '1'
                );    
                //$data['where'] = array('seo_id' => $id); 
                $data['table'] = 'seo'; 
                $this->general->insert($data,$content);        
                $this->session->set_flashdata('success', 'Added Successfully.');
                redirect('admin/seo');
            }else{        
                
                $content['title'] = 'SEO';  
                $content['main_content'] = 'seo/add';           
                $this->load->view('admin/inc/view',$content);   
            } 
        }else{              
         
            $content['title'] = 'SEO';  
            $content['main_content'] = 'seo/add';           
            $this->load->view('admin/inc/view',$content); 
        } 
    }
    
    public function edit($id){ 
        if($this->adminrole == 'client'){
            redirect('admin');
        }

        if($_POST){

            $this->form_validation->set_rules('seo_page_name', 'Page Name', 'trim|min_length[1]|max_length[300]');
            $this->form_validation->set_rules('seo_page_link', 'PageLink', 'trim|min_length[1]|max_length[300]');
            $this->form_validation->set_rules('seo_page_title', 'Page Title', 'trim|min_length[1]|max_length[300]');
            $this->form_validation->set_rules('seo_meta_title', 'Meta Title', 'trim|min_length[1]|max_length[300]');
            $this->form_validation->set_rules('seo_meta_description', 'Meta Description', 'trim|min_length[1]');
            $this->form_validation->set_rules('seo_meta_keyword', 'Meta Keyword', 'trim|min_length[1]');
            $this->form_validation->set_rules('seo_meta_canonical', 'Meta Canonical', 'trim|min_length[1]|max_length[300]');
            if (!$this->form_validation->run() == FALSE){
                $content = array(
                    'seo_page_name' => $this->input->post('seo_page_name',TRUE),
                    'seo_page_link' => $this->input->post('seo_page_link',TRUE),
                    'seo_page_title' => $this->input->post('seo_page_title',TRUE),
                    'seo_meta_title' => $this->input->post('seo_meta_title',TRUE),
                    'seo_meta_description' => $this->input->post('seo_meta_description',TRUE),
                    'seo_meta_keyword' => $this->input->post('seo_meta_keyword',TRUE),
                    'seo_meta_canonical' => $this->input->post('seo_meta_canonical',TRUE),
                    'seo_meta_index' => $this->input->post('seo_meta_index',TRUE),
                    'seo_status' => 'enable',
                    'seo_updated_by' => '1'
                );    
                
                $data['where'] = array('seo_id' => $id); 
                $data['table'] = 'seo'; 
                $this->general->update($data,$content);        
                $this->session->set_flashdata('success', 'Updated Successfully.');
                redirect('admin/seo');
            }else{        
                $data['where'] = array('seo_id' => $id);     
                $data['table'] = 'seo';  
                $data['output_type'] = 'row';   
                $content['title'] = 'SEO';  
                $content['record']  = $this->general->get($data);
                $content['main_content'] = 'seo/edit';           
                $this->load->view('admin/inc/view',$content);   
            } 
        }else{              
            $data['where'] = array('seo_id' => $id); 
            $data['table'] = 'seo';  
            $data['output_type'] = 'row';   
            $content['title'] = 'SEO';  
            $content['record']  = $this->general->get($data);
            $content['main_content'] = 'seo/edit';           
            $this->load->view('admin/inc/view',$content); 
        } 
    }


    public function duplicate($id){ 
        if($this->adminrole == 'client'){
            redirect('admin');
        }

        if($_POST){

            $this->form_validation->set_rules('seo_page_name', 'Page Name', 'trim|min_length[1]|max_length[300]');
            $this->form_validation->set_rules('seo_page_link', 'PageLink', 'trim|min_length[1]|max_length[300]');
            $this->form_validation->set_rules('seo_page_title', 'Page Title', 'trim|min_length[1]|max_length[300]');
            $this->form_validation->set_rules('seo_meta_title', 'Meta Title', 'trim|min_length[1]|max_length[300]');
            $this->form_validation->set_rules('seo_meta_description', 'Meta Description', 'trim|min_length[1]');
            $this->form_validation->set_rules('seo_meta_keyword', 'Meta Keyword', 'trim|min_length[1]');
            $this->form_validation->set_rules('seo_meta_canonical', 'Meta Canonical', 'trim|min_length[1]|max_length[300]');
            if (!$this->form_validation->run() == FALSE){
                $content = array(
                    'seo_page_name' => $this->input->post('seo_page_name',TRUE),
                    'seo_page_link' => $this->input->post('seo_page_link',TRUE),
                    'seo_page_title' => $this->input->post('seo_page_title',TRUE),
                    'seo_meta_title' => $this->input->post('seo_meta_title',TRUE),
                    'seo_meta_description' => $this->input->post('seo_meta_description',TRUE),
                    'seo_meta_keyword' => $this->input->post('seo_meta_keyword',TRUE),
                    'seo_meta_canonical' => $this->input->post('seo_meta_canonical',TRUE),
                    'seo_meta_index' => $this->input->post('seo_meta_index',TRUE),
                    'seo_status' => 'enable',
                    'seo_updated_by' => '1'
                );    
                
                $data['table'] = 'seo'; 
                $this->general->insert($data,$content);        
                $this->session->set_flashdata('success', 'Updated Successfully.');
                redirect('admin/seo');
            }else{        
                $data['where'] = array('seo_id' => $id);     
                $data['table'] = 'seo';  
                $data['output_type'] = 'row';   
                $content['title'] = 'SEO';  
                $content['record']  = $this->general->get($data);
                $content['main_content'] = 'seo/duplicate';           
                $this->load->view('admin/inc/view',$content);   
            } 
        }else{              
            $data['where'] = array('seo_id' => $id); 
            $data['table'] = 'seo';  
            $data['output_type'] = 'row';   
            $content['title'] = 'SEO';  
            $content['record']  = $this->general->get($data);
            $content['main_content'] = 'seo/duplicate';           
            $this->load->view('admin/inc/view',$content); 
        } 
    }
    

    public function view($id)
    {
        if($this->adminrole == 'client'){
            redirect('admin');
        }
        $data['where'] = array('seo_id' => $id); 
        $data['table'] = 'seo';   
        $data['output_type'] = 'row';   
        $content['title'] = 'SEO';  
        $content['record']  = $this->general->get($data);
        $content['main_content'] = 'seo/view';           
        $this->load->view('admin/inc/view',$content); 


    }
    public function delete($id)
    {
        if($this->adminrole == 'client'){
            redirect('admin');
        }
        $content = array(
            'seo_status' => 'disable',
            'seo_updated_by' => '1'
        );    
        $data['where'] = array('seo_id' => $id); 
        $data['table'] = 'seo';  
        $this->general->update($data,$content);        
        $this->session->set_flashdata('success', 'Deleted Successfully.');
        redirect('admin/seo');
    } 
}

