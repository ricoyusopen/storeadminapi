<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function get_product_by_category(){
      $get = $this->input->get();
      $category_id = isset($get['id']) ? $get['id'] : '';
      $data['product']= json_decode($this->curl->simple_get(API.'products/getproductbycategory?category_id='.$category_id));
      $data['category'] = json_decode($this->curl->simple_get(API.'category'));
      $this->load->view('template/header.php');
  		$this->load->view('template/left.php', $data);
  		$this->load->view('content/product/list_productby_category.php', $data);
  		$this->load->view('template/footer.php');
    }


    public function detail_product2(){
      $get  = $this->input->get();
      $id   = isset($get['id']) ? $get['id'] : '';
      $data['detail_product'] = json_decode($this->curl->simple_get(API.'products/detailProduct?id='.$id));
      // echo json_encode($this->curl->simple_get(API.'products/detailProduct?id='.$id));
      // die();
      $this->load->view('template/header.php');
  		$this->load->view('template/left.php');
  		$this->load->view('content/product/product-detail.php', $data);
  		$this->load->view('template/footer.php');

    }


    public function detail_product(){
      $get  = $this->input->get();
      $id   = isset($get['id']) ? $get['id'] : '';
      $data = json_decode($this->curl->simple_get(API.'products/detailProduct?id='.$id));
      echo json_encode($data);
    }

    public function get_subcat_product(){
      $get  = $this->input->get();
      $cat_id   = isset($get['cat_id']) ? $get['cat_id'] : '';
      $parent_id   = isset($get['parent_id']) ? $get['parent_id'] : '';
      $data = json_decode($this->curl->simple_get(API.'products/detailSubcat?cat_id='.$cat_id.'&$parent_id='.$parent_id));
      echo json_encode($data);
    }


	public function detail_product3()
	{
    $get  = $this->input->get();
    $id   = isset($get['id']) ? $get['id'] : '';
    $data['detail_product'] = json_decode($this->curl->simple_get(API.'products/detailProduct?id='.$id));
    // $data['profile'] = json_decode($this->curl->simple_get(API.'profile'));
		//$data['category'] = json_decode($this->curl->simple_get(API.'category'));
		//$data['banner'] = json_decode($this->curl->simple_get(API.'banner'));

		//$data['icon'] = json_decode($this->curl->simple_get(API.'category'));
  		// echo json_encode($this->curl->simple_get(API.'products'));
  		// die();
		$this->load->view('template/header.php');
		$this->load->view('template/left.php', $data);
		$this->load->view('content/product/product-detail.php', $data);
		$this->load->view('template/footer.php', $data);
	}



	// public function checkout()
	// {
	// 	$this->load->view('checkout');
	// }
}
