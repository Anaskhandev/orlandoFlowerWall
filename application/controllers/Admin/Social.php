<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends Admin_Controller {
    function __construct() {
        parent::__construct();      
    }  

    public function index(){    
        if($_POST){

            print_r($_POST);exit;

            $content = array(
              'social_facebook' => $this->input->post('social_facebook',TRUE),
              'social_twitter' => $this->input->post('social_twitter',TRUE),
              'social_tumblr' => $this->input->post('social_tumblr',TRUE),
              'social_instagram' => $this->input->post('social_instagram',TRUE),
              'social_youtube' => $this->input->post('social_youtube',TRUE),
              'social_googleplus' => $this->input->post('social_googleplus',TRUE),
              'social_linkedin' => $this->input->post('social_linkedin',TRUE),                  
          );    
            $data['where'] = array('social_id' => 1);   
            $data['table'] = 'social';  
            $this->general->update($data,$content);        
            //redirect('admin/social');

        }  
        else{
            $data['table'] = 'social';  
            $data['output_type'] = 'result';    
            $content['page_title'] = 'Social Media';          
            $content['records']  = $this->general->get($data);
            $content['main_content'] = 'settings/social';            
            $this->load->view('admin2/inc/view',$content);
        } 
    }

}

