<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller{
	
	public function index()
	{	
	    $content['neon'] = $this->db->from("owf_flowers")->where('owf_flowers_status', 'enable')->count_all_results();
	    $content['nonLit'] = $this->db->from("non_lit_custom_neon_payments")->where('non_lit_custom_neon_payments_status', 'enable')->count_all_results();
		$content['main_content'] = 'dashboard/dashboard';		
		$content['title'] = 'Dashboard';
		$this->load->view('admin/inc/view',$content);
	}
}
