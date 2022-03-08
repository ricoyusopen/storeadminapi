<?php
$pop_msg = $this->session->flashdata('hasil');
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css" type="text/css">
        <link rel="stylesheet" href="<?=base_url()?>assets/datatables/jquery.dataTables.css" type="text/css">
        <link rel="stylesheet" href="<?=base_url()?>assets/datatables/jquery-ui.css" type="text/css">
    </head>
    <body>
        <div class="main-header">
            <div class="call-us">
                <div class="body">
                    <div class="row">
                        <div class="col-desk-12 col-md-12 col-sm-12">
                            <img src="<?=base_url()?>assets/icons/phone-receiver-white.svg" alt="">
                            <span>Call us now : (021) 87654321</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo-and-chart">
                <div class="row">
                    <div class="col-desk-4 col-md-4 col-sm-4">
                        <div>
                            <a href="#"><img class="top-logo" src="<?=base_url()?>assets/icons/metro-multi-payment.PNG" alt=""></a>
                        </div>
                    </div>
                    <div class="col-desk-8 col-md-8 col-sm-8">
                        <div class="row">
                            <div class="col-desk-8 col-sm-8">
                                <h2>Management Online Store</h2>
                            </div>
                            <div class="col-desk-4 col-md-4 col-sm-4">
                                <div class="my-cart">
                                    <!-- <a href="#">
                                        <img src="<?=base_url()?>assets/icons/shopping-cart-blue.svg" alt="">
                                        <div class="caption">
                                            <span class="title">My Cart</span><br>
                                            <span class="total-item">1</span><sub> item</sub><br>
                                            <span class="total-shopping">Rp 200.000,00</span>
                                        </div>
                                    </a> -->
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
                                <?=$title?>
                                <!-- <a href="#">Home</a>
                                <a href="#">Best Seller</a>
                                <a href="#">Spesial Offer</a>
                                <a href="#">Site Map</a>
                                <a href="#">Contact</a>
                                <a href="#">Stores</a> -->
                            </div>
                        </div>
                        <div class="col-desk-6 col-md-6 col-sm-6">
                            <div class="right-top-navigation">
                                <form action="">
                                    <div>
                                        <a href="#" style="color:#FFF; float:left; font-weight:bold;">
                                          <img src="<?=base_url()?>assets/icons/account-white.svg" alt="">

                                        </a>
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
