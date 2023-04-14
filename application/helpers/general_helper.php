<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('single_image_upload')) {
    function single_image_upload($image, $path, $type = "")
    {
        $_FILES['image']['name'] = $image['name'];
        $_FILES['image']['type'] = $image['type'];
        $_FILES['image']['tmp_name'] = $image['tmp_name'];
        $_FILES['image']['error'] = $image['error'];
        $_FILES['image']['size'] = $image['size'];
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $ci = &get_instance();
        $config['upload_path'] = '' . $path . '';
        if (!empty($type)) {
            $config['allowed_types'] = $type;
        } else {
            $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
        }
        $ci->load->library('upload', $config);
        $ci->upload->initialize($config);
        if (!$ci->upload->do_upload('image')) {
            return array('error' => $ci->upload->display_errors());
        } else {
            $file_detail = $ci->upload->data();
            return    $file_detail['file_name'];
        }
        return FALSE;
    }
}

if (!function_exists('multi_image_upload')) {
    function multi_image_upload($image, $index, $path, $type = "")
    {
        $_FILES['image']['name'] = $image['name'][$index];
        $_FILES['image']['type'] = $image['type'][$index];
        $_FILES['image']['tmp_name'] = $image['tmp_name'][$index];
        $_FILES['image']['error'] = $image['error'][$index];
        $_FILES['image']['size'] = $image['size'][$index];
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $ci = &get_instance();
        $config['upload_path'] = '' . $path . '';
        if (!empty($type)) {
            $config['allowed_types'] = $type;
        } else {
            $config['allowed_types'] = 'gif|jpg|png|mp4|webp';
        }
        $config['max_width'] = '400000';
        $config['max_height'] = '400000';
        $ci->load->library('upload', $config);
        $ci->upload->initialize($config);
        if (!$ci->upload->do_upload('image')) {
            return array('error' => $ci->upload->display_errors());
        } else {
            $file_detail = $ci->upload->data();
            return  $file_detail['file_name'];
        }
        return FALSE;
    }
}

if (!function_exists('single_video_upload')) {
    function single_video_upload($video, $path)
    {
        $_FILES['video']['name'] = $video['name'];
        $_FILES['video']['type'] = $video['type'];
        $_FILES['video']['tmp_name'] = $video['tmp_name'];
        $_FILES['video']['error'] = $video['error'];
        $_FILES['video']['size'] = $video['size'];
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $ci = &get_instance();
        $config['upload_path'] = '' . $path . '';
        $config['allowed_types'] = 'mov|mpeg|mp3|avi|mp4';
        $ci->load->library('upload', $config);
        $ci->upload->initialize($config);
        if (!$ci->upload->do_upload('video')) {
            return array('error' => $ci->upload->display_errors());
        } else {
            $file_detail = $ci->upload->data();
            return  $file_detail['file_name'];
        }
        return FALSE;
    }
}

function upload_video($table, $field)
{
    $config['upload_path'] = './uploads/' . $table . '';
    $config['allowed_types'] = '*';
    $config['max_size']     = '100000000000000000';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if ($this->upload->do_upload($field)) {

        $file_detail = $this->upload->data();
        return $file_detail['file_name'];
    } else {
        echo $this->upload->display_errors();
    }
    return;
}

if (!function_exists('send_email')) {
    function send_email($email, $subject, $body, $from_email)
    {
        $ci = &get_instance();
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $config['starttls'] = true;
        $config['newline'] = '\r\n';
        $ci->email->initialize($config);
        $ci->email->from($from_email, $ci->site_title);
        $ci->email->to($email);
        if (!empty($send_cc)) {
            $ci->email->cc($send_cc);
        }
        $ci->email->subject($subject);
        $ci->email->message($body);
        if ($ci->email->send()) {
            return TRUE;
        } else {
            return FALSE;
        }
        exit;
    }
}

if (!function_exists('limit_text')) {
    function limit_text($count, $text)
    {
        $result = strlen($text) > $count ? substr($text, 0, $count) . '...' : $text;
        return $result;
    }
}


if (!function_exists('get_files_list')) {
    function get_files_list($directory)
    {
        if ($handle = opendir($directory)) {
            $result = array();
            while (false !== ($entry = readdir($handle))) {

                if ($entry != "." && $entry != "..") {

                    array_push($result, $entry);
                }
            }

            closedir($handle);
            return $result;
        }
    }
}


if (!function_exists('get_templates')) {
    function get_templates()
    {
        $result = array();
        $list = get_files_list('application/views/front/template');
        foreach ($list as $val) {
            array_push($result, str_replace('.php', '', $val));
        }

        return $result;
    }
}

if (!function_exists('get_list')) {
    function get_list($tabel = "", $where = "", $limit = "", $order_col = "", $order_by = "", $like = "", $group_by = "")
    {
        $ci = &get_instance();
        $records = $ci->general->get_list($tabel, $where, $limit, $order_col, $order_by, $like, $group_by);
        if ($records) {
            return $records;
        } else {
            return  FALSE;
        }
    }
}


if (!function_exists('array_like')) {
    function array_like($data, $input)
    {

        $result = array_filter($data, function ($item) use ($input) {
            if (stripos($item, $input) !== false) {
                return true;
            }
            return false;
        });
        $match = $result;
        $result = array_diff($data, $match);
        return array_merge($match, $result);
    }
}


if (!function_exists('get_id_by_slug')) {
    function get_id_by_slug($table, $slug)
    {
        $ci = &get_instance();
        $temp = $ci->general->get_list($table, array('' . $table . '_slug' => $slug));
        if ($temp) {
            foreach ($temp as $tp) {
                $id = $table . '_id';
                $result = $tp->$id;
            }
            return $result;
        } else {
            return FALSE;
        }
    }
}

if (!function_exists('generateRandomString')) {
    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
