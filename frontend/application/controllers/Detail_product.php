<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_product extends CI_Controller {

    function __construct() {
        parent::__construct();
    }


	public function index()	{
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
		$this->load->view('content/detail/product-detail.php', $data);
		$this->load->view('template/footer.php');
	}



	public function checkout()
	{
		$this->load->view('checkout');
	}
}
