<!DOCTYPE html>
<html>
    <head>
        <title>Online Store</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css" type="text/css">
    </head>
    <body>
        <div class="main-header">
            <div class="call-us">
                <div class="body">
                    <div class="row">
                        <div class="col-desk-7 col-md-7 col-sm-7" >
                            <img src="<?=base_url()?>assets/icons/phone-receiver-white.svg" alt="">
                            <span>Call us now : (021) 87654321</span>
                        </div>
                        <div class="col-desk-3 col-md-3 col-sm-3">
                            <img src="<?=base_url()?>assets/icons/account-white.svg" alt=""> welcome, <?= $this->session->userdata('user_name') ?>
                        </div>
                        <div class="col-desk-2 col-md-2 col-sm-2">
                            <?php if($this->session->userdata('status')=="login"){ ?>
                               <a href="<?=base_url()?>member/logout"> <button type="button" id="to-logout">LogOut</button> </a>
                             <?php }else{ ?>
                               <button  type="button" id="to-login">LogIn</button> | <button type="button" id="to-daftar" >Daftar</button>
                          <?php } ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-desk-3 col-md-3 col-sm-3" id="box-register" style="display:none;float:right;">
                          <div class="box-form">

                            <div class="main-area" style="background-color:rgb(0, 175, 233);color:#FFF;border:1px solid #fff;border-radius:5px;width:auto;text-align:center;">
                              <div class="title" style="margin:2px 40px 2px 40px;vertical-align:middle;">
                                Register Form
                                <form class="form" action="<?= base_url()?>member/create" method="post" enctype="multipart/form-data">

                                  <div id='err_msg' style='display:none;'>
                                    <div id='content_result'>
                                      <div id='err_show' class="w3-text-red">
                                        <div class="msg" id='msg' style="border:1px; width:auto; height:auto; padding:2px; color:yellow; font-size:15px;text-align:left;display:table;"> </div>

                                      </div>
                                    </div>
                                  </div>

                                  <input class="input" type="text" name="full_name" placeholder="Full Name">
                                  <input class="input" type="hidden" name="join_date" value="<?= date("Y-m-d H:i:s") ?>"><br>
                                  <input class="input" type="text" name="email" placeholder="Email"><br>
                                  <input class="input" type="text" name="phone" placeholder="Phone"><br>
                                  <input class="input" type="password" name="password" placeholder="Password"><br>
                                  <input class="input" type="password" name="password2"  placeholder="Confirm Password"><br>
                                  <button id="submit-register" type="submit" name="submit">Register</button>
                                  <button class="cancel" type="reset" name="cancel">Cancel</button><br>
                                  <p id="login">LogIn Sekarang</p> <p class="forgot"> Lupa Password</p>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-desk-3 col-md-3 col-sm-3" id="box-login" style="display:none;float:right;overflow:inherit;">
                          <div class="box-form">

                            <div class="main-area" style="">
                              <div class="title">
                                <!--LOGIN FORM -->
                                <form class="form" action="" autocomplete="off">

                                  <div id="err_msg" class="err_msg" style='display:none;'>
                                    <div id='content_result'>
                                      <div id='err_show' class="w3-text-red err_show">
                                        <div class="msg" id='msg' style="border:1px; width:auto; height:auto; padding:2px; color:yellow; font-size:15px;text-align:left;display:table;"> </div>

                                      </div>
                                    </div>
                                  </div>

                                  <input class="input" id="id" type="text" name="id" placeholder="Username"><br>
                                  <input class="input" id="password" type="password" name="password" placeholder="Password"><br>
                                  <button id="submit-login" type="submit" name="submit">LogIn</button>
                                  <button class="cancel" type="reset">Cancel</button><br>
                                  <p id="register" style="display:block;">Daftar Sebagai Member</p><p class="forgot">Lupa Password</p>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>


                        <div class="col-desk-3 col-md-3 cl-sm-3" id="box-forgot" style="display:none;float:right;">
                          <div class="box-form">
                            Lupa Password
                            <div class="main-area">
                              <div class="title">
                                <form class="form" action="<?= base_url()?>member/create" method="post" enctype="multipart/form-data">

                                  <div id='err_msg' style='display:none'>
                                    <div id='content_result'>
                                      <div id='err_show' class="w3-text-red">
                                        <div class="msg" id='msg' style="border:1px; width:auto; height:auto; padding:2px; color:yellow; font-size:15px;text-align:left;display:table;"> </div>

                                      </div>
                                    </div>
                                  </div>
                                  <input class="input" type="email" name="email" placeholder="Email"><br>
                                  <input class="input" type="text" name="phone" placeholder="Phone"><br>
                                  <button id="submit-forgot" type="submit" name="submit">Send</button>
                                  <button class="cancel" type="reset" name="cancel">Cancel</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="logo-and-chart">
                <div class="row">
                    <div class="col-desk-6 col-md-6 col-sm-6">
                        <div>
                            <a href="#"><img class="top-logo" src="<?=base_url()?>assets/icons/metro-multi-payment.PNG" alt=""></a>
                        </div>
                    </div>
                    <div class="col-desk-6 col-md-6 col-sm-6">
                        <div class="row">
                            <div class="col-desk-8 col-sm-8">
                                <div class="list-product-promo-top">
                                    <div class="item">
                                        <a href="#">
                                            <img src="<?=base_url()?>assets/icons/macbook.jpg" alt="">
                                            <div class="caption">
                                                <span class="total-discount">20% Discount</span><br>
                                                <span class="description">For New Bag</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#">
                                            <img src="<?=base_url()?>assets/icons/macbook.jpg" alt="">
                                            <div class="caption">
                                                <span class="total-discount">20% Discount</span><br>
                                                <span class="description">For New Bag</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-desk-4 col-md-4 col-sm-4">
                                <div class="my-cart">
                                    <a href="#">
                                        <img src="<?=base_url()?>assets/icons/shopping-cart-blue.svg" alt="">
                                        <div class="caption">
                                            <span class="title">My Cart</span><br>
                                            <span id="total-item" class="total-item">1</span><sub> item</sub><br>
                                            <span id="total-shoping" class="total-shopping">Rp 200.000,00</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navigation-top">
                <div class="body">
                    <div class="row">
                        <div class="col-desk-6 col-md-6 col-sm-6">
                            <div class="list-navigation-top">
                                <a href="<?= base_url()?>store">Home</a>
                                <a href="#">Best Seller</a>
                                <a href="#">Spesial Offer</a>
                                <a href="#">Site Map</a>
                                <a href="#">Contact</a>
                                <a href="#">Stores</a>
                            </div>
                        </div>
                        <div class="col-desk-6 col-md-6 col-sm-6">
                            <div class="right-top-navigation">
                                <form action="">
                                    <div>
                                        <input class="text-input-search" type="text" placeholder="search">
                                        <button class="search-button">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
