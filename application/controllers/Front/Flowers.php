<?php

class Flowers extends Front_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		require_once("application/helpers/lightspeed_request.php");

		$response_data = getProductsByPage("Flowers");

		// $query = $this->db->query("SELECT * FROM `content` WHERE flowers = 1 AND content_status='enable'");
		// $content['home_content'] = $query->result_array();
		
		$content['products'] = $response_data["products"];
		$content['section_content'] = $response_data["section_content"];
		$content['main_content'] = 'flowers';
		$this->load->view('front/inc/view', $content);
	}
}
