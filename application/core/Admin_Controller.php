<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {
	function __construct() {
		parent::__construct();	
		if(!$this->session->userdata('master_admin_id')){		
			$this->uri->segment(2)=='login'||$this->uri->segment(2)=='forgot-password'||$this->uri->segment(2)=='reset-password'?'':redirect('admin/login');
		}    	

	 	$this->header_logo = $this->general->get_single_field('settings','','settings_logo');	
	 	$this->site_title = $this->general->get_single_field('settings','','settings_site_title');			
	 	$this->settings_email_from = $this->general->get_single_field('settings','','settings_email_from');		
	 	$this->favicon = $this->general->get_single_field('settings','','settings_favicon');			
	 	$this->settings_email_to = $this->general->get_single_field('settings','','settings_email_to');			
        $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
        $this->master_admin_image = $this->general->get_single_field('master_admin','','master_admin_image');
        $this->master_admin_name = $this->general->get_single_field('master_admin','','master_admin_name');

		$this->adminrole = $this->session->userdata('master_admin_role');
	} 
}
