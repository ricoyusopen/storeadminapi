<?php
$date = date("Y-m-d H:i:s");
$order_id = "ORDER-".date("Ymdhis");
 ?>

                <!-- right content -->
                <!-- <div class="col-desk-9 col-sm-9" > -->
                  <form id="form-cart" action="<?=base_url()?>/order/toCart" method="post">
                    <input id="order_id" type="hidden" name="order_id" value="<?= $order_id ?>">
                    <input id="order_date" type="hidden" name="order_date" value="<?= $date?>">
                    <input id="product_id" type="hidden" name="product_id" value="">
                    <input id="member_id" type="hidden" name="member_id" value="rico123">
                    <input id="no_resi" type="hidden" name="no_resi" value="<?= $order_id ?>">

                    <div class="row" id="product-detail-top" style="display:none;">
                        <div class="col-desk-12 col-md-12 col-sm-12">
                            <div class="product-detail-top">
                                <div class="row">
                                    <div class="col-desk-7 col-md-7 col-sm-7">
                                        <div class="image-area">
                                            <div class="image-main">
                                                <a href="#"><img class="main-image" id="imgutama"src="" alt=""></a>
                                            </div>
                                            <input id="image1" type="hidden" name="image1" value="">
                                            <div class="image-list">
                                                <div class="item">
                                                    <a href="#"><img class="img-produk" id="img1" src="" alt=""></a>
                                                </div>
                                                <div class="item">
                                                    <a href="#"><img class="img-produk" id="img2" src="" alt=""></a>
                                                </div>
                                                <div class="item">
                                                    <a href="#"><img class="img-produk" id="img3" src="" alt=""></a>
                                                </div>
                                                <div class="item">
                                                    <a href="#"><img class="img-produk" id="img4" src="" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-desk-5 col-md-5 col-sm-5">
                                        <div class="detail-right-area">
                                            <div class="product_name"> </div>
                                            <div class="product-review">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt="">
                                                            <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt="">
                                                            <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt="">
                                                            <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt="">
                                                            <img class="star" src="<?=base_url()?>assets/icons/star.svg" alt="">
                                                        </td>
                                                        <td>
                                                            <div class="read-review">
                                                                <a href="#">
                                                                    <img src="<?=base_url()?>assets/icons/review.svg" alt="">
                                                                    <span>Read review</span>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="product-price">
                                                <span class="before-discount">  </span><br>
                                                <span class="after-discount"> </span>
                                                <span>Save</span> <span class="total-discount"></span>
                                            </div>
                                            <div class="product-action">
                                                <table>
                                                    <tr>
                                                        <td>Color</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Quantity</td>
                                                        <td>
                                                            <input id="quantity" type="number" min="1" name="quantity" value="">
                                                        </td>
                                                    </tr>
                                                </table>

                                                <button type="submit" name="submit" id="add-to-cart" class="button-primary">Add To Cart</button>
                                                <button type="button" id="add-to-wishlist" class="button-primary">Add To Wishlist</button>
                                                <a href="<?=base_url()?>index.php/welcome/checkout"><button class="button-primary">BUY NOW</button></a>
                  </form>
                                            </div>
                                            <div class="list-social-media">
                                                <div class="item">
                                                    <a href="#"><img src="<?=base_url()?>assets/icons/facebook-logo-share.svg" alt=""></a>
                                                    <a href="#"><img src="<?=base_url()?>assets/icons/twitter-logo-share.svg" alt=""></a>
                                                    <a href="#"><img src="<?=base_url()?>assets/icons/pinterest-logo.svg" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="label-promotion">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <img src="<?=base_url()?>assets/icons/shield.svg" alt="">
                                                        </td>
                                                        <td>Security Policy</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="<?=base_url()?>assets/icons/delivery-truck.svg" alt="">
                                                        </td>
                                                        <td>Delivery Policy</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="<?=base_url()?>assets/icons/return.svg" alt="">
                                                        </td>
                                                        <td>Return Policy</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="product-detail-bottom" style="display:none;">
                        <div class="col-desk-12 col-md-12 col-sm-12">
                            <div class="product-detail-bottom">
                                <div class="tab-menu text-title">
                                    <a href="#"><span>Description</span></a>
                                    <a href="#"><span>Delivery</span></a>
                                    <a href="#"><span>Review</span></a>
                                </div>
                                <div class="tab-content">
                                    <div class="tab1">
                                        <div class="row">
                                            <div class="col-desk-2 col-md-2 col-sm-2">
                                                <span class="text-medium">Informasi</span>
                                            </div>
                                            <div class="col-desk-10 col-md-10 col-sm-10">
                                                <table class="text-medium">
                                                    <tr>
                                                        <td><img src="<?=base_url()?>assets/icons/tag.svg" alt="">Kondisi</td>
                                                        <td>:</td>
                                                        <td><span id="condition"></span></td>
                                                        <td><img src="<?=base_url()?>assets/icons/favorite-heart-button.svg" alt="">Difavoritkan</td>
                                                        <td>:</td>
                                                        <td>306</td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="<?=base_url()?>assets/icons/shopping-cart-black.svg" alt="">Terjual</td>
                                                        <td>:</td>
                                                        <td>12</td>
                                                        <td><img src="<?=base_url()?>assets/icons/last-update.svg" alt="">Diperbarui</td>
                                                        <td>:</td>
                                                        <td>Hari Ini Pukul 10:00</td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="<?=base_url()?>assets/icons/eye.svg" alt="">Dilihat</td>
                                                        <td>:</td>
                                                        <td>561</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="specification">
                                    <div class="row">
                                        <div class="col-desk-2 col-md-2 col-sm-2">
                                            <span class="text-medium">Spesifikasi</span>
                                        </div>
                                        <div class="col-desk-10 col-md-10 col-sm-10">
                                            <table class="text-medium">
                                                <tr>
                                                    <td>Kategori</td>
                                                    <td>:</td>
                                                    <td><span id="category"></span>/<span id="subcategory"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Berat</td>
                                                    <td>:</td>
                                                    <td>
                                                      <span id="weight"></span>
                                                      gram
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Merek</td>
                                                    <td>:</td>
                                                    <td>
                                                      <span id="brand"></span>

                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="specification">
                                    <div class="row">
                                        <div class="col-desk-2 col-md-2 col-sm-2">
                                            <span class="text-medium">Deskripsi</span>
                                        </div>
                                        <div class="col-desk-10 col-md-10 col-sm-10">
                                          <pre class="text-medium" id="description">

                                          </pre>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="product-related" style="display:none;">
                        <div class="col-desk-12 col-md-12 col-sm-12">
                            <div class="tag-or-search">
                                <hr>
                                <button>Product Related</button>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="list-product2" style="display:none;">
                        <div class="col-desk-12 col-md-12 col-sm-12">
                            <div id="list-related" class="list-product">
                                <!-- <div class="item">
                                    <a href="#">
                                        <img class="image" src="<?=base_url()?>assets/icons/macbook.jpg" alt=""><br>
                                        <span class="product-name" >Macbook Pro</span><br>
                                        <span class="price">Rp. 10.000.000,00</span>
                                    </a>
                                </div> -->
                                <!-- <div class="item">
                                    <a href="#">
                                        <img class="image" src="<?=base_url()?>assets/icons/macbook.jpg" alt=""><br>
                                        <span class="product-name">Macbook Pro 2017 i7</span><br>
                                        <span class="price">Rp. 10.000.000,00</span>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#">
                                        <img class="image" src="<?=base_url()?>assets/icons/macbook.jpg" alt=""><br>
                                        <span class="product-name">Macbook Pro 2017 i7</span><br>
                                        <span class="price">Rp. 10.000.000,00</span>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#">
                                        <img class="image" src="<?=base_url()?>assets/icons/macbook.jpg" alt=""><br>
                                        <span class="product-name">Macbook Pro 2017 i7</span><br>
                                        <span class="price">Rp. 10.000.000,00</span>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="row" id="box-customer-service" style="display:none;">
                        <div class="col-desk-12 col-md-12 col-sm-12">
                            <div class="box-customer-service">
                                <div class="row">
                                    <div class="col-desk-8 col-md-8 col-sm-8">
                                        <div class="box-customer-service-left">
                                            <span class="box-customer-service-title">WE OFFER 24/7 DEDICATED HELP</span><br>
                                            <img class="box-customer-service-image" src="<?=base_url()?>assets/icons/customer-service.svg" alt="">
                                            <div class="box-customer-service-contact">
                                                <span>CUSTOMER SERVICE</span><br>
                                                <img src="<?=base_url()?>assets/icons/phone.svg" alt="">
                                                <span>(021) 89654321</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-desk-4 col-ms-4 col-sm-4">
                                        <a href="#">
                                            <button class="box-customer-service-contact-us">
                                                Contact Us
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- </div>
            </div>
        </div> -->
