<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Order extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->Model('M_order');
    }


    function index_get() {

        $product_id = $this->get('prod_id');

        // if ($order_id == '') {
        //     $order = $this->M_cart->get_order()->result();
        // } else {
            $order = $this->M_order->get_discount_by_id($product_id);

            // $this->db->where('order_id', $order_id);
            // $order = $this->db->get('order_transaction')->result();
        // }
        $this->response($order, 200);

    }

    function getCart_get() {

        $member_id = $this->get('id');
        $order = $this->M_order->get_cart_by_member($member_id);

        $this->response($order, 200);

    }


    function index_post() {
        $id = $this->post('product_id');
        $prod_discount = $this->M_order->get_discount_by_id($id);

        $dsc = $prod_discount->discount;
        $prc = $prod_discount->price;
        $price = $prc - (($dsc/100) * $prc);
        $ttl = $this->post('quantity') * $price;
        $ttl_discount = $prod_discount->discount;

        $data = array(
					  'order_id'          =>  $this->post('order_id'),
						'order_date'        =>  $this->post('order_date'),
						'member_id'         =>  $this->post('member_id'),
						'quantity'          =>  $this->post('quantity'),
						'total'             =>  $ttl,
            'total_discount'    =>  $ttl_discount,
            'payment_method_id' =>  $this->post('payment_method_id'),
            'order_status'      =>  $this->post('order_status'),
            'courier_service'   =>  $this->post('courier_service'),
            'courier_fee'       =>  $this->post('courier_fee'),
            'no_resi'           =>  $this->post('no_resi')
					);
        $insert = $this->db->insert('order_transaction', $data);
        $response = [
            'code'=>'200',
            'message'=>'Berhasil Menambahkan Barang Ke Keranjang',
            'data'=> $data
        ];
        return $this->response($response, 200);
    }


    function update_post() {
        $id = $this->post('order_id');
        if(empty($id)){
            $response = [
                'code'=>'400',
                'message'=>'order id tidak boleh kosong.',
                'data'=> null
            ];
            return $this->response($response, 200);
        }

        $order_detail = $this->M_cart->get_banner_by_id($id);
        if(!$banner_detail){
            $response = [
                'code'=>'400',
                'message'=>'banner tidak valid dengan id '.$id,
                'data'=> null
            ];
            return $this->response($response, 200);
        }

        $path = FCPATH.'uploads/banner/';

        $title = $banner_detail->image_name;

        if(!empty($this->post('image_name'))){
            if($this->post('ext')=="svg"){
              $title = $this->randomFix(10).'_banner.svg';
            } else {
              $title = $this->randomFix(10).'_banner.png';
            }
            $file = base64_decode($this->post('image_name'));
            file_put_contents($path.$title, $file);
        }

        $data = array(
					  'order_id'          =>  $this->post('order_id'),
						'order_date'        =>  $this->post('order_date'),
						'member_id'         =>  $this->post('member_id'),
						'quantity'          =>  $this->post('quantity'),
						'total'             =>  $this->post('total'),
            'total_discount'    =>  $this->post('total'),
            'payment_method_id' =>  $this->post('payment_method_id'),
            'order_status'      =>  $this->post('order_status'),
            'courier_service'   =>  $this->post('courier_service'),
            'courier_fee'       =>  $this->post('courier_fee'),
            'no_resi'           =>  $this->post('no_resi')
          );
        // echo json_encode($data);
        // die();
        $update  = $this->M_cart->update_cart($id,$data);
        $response = [
            'code'=>'200',
            'message'=>'data Banner berhasil diupdate',
            'data'=> $data
        ];
        return $this->response($response, 200);
    }


    private function randomFix($length){
        $random= "";

        srand((double)microtime()*1000000);

        $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
        $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
        $data .= "0FGH45OP89";

        for($i = 0; $i < $length; $i++)
        {
            $random .= substr($data, (rand()%(strlen($data))), 1);
        }
        return $random;
    }



    function delete_post() {
        $id = $this->post('id');
        $data = $this->delete_banner($id);
        $response = [
            'code'=>'200',
            'message'=>'Delete Category berhasil',
            'data'=> $data
        ];
        return $this->response($response, 200);
    }

    function index_delete() {
        $id = $this->delete('banner_id');
        $this->db->where('banner_id', $id);
        $delete = $this->db->delete('banner');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }



}
