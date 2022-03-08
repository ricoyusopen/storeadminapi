<?php

class M_banner extends CI_Model {

    public function get_banner()
    {
        $query = "SELECT banner_id, image_name, type, description, link_click, time_start FROM banner
                  JOIN banner_type ON banner.banner_type_id = banner_type.banner_type_id ORDER BY banner_id  DESC";
        return $this->db->query($query);
    }

    public function get_banner_by_id($banner_id){
      $query = "SELECT banner_id, image_name, banner_type_id, description, link_click, time_start FROM banner
                WHERE banner_id = ? ORDER BY banner_id  DESC";
      return $this->db->query($query,[$banner_id]);
    }

    public function get_banner_top(){
      $query = "SELECT banner_id, image_name, type, description, link_click, time_start FROM banner
                JOIN banner_type ON banner.banner_type_id = banner_type.banner_type_id WHERE banner.banner_type_id = 2 ";
      return $this->db->query($query);
    }

    public function get_banner_topleft(){
      $query = "SELECT banner_id, image_name, type, description, link_click, time_start FROM banner
                JOIN banner_type ON banner.banner_type_id = banner_type.banner_type_id WHERE banner.banner_type_id = 3 ";
      return $this->db->query($query);
    }

    public function get_banner_topright(){
      $query = "SELECT banner_id, image_name, type, description, link_click, time_start FROM banner
                JOIN banner_type ON banner.banner_type_id = banner_type.banner_type_id WHERE banner.banner_type_id = 4 ";
      return $this->db->query($query);
    }

    public function get_banner_center(){
      $query = "SELECT banner_id, image_name, type, description, link_click, time_start FROM banner
                JOIN banner_type ON banner.banner_type_id = banner_type.banner_type_id WHERE banner.banner_type_id = 5 ";
      return $this->db->query($query);
    }

    public function get_banner_bottomleft(){
      $query = "SELECT banner_id, image_name, type, description, link_click, time_start FROM banner
                JOIN banner_type ON banner.banner_type_id = banner_type.banner_type_id WHERE banner.banner_type_id = 6 ";
      return $this->db->query($query);
    }

    public function get_banner_bottomright(){
      $query = "SELECT banner_id, image_name, type, description, link_click, time_start FROM banner
                JOIN banner_type ON banner.banner_type_id = banner_type.banner_type_id WHERE banner.banner_type_id = 7 ";
      return $this->db->query($query);
    }

    public function update_banner($id,$data){
      $this->db->where('banner_id', $id);
      $this->db->update('banner', $data);
      return $this->db->affected_rows();
    }

}
