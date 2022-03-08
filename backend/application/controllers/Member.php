<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {


    function __construct() {
        parent::__construct();
    }

		public function index(){
			$data['title'] ="DATA MEMBER";
			$data['member'] = json_decode($this->curl->simple_get(API.'member'));
			$this->load->view('template/header.php', $data);
			$this->load->view('template/left.php');
			$this->load->view('content/member/member.php', $data);
			$this->load->view('template/footer.php');
		}


    public function ajax_get_member_by_id() {
      $get     = $this->input->get();
      $id = isset($get['id']) ? $get['id'] : '';
    	$data    = json_decode($this->curl->simple_get(API.'member?id='.$id));
    	echo json_encode($data);
    }

		function create(){

			if(isset($_POST['submit'])){

				$data = array(
					  'full_name' =>  $this->input->post('full_name'),
						'email'     =>  $this->input->post('email'),
						'phone'     =>  $this->input->post('phone'),
						'password'  =>  $this->input->post('password'));

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
								'member_id'     =>  $this->input->post('member_id'),
								'full_name'   	=>  $this->input->post('full_name'),
								'email' 				=>  $this->input->post('email'),
								'phone'         =>  $this->input->post('phone'),
								'password'      =>  $this->input->post('password'));
								// echo json_encode($data);
								// die();
	            $update =  $this->curl->simple_put(API.'member', $data, array(CURLOPT_BUFFERSIZE => 10));
	            if($update) {
	                $this->session->set_flashdata('hasil','Update Data Berhasil');
	            }else{
	               $this->session->set_flashdata('hasil','Update Data Gagal');
	            }
	            redirect('member');
	        }else{
	            $params = array(
																'member_id'=>  $this->uri->segment(3)
													);
	            $data['member'] = json_decode($this->curl->simple_get(API.'member',$params));
							$data['title'] ="EDIT MEMBER";
							$this->load->view('template/header.php', $data);
							$this->load->view('template/left.php');
							$this->load->view('content/member/edit_member',$data);
							$this->load->view('template/footer.php');

	        }
	    }


			function delete($member_id){
	        if(empty($member_id)){
	            redirect('member');
	        }else{
	            $delete =  $this->curl->simple_delete(API.'member', array('member_id'=>$member_id), array(CURLOPT_BUFFERSIZE => 10));
	            if($delete)  {
	                $this->session->set_flashdata('hasil','Delete Data Berhasil');
	            } else {
	               $this->session->set_flashdata('hasil','Delete Data Gagal');
	            }
	            redirect('member');
	        }
	    }

  }
