<?php

class Custom_neon extends Front_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$content['data'] = $this->db->select('*')->from('manage_prices')
			->where(array('manage_prices_status' => 'enable', 'type' => 'Custom Neon'))->get()->result();

		$content['gal'] = $this->db->select('*')->from('gallery')
			->where(array('gallery_status' => 'enable', 'page' => 'demo'))->limit(1)->get()->result();


		$content['double_layer'] = $this->db->select('*')->from('gallery')
			->where(array('gallery_status' => 'enable', 'page' => 'double_neon'))->limit(1)->get()->result();

		$content['dimention'] = $this->db->select('*')->from('gallery')
			->where(array('gallery_status' => 'enable', 'page' => 'dimention'))->limit(1)->get()->result();

		$content['bright'] = $this->db->select('*')->from('gallery')
			->where(array('gallery_status' => 'enable', 'page' => 'bright'))->limit(1)->get()->result();

		$content['neon_come_with'] = $this->db->select('*')->from('gallery')
			->where(array('gallery_status' => 'enable', 'page' => 'neon_come_with'))->limit(1)->get()->result();


		$content['main_content'] = 'custom_neon';
		$this->load->view('front/inc/view', $content);
	}
}
