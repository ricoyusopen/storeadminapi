<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Member extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->Model('M_member');
    }


    // show data Member
    function index_get() {
      $member_id = $this->get('id');

      if ($member_id == '') {
          $member = $this->M_member->get_member()->result();
      } else {
          $member = $this->M_member->get_member_by_id($member_id)->result();

      }
      return $this->response($member, 200);
    }


    function index_post() {
        $pass = sha1($this->post('password'));
        $data = array(
                    'full_name'  => $this->post('full_name'),
                    'email'      => $this->post('email'),
                    'phone'      => $this->post('phone'),
                    'password'   => $pass,
                    'join_date'  => $this->post('join_date')
                  );
                  // var_dump( $data);
                  // die();

        $this->st24apiv1->is_debug(true);
        $insert = $this->db->insert('member', $data);

        $this->st24apiv1->set_host(HOST_API_INTERNAL);
        $this->st24apiv1->set_query($sql);
        $this->st24apiv1->set_secret(API_SECRET);
        return $this->st24apiv1->run();

    }


    //update data member
    function index_put() {
        $id = $this->put('member_id');
        $data = array(
                  'member_id' => $this->put('member_id'),
                  'full_name' => $this->put('full_name'),
                  'email'     => $this->put('email'),
                  'phone'     => $this->put('phone'),
                  'password'  => $this->put('password')
                );
        $this->db->where('member_id', $id);
        $update = $this->db->update('member', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // delete member
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
