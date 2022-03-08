<div class="col-desk-9 col-sm-9">
  <?php
  $pop_msg = $this->session->flashdata('hasil');
  if($pop_msg != ""){
    echo $pop_msg;
  }
   ?>
          <div id="data-product" class="row" style="padding:30px;">
              <div onclick="add_product()" style="padding:15px;cursor:pointer;width:200px;;background-color:transparent;vertical-align:middle;margin-bottom:10px;">
                <img src="<?= base_url() ?>assets/icons/add.png" alt="" style="width:30px;height:30px;float:left;margin-right:10px;">Tambah Produk
              </div>
              <table class="display" id="products"  style="text-align:left;font-size:14px;">
                  <thead>
                      <tr>
                          <th >No</th>
                          <th >Gambar</th>
                          <th >Nama Produk</th>
                          <th >Kategori</th>
                          <th >Merek</th>
                          <th >Berat</th>
                          <th >Harga</th>
                          <th >Opsi</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    $x=0;
                    foreach ($product as $prod) {
                    $x++;

                    ?>
                    <tr>
                      <td><?= $x ?></td>
                      <td>
                        <img width="20%"src="<?= API_IMG.'products/'.$prod->image1 ?>" alt="">
                        <img width="20%"src="<?= API_IMG.'products/'.$prod->image2 ?>" alt="">
                        <img width="20%"src="<?= API_IMG.'products/'.$prod->image3 ?>" alt="">
                        <img width="20%"src="<?= API_IMG.'products/'.$prod->image4 ?>" alt="">
                      </td>
                      <td><?= $prod->product_name ?></td>
                      <td><?= $prod->product_category_name ?></td>
                      <td><?= $prod->brand ?></td>
                      <td><?= $prod->weight ?> Kg</td>
                      <td>Rp. <?= number_format($prod->price); ?></td>
                      <td>
                        <img onclick="get_product_by_id(<?= $prod->product_id ?>)" src="<?= base_url() ?>assets/icons/edits.jpg"  alt="" style="cursor:pointer;width:20px;height:20px;">
                        <img onclick="delete_product(<?= $prod->product_id ?>)" src="<?= base_url() ?>assets/icons/trash.png" alt=""  style="cursor:pointer;width:20px;height:20px;">
                    </td>
                    </tr>
                  <?php } ?>

                  </tbody>
              </table>
          </div>

          <!-- ADD PRODUCT-->
          <div id="add-product" class="row" style="padding:30px;display:none;">
            <div class="title"></div>
            <?php
              $time = date("Y-m-d H:i:s");
             ?>
            <form id="form-add-product" method="post" action="<?= base_url()?>products/ajax_add" enctype="multipart/form-data">
              <input type="hidden" name="time_start" value="<?= $time ?>">
              <table>
                  <tr>
                    <td>Kategori Produk</td>
                    <td>
                      <select id="select_category_id" name="product_category_id">
                        <option value="">--Pilih Kategori Produk--</option>
                        <?php foreach($category as $cat){ ?>
                          <option value="<?= $cat->product_category_id ?>"><?= $cat->product_category_name ?></option>
                        <?php } ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Sub Kategori Produk</td>
                    <td>
                      <select id="select_parent_id" name="parent_category_id">
                        <option value="">--Pilih Sub Kategori Produk--</option>
                        <option value=""></option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Nama Produk</td>
                    <td>
                      <input placeholder="Nama Produk" class="input input-location"  type="text" name="product_name" value="">
                    </td>
                  </tr>
                  <tr>
                    <td>Deskripsi Produk</td>
                    <td>
                      <textarea name="description" rows="5" cols="30"></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td>Harga</td>
                    <td>
                      <input placeholder="Harga Produk" class="input input-location"  type="text" name="price" value="">
                    </td>
                  </tr>
                  <tr>
                    <td>Kondisi</td>
                    <td>
                      <input type="radio" name="condision" value="Baru"> Baru
                      <input type="radio" name="condision" value="Bekas"> Bekas
                    </td>
                  </tr>
                  <tr>
                    <td>Berat</td>
                    <td>
                      <input placeholder="Berat Produk" class="input input-location"  type="text" name="weight" value=""> Kg
                    </td>
                  </tr>
                  <tr>
                    <td>Merek</td>
                    <td><input placeholder="Merek Produk" class="input input-location"  type="text" name="brand" value=""></td>
                  </tr>
                  <tr>
                    <td>Diskon</td>
                    <td><input placeholder="Diskon Produk" class="input input-location"  type="text" name="discount" value=""></td>
                  </tr>
                  <tr>
                    <td>Produk Variant</td>
                    <td><input placeholder="Produk Variant" class="input input-location"  type="text" name="product_variant_id" value=""></td>
                  </tr>
                  <tr>
                    <td>Image Produk</td>
                    <td>
                      <?php for ($i=1; $i <=4 ; $i++) :?>
                        <input type="file" name="image<?php echo $i;?>"><br/>
                    <?php endfor;?>
                    </td>
                  </tr>
                  <!-- <tr>
                    <td>Image 2</td>
                    <td><input type="file" name="img2" value=""> </td>
                  </tr>
                  <tr>
                    <td>Image 3</td>
                    <td><input type="file" name="img3" value=""> </td>
                  </tr>
                  <tr>
                    <td>Image 4</td>
                    <td><input type="file" name="img4" value=""> </td>
                  </tr> -->
                  <tr>
                    <td colspan="2">
                      <button type="submit" name="submit" id="save-category">Save</button>
                      <button type="reset" >Cancel</button>
                      <?php echo anchor('products','Kembali');?>
                    </td>
                  </tr>

              </table>
            </form>
          </div>
          <!-- END OF ADD PRODUCT -->


          <!-- EDIT PRODUCT -->
          <div id="edit-product" class="row" style="padding:30px;display:none;">
            <form id="form-edit-product" class="" action="<?= base_url() ?>products/ajax_update" method="post" enctype="multipart/form-data">
            <input type="hidden" name="product_id" value="">
            <div class="title"> </div>
            <table>
              <tr>
                <td>Image Product</td>
                <td colspan="2">
                  <?php for ($i=1; $i <=4 ; $i++) :?>
                  <img src="" id="img<?php echo $i;?>"src="" alt="" style="width:30px;height:30px;">
                  <?php endfor;?>
                </td>
              </tr>
                <tr>
                  <td>Kategori Produk</td>
                  <td>
                    <select id="select_category_edit" name="product_category_edit">
                      <?php foreach($category as $cate){ ?>
                      <option value="<?=$cate->product_category_id ?>"><?=$cate->product_category_name ?></option>
                    <?php } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Sub Kategori Produk</td>
                  <td>
                    <select id="select_parent_edit" name="parent_category_edit">
                      <option value="">--Pilih SKategori Produk--</option>
                      <option value=""></option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Nama Produk</td>
                  <td>
                    <input placeholder="Nama Produk" class="input input-location"  type="text" name="product_name" value="">
                  </td>
                </tr>
                <tr>
                  <td>Deskripsi Produk</td>
                  <td>
                    <textarea name="description" rows="5" cols="30"></textarea>
                  </td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td>
                    <input placeholder="Harga Produk" class="input input-location"  type="text" name="price" value="">
                  </td>
                </tr>
                <tr>
                  <td>Kondisi</td>
                  <td>
                    <input type="radio" name="condition" value="Baru"> Baru
                    <input type="radio" name="condition" value="Bekas"> Bekas
                  </td>
                </tr>
                <tr>
                  <td>Berat</td>
                  <td>
                    <input placeholder="Berat Produk" class="input input-location"  type="text" name="weight" value=""> Kg
                  </td>
                </tr>
                <tr>
                  <td>Merek</td>
                  <td><input placeholder="Merek Produk" class="input input-location"  type="text" name="brand" value=""></td>
                </tr>
                <tr>
                  <td>Diskon</td>
                  <td><input placeholder="Diskon Produk" class="input input-location"  type="text" name="discount" value=""></td>
                </tr>
                <tr>
                  <td>Produk Variant</td>
                  <td><input placeholder="Produk Variant" class="input input-location"  type="text" name="product_variant_id" value=""></td>
                </tr>
                <tr>
                  <td>Image Produk</td>
                  <td>
                    <?php for ($i=1; $i <=4 ; $i++) :?>
                      <input type="file" name="image<?php echo $i;?>"><br/>
                  <?php endfor;?>
                  </td>
                </tr>

                <tr>
                  <td colspan="2">
                    <button type="submit" name="submit" id="save-category">Save</button>
                    <button type="reset" >Cancel</button>
                    <?php echo anchor('products','Kembali');?>
                  </td>
                </tr>

            </table>
            </form>
          </div>
          <!-- END OF EDIT PRODUCT -->

      </div>
  </div>
  <!-- END OF LIST PTODUCT 1-->


</div>

</div>
</div>
