<?php

class M_store extends CI_Model {

    public function get_profile_val_by_key($key)
    {   
        $query = "SELECT value_name FROM store_profile where key_name = ? ";
        return $this->db->query($query,[$key])->row();
    }

    public function get_profile_val(){
        $query = "SELECT * FROM store_profile ORDER BY key_name ASC";
        return $this->db->query($query)->result();
    }

    public function get_cart_by_member_id($id){
        $query = "SELECT * FROM cart WHERE member_id = ?";
        return $this->db->query($query,[$id])->result();
    }

}