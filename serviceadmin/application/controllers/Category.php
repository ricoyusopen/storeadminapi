<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Category extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->Model('M_category');
    }


    function index_get() {

        $product_category_id = $this->get('id');

        if ($product_category_id == '') {
            $product_category = $this->M_category->get_parent_category()->result();
        } else {
            $product_category = $this->M_category->get_category_by_id($product_category_id)->result();
        }
        return $this->response($product_category, 200);
    }




    function index_post() {
          $path = FCPATH.'uploads/category/';
          $title = "no_image.png";
          if($this->post('ext')=="svg"){
            $title = $this->randomFix(10).'_category.svg';
          } else {
            $title = $this->randomFix(10).'_category.png';
          }
          $file = base64_decode($this->post('icon'));
          file_put_contents($path.$title, $file);
          $data = array(
                      'product_category_name'   => $this->post('product_category_name'),
                      'icon'                    => $title
                    );

          $insert = $this->db->insert('product_categories', $data);
          $response = [
              'code'=>'200',
              'message'=>'Ok.',
              'data'=> $data
          ];
          if ($insert) {
              return $this->response($data, 200);
          } else {
              return $this->response(array('status' => 'fail', 502));
          }
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


    function update_post() {
        $id = $this->post('product_category_id');
        if(empty($id)){
            $response = [
                'code'=>'400',
                'message'=>'category id tidak boleh kosong.',
                'data'=> null
            ];
            return $this->response($response, 200);
        }

        $category_detail = $this->M_category->get_category_by_id($id);
        if(!$category_detail){
            $response = [
                'code'=>'400',
                'message'=>'category tidak valid dengan id '.$id,
                'data'=> null
            ];
            return $this->response($response, 200);
        }

        $path = FCPATH.'uploads/category/';

        $title = $category_detail->icon;

        if(!empty($this->post('icon'))){
          if($this->post('ext')=="svg"){
            $title = $this->randomFix(10).'_category.svg';
          } else {
            $title = $this->randomFix(10).'_category.png';
          }

          $file = base64_decode($this->post('icon'));
          file_put_contents($path.$title, $file);

          $data = array(
                      'product_category_name'   => $this->post('product_category_name'),
                      'icon'                    => $title
                    );
        } else {

          $data = array( 'product_category_name'   => $this->post('product_category_name') );

        }

        $update  = $this->M_category->update_category($id,$data);

            $response = [
                'code'=>'200',
                'message'=>'Update Category berhasil',
                'data'=> $data
            ];
            return $this->response($response, 200);

    }


    function delete_post() {
        $id = $this->post('id');
        $data = $this->delete_category($id);
        $response = [
            'code'=>'200',
            'message'=>'Delete Category berhasil',
            'data'=> $data
        ];
        return $this->response($response, 200);
    }

    function delete_category($id){
      $this->db->where('product_category_id', $id);
      $this->db->delete('product_categories');
      return $this->db->affected_rows();
    }

}
