<?php

class M_category extends CI_Model {

    public function get_parent_category()
    {
        $query = "SELECT * FROM `product_categories` WHERE parent_category_id = 0 ORDER BY product_category_id DESC";
        return $this->db->query($query);
    }

    public function get_category_by_id($product_category_id){
      $query = "SELECT * FROM `product_categories` WHERE parent_category_id = 0 AND product_category_id = ? ";
      return $this->db->query($query,[$product_category_id]);
    }



    public function get_subcategory_list()
    {
        $query = "SELECT * FROM `product_categories` WHERE parent_category_id !=0  ORDER BY product_category_id DESC";
        return $this->db->query($query);
    }

    public function get_subcategory_list_by_id($product_category_id)
    {
        $query = "SELECT product_category_id, product_category_name, parent_category_id, icon FROM `product_categories` WHERE parent_category_id !=0  AND product_category_id = ?";
        return $this->db->query($query,[$product_category_id]);
    }

    public function get_category_by_id_for_add($category_id)
    {
        $query = "SELECT product_category_id, product_category_name,icon FROM `product_categories` WHERE product_category_id = ?";
        return $this->db->query($query,[$category_id]);
    }

    public function update_for_subcategory($id,$data){
        // $query ="UPDATE `product_categories` SET parent_category_id = ? WHERE product_category_id = ?";
        // return $this->db->query($query,[$id]);
        $this->db->where('product_category_id', $id);
        $this->db->update('product_categories', $data);
        return $this->db->affected_rows();
    }



    public function update_category($id,$data){
      $this->db->where('product_category_id', $id);
      $this->db->update('product_categories', $data);
      return $this->db->affected_rows();
    }

}
