<?php
Class M_forgot extends CI_Model {

  public function getUsername($ID) {
    $sql = " SELECT msisdn, user_name, store_id FROM t_store_user_msisdn
            where msisdn = '$ID'";
    //return $this->db->query($sql)->row();

    $this->st24apiv1->set_host(HOST_API_INTERNAL);
        $this->st24apiv1->set_query($sql);
        $this->st24apiv1->set_secret(API_SECRET);
        $this->st24apiv1->run();
        return $this->st24apiv1->row();
  }

  function reset_code($data){
    //$ubahpass = $this->db->query("UPDATE t_store_user SET web_pass=$data[passbaru2] WHERE STORE_ID='7' AND USER_NAME ='6285716959280'");
    //$data_input['WEB_PASS_EXPDATE'] = $data['inputexp'];
    // $data_input['WEB_PASS_RESET_CODE'] = $data['random'];
    // $this->db->where('USER_NAME',$data['username']);
    // $this->db->update('T_STORE_USER',$data_input);
    //
		// return $this->db->affected_rows();

    $sql = "UPDATE t_store_user SET WEB_PASS_RESET_CODE = ?, WEB_PASS_RESET_EXP=(sysdate+15/24/60)
               WHERE USER_NAME = ? AND STORE_ID = ? ";
    // return $this->db->query($sql,
    //                         [ $data['random'],
    //                          $data['username'],
    //                          $data['store_id']
    //                         ]);
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[ $data['random'],
      $data['username'],
      $data['store_id']
    ]);
    $this->st24apiv1->set_secret(API_SECRET);
    return $this->st24apiv1->run();
	}


  public function cek($data) {
    $sql = " SELECT user_name, store_id, msisdn FROM t_store_user_msisdn
            where msisdn = ? ";
    // return $this->db->query($sql,[ $data['idforgot']])->row();
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[ $data['idforgot']]);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->result();
  }

  public function cek_reset_code($data) {
    $sql = " SELECT b.user_name, b.full_name, b.web_pass_reset_code, b.web_pass_reset_exp from
            t_store_user_msisdn a,
            t_Store_user b
            where a.store_id = ?
            and a.user_name = ?
            and a.msisdn = ?
             ";
    // return $this->db->query($sql,[ $data['store_id'], $data['username'], $data['idforgot'] ])->row();
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[ $data['store_id'], $data['username'], $data['idforgot'] ]);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->row();
  }

  public function cekExpCode($data) {
    $sql = "SELECT to_char(web_pass_reset_exp,'yyyymmddhh24miss') web_pass_reset_exp from
            t_store_user_msisdn a,
            t_Store_user b
            where a.store_id = ?
            and a.user_name = ?
            and a.msisdn = ?
            and b.web_pass_reset_code = ?
             ";
    // return $this->db->query($sql,[ $data['store_id'], $data['username'], $data['idforgot'], $data['resetcode'] ])->row();
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[ $data['store_id'], $data['username'], $data['idforgot'], $data['resetcode'] ]);
    $this->st24apiv1->set_secret(API_SECRET);
    $this->st24apiv1->run();
    return $this->st24apiv1->row();
  }

  function reset_pass($data){
    $sql = "UPDATE t_store_user SET WEB_PASS = ?, WEB_PASS_RESET_CODE = '', WEB_PASS_EXPDATE=TO_DATE('01/01/2200 03:18:20','dd/mm/yyyy hh24:mi:ss'), WEB_PASS_RESET_EXP =''
               WHERE USER_NAME = ? AND STORE_ID = ? ";
    // return $this->db->query($sql,
    //                         [ $data['pwdconf'],
    //                          $data['uname'],
    //                          $data['store_id']
    //                         ]);
    $this->st24apiv1->set_host(HOST_API_INTERNAL);
    $this->st24apiv1->set_query($sql,[ $data['pwdconf'],
      $data['uname'],
      $data['store_id']
    ]);
    $this->st24apiv1->set_secret(API_SECRET);
    return $this->st24apiv1->run();
  }


}


?>
