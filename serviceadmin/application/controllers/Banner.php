<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Banner extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->Model('M_banner');
    }


    function index_get() {

        $banner_id = $this->get('id');

        if ($banner_id == '') {
            $banner = $this->M_banner->get_banner()->result();
        } else {
            $banner = $this->M_banner->get_banner_by_id($banner_id)->result();

            // $this->db->where('banner_id', $banner_id);
            // $banner = $this->db->get('banner')->result();
        }
        $this->response($banner, 200);

    }

    function bannertop_get(){
      $bannertop = $this->M_banner->get_banner_top()->result();
      $this->response($bannertop,200);
    }

    function bannertopleft_get(){
      $bannertopleft = $this->M_banner->get_banner_topleft()->result();
      $this->response($bannertopleft,200);
    }

    function bannertopright_get(){
      $bannertopright = $this->M_banner->get_banner_topright()->result();
      $this->response($bannertopright,200);
    }

    function bannercenter_get(){
      $bannercenter = $this->M_banner->get_banner_center()->result();
      $this->response($bannercenter,200);
    }


    function bannerbottomleft_get(){
      $bannerbottomleft = $this->M_banner->get_banner_bottomleft()->result();
      $this->response($bannerbottomleft,200);
    }

    function bannerbottomright_get(){
      $bannerbottomright = $this->M_banner->get_banner_bottomright()->result();
      $this->response($bannerbottomright,200);
    }


    function index_post() {
        $path = FCPATH.'uploads/banner/';
        $title = "no_image.png";
        if(!empty($this->post('image_name'))){
            $title = $this->randomFix(10).'_banner.png';
            $file = base64_decode($this->post('image_name'));
            file_put_contents($path.$title, $file);
        }

        $data = array(
          'image_name'     => $title,
          'banner_type_id' => $this->post('banner_type_id'),
          'description'    => $this->post('description'),
          'link_click'     => $this->post('link_click')
          );
        $insert = $this->db->insert('banner', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put() {
        $id = $this->put('banner_id');
        $data = array(
                    'banner_id'       => $this->put('banner_id'),
                    'image_name'      => $this->put('image'),
                    'link_click'      => $this->put('link'),
                    'description'     => $this->put('description'));
        $this->db->where('banner_id', $id);
        $update = $this->db->update('banner', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


    function update_post() {
        $id = $this->post('banner_id');
        if(empty($id)){
            $response = [
                'code'=>'400',
                'message'=>'banner id tidak boleh kosong.',
                'data'=> null
            ];
            return $this->response($response, 200);
        }

        $banner_detail = $this->M_banner->get_banner_by_id($id);
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
                'image_name'     => $title,
    						'banner_type_id' => $this->post('banner_type_id'),
                'description'    => $this->post('description'),
                'link_click'     => $this->post('link_click')
                );
        // echo json_encode($data);
        // die();
        $update  = $this->M_banner->update_banner($id,$data);
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


    // API =
    // method,link,security,validasi,response code, response body, header
    // GET POST
    //
    // POST
    // LINK dev.bca.co.id/api/v2/xxxxx
    // header
    // "content-type" : "application/json"
    // "authorization" : "Bearer xxxxxx" (security)
    //
    // request body :
    // {
    //   "function" : "getbalance",
    //   "data" : {
    //     "userid" : "",
    //     "token" :""
    //   }
    // }
    //
    // 200 Sukses
    // 404 not found
    // 500 server error
    // 400 error parameter
    // 401 invalid
    // 402
    //
    // response body :
    // {
    //   "function" : "getbalance",
    //   "data" : {
    //     "userid" : "",
    //     "token" :""
    //   }
    // }

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


    function delete_banner($id){
        $this->db->where('banner_id', $id);
        $this->db->delete('banner');
        return $this->db->affected_rows();
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
