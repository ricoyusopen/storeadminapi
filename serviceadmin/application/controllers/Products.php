<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Products extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('M_products');
    }


    function index_get() {

        $product_id = $this->get('id');

        if ($product_id == '') {
            $product = $this->M_products->get_product();
        } else {
            $product = $this->M_products->get_product_by_id($product_id);

        }
        return $this->response($product, 200);
    }

    function related_get() {
        $parent_id = $this->get('id');
        $relatedProduct = $this->M_products->get_related($parent_id);
        return $this->response($relatedProduct, 200);
    }


    function detailProduct_get() {
        $product_id = $this->get('id');
        $detailProduct = $this->M_products->detail_product_by_id($product_id);

        return $this->response($detailProduct, 200);
    }

    // function detailsubCat_get() {
    //     $data = array (
    //               'cat_id' => $this->get('cat_id'),
    //               'parent_id' => $this->get('parent_id')
    //             )
    //     $detailProduct = $this->M_products->get_subCat($data);
    //
    //     return $this->response($detailProduct, 200);
    // }


    function getproductbycategory_get(){

      $category_id = $this->get('category_id');

      $list_product = $this->M_products->get_product_by_category($category_id);
      return $this->response($list_product,200);
    }


    function listcategoryadd_get(){
        $category_id = $this->get('id');
        $list_category_add = $this->M_products->get_list_category($category_id);
        return $this->response($list_category_add, 200);
    }




    function index_post() {
        // $namafile1 = $this->post('filenm1');
        // $namafile2 = $this->post('filenm2');
        // $namafile3 = $this->post('filenm3');
        // $namafile4 = $this->post('filenm4');
        $path = FCPATH.'uploads/products/';
        $title1 = $title2 = $title3 = $title4 = "no_image.png";
        // if($this->post('ext1')=="svg"){
        //   $title = $this->randomFix(10).'_produk.svg';
        // } else {
        //   $title = $this->randomFix(10).'_produk.png';
        // }
        if(!empty($this->post('image1'))){
            $title1 = $this->randomFix(10).'_image1.png';
            $file1 = base64_decode($this->post('image1'));
            file_put_contents($path.$title1, $file1);
        }else{
            $response = [
                'code'=>'400',
                'message'=>'Minimal 1 gambar yang diupload.',
                'data'=> null
            ];
            $this->response($response, 200);
        }

        if(!empty($this->post('image2'))){
            $title2 = $this->randomFix(10).'_image2.png';
            $file2 = base64_decode($this->post('image2'));
            file_put_contents($path.$title2, $file2);
        }

        if(!empty($this->post('image3'))){
            $title3 = $this->randomFix(10).'_image3.png';
            $file3 = base64_decode($this->post('image3'));
            file_put_contents($path.$title3, $file3);
        }

        if(!empty($this->post('image4'))){
            $title4 = $this->randomFix(10).'_image4.png';
            $file4 = base64_decode($this->post('image4'));
            file_put_contents($path.$title4, $file4);
        }



        $data = array(
            'product_name'     =>  $this->post('product_name'),
            'description'      =>  $this->post('description'),
            'time_start'       =>  $this->post('time_start'),
            'product_condition'  =>  $this->post('product_condition'),
            'weight'           =>  $this->post('weight'),
            'product_category_id' =>  $this->post('product_category_id'),
            'parent_category_id'  =>  $this->post('parent_category_id'),
            'brand'               =>  $this->post('brand'),
            'price'               =>  $this->post('price'),
            'discount'            =>  $this->post('discount'),
            'product_variant_id'  =>  $this->post('product_variant_id'),
            'image1' => $title1,
            'image2' => $title2,
            'image3' => $title3,
            'image4' => $title4,
            'stock'  => $this->post('stock')
            );

            // echo json_encode( $data);
            // die();
        $insert = $this->db->insert('products', $data);
        $response = [
                        'code'=>'200',
                        'message'=>'Ok.',
                        'data'=> $data
                    ];
        if ($insert) {
            $this->response($response, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
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

        $id = $this->post('product_id');
        $disc = $this->post('discount') / 100;
        if(empty($id)){
            $response = [
                'code'=>'400',
                'message'=>'product id tidak boleh kosong.',
                'data'=> null
            ];
            $this->response($response, 200);
        }

        $product_detail = $this->M_products->get_image_by_id($id);

        // print_r($product_detail);
        // die();

        if(!$product_detail){
            $response = [
                'code'=>'400',
                'message'=>'product tidak valid dengan id '.$id,
                'data'=> null
            ];
            $this->response($response, 200);
        }

        $path = FCPATH.'uploads/products/';

        $title1 = $product_detail->image1;
        $title2 = $product_detail->image2;
        $title3 = $product_detail->image3;
        $title4 = $product_detail->image4;

        if(!empty($this->post('image1'))){
            $title1 = $this->randomFix(10).'_image1.png';
            $file1 = base64_decode($this->post('image1'));
            file_put_contents($path.$title1, $file1);
        }
        if(!empty($this->post('image2'))){
            $title2 = $this->randomFix(10).'_image2.png';
            $file2 = base64_decode($this->post('image2'));
            file_put_contents($path.$title2, $file2);
        }
        if(!empty($this->post('image3'))){
            $title3 = $this->randomFix(10).'_image3.png';
            $file3 = base64_decode($this->post('image3'));
            file_put_contents($path.$title3, $file3);
        }
        if(!empty($this->post('image4'))){
            $title4 = $this->randomFix(10).'_image4.png';
            $file4 = base64_decode($this->post('image4'));
            file_put_contents($path.$title4, $file4);
        }

        //$disc = $this->post('discount') / 100;

        $data = array(
            'product_name'        =>  $this->post('product_name'),
            'description'         =>  $this->post('description'),
            'product_condition'   =>  $this->post('product_condition'),
            'weight'              =>  $this->post('weight'),
            'product_category_id' =>  $this->post('product_category_id'),
            'parent_category_id'  =>  $this->post('parent_category_id'),
            'brand'               =>  $this->post('brand'),
            'price'               =>  $this->post('price'),
            'discount'            =>  $this->post('discount'),
            'product_variant_id'  =>  $this->post('product_variant_id'),
            'image1' => $title1,
            'image2' => $title2,
            'image3' => $title3,
            'image4' => $title4,
            'stock'  => $this->post('stock')
          );

        $update  = $this->M_products->update_product($id,$data);

        // if ($update > 0) {
        //     $response = [
        //         'code'=>'200',
        //         'message'=>'Update berhasil',
        //         'data'=> $data
        //     ];
        //     return $this->response($response, 200);
        // } else {
        //     $this->response(array('status' => 'fail', 502));
        // }
        $response = [
            'code'=>'200',
            'message'=>$update. ' data berhasil diupdate',
            'data'=> $data
        ];
        return $this->response($response, 200);
    }


    function delete_post() {
        $id = $this->post('id');
        $data = $this->delete_product($id);
        $response = [
            'code'=>'200',
            'message'=>'Delete Product berhasil',
            'data'=> $data
        ];
        return $this->response($response, 200);
    }

    function delete_product($id){
      $this->db->where('product_id', $id);
      $this->db->delete('products');
      return $this->db->affected_rows();
    }


    // function index_delete() {
    //     $id = $this->delete('product_id');
    //     $this->db->where('product_id', $id);
    //     $delete = $this->db->delete('products');
    //     if ($delete) {
    //         $this->response(array('status' => 'success'), 201);
    //     } else {
    //         $this->response(array('status' => 'fail', 502));
    //     }
    // }

}
