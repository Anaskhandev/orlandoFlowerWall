<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_delivery_prices extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->table_name = $this->uri->segment(2);
        $this->record_id = $this->uri->segment(2) . '_id';
        $this->record_status = $this->uri->segment(2) . '_status';
        $this->title = ucwords(str_replace('_', ' ', $this->uri->segment(2)));

        //To use CRUD or not. (TRUE to make CRUD enable) 
        $this->is_crud = true;

        $this->form_validations = array(
            array(
                'field' => 'size',
                'label' => 'size',
                'rules' => 'trim|min_length[1]|max_length[300]|required'
            ),
            array(
                'field' => 'length',
                'label' => 'length',
                'rules' => 'trim|min_length[1]|max_length[300]|required'
            ), array(
                'field' => 'height',
                'label' => 'height',
                'rules' => 'trim|min_length[1]|required'
            ),
            array(
                'field' => 'total_price',
                'label' => 'total_price',
                'rules' => 'trim|min_length[1]|max_length[300]|required'
            ),
            array(
                'field' => 'my_commission',
                'label' => 'my_commission',
                'rules' => 'trim|min_length[1]|required'
            ),
            array(
                'field' => 'second_commission',
                'label' => 'second_commission',
                'rules' => 'trim|min_length[1]|max_length[300]|required'
            ),

        );

        $this->image_fields = array(
            // // array(
            // //     'field_name' => 'gallery_layout_image',
            // //     'path' => './uploads/gallery'
            // ),
        );
    }

    public function index()
    {
        if ($this->is_crud == false) {
            redirect('admin/' . $this->table_name . '/form/edit/1');
        }

        $data['table'] = $this->table_name;
        $data['output_type'] = 'result';
        $content['title'] = $this->title;
        $content['records']  = $this->general->get($data);

        $data2['table'] = $this->table_name;
        $data2['output_type'] = 'result';
        $content['records2']  = $this->general->get($data2);


        $content['main_content'] = $this->table_name . '/list';
        $this->load->view('admin/inc/view', $content);
    }


    public function form($form_type = "", $id = "")
    {
        if ($this->is_crud == false) {
            $id = 1;
        }
        if ($_POST) {
            // $this->form_validation->set_rules($this->form_validations);
            if (!$this->form_validation->run() == TRUE) {
                $this->input->post();

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

                $data['table'] = 'manage_delivery_prices';
                if ($form_type == 'edit') {
                    $data['where'] = array($this->record_id => $id);
                    $this->general->update($data, $content);
                    $this->session->set_flashdata('success', 'Updated Successfully.');
                    redirect('admin/' . $this->table_name);
                } else if ($form_type == 'add' || $form_type == 'duplicate') {
                    $this->general->insert($data, $content);
                    $this->session->set_flashdata('success', 'Added Successfully.');
                    redirect('admin/' . $this->table_name);
                }
            } else {
                $content['record']  = $this->db->select('*')->from('manage_delivery_prices')
                    ->where(array('Manage_delivery_prices_id' => $id))->get()->result();
                $content['list']  = $this->db->select('*')->from('manage_delivery_prices')
                    ->where(array('status' => 'enable'))->get()->result();
                $content['main_content'] = $this->table_name . '/form';
                $this->load->view('admin/inc/view', $content);
            }
        } else {
            $content['record']  = $this->db->select('*')->from('manage_delivery_prices')
                ->where(array('Manage_delivery_prices_id' => $id))->get()->result();
            $content['list']  = $this->db->select('*')->from('manage_delivery_prices')
                ->where(array('manage_delivery_prices_status' => 'enable'))->get()->result();
            $content['main_content'] = $this->table_name . '/form';
            $this->load->view('admin/inc/view', $content);
        }
    }


    public function view($id)
    {
        if ($this->is_crud == true) {
            $data['where'] = array($this->record_id => $id);
            $data['table'] = $this->table_name;
            $data['output_type'] = 'row';
            $content['title'] = $this->title;
            $content['record']  = $this->general->get($data);
            $content['main_content'] = $this->table_name . '/view';
            $this->load->view('admin/inc/view', $content);
        } else {
            redirect('admin/' . $this->table_name);
        }
    }
    public function delete($id)
    {
        if ($this->is_crud == true) {
            $content = array(
                $this->record_status => 'disable',
            );
            $data['where'] = array($this->record_id => $id);
            $data['table'] = $this->table_name;
            $this->general->update($data, $content);
            $this->session->set_flashdata('success', 'Deleted Successfully.');
            redirect('admin/' . $this->table_name);
        } else {
            redirect('admin/' . $this->table_name);
        }
    }
}
