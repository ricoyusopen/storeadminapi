<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct() {
        parent::__construct();

    }

		public function index(){
			$data['title'] ="INFORMATIOAN STORE";
			$data['profile'] = json_decode($this->curl->simple_get(API.'profile'));
			$this->load->view('template/header.php', $data);
			$this->load->view('template/left.php');
			$this->load->view('content/profile/profile.php', $data);
			$this->load->view('template/footer.php');
		}

    

    public function ajax_get_profile_by_keyname() {
      $get     = $this->input->get();
      $keyname = isset($get['keyname']) ? $get['keyname'] : '';
    	$data    = json_decode($this->curl->simple_get(API.'profile?keyname='.$keyname));
    	echo json_encode($data);
    }

		function create(){

			if(isset($_POST['submit'])){

				$data = array(
					  'key_name' =>  $this->input->post('key_name'),
						'value_name'     =>  $this->input->post('value_name'));
						// echo json_encode( $data);
	          // die();
				$insert =  $this->curl->simple_post(API.'profile', $data, array(CURLOPT_BUFFERSIZE => 10));

				if($insert) {
						$this->session->set_flashdata('hasil','Insert Data Berhasil');
				} else {
					 $this->session->set_flashdata('hasil','Insert Data Gagal');
				}
				redirect('profile');
			}
		}


		function edit(){
	        if(isset($_POST['submit'])){
	            $data = array(
								'key_name'     =>  $this->input->post('key_name'),
								'value_name'   =>  $this->input->post('value_name'));
								// echo json_encode($data);
								// die();
	            $update =  $this->curl->simple_put(API.'profile', $data, array(CURLOPT_BUFFERSIZE => 10));
	            if($update) {
	                $this->session->set_flashdata('hasil','Update Data Berhasil');
	            }else{
	               $this->session->set_flashdata('hasil','Update Data Gagal');
	            }
	            redirect('profile');
	        }else{
	            $params = array(
																'key_name'=>  $this->uri->segment(3)
													);
	            $data['profile'] = json_decode($this->curl->simple_get(API.'profile',$params));
							$data['title'] ="EDIT INFORMATION STORE";
							$this->load->view('template/header.php', $data);
							$this->load->view('template/left.php');
							$this->load->view('content/profile/edit_profile',$data);
							$this->load->view('template/footer.php');

	        }
	    }


			function delete($key_name){
	        if(empty($key_name)){
	            redirect('profile');
	        }else{
	            $delete =  $this->curl->simple_delete(API.'profile', array('key_name'=>$key_name), array(CURLOPT_BUFFERSIZE => 10));
	            if($delete)  {
	                $this->session->set_flashdata('hasil','Delete Data Berhasil');
	            } else {
	               $this->session->set_flashdata('hasil','Delete Data Gagal');
	            }
	            redirect('profile');
	        }
	    }

  }
