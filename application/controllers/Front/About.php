<?php

class About extends Front_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		// include_once 'src/WebshopappApiClient.php';

		// //cluster_id is the location where the shop is hosted

		// $api = new WebshopappApiClient('cluster_id', 'api_key', 'api_secret', 'en');

		// $shopInfo = $api->shop->get();

		// echo '<pre>';
		// print_r($shopInfo);
		// echo '</pre>';

		$content['main_content'] = 'about';
		$this->load->view('front/inc/view', $content);
	}
}
