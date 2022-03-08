<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

	public function indexOLD() {

    // $url     = "http://jsonplaceholder.typicode.com/posts/";
     $url = "http://localhost:7777/serviceadmin/products";
    $get_url = file_get_contents($url);
    $data    = json_decode($get_url);
    print_r($data) ;
    die();

    $data_array = array(
                  'product' => $data
                  );

		$data['title'] ="DATA PRODUCT";
		//$this->load->view('template/header.php');
		$this->load->view('content/left.php');
		//$this->load->view('content/home.php', $data_array);
		$this->load->view('template/footer.php');
  }

	public function index()
	{
		$data['title'] ="DATA PRODUCT";
		$data['product'] = json_decode($this->curl->simple_get(API.'products'));
		$data['category'] = json_decode($this->curl->simple_get(API.'category'));
		//$data['banner'] = json_decode($this->curl->simple_get(API.'banner'));
		$data['bannertop'] = json_decode($this->curl->simple_get(API.'banner/bannertop'));
		$data['bannertopleft'] = json_decode($this->curl->simple_get(API.'banner/bannertopleft'));
		$data['bannertopright'] = json_decode($this->curl->simple_get(API.'banner/bannertopright'));
		$data['bannercenter'] = json_decode($this->curl->simple_get(API.'banner/bannercenter'));
    $data['bannerbottomleft'] = json_decode($this->curl->simple_get(API.'banner/bannerbottomleft'));
		$data['bannerbottomright'] = json_decode($this->curl->simple_get(API.'banner/bannerbottomright'));
		$data['icon'] = json_decode($this->curl->simple_get(API.'category'));
		// print_r(json_encode($this->curl->simple_get(API.'banner/bannerbottomleft')));
		// die();
		$this->load->view('template/header.php');
		$this->load->view('template/left.php', $data);
		$this->load->view('content/home/home.php', $data);
		$this->load->view('template/footer.php');
	}

  function ajax_get_product_by_category(){
    $get = $this->input->get();
    $category_id = isset($get['category_id']) ? $get['category_id'] : '';
    $data = json_decode($this->curl->simple_get(API.'products/getproductbycategory?category_id='.$category_id));
    echo json_encode($data);
  }



  public function category(){
    //$data['category'] = json_decode($this->curl->simple_get(API.'category'));
    // $category         = json_decode($this->curl->simple_get(API.'category'));

    $data = json_decode($this->curl->simple_get(API.'category'));
    echo json_encode($data);
  }

  public function related(){
    $get = $this->input->get();
    $parent_id = isset($get['id']) ? $get['id'] : '';

    $data = json_decode($this->curl->simple_get(API.'products/related?id='.$parent_id));
    echo json_encode($data);
    die();
  }



	public function checkout()
	{
		$this->load->view('checkout');
	}
}
