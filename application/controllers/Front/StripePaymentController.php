<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StripePaymentController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        $this->load->helper('url');
        $this->load->library('cart');
        // ssss
    }

    public function index()
    {
        //print_r($this->input->post());
        $data2 = [
            // 'fullName' => $this->input->post('fullName'),
            // 'email' => $this->input->post('email'),
            // 'address' => $this->input->post('address'),
            // 'neon_sign' => [
            'sizeTitle' => $this->input->post('sizeTitle'),
            'sizePrice' => $this->input->post('sizePrice'),
            'textTitle' => $this->input->post('textTitle'),
            'textLength' => $this->input->post('textLength'),
            'textHeight' => $this->input->post('textHeight'),
            'textFontSize' => $this->input->post('textFontSize'),
            'textColor' => $this->input->post('textColor'),
            'bg_color' => $this->input->post('bg_color'),
            'recieving_date' => $this->input->post('date_delivery_sign'),
            'customNeon' => $this->input->post('customNeon'),
            // 'image' => $this->input->post('image'),
            'backBoard' => $this->input->post('backBoard'),
            'totalPrice' => $this->input->post('totalPrice'),
            'neon_type' => $this->input->post('neon_type'),
            'item_id' => $this->input->post('item_id'),
            // ]
        ];

        // $data3 = [
        //     // 'fullName' => $this->input->post('fullName'),
        //     // 'email' => $this->input->post('email'),
        //     // 'address' => $this->input->post('address'),
        //     'neon_sign' => [
        //         'sizeTitle' => 'test',
        //         'sizePrice' => 'test',
        //         'textTitle' => 'test',
        //         'textLength' => 'test',
        //         'textHeight' => 'test',
        //         'textFontSize' => 'test',
        //         'textColor' => 'test',
        //         'bg_color' => 'test',
        //         'date_delivery_sign' => 'test',
        //         'customNeon' => 'test',
        //         'image' => 'test',
        //         'backBoard' => 'test',
        //         'totalPrice' => 'test',
        //         'neon_type' => 'test',
        //         'item_id' => 'test',
        //     ]
        // ];

        // if (!empty($this->session->userdata('signs'))) {

        //     $oldArray = $this->session->userdata('signs');
        //     array_push($oldArray, $data2);

        //     $this->session->set_userdata('signs', $oldArray);
        // } else {
        //     $this->session->set_userdata('signs', $data3);


        //     $oldArray = $this->session->userdata('signs');
        //     array_push($oldArray, $data2);

        //     $this->session->set_userdata('signs', $oldArray);

        //     // $this->session->set_userdata('signs', $data2);
        // }
        // $this->session->set_userdata('signs','');

        // echo print_r($this->session->userdata('signs'));

        $image = $this->input->post('image');

        // echo $image;
        // $id = uniqid() ;

        // echo print_r($data[$this->input->post('textTitle')]);

        $data = array(
            'id' => $this->input->post('item_id'),
            'qty' => 1,
            'price' =>  $this->input->post('totalPrice'),
            'name' =>  $this->input->post('textTitle'),
            'image' => $image,
            'options' => $data2
        );
        $this->cart->insert($data);


        // echo print_r($this->cart->contents());

        // exit;


        redirect('cart');
    }


    function addToCart($id)
    {
        if ($_POST) {

            $content = $this->input->post();

            $flower = [
                'delivering' => $this->input->post('delivering'),
                'recieving_date' => $this->input->post('recieving_date')
            ];
            $this->session->set_userdata($flower);
            // echo $this->session->userdata('delivering');
            // exit;
            $product_id = $id;
            // aaaaa
            // $query = $this->db->query("SELECT * FROM `gift_products` WHERE gift_products_id = '$product_id'");
            // $content['product'] = $query->result_array();
            require_once("application/helpers/lightspeed_request.php");

            $response_data = getProductsById($product_id);


            $data = array(
                'id' => $response_data->id,
                'qty' => 1,
                'price' => $response_data->price_excluding_tax,
                'name' => $response_data->name,
                'image' => isset($response_data->images[0]) ? $response_data->images[0]->url : $response_data->image_url
            );
            $this->cart->insert($data);

            // $product = $content['product'];
            // foreach ($product as $product) :
            // Add product to the cart
            // endforeach;

            redirect('cart');
        }
    }


    public function submit_personal()
    {
        $data = [
            'fullName' => $this->input->post('fullName'),
            'email' => $this->input->post('email'),
            'lName' => $this->input->post('lName'),
            'order_text' => $this->input->post('order_text'),
            'totalPrice' => $this->input->post('totalPrice'),
            'delivery_type' => $this->input->post('delivery_type')
        ];
        $this->session->set_userdata($data);

        echo 'success';
        // echo print_r($data);
    }

    public function submit_address()
    {
        $data = [
            'country' => $this->input->post('country_n'),
            'city' => $this->input->post('city'),
            'address' => !empty($this->input->post('address')) ? $this->input->post('address') : '1150 Douglas Ave #1090, Altamonte Springs, FL 32714',
        ];

        $this->session->set_userdata($data);

        echo 'success';
        // echo print_r($data);
    }

    public function owfFlower()
    {
        require_once("application/helpers/lightspeed_request.php");
        $tax = getTaxList();

        $content['cost'] = $this->db->select('*')->from('shipping_cost')
            ->where(array('shipping_cost_status' => 'enable'))->get()->result();
            
        $content['cartItems'] = $this->cart->contents();

        $content['delivery_price'] = $this->db->select('*')->from('manage_delivery_prices')
            ->where(array('manage_delivery_prices_status' => 'enable'))->get()->result();

        //print_r($this->input->post());
        $data = [
            // 'fullName' => $this->input->post('fullName'),
            // 'email' => $this->input->post('email'),
            // 'address' => $this->input->post('address'),
            // 'totalPrice' => $this->input->post('totalPrice'),
            'items' => $this->input->post('items'),
            // 'order_text' => $this->input->post('order_text'),
            'delivery' => $this->input->post('delivery'),
            // 'delivery_type' => $this->input->post('delivery_type')
        ];
        $this->session->set_userdata($data);
        $content['tax'] = $tax[1]->rates[0]->rate;


        $content['main_content'] = 'checkout-owf';

        $this->load->view('front/inc/view', $content);

        // $this->load->view('front/checkout-owf');
    }

    public function handlePayment()
    {
        require_once('application/libraries/stripe-php-master/init.php');
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

        try {
            $totalPrice = $this->session->userdata('totalPrice');
            $fullName = $this->session->userdata('fullName');
            $today = date("Ymd");
            $rand = strtoupper(substr(uniqid(sha1(time())), 0, 12));
            $unique = $today . $rand;
            $payment_id = $unique;
            $data = [
                'payment_id' => $payment_id,
                'fullName' => $this->session->userdata('fullName'),
                'email' => $this->session->userdata('email'),
                'address' => $this->session->userdata('address'),
                'sizeTitle' => $this->session->userdata('sizeTitle'),
                'sizePrice' => $this->session->userdata('sizePrice'),
                'textTitle' => $this->session->userdata('textTitle'),
                'textLength' => $this->session->userdata('textLength'),
                'textHeight' => $this->session->userdata('textHeight'),
                'textFontSize' => $this->session->userdata('textFontSize'),
                'textColor' => $this->session->userdata('textColor'),
                'bg_color' => $this->session->userdata('bg_color'),
                'customNeon' => $this->session->userdata('customNeon'),
                // 'powerAdopter' => $this->session->userdata('powerAdopter'),
                'backBoard' => $this->session->userdata('backBoard'),
                'totalPrice' => $this->session->userdata('totalPrice'),
            ];
            $res = \Stripe\Charge::create([
                "amount" => $totalPrice * 100,
                "currency" => "usd",
                "source" => $this->input->post('stripeToken'),
                "description" => $fullName . ' Stripe Payment!'
            ]);
            if ($this->session->userdata('neon_type') == 'custom_neon') {
                $this->session->set_flashdata('title', 'CUSTOM NEON');
                // echo print_r($data);
                // exit;
                $this->db->insert('custom_neon_payments', $data);
            } else {
                $this->session->set_flashdata('title', 'NON-LIT CUSTOM NEON');
                // echo print_r($data);
                // exit;
                $this->db->insert('non_lit_custom_neon_payments', $data);
            }
            $this->session->set_flashdata('success', 'Payment has been successful.');
            redirect('/cart', 'refresh');
        } catch (Stripe\Exception\CardException $ex) {
            if ($this->session->userdata('neon_type') == 'custom_neon') {
                $this->session->set_flashdata('title', 'CUSTOM NEON');
            } else {
                $this->session->set_flashdata('title', 'NON-LIT CUSTOM NEON');
            }
            $this->session->set_flashdata('error', 'Payment failed.');
            redirect('/make-stripe-payment', 'refresh');
        }
    }


    public function handlePaymentOwf()
    {
        require_once('application/libraries/stripe-php-master/init.php');
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

        try {
            $totalPrice = $this->session->userdata('totalPrice');
            $fullName = $this->session->userdata('fullName') . " " .  $this->session->userdata('lName');
            $today = date("Ymd");
            $rand = strtoupper(substr(uniqid(sha1(time())), 0, 12));
            $unique = $today . $rand;
            $payment_id = $unique;
            $cartContentString = serialize($this->cart->contents());
            $cartContentRaw = $this->cart->contents();
            // echo print_r($cartContentRaw);
            foreach ($cartContentRaw as $cc) {
                if (array_key_exists('sizeTitle', $cc['options'])) {
                    if ($cc['options']['neon_type'] === 'custom_neon') {
                        // echo print_r($cc['options']) . '<br/>' . '<br/>';



                        $neon_data = [
                            'payment_id' => $payment_id,
                            'fullName' => $fullName,
                            'email' => $this->session->userdata('email'),
                            'address' => $this->session->userdata('address') . " " .  $this->session->userdata('city') . " " .  $this->session->userdata('country'),
                            'sizeTitle' => $cc['options']['sizeTitle'],
                            'sizePrice' => $cc['options']['sizePrice'],
                            'textTitle' => $cc['options']['textTitle'],
                            'textLength' => $cc['options']['textLength'],
                            'textHeight' => $cc['options']['textHeight'],
                            'textFontSize' => $cc['options']['textFontSize'],
                            'textColor' => $cc['options']['textColor'],
                            'bg_color' => $cc['options']['bg_color'],
                            'customNeon' => $cc['options']['customNeon'],
                            // 'powerAdopter' => $cc['options']['neon_type'],
                            'backBoard' => $cc['options']['backBoard'],
                            'totalPrice' => $cc['options']['totalPrice'],
                        ];

                        $this->db->insert('custom_neon_payments', $neon_data);
                    }
                }
            }
            // exit;
            $data = [
                'payment_id' => $payment_id,
                'fullName' => $fullName,
                'email' => $this->session->userdata('email'),
                'address' => $this->session->userdata('address') . " " .  $this->session->userdata('city') . " " .  $this->session->userdata('country'),
                'order_text' => $this->session->userdata('order_text'),
                'items' => $this->session->userdata('items'),
                'totalPrice' => $this->session->userdata('totalPrice'),
                'delivering' => $cartContentString,
                'delivery_type' => $this->session->userdata('delivery_type'),
                'owf_flowers_status' => 'enable',

            ];
            // echo print_r($data);
            $res = \Stripe\Charge::create([
                "amount" => $totalPrice * 100,
                "currency" => "usd",
                "source" => $this->input->post('stripeToken'),
                "description" => $fullName . ' Stripe Payment!'
            ]);
            $this->db->insert('owf_flowers', $data);
            $this->session->set_flashdata('title', 'OFW FLOWERS');

            // exit;

            require_once("application/helpers/lightspeed_request.php");

            $response_data = createSales($this->cart->contents(), $this->session->userdata());

            $this->session->set_flashdata('success', 'Payment has been successful.');
            $this->cart->destroy();
            redirect('/cart', 'refresh');
        } catch (Stripe\Exception\CardException $ex) {
            $this->session->set_flashdata('title', 'OFW FLOWERS');

            $this->session->set_flashdata('error', 'Payment failed.');
            redirect('/cart', 'refresh');
        }
    }
}
