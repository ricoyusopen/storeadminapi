<div class="col-desk-9 col-sm-9">

  <!-- ICON -->
  <div class="row">
      <div class="col-desk-12 col-md-12 col-sm-12">
          <div class="top-right-category" style="padding:20px;border-radius:5px;box-shadow: 1px 1px 3px #888888;">
              <?php foreach($icon as $ico){ ?>
              <div class="item">
                  <a href="<?=base_url($ico->product_category_name)?>">
                      <span style="font-size:10px;"><?= $ico->product_category_name ?></span><br>
                      <img src="<?=API_IMG.'category/'.$ico->icon ?>" alt="" style="width:30px;height:30px;">
                  </a>
              </div>
            <?php } ?>
          </div>
      </div>
  </div>
  <!-- END OF ICON -->


  <!-- LIST PRODUCT 1-->
  <div class="row">
      <div class="col-desk-12 col-md-12 col-sm-12">
          <div class="list-product">
            <?php foreach($product as $prod) {?>
                  <div class="item">
                      <a href="<?=base_url()?>productdetail">
                          <img class="image" src="<?=API_IMG.'products/'.$prod->image1 ?>" alt=""><br>
                          <span class="product-name"><?= $prod->product_name ?></span><br>
                          <span class="price">Rp. <?= $prod->price ?></span>
                      </a>
                  </div>
            <?php } ?>
          </div>
      </div>
  </div>
  <!-- END OF LIST PTODUCT 1-->



</div>

</div>
</div>
