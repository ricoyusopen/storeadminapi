<?php

class M_order extends CI_Model {

    public function get_discount_by_id($id)
    {
        $query = "SELECT price, discount FROM `products` where product_id = ? ";
        return $this->db->query($query,[$id])->row();
    }

    public function get_cart_by_member($member_id)
    {
        $query = "SELECT * FROM `order_transaction` where member_id = ? ";
        return $this->db->query($query,[$member_id])->row();
    }



}
