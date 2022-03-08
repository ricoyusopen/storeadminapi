<div class="col-desk-9 col-sm-9">

        <div id="data-subcat" class="row" style="padding:30px;">
          <div id="adddata"  style="padding:15px;cursor:pointer;width:200px;;background-color:transparent;vertical-align:middle;margin-bottom:10px;">
            <img src="<?= base_url() ?>assets/icons/add.png" alt="" style="width:30px;height:30px;float:left;margin-right:10px;">Tambah SubKategori
          </div>

          <!-- ICON Categoty-->
          <div class="row"  >
              <div style="display:none" id="list-category" class="col-desk-12 col-md-12 col-sm-12">
                  <p> Silahkan pilih kategori:</p>
                  <div  class="top-right-category" style="cursor:pointer;">
                      <?php foreach($category as $cat){ ?>

                        <div class="item" onclick="add_subcategory(<?= $cat->product_category_id ?>)">
                                <span style="font-size:10px;"><?= $cat->product_category_name ?></span><br>
                                <img  src="<?=API_IMG.'category/'.$cat->icon ?>" alt="" style="width:30px;height:30px;">
                        </div>

                    <?php } ?>
                  </div>
              </div>
          </div>
          <!-- END OF ICON -->

            <h3> <?= $title ?></h3>
            <table class="display" id="category" width="100%" style="text-align:left;font-size:14px;">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="5%"></th>
                        <th width="20%">Sub Kategori</th>
                        <th width="20%">Kategori</th>
                        <!-- <th width="15%">Sub Kategori</th>
                        <th width="15%">Is Parent</th> -->
                        <th width="55%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  $x=0;
                  foreach ($subcategory as $sub) {
                  $x++;

                  ?>
                  <tr>
                    <td><?= $x ?></td>
                    <td>
                      <?php if($sub->icon !=""){ ?>
                      <img width="30" height="30" src="<?= API_IMG.'subcategory/'.$sub->icon ?>">
                    <?php }else{} ?>
                    </td>
                    <td>
                    
                      <span class="subcatname" id='<?= $sub->product_category_id ?>' name="cek"
                        data-id="<?= $sub->product_category_id ?>"
                        style="cursor:pointer;border:1px solid rgb(0, 175, 233);padding:4px;border-radius:5px;width:auto;background-color:rgb(0, 175, 233);">
                        <?= $sub->product_category_name ?>
                      </span>
                    </td>
                    <td>
                        <?= $sub->parent_category_id ?>
                    </td>
                    <td>
                      <img onclick="get_subcategory_by_id(<?= $sub->product_category_id ?>)" src="<?= base_url() ?>assets/icons/edits.jpg" alt="" style="cursor:pointer;width:20px;height:20px;">
                      <img onclick="delete_subcategory(<?= $sub->product_category_id ?>)" src="<?= base_url() ?>assets/icons/trash.png" alt=""  style="cursor:pointer;width:20px;height:20px">

                    </td>
                  </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>

        <!-- ADD SUB CATEGORY -->
        <div id="add-subcat" class="row" style="padding:30px;display:none;">
          <div class="title"></div>
          <form id="form-add-subcategory" method="post" action="<?= base_url() ?>sub_category/ajax_add" enctype="multipart/form-data">
            <input type="hidden" name="product_category_id" value="">
            <div id="pesan_kirim" style="display:none"></div>
            <table>
                <tr>
                  <td>Kategori Produk</td>
                  <td>
                    <img id="img" src="" alt="" width="30" height="30">
                    <span id="category_name"></span>
                  </td>
                </tr>

                <tr>
                  <td>Sub Kategori</td>
                  <td><input class="input input-location"  type="text" name="sub_category_name" value=""></td>
                </tr>

                <!-- <tr>
                  <td>Ikon Sub Kategori</td>
                  <td>
                    <input class="input input-location" type="file" name="icon_sub"  id="file_upload" class="file-input" />
                  </td>
                </tr> -->

                <tr>
                  <td colspan="2">
                    <button type="submit" name="submit" id="save-category">Save</button>
                    <button type="reset" >Cancel</button>
                    <?php echo anchor('sub_category','Kembali');?>
                  </td>
                </tr>

            </table>
          </form>
        </div>
        <!-- END OF ADD CATEGORY -->



        <!-- EDIT SUB CATEGORY -->
        <div id="edit-subcat" class="row" style="padding:30px;display:none;">
          <form id="form-edit-subcategory" class="" action="<?= base_url() ?>sub_category/ajax_update" method="post" enctype="multipart/form-data">
          <input type="hidden" name="product_category_id" value="">
          <div class="title"> </div>
          <table >
            <tr>
              <td colspan="2">
                <img id="img_sub" width="20%" src="" alt="">
              </td>
            </tr>
            <!-- <tr>
              <td colspan="2"><input type="file" name="icon" value=""></td>
            </tr> -->
            <tr>
              <td>Kategori Produk</td>
              <td colspan="2">
                <select id="select_product_category" name="parent_category_id">
                <?php
                foreach ($category as $cat){
                    echo "<option value='$cat->product_category_id'>$cat->product_category_name</option>";
                }
                ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>Sub Kategori</td>
              <td colspan="2">
                <input type="text" name="sub_category_name" value="">
              </td>
            </tr>

            <tr>
              <td colspan="2">
                <button id="idsubkat" type="submit" name="button">Simpan</button>
                <button type="reset" name="button">Cancel</button>
                <a href="<?= base_url() ?>sub_category">Back</a>
              </td>
            </tr>
          </table>
          </form>
        </div>
        <!-- END OF EDIT SUB CATEGORY -->

      </div>
  </div>
  <!-- END OF LIST PTODUCT 1-->


</div>

</div>
</div>
