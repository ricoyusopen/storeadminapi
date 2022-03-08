<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->Model('M_member');
    }


	function create(){
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


    function cek_login(){
       $jsonArray = json_decode(file_get_contents('php://input'),true);
       //die(json_encode($jsonArray['regexResult']));

       $ID          = $jsonArray['id'];
       $PASS        = $jsonArray['password'];
       $TIME        = $jsonArray['time'];
       $HASH        = $jsonArray['hash'];
       $REGEXRESULT = $jsonArray['regexResult'];
       $MyHash      = sha1($ID . $PASS . $TIME);

       if($MyHash === $HASH){

         //$query = $this->curl->simple_post(API.'otentication/getid?id=', $ID, array(CURLOPT_BUFFERSIZE => 10));
         //$query = json_encode($this->curl->simple_get(API.'otentication/getid?id='.$ID));
         $query = json_decode($this->curl->simple_get(API.'otentication?id='.$ID));

         //die($query->WEB_PASS."---".$jsonArray['password']);

         if($query){

           if($query->WEB_PASS == $jsonArray['password']){

               if ($REGEXRESULT == "1"){
                   //$member = $this->M_member->get_data_member_by_id($query->ID);
                   $member = json_decode($this->curl->simple_get(API.'otentication/member?id='.$query->USER_NAME));
                   //die($query->USER_NAME."---".$member->user_name);
                   $userData = array(
                     'user_name'      => $member->user_name,
                     'store_id'       => $member->store_id,
                     'user_img_name'  => $member->user_img_name,
                     'member_id'      => $member->member_id,
                     'status'         => "login"
                   );
                  $this->session->set_userdata($userData);
                  echo json_encode(array("status"=>"SUCCESS", "param"=>$userData));
                  die();

               } else {
                 echo json_encode(array("status"=>"CHANGE PASSWORD", "pesan"=>"Password minimal 8 karakter, mengandung huruf besar, huruf kecil dan angka!","param"=>$jsonArray));
                 die();
               }

           } else {
                echo json_encode(array("status"=>"WRONG PASS","pesan"=>"Password Kamu Salah","param"=>$jsonArray));
                die();
           }

         }else {
          echo json_encode(array("status"=>"ID FAILED","pesan"=>"ID/Username Tidak Terdaftar","param"=>$jsonArray));
          die();
         }

       } else {
        echo json_encode(array("status"=>"HASHING FAILED","pesan"=>"Security violation","param"=>$jsonArray));
        die();
       }

  			// $insert =  $this->curl->simple_post(API.'otentication/ceklogin_post', $data, array(CURLOPT_BUFFERSIZE => 10));
        //
  			// if($insert) {
  			// 		$this->session->set_flashdata('hasil','Insert Data Berhasil');
  			// } else {
  			// 	 $this->session->set_flashdata('hasil','Insert Data Gagal');
  			// }

    }

    public function logout(){
      $this->session->sess_destroy();
      redirect(base_url());
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
