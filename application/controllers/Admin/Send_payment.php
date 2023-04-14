<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class Send_payment extends CI_Controller {
    
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
    }
    
    public function index()
    {
        $content['data'] = $this->db->select('*')->from('my_card_details')->get()->row();
        $this->load->view('admin/send_payment', $content);
    }
    
    public function sendPayment()
    {
        require_once('application/libraries/stripe-php-master/init.php');
         \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
     
         try
         {
            $totalPrice = $this->input->post('totalPrice');
            $fullName = $this->input->post('fullName');
            $my_card_details_id = $this->input->post('my_card_details_id');
            
            $data = [
                'totalPrice'=>$totalPrice,
                'my_card_details_id'=>$my_card_details_id,
            ];
             $res = \Stripe\Charge::create ([
                 "amount" => $totalPrice * 100,
                 "currency" => "usd",
                 "source" => $this->input->post('stripeToken'),
                 "description" => $fullName.' Stripe Payment!' 
             ]);
             if($res = 'succeeded'){
                $this->db->insert('rebo_payment',$data);
             }
             $this->session->set_flashdata('success', 'Payment has been successful.');
             redirect('/admin/rebo_payment', 'refresh');
         }
         catch(Stripe\Exception\CardException $ex)
         {
            $this->session->set_flashdata('error', 'Payment failed.');
            redirect('/admin/send_payment', 'refresh');
         }
    }
}