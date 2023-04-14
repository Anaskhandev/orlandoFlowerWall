<?php

class ProductDetail extends Front_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');


        $this->image_fields = array(
            array(
                'field_name' => 'picture',
                'path' => './assets/front/img/upload/'
            ),
        );
    }

    public function index()
    {
        require_once("application/helpers/lightspeed_request.php");

        $product_id = $this->input->get('id', TRUE);


        $response_data = getProductsById($product_id);

     

        $variants = getVariantsById($product_id);
        // echo print_r($response_data);
        // exit;

        // $query = $this->db->query("SELECT * FROM `gift_products` WHERE gift_products_id = '$product_id'");
        // $content['product'] = $query->result_array();

        $content['variants'] = $variants;
        $content['product'] = $response_data;
        $content['main_content'] = 'product-detail';
        $this->load->view('front/inc/view', $content);
    }

    function addToCart($id)
    {
        if ($_POST) {

            $content = $this->input->post();
            // echo print_r($content);
            // exit;

            //Image Uploding
            foreach ($this->image_fields as $image_field) {
                if ($_FILES[$image_field['field_name']]['size'] > 0) {
                    $image = single_image_upload($_FILES[$image_field['field_name']], $image_field['path']);
                    if (is_array($image)) {
                        $this->session->set_flashdata('error', $image['error']);
                        redirect('admin/' . $this->table_name);
                    } else {
                        $content[$image_field['field_name']] = $image;
                    }
                }
            }
            if (empty($image)) {
                // echo 'fucked';
                $flower = [
                    'delivering' => $this->input->post('delivering'),
                    'recieving_date' => $this->input->post('recieving_date'),
                    'type_n' => $this->input->post('type_n'),
                    'amount_flowers' => $this->input->post('amount_flowers')
                ];
            } else {
                $flower = [
                    'delivering' => $this->input->post('delivering'),
                    'recieving_date' => $this->input->post('recieving_date'),
                    'type_n' => $this->input->post('type_n'),
                    'image' => $image
                ];
            }

            // echo $image;
            // exit;

            // $this->session->set_userdata($flower);
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
                'qty' => $this->input->post('qty'),
                'price' => $this->input->post('price'),
                'name' => $response_data->name,
                'image' => isset($response_data->images[0]) ? $response_data->images[0]->url : $response_data->image_url,
                'options' => $flower,
                'tax' => $response_data->tax,
            );
            $this->cart->insert($data);
            // echo print_r($this->cart->contents());
            // exit;

            // $product = $content['product'];
            // foreach ($product as $product) :
            // Add product to the cart
            // endforeach;

            redirect('cart');
        }
    }
}
