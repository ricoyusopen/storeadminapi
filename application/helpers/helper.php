<?php
if ( ! defined(‘BASEPATH’)) exit(‘No direct script access allowed’);

function ambilCategory($id){
  $ci=& get_instance();
  $ci->load->database();
  $ci->db->select('product_category_name');
  $ci->db->where('product_category_id',$id);
  $ci->db->from('product_categories');
  $query=$ci->db->get();

  return $query->row();
}
