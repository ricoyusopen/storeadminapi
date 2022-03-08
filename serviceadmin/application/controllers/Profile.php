<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Profile extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function index_get() {
        $key = $this->get('keyname');
        if ($key == '') {
            $this->db->select('*');
            $this->db->from('store_profile');
            $this->db->order_by('key_name','ASC');
            $query =  $this->db->get()->result();
        } else {
            $this->db->select('*');
            $this->db->from('store_profile');
            $this->db->order_by('key_name','ASC');
            $this->db->where('key_name', $key);
            $query = $this->db->get()->result();
        }
        $this->response($query, 200);
    }


    function index_post() {
        $data = array(
                    'key_name'   => $this->post('key_name'),
                    'value_name' => $this->post('value_name')
                  );
                  // var_dump( $data);
                  // die();
        $insert = $this->db->insert('store_profile', $data);

        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


    function index_put() {
        $key = $this->put('key_name');
        $data = array(
                  'key_name'   => $this->put('key_name'),
                  'value_name' => $this->put('value_name')
                );
        $this->db->where('key_name', $key);
        $update = $this->db->update('store_profile', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }



    function index_delete() {
        $id = $this->delete('member_id');
        $this->db->where('member_id', $id);
        $delete = $this->db->delete('member');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
