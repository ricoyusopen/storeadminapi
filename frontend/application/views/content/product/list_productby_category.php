    <div class="col-desk-9 col-sm-9">

        <div class="row" id="view-product" >
          <div class="col-desk-12 col-md-12 col-sm-12">
            <div id="list-product" class="list-product">
              <?php foreach ($product as $product) {?>
                <div class="item" onclick="detail_product(<?=$product->product_id ?>)">
                  <a href="#">
                      <img class="image" src="<?=API_IMG?>products/<?=$product->image1 ?>" alt=""><br>
                  </a>
                  <div class="atribut">
                    <span class="product-name"><?= $product->product_name ?></span> <br>
                    <span class="price"><?= $product->price ?></span><br>
                    <img class="img-wish" src="<?=base_url() ?>assets/icons/heart.png" alt="">
                  </div>
               </div>
             <?php } ?>
            </div>
          </div>
        </div>

        <?php include("product-detail.php") ?>

    </div>


  </div>
</div>
