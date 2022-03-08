<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    function __construct() {
        parent::__construct();
    }


	function toCart(){
			if(isset($_POST['submit'])){
				$data = array(
					  'full_name' =>  $this->input->post('full_name'),
						'email'     =>  $this->input->post('email'),
						'phone'     =>  $this->input->post('phone'),
						'password'  =>  $this->input->post('password'),
						'join_date'  =>  $this->input->post('join_date')
					);

						// echo json_encode( $data);
	          // die();
				$insert =  $this->curl->simple_post(API.'member', $data, array(CURLOPT_BUFFERSIZE => 10));

				if($insert) {
						$this->session->set_flashdata('hasil','Insert Data Berhasil');
				} else {
					 $this->session->set_flashdata('hasil','Insert Data Gagal');
				}
				redirect('store');
			}
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
