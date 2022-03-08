<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    function __construct() {
        parent::__construct();
    }


	function toCart(){
    // if(isset($_POST['submit'])){
      // $prod_id = $this->post('product_id');
      // $product_detail = $this->curl->simple_post(API.'Order', $data, array(CURLOPT_BUFFERSIZE => 10));
      //$post     = $this->input->post();
      // $prod_id  = $this->input->post('product_id');
    	// $product_detail   = json_decode($this->curl->simple_get(API.'order?prod_id='.$prod_id));


      // var_dump($product_detail);
      // die();
      // $dsc = $product_detail->discount;
      // $prc = $this->post('price') - (($dsc/100) * $this->post('price'));
      // $ttl = $this->post('quantity') * $prc;

				$data = array(
            'product_id'        =>  $this->input->post('product_id'),
						'member_id'         =>  $this->input->post('member_id'),
						'quantity'          =>  $this->input->post('quantity'),

            'payment_method_id' =>  "1",

            'courier_service'   =>  "JNE",
            'courier_fee'       =>  "10000",
            'no_resi'           =>  $this->input->post('no_resi')
					);

						// echo json_encode($data);
	          // die();
				$insert =  $this->curl->simple_post(API.'Order', $data, array(CURLOPT_BUFFERSIZE => 10));


				//redirect('store');
			//}
		}


    function get_cart(){
      $get     = $this->input->get();
      $id      = isset($get['member_id']) ? $get['member_id'] : '';
      $data = json_decode($this->curl->simple_get(API.'order/getcart?id='.$id));
      echo json_encode($data);
    }




		function edit(){
	        if(isset($_POST['submit'])){
	            $data = array(
							'full_name' =>  $this->input->post('full_name'),
							 'email'     =>  $this->input->post('email'),
							 'phone'     =>  $this->input->post('phone'),
							 'password'  =>  $this->input->post('password'));
	            $update =  $this->curl->simple_put(API.'member', $data, array(CURLOPT_BUFFERSIZE => 10));
	            if($update) {
	                $this->session->set_flashdata('hasil','Update Data Berhasil');
	            }else{
	               $this->session->set_flashdata('hasil','Update Data Gagal');
	            }
	            redirect('store');
	        }
	    }


			function delete($product_category_id){
	        if(empty($product_category_id)){
	            redirect('category');
	        }else{
	            $delete =  $this->curl->simple_delete(API.'category', array('product_category_id'=>$product_category_id), array(CURLOPT_BUFFERSIZE => 10));
	            if($delete)  {
	                $this->session->set_flashdata('hasil','Delete Data Berhasil');
	            } else {
	               $this->session->set_flashdata('hasil','Delete Data Gagal');
	            }
	            redirect('category');
	        }
	    }


}
