<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

		public function index()
		{
			$data['title'] ="DATA BANNER";
			$data['banner']     = json_decode($this->curl->simple_get(API.'banner'));
      $data['bannertype'] = json_decode($this->curl->simple_get(API.'bannertype'));

			$this->load->view('template/header.php', $data);
			$this->load->view('template/left.php');
			$this->load->view('content/banner/banner.php', $data);
			$this->load->view('template/footer.php');
		}

    public function add(){
      $data = json_decode($this->curl->simple_get(API.'bannertype'));
    	echo json_encode($data);
    }

    function ajax_get_banner_by_id(){
      $get  = $this->input->get();
      $id   = isset($get['id']) ? $get['id'] : '';
      $data = json_decode($this->curl->simple_get(API.'banner?id='.$id));
      echo json_encode($data);
    }


    function ajax_add(){
			$time = date("Y/m/d H:i:s");
      if(isset($_POST['submit'])){

			 $filename  = $_FILES['img_banner']['tmp_name'];
       $filenm    = $_FILES['img_banner']['name'];
       $ext       = substr($filenm, -3);
       $handle    = fopen($filename, "r");
       $dt        = fread($handle, filesize($filename));
	 		 $file      = base64_encode($dt);

        $data = array(
            'img_banner'     => $file,
            'ext'            => $ext,
						'banner_type_id' => $this->input->post('banner_type_id'),
            'description'    => $this->input->post('description'),
            'link_click'     => $this->input->post('link_click')
            );
        // echo json_encode($data);
        // die();

        $insert =  $this->curl->simple_post(API.'banner', $data, array(CURLOPT_BUFFERSIZE => 10));
        if($insert)   {
            $this->session->set_flashdata('hasil','Insert Data Berhasil');
        }else {
           $this->session->set_flashdata('hasil','Insert Data Gagal');
        }
        redirect('banner');
      }else{
        $data['bannertype'] = json_decode($this->curl->simple_get(API.'bannertype'));
				$data['title'] ="INPUT BANNER";
				$this->load->view('template/header.php', $data);
				$this->load->view('template/left.php');
        $this->load->view('content/banner/add_banner', $data);
				$this->load->view('template/footer.php');
      }
    }


    public function ajax_update_banner() {
      if($_FILES['img_banner']['tmp_name']) {
        $filename  = $_FILES['img_banner']['tmp_name'];
        $filenm    = $_FILES['img_banner']['name'];
        $ext       = substr($filenm, -3);
        $handle    = fopen($filename, "r");
        $dt        = fread($handle, filesize($filename));
        $file      = base64_encode($dt);
      }else{
        $file = "";
      }

      $data  = array(
        'banner_id'      =>  $this->input->post('banner_id'),
        'banner_type_id' =>  $this->input->post('banner_type_id'),
        'link_click'     =>  $this->input->post('link_click'),
        'description'    =>  $this->input->post('description'),
        'ext'            =>  $ext,
        'image_name'     =>  $file
        );

      $data_string = json_encode($data);
      $ch = curl_init(API.'banner/update');
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' )   );
      $result   = curl_exec($ch);
      $response = json_decode($result);
      	echo json_encode([
          'status'=>'sukses'
        ]);
    }



		function edit(){

        if(isset($_POST['submit'])){
            if($_FILES['img_banner']['tmp_name']){
              $filename  = $_FILES['img_banner']['tmp_name'];
              $filenm    = $_FILES['img_banner']['name'];
              $ext       = substr($filenm, -3);
              $handle    = fopen($filename, "r");
              $dt        = fread($handle, filesize($filename));
              $file      = base64_encode($dt);
            }else{
              $file = '';
            }


            $data = array(
                'banner_id'      => $this->input->post('banner_id'),
                'image_name'     => $file,
                'ext'            => $ext,
    						'banner_type_id' => $this->input->post('banner_type_id'),
                'description'    => $this->input->post('description'),
                'link_click'     => $this->input->post('link_click')
                );

							//echo json_encode( $data);
							//die();
            //$update =  $this->curl->simple_put(API.'banner/update', $data, array(CURLOPT_BUFFERSIZE => 10
		        $data_string = json_encode($data);

            $ch = curl_init(API.'banner/update');
        		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        			'Content-Type: application/json'
        			)
        		);

            $result = curl_exec($ch);
            $response = json_decode($result);
		        // echo $result;
            // die();
            if($response->code == '200')  {
                $this->session->set_flashdata('hasil', $response->message);
            } else {
               $this->session->set_flashdata('hasil', $response->message);
            }
            redirect('banner');
        }else{
					  // $data['jurusan'] = json_decode($this->curl->simple_get(API.'/jurusan'));
            $params = array('banner_id'=>  $this->uri->segment(3));
            $data['banner'] = json_decode($this->curl->simple_get(API.'banner',$params));
            $data['bannertype'] = json_decode($this->curl->simple_get(API.'bannertype'));
						$data['title'] ="EDIT BANNER";
						$this->load->view('template/header.php', $data);
						$this->load->view('template/left.php');
		        $this->load->view('content/banner/edit_banner',$data);
						$this->load->view('template/footer.php');
        }


        function ajax_delete(){
          $data  = array(
            'id'   =>  $this->input->get('id')
          );
          $data_string = json_encode($data);
          $ch = curl_init(API.'banner/delete');
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' )   );
          $result   = curl_exec($ch);
          echo $result;
        }


				function delete($banner_id){
		        if(empty($banner_id)){
		            redirect('banner');
		        }else{
		            $delete =  $this->curl->simple_delete(API.'banner', array('banner_id'=>$banner_id), array(CURLOPT_BUFFERSIZE => 10));
		            if($delete)  {
		                $this->session->set_flashdata('hasil','Delete Data Berhasil');
		            } else {
		               $this->session->set_flashdata('hasil','Delete Data Gagal');
		            }
		            redirect('banner');
		        }
		    }




    }


}
