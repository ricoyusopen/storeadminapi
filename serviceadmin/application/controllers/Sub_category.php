<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Sub_category extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->Model('M_category');
    }


    // show data category
    // function index_getOLD() {
    //     $product_sub_category_id = $this->get('product_sub_category_id');
    //
    //     if ($product_sub_category_id == '') {
    //         $product_sub_category = $this->db->get('product_sub_categories')->result();
    //     } else {
    //         $this->db->where('product_sub_category_id', $product_sub_category_id);
    //         $product_sub_category = $this->db->get('product_sub_categories')->result();
    //     }
    //     $this->response($product_sub_category, 200);
    // }

    function index_get() {

        $product_category_id = $this->get('id');

        if ($product_category_id == '') {
            $product_subcategory = $this->M_category->get_subcategory_list()->result();
        } else {
          $product_subcategory = $this->M_category->get_subcategory_list_by_id($product_category_id)->result();

        }
        return $this->response($product_subcategory, 200);
    }


    function categoryadd_get (){

      $category_id = $this->get('id');

      $category = $this->M_category->get_category_by_id_for_add($category_id)->result();
      return $this->response($category,200);
    }



    function listcategoryedit(){
        $product_category_edit = $this->M_category->get_category()->result();
        return $this->response($product_category_edit, 200);
    }



    function updateadd_post() {
      // $path = FCPATH.'uploads/category/';
      // $title = "no_image.png";
      // if($this->post('ext')=="svg"){
      //   $title = $this->randomFix(10).'_category.svg';
      // } else {
      //   $title = $this->randomFix(10).'_category.png';
      // }
      // $file = base64_decode($this->post('icon'));
      // file_put_contents($path.$title, $file);
      $data = array(
                  'parent_category_id'      => $this->post('parent_category_id'),
                  'product_category_name'   => $this->post('product_category_name')
                  // 'icon'                    => $title
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

        // $category_detail = $this->M_category->get_category_by_id($id);
        //
        // if(!$category_detail){
        //     $response = [
        //         'code'=>'400',
        //         'message'=>'category tidak valid dengan id '.$id,
        //         'data'=> null
        //     ];
        //     return $this->response($response, 200);
        // }
        //
        // $path = FCPATH.'uploads/subcategory/';
        //
        // $title = $category_detail->icon;

        // if(!empty($this->post('icon'))){
        //   if($this->post('ext')=="svg"){
        //     $title = $this->randomFix(10).'_subcategory.svg';
        //   } else {
        //     $title = $this->randomFix(10).'_subcategory.png';
        //   }
        //     $file = base64_decode($this->post('icon'));
        //     file_put_contents($path.$title, $file);
        // }

        $data = array(
                    'product_category_id'     => $id,
                    'parent_category_id'      => $this->post('parent_category_id'),
                    'product_category_name'   => $this->post('product_category_name')
                    // 'icon'                    => $title
                  );

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
        $data = $this->delete_subcategory($id);
        $response = [
            'code'=>'200',
            'message'=>'Delete Category berhasil',
            'data'=> $data
        ];
        return $this->response($response, 200);
    }

    function delete_subcategory($id){
      $this->db->where('product_category_id', $id);
      $this->db->delete('product_categories');
      return $this->db->affected_rows();
    }



    //update data category
    function index_put() {
        $id = $this->put('product_sub_category_id');
        $data = array(
                  'product_sub_category_id'     => $this->put('product_sub_category_id'),
                  'sub_category_name'   => $this->put('sub_category_name'),
                  'icon'                    => $this->put('icon')
                );
        $this->db->where('product_sub_category_id', $id);
        $update = $this->db->update('product_sub_categories', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // delete category
    function index_delete() {
        $id = $this->delete('product_sub_category_id');
        $this->db->where('product_sub_category_id', $id);
        $delete = $this->db->delete('product_sub_categories');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
