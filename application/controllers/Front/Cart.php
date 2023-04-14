<?php

class Cart extends Front_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
    }

    public function index()
    {
        require_once("application/helpers/lightspeed_request.php");


        $content['cost'] = $this->db->select('*')->from('shipping_cost')
            ->where(array('shipping_cost_status' => 'enable'))->get()->result();

        $content['delivery_price'] = $this->db->select('*')->from('manage_delivery_prices')
            ->where(array('manage_delivery_prices_status' => 'enable'))->get()->result();

        $tax = getTaxList();

        $content['tax'] = $tax[1]->rates[0]->rate;
        $content['cartItems'] = $this->cart->contents();
        $content['main_content'] = 'cart';
        $this->load->view('front/inc/view', $content);
    }

    function updateItemQty()
    {
        $update = 0;

        // Get cart item info
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');

        // Update item in the cart
        if (!empty($rowid) && !empty($qty)) {
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }

        // Return response
        echo $update ? 'ok' : 'err';
    }

    function removeItem($rowid)
    {
        $remove = $this->cart->remove($rowid);

        redirect('cart/');
    }
    function content($relatedContent)
    {
        $query = $this->db->query("SELECT * FROM `gift_products` WHERE related = '$relatedContent'");
        $content['flower_page'] = $query->result_array();
        print json_encode($content);
    }
}
