<?php

class Privacy extends Front_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$content['records'] = $this->db->select('*')->from('privacy')
			->where(array('privacy_status' => 'enable'))->get()->result();

		$content['main_content'] = 'privacy';
		$this->load->view('front/inc/view', $content);
	}
}
