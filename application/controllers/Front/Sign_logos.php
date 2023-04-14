<?php

class Sign_logos extends Front_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{


		$content['gal'] = $this->db->select('*')->from('light_up_gallery')
			->where(array('light_up_gallery_status' => 'enable'))->get()->result();


		$content['text'] = $this->db->select('*')->from('light_up_content')
			->where(array('light_up_content_status' => 'enable'))->get()->result();

		$content['cards'] = $this->db->select('*')->from('light_up_card')
			->where(array('light_up_card_status' => 'enable'))->get()->result();

		$content['first_section'] = $this->db->select('*')->from('light_up_first_section')
			->where(array('light_up_first_section_status' => 'enable'))->get()->result();

		$content['main_content'] = 'sign-logos';
		$this->load->view('front/inc/view', $content);
	}

	public function submit()
	{
		if ($_POST)
			$content = array(
				'fname' =>	$this->input->post('fname', TRUE),
				'lname' => $this->input->post('lname', TRUE),
				'phone' => $this->input->post('phone', TRUE),
				'email' => $this->input->post('email', TRUE),
				'budget' => $this->input->post('budget', TRUE),
				'indoorOutdoor' => $this->input->post('indoorOutdoor', TRUE),
				'size' => $this->input->post('size', TRUE),
				'tellMore' => $this->input->post('tellMore', TRUE),
				'image' => $_FILES['fileToUpload']['name']

			);

			// echo print_r($content);
			// exit;

		// image starts

		$target_dir = "uploads/sign_logos/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

		//image ends

		$image = $_FILES['fileToUpload']['name'];
		// 	$path = '<a href="https://theinceptives.com/neon/uploads/sign_logos/".$image.">Click Here</a>';

		$path = '<a href="https://theinceptives.com/neon/uploads/sign_logos/' . $image . '">' . strip_tags($image) . '</a>';

		$to = 'adnan@thewebions.com';

		$msg = "Fisrt Name: " . $this->input->post('fname', TRUE) . "<br> Last Name: " . $this->input->post('lname', TRUE) . "<br> Email: " . $this->input->post('email', TRUE) . "<br> Phone: " . $this->input->post('phone', TRUE) . "<br> Budget: " . $this->input->post('budget', TRUE) . "<br> Size: " . $this->input->post('size', TRUE) . "<br> Indoor or Outdoor? " . $this->input->post('indoorOutdoor', TRUE) . "<br> Brief: " . $this->input->post('tellMore', TRUE) . "<br> Image: " . $path . "";

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Neon Lights - Sign Logos Form  <noreply@neonlights.com>' . "\r\n";
		mail($to, "Neon Lights - Sign Logos Form ", $msg, $headers);


		$data['table'] = 'sign_logos';
		$this->general->insert($data, $content);
		$this->session->set_flashdata('success', 'Form Submitted');
		redirect('sign_logos');
	}
}
