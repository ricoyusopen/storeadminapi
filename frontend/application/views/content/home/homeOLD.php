<div class="col-desk-9 col-sm-9">

  <!-- <div class="row">
      <div class="col-desk-12 col-md-12 col-sm-12">
          <div class="banner1-right">
              <a href="#"><img class="image" src="<?= API_IMG ?>banner/<?= $bannertop[0]->image_name ?>" alt=""></a>
              <button class="btn-shop-now">SHOP NOW</button>
          </div>
      </div>
  </div> -->

  <!-- ICON -->
  <div class="row">
      <div class="col-desk-12 col-md-12 col-sm-12">
          <div class="top-right-category">
              <?php foreach($icon as $ic) {?>
              <div class="item">
              <img class="icon-category" src="<?=API_IMG?>category/<?= $ic->icon ?>" alt="" style="cursor:pointer;">
              </div>
            <?php } ?>
          </div>
      </div>
  </div>
  <!-- END OF ICON -->

  <div class="row">
      <div class="col-desk-6 col-md-6 col-sm-6">
          <div class="banner2-right-parent">
              <a href="#"><img class="banner2-right" src="<?=API_IMG?>banner/<?= $bannertopleft[0]->image_name ?>" alt=""></a>
          </div>
      </div>
      <div class="col-desk-6 col-md-6 col-sm-6">
          <div class="banner3-right-parent">
              <a href="#"><img class="banner3-right" src="<?=API_IMG?>banner/<?= $bannertopright[0]->image_name ?>" alt=""></a>
          </div>
      </div>
  </div>
  <!-- END OF BANNER -->



  <!-- LIST PRODUCT 1-->
  <div class="row">
      <div class="col-desk-12 col-md-12 col-sm-12">
          <div class="list-product">
            <div class="list-product">
                <?php foreach($product as $prod){ ?>
                <div class="item">
                    <a href="<?=base_url()?>products/detail?id=<?= $prod->product_id ?>">
                        <img class="image" src="<?=API_IMG?>products/<?= $prod->image1 ?>" alt=""><br>
                        <span class="product-name"><?= $prod->description ?></span><br>
                        <span class="price"><?= $prod->price ?></span>
                    </a>
                    <div class="atribut">
                      <img src="<?=base_url() ?>assets/icons/heart.png" alt="" style="width:10%;">
                    </div>
                </div>

              <?php } ?>
            </div>
          </div>
      </div>
  </div>
  <!-- END OF LIST PTODUCT 1-->


  <!-- BNANNER 2 -->
  <div class="row">
      <div class="col-desk-12 col-md-12 col-sm-12">
          <div class="banner1-right">
              <a href="#"><img class="image" src="<?=API_IMG?>banner/<?= $bannercenter[0]->image_name ?>" alt=""></a>
          </div>
      </div>
  </div>
  <!-- END OF BANNER 2-->

  <!-- LIST OF PRODUCT 2-->
  <div class="row">
      <div class="col-desk-12 col-md-12 col-sm-12">
          <div class="list-product">
            <div class="list-product">
                <?php foreach($product as $prod){ ?>
                <div class="item">
                    <a href="<?=base_url()?>product/detail">
                        <img class="image" src="<?=API_IMG?>products/<?= $prod->image1 ?>" alt=""><br>
                        <span class="product-name"><?= $prod->description ?></span><br>
                        <span class="price"><?= $prod->price ?></span>
                    </a>
                </div>
              <?php } ?>
            </div>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-desk-6">
          <div class="banner2-right-parent">
              <a href="#"><img class="banner2-right" src="<?=base_url()?>assets/icons/banner6.png" alt=""></a>
          </div>
      </div>
      <div class="col-desk-6">
          <div class="banner3-right-parent">
              <a href="#"><img class="banner3-right" src="<?=base_url()?>assets/icons/banner7.png" alt=""></a>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-desk-12 col-md-12 col-sm-12">
          <div class="list-product">
              <?php foreach($product as $prod){ ?>
              <div class="item">
                  <a href="<?=base_url()?>product/detail">
                      <img class="image" src="<?=API_IMG?>products/<?= $prod->image1 ?>" alt=""><br>
                      <span class="product-name"><?= $prod->description ?></span><br>
                      <span class="price"><?= $prod->price ?></span>
                  </a>
              </div>
            <?php } ?>
          </div>
      </div>
  </div>
  <!-- END OF LIST PRODUCT 2-->

</div>

</div>
</div>
