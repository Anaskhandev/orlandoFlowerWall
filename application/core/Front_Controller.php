<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_Controller extends CI_Controller {
	function __construct() {
		parent::__construct();	          	
		$this->header_logo = $this->general->get_single_field('settings','','settings_logo');
		$this->favicon = $this->general->get_single_field('settings','','settings_favicon');		
		$this->site_title = $this->general->get_single_field('settings','','settings_site_title');	
		$this->email_address = $this->general->get_single_field('settings','','settings_email');	
		$this->settings_address = $this->general->get_single_field('settings','','settings_address');	
		$this->settings_phone = $this->general->get_single_field('settings','','settings_phone');		
		$this->email_from = $this->general->get_single_field('settings','','settings_email_from');			
		$this->email_to = $this->general->get_single_field('settings','','settings_email_to');	
		$this->email_to = $this->general->get_single_field('settings','','settings_email_to');			

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$data['table'] = 'seo';
		$data['where'] = array('seo_page_link' => $actual_link); 
		$this->seo = $content['records']  = $this->general->get($data);

		$data9['table'] = 'settings';
		$data9['output_type'] = 'row';
		$this->settings  = $this->general->get($data9);	
	}

}
