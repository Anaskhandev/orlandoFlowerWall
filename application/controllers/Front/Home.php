<?php

class Home extends Front_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// $client = new \GuzzleHttp\Client();

		// $response = $client->request('GET', 'https://orlandoflowerwalls.vendhq.com/api/2.0/tags', [
		// 	'headers' => [
		// 		'accept' => 'application/json',
		// 		'authorization' => 'Bearer KK5ThUuv8nOUmMRZkOmTy_SyEYk30koWKN0EY08Q',
		// 	],
		// ]);

		// $tag = json_decode($response->getBody());

		// $tag_id = "";

		// foreach ($tag->data as $elm) {
		// 	if ($elm->name == "Home")
		// 		$tag_id = $elm->id;
		// }

		// $response = $client->request('GET', "https://orlandoflowerwalls.vendhq.com/api/2.0/search?type=products&tag_id={$tag_id}", [
		// 	'headers' => [
		// 		'accept' => 'application/json',
		// 		'authorization' => 'Bearer KK5ThUuv8nOUmMRZkOmTy_SyEYk30koWKN0EY08Q',
		// 	],
		// ]);

		// $result = json_decode($response->getBody());
		// $products = $result->data;

		// $section_content = array();

		// foreach ($products as $elm) {

		// 	$brand_id = $elm->brand->id;

		// 	$exists = array_filter($section_content, function ($val, $key) use ($brand_id) {
		// 		return $val["id"] == $brand_id;
		// 	}, ARRAY_FILTER_USE_BOTH);

		// 	if (count($exists) == 0) {
		// 		$obj = array();
		// 		$obj["id"] = $elm->brand->id;
		// 		$obj["heading"] = $elm->brand->name;
		// 		$obj["subHeading"] = $elm->brand->description;

		// 		array_push($section_content, $obj);
		// 	}
		// }

		require_once("application/helpers/lightspeed_request.php");

		$response_data = getProductsByPage("Home");
		// echo print_r($response_data['section_content'][1]);

		// exit;

		$content['data'] = $this->db->select('*')->from('carousel')
			->where(array('carousel_status' => 'enable'))->get()->result();


		$content['products'] = $response_data["products"];
		$content['section_content'] = $response_data["section_content"];
		$content['main_content'] = 'index';
		$this->load->view('front/inc/view', $content);
	}

	public function Newsletter()
	{
		if ($_POST) {
			// $this->form_validation->set_rules($this->form_validations);
			if (!$this->form_validation->run() == TRUE) {
				$this->input->post();

				$content = $this->input->post();



				$data['table'] = 'newsletter';

				$this->general->insert($data, $content);
				$this->session->set_flashdata('success', 'Newsletter submitted.');
				redirect('Home');
			} else {

				$this->load->view('Home', $content);
			}
		} else {

			$this->load->view('Home', $content);
		}
	}
}
