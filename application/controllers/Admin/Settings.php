<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Admin_Controller {
	function __construct() {
		parent::__construct();		
	}  

	public function general(){   
        if($_POST){
          $this->form_validation->set_rules('settings_site_title', 'Site Title', 'required|min_length[3]|max_length[600]');
          $this->form_validation->set_rules('settings_email', 'Email address', 'trim|required|valid_email');
          $this->form_validation->set_rules('settings_email_from', 'Email Address From', 'trim|required|valid_email');
          $this->form_validation->set_rules('settings_email_to', 'Email address To', 'trim|required|valid_email');
          $this->form_validation->set_rules('settings_phone', 'Phone number', 'trim|required');
          if (!$this->form_validation->run() == FALSE){
            $content = array(
              'settings_site_title' => $this->input->post('settings_site_title',TRUE),
              'settings_email' => $this->input->post('settings_email',TRUE),
              'settings_email_from' => $this->input->post('settings_email_from',TRUE),
              'settings_email_to' => $this->input->post('settings_email_to',TRUE),
              'settings_phone' => $this->input->post('settings_phone',TRUE),
              'settings_address' => $this->input->post('settings_address',TRUE),
              'settings_status' => 'enable',
              'settings_updated_by' => '1'
            );    
            if($_FILES['settings_logo']['size'] > 0){
              $settings_logo = single_image_upload($_FILES['settings_logo'],'./uploads/settings');
              if(is_array($settings_logo)){            
                $this->session->set_flashdata('error', $settings_logo);
              }else{
                $content['settings_logo'] = $settings_logo;
              }
            }  
            if($_FILES['settings_footer_logo']['size'] > 0){
              $settings_footer_logo = single_image_upload($_FILES['settings_footer_logo'],'./uploads/settings');
              if(is_array($settings_footer_logo)){            
                $this->session->set_flashdata('error', $settings_footer_logo);
              }else{
                $content['settings_footer_logo'] = $settings_footer_logo;
              }
            }  

            if($_FILES['settings_favicon']['size'] > 0){
              $settings_favicon = single_image_upload($_FILES['settings_favicon'],'./uploads/settings');
              if(is_array($settings_favicon)){            
                $this->session->set_flashdata('error', $settings_favicon);
              }else{
                $content['settings_favicon'] = $settings_favicon;
              }
            }  
            $data['where'] = array('settings_id' => 1);		
            $data['table'] = 'settings';	
            $this->general->update($data,$content);        
            $this->session->set_flashdata('success', 'Updated Successfully.');
            redirect('admin/settings/general');
          }
          else{
            $data['where'] = array('settings_id' => 1);		
            $data['table'] = 'settings';	
            $data['output_type'] = 'row';	
            $content['title'] = 'General Settings';		
            $content['record']  = $this->general->get($data);
            $content['main_content'] = 'settings/general';			
            $this->load->view('admin/inc/view',$content);   
         }
        }
        else{        
            $data['where'] = array('settings_id' => 1);		
            $data['table'] = 'settings';	
            $data['output_type'] = 'row';	
            $content['title'] = 'General Settings';		
            $content['record']  = $this->general->get($data);
            $content['main_content'] = 'settings/general';			
            $this->load->view('admin/inc/view',$content);   
        }
    }

    public function social(){   
      if($_POST){
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
        $this->session->set_flashdata('success', 'Updated Successfully.');
        redirect('admin/settings/social');
      }
      else{        
        $data['where'] = array('social_id' => 1);   
        $data['table'] = 'social';  
        $data['output_type'] = 'row'; 
        $content['title'] = 'Social Settings';    
        $content['record']  = $this->general->get($data);
        $content['main_content'] = 'settings/social';     
        $this->load->view('admin/inc/view',$content);   
      }
    }
       
	
}
