<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    function __construct() {
        parent::__construct();

    }


	public function index()
	{
		$data['title'] ="DATA CATEGORY PRODUCT";
		$data['category'] = json_decode($this->curl->simple_get(API.'category'));
    //$category = json_decode($this->curl->simple_get(API.'category'));
    // $data['sub_category'] =
    // echo json_encode($this->curl->simple_get(API.'category'));
    // die();
		$this->load->view('template/header.php', $data);
		$this->load->view('template/left.php');
		$this->load->view('content/category/category.php', $data);
		$this->load->view('template/footer.php');
	}


  public function ajax_get_category_by_id() {
    $get     = $this->input->get();
    $id      = isset($get['id']) ? $get['id'] : '';
  	$data    = json_decode($this->curl->simple_get(API.'category?id='.$id));
  	echo json_encode($data);
  }

  public function add(){
    $data = json_decode($this->curl->simple_get(API.'category'));
    echo json_encode($data);
  }


  public function ajax_add()		{
    if($_FILES['icon']['tmp_name']) {
      $filename  = $_FILES['icon']['tmp_name'];
      $filenm    = $_FILES['icon']['name'];
      $ext       = substr($filenm, -3);
      $handle    = fopen($filename, "r");
      $dt        = fread($handle, filesize($filename));
      $file      = base64_encode($dt);
    }else{
      $file = "";
    }

    $data  = array(
      'product_category_id'   =>  $this->input->post('product_category_id'),
      'product_category_name' =>  $this->input->post('product_category_name'),
      'ext'                   =>  $ext,
      'icon'                  =>  $file
      );

    $data_string = json_encode($data);
    $ch = curl_init(API.'category');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' )   );
    $result   = curl_exec($ch);
    $response = json_decode($result);

    echo json_encode([
      'status'=>'sukses add data'
    ]);
  }




  public function ajax_update() {
    if($_FILES['icon']['tmp_name']) {
      $filename  = $_FILES['icon']['tmp_name'];
      $filenm    = $_FILES['icon']['name'];
      $ext       = substr($filenm, -3);
      $handle    = fopen($filename, "r");
      $dt        = fread($handle, filesize($filename));
      $file      = base64_encode($dt);
    }else{
      $file = "";
    }

    $data  = array(
                  'product_category_id'   =>  $this->input->post('product_category_id'),
                  'product_category_name' =>  $this->input->post('product_category_name'),
                  'ext'                   =>  $ext,
                  'icon'                  =>  $file
            );

    $data_string = json_encode($data);
    $ch = curl_init(API.'category/update');
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


  function ajax_delete(){
    $data  = array(
      'id'   =>  $this->input->get('id')
    );
    $data_string = json_encode($data);
    $ch = curl_init(API.'category/delete');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' )   );
    $result   = curl_exec($ch);
    echo $result;
  }



  public function ajax_add_banner()		{
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
              'banner_id'     =>  $this->input->post('banner_id'),
              'link_click'    =>  $this->input->post('link_click'),
              'description'   =>  $this->input->post('description'),
              'ext'           => $ext,
              'icon'          =>  $file
              );

    $data_string = json_encode($data);
    $ch = curl_init(API.'banner');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' )   );
    $result   = curl_exec($ch);
    $response = json_decode($result);

    echo json_encode([
      'status'=>'sukses add banner'
    ]);
  }

  public function ajax_edit_banner() {
    $get     = $this->input->get();
    $id      = isset($get['id']) ? $get['id'] : '';
  	$data    = json_decode($this->curl->simple_get(API.'banner?id='.$id));
  	echo json_encode($data);
  }







	function create(){
		if(isset($_POST['submit'])){
		 $filename  = $_FILES['icon']['tmp_name'];
     $filenm = $_FILES['icon']['name'];
     $ext       = substr($filenm, -3);
		 $handle    = fopen($filename, "r");
		 $dt        = fread($handle, filesize($filename));
		 $file      = base64_encode($dt);

			$data = array(
					'product_category_name'   =>  $this->input->post('product_category_name'),
          'ext'                   => $ext,
					'icon'                    =>  $file);
					// echo json_encode( $data);
          // die();
			$insert =  $this->curl->simple_post(API.'category', $data, array(CURLOPT_BUFFERSIZE => 10));

			if($insert) {
					$this->session->set_flashdata('hasil','Insert Data Berhasil');
			} else {
				 $this->session->set_flashdata('hasil','Insert Data Gagal');
			}
			redirect('category');
		}else{

			$data['title'] ="INPUT CATEGORY";
			$this->load->view('template/header.php', $data);
			$this->load->view('template/left.php');
			$this->load->view('content/category/add_category');
			$this->load->view('template/footer.php');
		}
	}




	function edit(){
        if(isset($_POST['submit'])){
					if($_FILES['icon']['tmp_name']) {
            $filename  = $_FILES['icon']['tmp_name'];
            $filenm    = $_FILES['icon']['name'];
            $ext       = substr($filenm, -3);
  					$handle    = fopen($filename, "r");
  					$dt        = fread($handle, filesize($filename));
  					$file      = base64_encode($dt);
          }else{
            $file = "";
          }
            $data = array(
              'product_category_id'   =>  $this->input->post('product_category_id'),
							'product_category_name'   =>  $this->input->post('product_category_name'),
              'ext'                   => $ext,
							'icon'                    =>  $file);
            // echo json_encode($data);
            // die();
            // $update =  $this->curl->simple_put(API.'category/update', $data, array(CURLOPT_BUFFERSIZE => 10));
            // if($update) {
            //     $this->session->set_flashdata('hasil','Update Data Berhasil');
            // }else{
            //    $this->session->set_flashdata('hasil','Update Data Gagal');
            // }
            // redirect('category');
            $data_string = json_encode($data);

            $ch = curl_init(API.'category/update');
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
            redirect('category');
        }else{
            $params = array(
															'product_category_id'=>  $this->uri->segment(3)
												);
            $data['category'] = json_decode($this->curl->simple_get(API.'category',$params));
						$data['title'] ="EDIT CATEGORY";
						$this->load->view('template/header.php', $data);
						$this->load->view('template/left.php');
						$this->load->view('content/category/edit_category',$data);
						$this->load->view('template/footer.php');

        }
    }





}
