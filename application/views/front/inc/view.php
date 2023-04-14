<?php
	if(!file_exists('application/views/front/'.$main_content.'.php')){
		
	}
	else{
		$this->load->view('front/inc/header');
		isset($main_content)?$this->load->view('front/'.$main_content.''):'';
		$this->load->view('front/inc/footer');	
	}
?>