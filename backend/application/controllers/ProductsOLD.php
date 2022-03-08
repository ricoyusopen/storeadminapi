<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

	public function index()
	{
		$data['title'] ="DATA PRODUCT";
		$data['product']  = json_decode($this->curl->simple_get(API.'products'));
    $data['category'] = json_decode($this->curl->simple_get(API.'category'));
		$this->load->view('template/header.php', $data);
		$this->load->view('template/left.php');
		$this->load->view('content/product/products.php', $data);
		$this->load->view('template/footer.php');
	}


  public function ajax_get_product_by_id(){
    $get  = $this->input->get();
    $id   = isset($get['id']) ? $get['id'] : '';
    $data = json_decode($this->curl->simple_get(API.'products?id='.$id));
    echo json_encode($data);
  }

  public function get_subcategory() {
    $get     = $this->input->get();
    $id      = isset($get['id']) ? $get['id'] : '';
    $data    = json_decode($this->curl->simple_get(API.'products/listcategoryadd?id='.$id));
    echo json_encode($data);
  }




	function ajax_add(){

    if($_FILES['image1']['tmp_name']){
      $filename1  = $_FILES['image1']['tmp_name'];
      $filenm1    = $_FILES['image1']['name'];
      $ext1       = substr($filenm1, -3);
      $handle1    = fopen($filename1, "r");
      $dt1        = fread($handle1, filesize($filename1));
      $file1      = base64_encode($dt1);
    }else{
      $file1 = '';
    }

    if($_FILES['image2']['tmp_name']){
      $filename2  = $_FILES['image2']['tmp_name'];
      $filenm2   = $_FILES['image2']['name'];
      $ext2      = substr($filenm2, -3);
      $handle2   = fopen($filename2, "r");
      $dt2        = fread($handle2, filesize($filename2));
      $file2      = base64_encode($dt2);
    }else{
      $file2 = '';
    }

    if($_FILES['image3']['tmp_name']){
      $filename3  = $_FILES['image3']['tmp_name'];
      $filenm3   = $_FILES['image3']['name'];
      $ext3      = substr($filenm3, -3);
      $handle3   = fopen($filename3, "r");
      $dt3       = fread($handle3, filesize($filename3));
      $file3     = base64_encode($dt3);
    }else{
      $file3 = '';
    }

    if($_FILES['image4']['tmp_name']){
      $filename4  = $_FILES['image4']['tmp_name'];
      $filenm4   = $_FILES['image4']['name'];
      $ext4      = substr($filenm3, -3);
      $handle4   = fopen($filename4, "r");
      $dt4       = fread($handle4, filesize($filename4));
      $file4     = base64_encode($dt4);
    }else{
      $file4 = '';
    }

		$data = array(

				'product_name'     =>  $this->input->post('product_name'),
				'description'      =>  $this->input->post('description'),
				'time_start'       =>  $this->input->post('time_start'),
				'condision'        =>  $this->input->post('condision'),
				'weight'           =>  $this->input->post('weight'),
				'product_category_id' =>  $this->input->post('product_category_id'),
        'parent_category_id'  =>  $this->input->post('product_category_id'),
				'brand'            =>  $this->input->post('brand'),
				'price'            =>  $this->input->post('price'),
				'discount'               =>  $this->input->post('discount'),
				'product_variant_id'     =>  $this->input->post('product_variant_id'),
        // 'filenm1'                =>  $filenm1,
        // 'filenm2'                =>  $filenm2,
        // 'filenm3'                =>  $filenm3,
        // 'filenm4'                =>  $filenm4,
        // 'ext1'                   =>  $ext1,
        // 'ext2'                   =>  $ext2,
        // 'ext3'                   =>  $ext3,
        // 'ext4'                   =>  $ext4,
				'image1'                 =>  $file1,
				'image2'                 =>  $file2,
				'image3'                 =>  $file3,
				'image4'                 =>  $file4

			);
      $data_string = json_encode($data);

      // echo $data_string;
      // die();

      $ch = curl_init(API.'products');
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


  function ajax_update(){
    if($_FILES['image1']['tmp_name']){
      $filename1  = $_FILES['image1']['tmp_name'];
      $filenm1    = $_FILES['image1']['name'];
      $ext1       = substr($filenm1, -3);
      $handle1    = fopen($filename1, "r");
      $dt1        = fread($handle1, filesize($filename1));
      $file1      = base64_encode($dt1);
    }else{
      $file1 = '';
    }

    if($_FILES['image2']['tmp_name']){
      $filename2  = $_FILES['image2']['tmp_name'];
      $filenm2   = $_FILES['image2']['name'];
      $ext2      = substr($filenm2, -3);
      $handle2   = fopen($filename2, "r");
      $dt2        = fread($handle2, filesize($filename2));
      $file2      = base64_encode($dt2);
    }else{
      $file2 = '';
    }

    if($_FILES['image3']['tmp_name']){
      $filename3  = $_FILES['image3']['tmp_name'];
      $filenm3   = $_FILES['image3']['name'];
      $ext3      = substr($filenm3, -3);
      $handle3   = fopen($filename3, "r");
      $dt3       = fread($handle3, filesize($filename3));
      $file3     = base64_encode($dt3);
    }else{
      $file3 = '';
    }

    if($_FILES['image4']['tmp_name']){
      $filename4  = $_FILES['image4']['tmp_name'];
      $filenm4   = $_FILES['image4']['name'];
      $ext4      = substr($filenm3, -3);
      $handle4   = fopen($filename4, "r");
      $dt4       = fread($handle4, filesize($filename4));
      $file4     = base64_encode($dt4);
    }else{
      $file4 = '';
    }

		$data = array(
      				'product_name'     =>  $this->input->post('product_name'),
      				'description'      =>  $this->input->post('description'),
      				'time_start'       =>  $this->input->post('time_start'),
      				'condision'        =>  $this->input->post('condision'),
      				'weight'           =>  $this->input->post('weight'),
      				'product_category_id' =>  $this->input->post('product_category_id'),
              'parent_category_id'  =>  $this->input->post('product_category_id'),
      				'brand'            =>  $this->input->post('brand'),
      				'price'            =>  $this->input->post('price'),
      				'discount'               =>  $this->input->post('discount'),
      				'product_variant_id'     =>  $this->input->post('product_variant_id'),
              // 'filenm1'                =>  $filenm1,
              // 'filenm2'                =>  $filenm2,
              // 'filenm3'                =>  $filenm3,
              // 'filenm4'                =>  $filenm4,
              // 'ext1'                   =>  $ext1,
              // 'ext2'                   =>  $ext2,
              // 'ext3'                   =>  $ext3,
              // 'ext4'                   =>  $ext4,
      				'image1'                 =>  $file1,
      				'image2'                 =>  $file2,
      				'image3'                 =>  $file3,
      				'image4'                 =>  $file4

      			);
      $data_string = json_encode($data);

      // echo $data_string;
      // die();

      $ch = curl_init(API.'products');
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


  function ajax_delete(){
    $data  = array(
      'id'   =>  $this->input->get('id')
    );
    $data_string = json_encode($data);
    $ch = curl_init(API.'products/delete');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' )   );
    $result   = curl_exec($ch);
    echo $result;
  }





	function edit(){
        if(isset($_POST['submit'])){

					if( $_FILES['img1']['tmp_name']){
            $filename  = $_FILES['img1']['tmp_name'];
  					$handle    = fopen($filename, "r");
  					$dt        = fread($handle, filesize($filename));
  					$file      = base64_encode($dt);
          } else {
            $file = "";
          }

					if($_FILES['img2']['tmp_name']){
            $filename  = $_FILES['img2']['tmp_name'];
  					$handle2    = fopen($filename2, "r");
  					$dt2       = fread($handle2, filesize($filename2));
  					$file2      = base64_encode($dt2);
          }else{
            $file2 = "";
          }

					if( $_FILES['img3']['tmp_name']){
            $filename  = $_FILES['img3']['tmp_name'];
  					$handle3    = fopen($filename3, "r");
  					$dt3       = fread($handle3, filesize($filename3));
  					$file3      = base64_encode($dt3);
          }else{
            $file3 ="";
          }

					if( $_FILES['img4']['tmp_name']){
            $filename  = $_FILES['img4']['tmp_name'];
  					$handle4    = fopen($filename4, "r");
  					$dt4     = fread($handle4, filesize($filename4));
  					$file4      = base64_encode($dt4);
          } else {
            $file4 = "";
          }

            $data = array(
							'product_name'     =>  $this->input->post('nm_produk'),
							'description'      =>  $this->input->post('deskripsi'),
							'time_start'       =>  $this->input->post('time_start'),
							'condition'        =>  $this->input->post('kondisi'),
							'weight'           =>  $this->input->post('berat'),
							'product_category_id' =>  $this->input->post('id_kategori'),
							'brand'            =>  $this->input->post('merek'),
							'price'            =>  $this->input->post('harga'),
							'discount'               =>  $this->input->post('diskon'),
							'product_vaiant_id'      =>  $this->input->post('id_varian'),
							'image1'                 =>  $file,
							'image2'                 =>  $file2,
							'image3'                 =>  $file3,
							'image4'                 =>  $file4
						);
            // echo json_encode($data);
            // die();

            $data_string = json_encode($data);

            $ch = curl_init(API.'products/update');
        		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        			'Content-Type: application/json'
        			)
        		);

            $result = curl_exec($ch);
            $response = json_decode($result);
            if($response->code == '200')  {
                $this->session->set_flashdata('hasil', $response->message);
            } else {
               $this->session->set_flashdata('hasil', $response->message);
            }
            redirect('products');
						// echo json_encode( $data);
	          // die();
            // $update =  $this->curl->simple_put(API.'products', $data, array(CURLOPT_BUFFERSIZE => 10));
            // if($update) {
            //     $this->session->set_flashdata('hasil','Update Data Berhasil');
            // }else{
            //    $this->session->set_flashdata('hasil','Update Data Gagal');
            // }
            // redirect('products');
        }else{
            $params = array(
															'product_id'=>  $this->uri->segment(3)
												);
            $data['product']  = json_decode($this->curl->simple_get(API.'products',$params));
						$data['category'] = json_decode($this->curl->simple_get(API.'category'));
						$data['title'] ="EDIT PRODUCT";
						$this->load->view('template/header.php', $data);
						$this->load->view('template/left.php');
						$this->load->view('content/product/edit_product',$data);
						$this->load->view('template/footer.php');

        }
    }


		function delete($product_id){
        if(empty($product_id)){
            redirect('products');
        }else{
            $delete =  $this->curl->simple_delete(API.'products', array('product_id'=>$product_id), array(CURLOPT_BUFFERSIZE => 10));
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('products');
        }
    }


}
