<?php

class M_member extends CI_Model {

    public function get_member()
    {
        $query = "SELECT * FROM `member`";
        return $this->db->query($query);
    }

    public function get_member_by_id($member_id){
      $query = "SELECT * FROM `member` WHERE member_id = ?";
      return $this->db->query($query,[$member_id]);
    }

    public function update_banner($id,$data){
      $this->db->where('banner_id', $id);
      $this->db->update('banner', $data);
      return $this->db->affected_rows();
    }

    public function register(){
      $query =" INSERT INTO member (user_name, full_name, email, phone, password, join_date)
              ";
      return $this->db->query($query,[$id])->result();
    }

    public function get_data_member_by_id($id){
      $query = "SELECT * FROM `member` WHERE user_name = ?";
      return $this->db->query($query,[$id])->row();
    }

}
