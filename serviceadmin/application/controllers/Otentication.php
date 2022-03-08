<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Otentication extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->Model('M_member');
    }

    function index_get() {
      // $ID    = $this->get('id');
      // $query = $this->M_login->isLogin($ID);
      $ID = $this->get('id');
      //$now = date("YmdHis");
      $query = $this->M_login->isLogin($ID);
      return $this->response($query, 200);


    }

    function member_get() {
      // $ID    = $this->get('id');
      // $query = $this->M_login->isLogin($ID);
      $ID = $this->get('id');
      //$now = date("YmdHis");
      $query = $this->M_member->get_data_member_by_id($ID);
      return $this->response($query, 200);
    }
















    function ceklogin_post(){

     // $this->load->library('securimage');
     // $img = new Securimage();

     $ID    = $this->post('id');
     $PASS  = $this->post('password');
     $TIME  = $this->post('time');
     $HASH  = $this->post('hash');
     $REGEXRESULT  = $this->post('regexResult');
     // $REGEXRESULT = $jsonArray['regexResult'];

    // $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
    // //$TDate  = date("Y/m/d H:i:s",$T);
     $MyHash = sha1($ID . $PASS . $TIME);
    // $MyTime = strtotime(date("Y/m/d H:i:s"));
    // //$MyTime = date("Y/m/d H:i:s");
    // $interval = abs($MyTime-$TDate);
     $now = date("YmdHis");

    //$result = $img->check($jsonArray['capcode']);
    // echo "interval=>".$interval."  MyTIme=>".$MyTime."  TDate=>".$TDate."  T=>".$T;
    // die();


       //if($MyHash === $HASH){
          // if($interval < MAX_INTERVAL){
           $query = $this->M_login->isLogin($ID);

           if($query) {
              $getExp = $this->M_login->getExp($ID);
              // die(json_encode($getExp));
              // echo "ExpDate => ".$getExp->WEB_PASS_EXPDATE." "."NowDate => ".$now;
              // die();
              if($now <= $getExp->WEB_PASS_EXPDATE) {
                // echo "ExpDate => ".$getExp->WEB_PASS_EXPDATE." "."NowDate => ".$now;
                // die();
                  if($query->WEB_PASS == $PASS){

                    //   $userData = array(
                    //     'username'       => $query->USER_NAME,
                    //     'store_id'       => $query->STORE_ID,
                    //     'msisdn'         => $query->MSISDN,
                    //     'lvl'            => $query->LVL,
                    //     'kd_price_plan'  => $query->KODE_PRICE_PLAN,
                    //     'user_img_name'  => $query->USER_IMG_NAME,
                    //     'status'         => "login"
                    //   );

                      // if($this->securimage->check($jsonArray['capcode']) == true){
                          //set session untuk user
                          if ($REGEXRESULT == "1"){
                              $member = $this->M_member->get_data_member_by_id($query->ID);
                                $userData = array(
                                  'user_name'      => $member->user_name,
                                  'store_id'       => $member->store_id,
                                  'user_img_name'  => $member->user_img_name,
                                  'member_id'      => $member->member_id,
                                  'full_name'      => $member->full_name
                                );
                                $this->session->set_userdata($userData);
                                $response = [
                                    'status'  => 'SUCCESS',
                                    'code'    =>'200',
                                    'message' =>'Ok.',
                                    'data'    => $userData
                                ];
                                return $this->response($response, 200);
                           } else {
                             $response = [
                                 'status'  => 'REGEX FAILED',
                                 'code'    =>'401',
                                 'message' =>'Password minimal 8 karakter, mengandung huruf besar, huruf kecil dan angka!',
                                 'data'    => $userData
                             ];
                             return $this->response($response, 200);
                           }
                      // } else {
                      //   echo json_encode(array("status"=>"CAPTCHA FAILED","pesan"=>"Kode Captcha Salah","param"=>$jsonArray));
                      //   die();
                      // }

                  } else {
                    $response = [
                        'status' => 'WRONG PASS',
                        'code'   =>'401',
                        'message'=>'Password Yang Anda Masukan Salah!',
                        'data'   => null
                    ];
                    return $this->response($response, 200);
                  }

              } else {
                $response = [
                    'status' => 'EXPIRED',
                    'code'   =>'401',
                    'message'=>'Password Anda Telah Expired',
                    'data'   => null
                ];
                return $this->response($response, 200);
              }


           } else {
             $response = [
                 'status' =>'UNREGISTERED',
                 'code'   =>'401',
                 'message'=>'ID Tidak Terdaftar',
                 'data'   => null
             ];
             return $this->response($response, 200);
           }
          // }else {
          //   echo json_encode(array("status"=>"SECURE FAILED","pesan"=>"Security violation","param"=>$jsonArray));
          //   die();
          // }
       // } else{
       //
       //    $response = [
       //        'status' =>'HASHING FAILED',
       //        'code'   =>'401',
       //        'message'=>'Security violation, Hashing Failed!',
       //        'data'   => null
       //    ];
       //    return $this->response($response, 200);
       // }


  }


    function ceklogin2_post(){

     // $this->load->library('securimage');
     // $img = new Securimage();
     // $jsonArray = json_decode(file_get_contents('php://input'),true);
     // $ID          = $jsonArray['id'];
     $ID          = $this->post('id');
     // $PASS        = $jsonArray['pass'];
     $PASS        = $this->post('password');
     // $CAPCODE     = $jsonArray['capcode'];
     // $T           = $jsonArray['t'];
     // $H           = $jsonArray['h'];
     // $REGEXRESULT = $jsonArray['regexResult'];

    // $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
    // //$TDate  = date("Y/m/d H:i:s",$T);
    // $MyHash = sha1($ID . $PASS . $T);
    // $MyTime = strtotime(date("Y/m/d H:i:s"));
    // //$MyTime = date("Y/m/d H:i:s");
    // $interval = abs($MyTime-$TDate);
    $now = date("YmdHis");

    //$result = $img->check($jsonArray['capcode']);
    // echo "interval=>".$interval."  MyTIme=>".$MyTime."  TDate=>".$TDate."  T=>".$T;
    // die();


       // if($MyHash === $H){
          // if($interval < MAX_INTERVAL){
           $query = $this->M_login->isLogin($ID);

           if($query) {
              $getExp = $this->M_login->getExp($ID);
              // die(json_encode($getExp));
              // echo "ExpDate => ".$getExp->WEB_PASS_EXPDATE." "."NowDate => ".$now;
              // die();
              if($now <= $getExp->WEB_PASS_EXPDATE) {
                // echo "ExpDate => ".$getExp->WEB_PASS_EXPDATE." "."NowDate => ".$now;
                // die();
                if($query->WEB_PASS == $PASS){

                    // if ($REGEXRESULT == "1"){
                    //   $userData = array(
                    //     'username'       => $query->USER_NAME,
                    //     'store_id'       => $query->STORE_ID,
                    //     'msisdn'         => $query->MSISDN,
                    //     'lvl'            => $query->LVL,
                    //     'kd_price_plan'  => $query->KODE_PRICE_PLAN,
                    //     'user_img_name'  => $query->USER_IMG_NAME,
                    //     'status'         => "login"
                    //   );

                      // if($this->securimage->check($jsonArray['capcode']) == true){
                          //set session untuk user
                          // if ($REGEXRESULT == "1"){
                            $member = $this->M_member->get_data_member_by_id($query->USER_NAME);

                            $userData = array(
                              'user_name'       => $query->USER_NAME,
                              'store_id'       => $query->STORE_ID,
                              'user_img_name'  => $query->USER_IMG_NAME,
                              'member_id'      => $member->member_id,
                              'full_name'      => $member->full_name
                            );
                            //$this->session->set_userdata($userData);
                            $response = [
                                'code'=>'200',
                                'message'=>'Ok.',
                                'data'=> $userData
                            ];
                            return $this->response($response, 200);
                           // } else {
                           //  echo json_encode(array("status"=>"CHANGE PASSWORD","username"=>$query->USER_NAME, "store_id"=>$query->STORE_ID,"pesan"=>"Password Tidak memenuhi Syarat, Password minimal 8 karakter, mengandung huruf besar, huruf kecil dan angka!","param"=>$jsonArray));
                           //  die();
                           // }
                      // } else {
                      //   echo json_encode(array("status"=>"CAPTCHA FAILED","pesan"=>"Kode Captcha Salah","param"=>$jsonArray));
                      //   die();
                      // }

                } else {
                  $response = [
                      'code'=>'401',
                      'message'=>'Password salah',
                      'data'=> null
                  ];
                  return $this->response($response, 200);
                }

              } else {
                $response = [
                    'code'=>'401',
                    'message'=>'Password expired',
                    'data'=> null
                ];
                return $this->response($response, 200);
              }


           }else {
             $response = [
                 'code'=>'401',
                 'message'=>'ID Tidak Terdaftar',
                 'data'=> null
             ];
             return $this->response($response, 200);
           }
          // }else {
          //   echo json_encode(array("status"=>"SECURE FAILED","pesan"=>"Security violation","param"=>$jsonArray));
          //   die();
          // }
       // }
       //  else{
       //    echo json_encode(array("status"=>"HASHING FAILED","pesan"=>"Security violation","param"=>$jsonArray));
       //    die();
       // }


  }

}
