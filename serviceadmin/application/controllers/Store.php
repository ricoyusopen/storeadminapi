<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Store extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('M_store');
    }


    function profile_get() {
        $key_name = $this->get('key_name');
        if(empty($key_name)){  
            $banner = $this->M_store->get_profile_val();
        }else{
            $banner = $this->M_store->get_profile_val_by_key($key_name);
        }
        
        $response = [
            'code'=>'200',
            'message'=>'Ok.',
            'data'=> $banner
        ];   
        return $this->response($response, 200);

    }

    function getcart_get(){
        $member_id = $this->get('member_id');
        if(empty($member_id)){
            $response = [
                'code' => '400',
                'message' => 'member id kosong',
                'body'=>null
            ];
            return $this->response($response,200);
        }
        $cart = $this->M_store->get_cart_by_member_id($member_id);
        $response = [
            'code'=>'200',
            'message'=>'Ok.',
            'data'=> $cart
        ];
        return $this->response($response,200);
    }



}
