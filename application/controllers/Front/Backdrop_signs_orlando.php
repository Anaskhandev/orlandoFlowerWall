<?php 

class backdrop_signs_orlando extends Front_Controller
{
	public function __construct()
	{
		parent:: __construct();

	}
	public function index()
	{
	    
	    $content['data'] = $this->db->select('*')->from('manage_prices')
		->where(array('manage_prices_status' => 'enable', 'type' => 'Non Lit'))->get()->result();
		
		$content['gal'] = $this->db->select('*')->from('laser_gallery')
		->where(array('laser_gallery_status' => 'enable', 'place' => 'demo'))->limit(1)->get()->result();

			
		$content['double_layer'] = $this->db->select('*')->from('laser_gallery')
		->where(array('laser_gallery_status' => 'enable', 'place' => 'double_layer'))->limit(1)->get()->result();
			
		$content['example'] = $this->db->select('*')->from('laser_gallery')
		->where(array('laser_gallery_status' => 'enable', 'place' => 'example'))->limit(1)->get()->result();
			
		$content['one_layer'] = $this->db->select('*')->from('laser_gallery')
		->where(array('laser_gallery_status' => 'enable', 'place' => 'one_layer'))->limit(1)->get()->result();
		
		$content['main_content'] = 'backdrop_signs_orlando';
		$this->load->view('front/inc/view',$content);
	}
}


?>