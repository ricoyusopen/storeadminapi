<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_category extends CI_Controller {


    function __construct() {
        parent::__construct();
    }

	public function index()
	{
		$data['title'] ="DATA SUB CATEGORY PRODUCT";
		$data['category'] = json_decode($this->curl->simple_get(API.'category'));
    // $data['icon']    = json_decode($this->curl->simple_get(API.'category'));
		$data['subcategory'] = json_decode($this->curl->simple_get(API.'sub_category'));
    // echo json_encode($this->curl->simple_get(API.'sub_category'));
    // die();
		$this->load->view('template/header.php', $data);
		$this->load->view('template/left.php');
		$this->load->view('content/subcategory/sub_category.php', $data);
		$this->load->view('template/footer.php');
	}


  public function addsub(){
    $data['title'] ="ADD SUB CATEGORY PRODUCT";
		$data['category'] = json_decode($this->curl->simple_get(API.'category'));
    // $data['icon']    = json_decode($this->curl->simple_get(API.'category'));
		// $data['subcategory'] = json_decode($this->curl->simple_get(API.'sub_category'));
    // echo json_encode($this->curl->simple_get(API.'sub_category'));
    // die();
		$this->load->view('template/header.php', $data);
		$this->load->view('template/left.php');
		$this->load->view('content/subcategory/add_subcategory.php', $data);
		$this->load->view('template/footer.php');
  }


  public function ajax_get_subcategory_by_id() {
    $get     = $this->input->get();
    $id      = isset($get['id']) ? $get['id'] : '';
  	$data    = json_decode($this->curl->simple_get(API.'sub_category?id='.$id));
  	echo json_encode($data);
  }
  



  public function get_category_for_add() {
    $get     = $this->input->get();
    $id      = isset($get['id']) ? $get['id'] : '';
  	$data    = json_decode($this->curl->simple_get(API.'sub_category/categoryadd?id='.$id));
  	echo json_encode($data);
  }



  public function add(){
    $data = json_decode($this->curl->simple_get(API.'sub_category'));
    echo json_encode($data);
  }



  public function ajax_add()		{
    // if($_FILES['icon_sub']['tmp_name']) {
    //   $filename  = $_FILES['icon_sub']['tmp_name'];
    //   $filenm    = $_FILES['icon_sub']['name'];
    //   $ext       = substr($filenm, -3);
    //   $handle    = fopen($filename, "r");
    //   $dt        = fread($handle, filesize($filename));
    //   $file      = base64_encode($dt);
    // }else{
    //   $file = "";
    // }

    $data  = array(
                    'parent_category_id'    =>  $this->input->post('product_category_id'),
                    'product_category_name' =>  $this->input->post('sub_category_name')
                    // 'ext'                   =>  $ext,
                    // 'icon'                  =>  $file
                  );

    $data_string = json_encode($data);
    // echo $data_string;
    // die();
    $ch = curl_init(API.'sub_category/updateadd');
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
    // if($_FILES['icon']['tmp_name']) {
    //   $filename  = $_FILES['icon']['tmp_name'];
    //   $filenm    = $_FILES['icon']['name'];
    //   $ext       = substr($filenm, -3);
    //   $handle    = fopen($filename, "r");
    //   $dt        = fread($handle, filesize($filename));
    //   $file      = base64_encode($dt);
    // }else{
    //   $file = "";
    // }

    $data  = array(
      'product_category_id'    =>  $this->input->post('product_category_id'),
      'parent_category_id'     =>  $this->input->post('parent_category_id'),
      'product_category_name'  =>  $this->input->post('sub_category_name')
      // 'ext'                   =>  $ext,
      // 'icon'                  =>  $file
      );

    $data_string = json_encode($data);
            // echo $data_string;
            // die();
    $ch = curl_init(API.'sub_category/update');
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
    $ch = curl_init(API.'sub_category/delete');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' )   );
    $result   = curl_exec($ch);
    echo $result;
  }







	function create(){

		if(isset($_POST['submit'])){

		 $filename  = $_FILES['icon']['tmp_name'];
		 $handle    = fopen($filename, "r");
		 $dt        = fread($handle, filesize($filename));
		 $file      = base64_encode($dt);

			$data = array(
					'product_category_id' =>  $this->input->post('product_category_id'),
					'sub_category_name'   =>  $this->input->post('sub_category_name'),
					'icon'                =>  $file);
					// echo json_encode( $data);
          // die();
			$insert =  $this->curl->simple_post(API.'sub_category', $data, array(CURLOPT_BUFFERSIZE => 10));

			if($insert) {
					$this->session->set_flashdata('hasil','Insert Data Berhasil');
			} else {
				 $this->session->set_flashdata('hasil','Insert Data Gagal');
			}
			redirect('sub_category');
		}else{

			$data['title'] ="INPUT CATEGORY";
			$data['category'] = json_decode($this->curl->simple_get(API.'category'));
			$this->load->view('template/header.php', $data);
			$this->load->view('template/left.php');
			$this->load->view('content/subcategory/add_subcategory', $data);
			$this->load->view('template/footer.php');
		}
	}



	function edit(){
        if(isset($_POST['submit'])){

					   $filename  = $_FILES['icon']['tmp_name'];
						 $handle    = fopen($filename, "r");
						 $dt        = fread($handle, filesize($filename));
						 $file      = base64_encode($dt);

            $data = array(
							'product_sub_category_id' =>  $this->input->post('product_sub_category_id'),
							'sub_category_name'       =>  $this->input->post('sub_category_name'),
							'icon'                    =>  $file);
            $update =  $this->curl->simple_put(API.'sub_category', $data, array(CURLOPT_BUFFERSIZE => 10));

            if($update) {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else{
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('sub_category');
        }else{
            $params = array(
															'product_sub_category_id'=>  $this->uri->segment(3)
												);
						$data['subcategory'] = json_decode($this->curl->simple_get(API.'sub_category',$params));
						$data['category']    = json_decode($this->curl->simple_get(API.'category'));
						$data['title'] ="EDIT SUB CATEGORY";
						$this->load->view('template/header.php', $data);
						$this->load->view('template/left.php');
						$this->load->view('content/subcategory/edit_subcategory',$data);
						$this->load->view('template/footer.php');

        }
    }


		function delete($product_sub_category_id){
        if(empty($product_sub_category_id)){
            redirect('category');
        }else{
            $delete =  $this->curl->simple_delete(API.'sub_category', array('product_sub_category_id'=>$product_category_id), array(CURLOPT_BUFFERSIZE => 10));
            if($delete)  {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            } else {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('sub_category');
        }
    }


}
