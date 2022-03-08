<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Bannertype extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);

    }


    function index_get() {
        $banner_type_id = $this->get('banner_type_id');
        if ($banner_type_id == '') {
            $bannertype = $this->db->get('banner_type')->result();
        } else {
            $this->db->where('banner_type_id', $banner_type_id);
            $bannertype = $this->db->get('banner_type')->result();
        }
        $this->response($bannertype, 200);

    }


    // function index_post() {
    //     $path = FCPATH.'uploads/banner/';
    //     $title = "no_image.png";
    //     if(!empty($this->post('img_banner'))){
    //         $title = $this->randomFix(10).'_banner.png';
    //         $file = base64_decode($this->post('img_banner'));
    //         file_put_contents($path.$title, $file);
    //     }
    //
    //     $data = array(
    //       'image_name'     => $title,
    //       'banner_type_id' => $this->post('banner_type_id'),
    //       'description'    => $this->post('description'),
    //       'link_click'     => $this->post('link_click')
    //       );
    //     $insert = $this->db->insert('banner', $data);
    //     if ($insert) {
    //         $this->response($data, 200);
    //     } else {
    //         $this->response(array('status' => 'fail', 502));
    //     }
    // }
    //
    // function index_put() {
    //     $id = $this->put('banner_id');
    //     $data = array(
    //                 'banner_id'       => $this->put('banner_id'),
    //                 'image_name'           => $this->put('image'),
    //                 'link_click'      => $this->put('link'),
    //                 'description'     => $this->put('description'));
    //     $this->db->where('banner_id', $id);
    //     $update = $this->db->update('banner', $data);
    //     if ($update) {
    //         $this->response($data, 200);
    //     } else {
    //         $this->response(array('status' => 'fail', 502));
    //     }
    // }
    //
    //
    // function update_post() {
    //     $id = $this->post('banner_id');
    //     if(empty($id)){
    //         $response = [
    //             'code'=>'400',
    //             'message'=>'category id tidak boleh kosong.',
    //             'data'=> null
    //         ];
    //         return $this->response($response, 200);
    //     }
    //
    //     $banner_detail = $this->M_banner->get_banner_by_id($id);
    //     if(!$banner_detail){
    //         $response = [
    //             'code'=>'400',
    //             'message'=>'category tidak valid dengan id '.$id,
    //             'data'=> null
    //         ];
    //         return $this->response($response, 200);
    //     }
    //
    //     $path = FCPATH.'uploads/banner/';
    //
    //     $title = $banner_detail->image_name;
    //
    //     if(!empty($this->post('image_name'))){
    //         $title = $this->randomFix(10).'_icon.png';
    //         $file = base64_decode($this->post('icon'));
    //         file_put_contents($path.$title, $file);
    //     }
    //
    //     $data = array(
    //                 'image_name'    => $title,
    //                 'description'   => $this->post('description'),
    //                 'link_click'    => $this->post('link_click')
    //               );
    //
    //
    //     $this->db->where('banner_id', $id);
    //     $update =  $this->db->update('banner', $data);
    //     if ($update) {
    //         $response = [
    //             'code'=>'200',
    //             'message'=>'Update berhasil',
    //             'data'=> $data
    //         ];
    //         return $this->response($response, 200);
    //     } else {
    //         return $this->response(array('status' => 'fail', 502));
    //     }
    // }
    //
    //
    // private function randomFix($length){
    //     $random= "";
    //
    //     srand((double)microtime()*1000000);
    //
    //     $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
    //     $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
    //     $data .= "0FGH45OP89";
    //
    //     for($i = 0; $i < $length; $i++)
    //     {
    //         $random .= substr($data, (rand()%(strlen($data))), 1);
    //     }
    //     return $random;
    // }
    //
    //
    // function index_delete() {
    //     $id = $this->delete('banner_id');
    //     $this->db->where('banner_id', $id);
    //     $delete = $this->db->delete('banner');
    //     if ($delete) {
    //         $this->response(array('status' => 'success'), 201);
    //     } else {
    //         $this->response(array('status' => 'fail', 502));
    //     }
    // }

    // function index_delete(){
    //     $banner_id = $this->get('banner_id');
    //     if(empty($banner_id)){
    //         redirect('banner');
    //     }else{
    //         $delete =  $this->curl->simple_delete($this->API.'/banner', array('banner_id'=>$banner_id), array(CURLOPT_BUFFERSIZE => 10));
    //         if($delete)  {
    //             $this->session->set_flashdata('hasil','Delete Data Berhasil');
    //         } else {
    //            $this->session->set_flashdata('hasil','Delete Data Gagal');
    //         }
    //         redirect('banner');
    //     }
    // }

}
