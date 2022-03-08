  <div id="datacat"class="col-desk-9 col-sm-9">
    <?php
    $pop_msg = $this->session->flashdata('hasil');
    if($pop_msg != ""){
      echo $pop_msg;
    }
     ?>

        <!-- <div id="sub" class="row">
          <div style="padding:5px;margin-left:300px;margin-top:20px;background-color:blue;width:380px;color:#FFF;">
            <form method="post" class="form-cat" action="" enctype="multipart/form-data">
              <div class="det" style="background-color:transparent; border:1px solid #fff; padding:5px;">

              </div>
            </form>
          </div>
        </div> -->

        <!-- DATA CATEGORY -->

        <div id="data-cat" class="row" style="padding:30px;">
          <h3> <?= $title ?></h3>
          <div onclick="add_category()" style="padding:15px;cursor:pointer;width:200px;;background-color:transparent;vertical-align:middle;margin-bottom:10px;">
            <img src="<?= base_url() ?>assets/icons/add.png" alt="" style="width:30px;height:30px;float:left;margin-right:10px;">Tambah Kategori
          </div>
            <table class="display" id="category" width="100%" style="text-align:left;font-size:14px;">
                <thead>
                    <tr>
                        <th width="2%">No</th>
                        <th width="20%">Kategori</th>
                        <th width="20%">Icon</th>
                        <th width="25%">Sub Kategori</th>
                        <th width="48%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  $x=0;
                  foreach ($category as $cat) {
                  $x++;

                  ?>
                  <tr>
                    <td><?= $x ?></td>
                    <td>
                      <span class="catname" id='<?= $cat->product_category_id ?>' name="cek"
                        data-id="<?= $cat->product_category_id ?>"
                        style="cursor:pointer;border:1px solid rgb(0, 175, 233);padding:4px;border-radius:5px;width:auto;background-color:rgb(0, 175, 233);">
                        <?= $cat->product_category_name ?>
                      </span>
                    </td>
                    <td>
                      <img class="" width="20%" src="<?= API_IMG.'category/'.$cat->icon ?>" >
                    </td>
                    <td></td>
                    <td>
                      <img onclick="get_category_by_id(<?= $cat->product_category_id ?>)" src="<?= base_url() ?>assets/icons/edits.jpg" width="10%" alt="" style="cursor:pointer;">
                      <img onclick="delete_category(<?= $cat->product_category_id ?>)" src="<?= base_url() ?>assets/icons/trash.png" width="10%" alt=""  style="cursor:pointer;">
                      <!-- <img onclick="get_category_by_id()" src="assets/icons/view.png" width="10%" alt=""> -->

                    </td>
                  </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>



        <!-- ADD CATEGORY -->
        <div id="add-cat" class="row" style="padding:30px;display:none;">
          <div class="title"></div>
          <form id="form-add-category" method="post" action="<?= base_url() ?>category/ajax_add" enctype="multipart/form-data">
            <div id="pesan_kirim" style="display:none"></div>
          <table>
              <tr>
                <td>Kategori</td>
                <td><input class=""  type="text" name="product_category_name" value=""></td>
              </tr>
              <tr>
                <td>Ikon Kategori</td>
                <td>
                  <input class="" type="file" name="icon" id="file" class="file-input" />
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <button type="submit" name="submit" id="save-category">Save</button>
                  <button type="reset" >Cancel</button>
                  <a href="<?= base_url() ?>category">Kembali</a>
                </td>
              </tr>
          </table>
          </form>
        </div>
        <!-- END OF ADD CATEGORY -->



        <!-- EDIT CATEGORY -->
        <div id="edit-cat" class="row" style="padding:30px;display:none;">
          <form id="form-edit-category" class="" action="<?= base_url() ?>category/ajax_update" method="post" enctype="multipart/form-data">
          <input type="hidden" name="product_category_id" value="">
          <div class="title"> </div>
          <table width="100%">
            <tr>
              <td>
                <img id="img" width="30%" src="" alt=""><br>
                <div class='preview' style="display:none;">
                    <img src="" id="img" width="100" height="100">
                </div>
              </td>
            </tr>
              <tr>
                <td>Nama Kategori</td>
                <td>
                  <input type="text" name="product_category_name" value="">
                </td>
              </tr>
              <tr>
                <td width="20%">Icon</td>
                <td>
                  <input type="file" name="icon" id="icon-file" value="">
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <button id="idkat" type="submit" name="button">Simpan</button>
                  <button type="reset" name="button">Cancel</button>
                  <a href="<?= base_url() ?>category">Back</a>
                </td>
              </tr>
          </table>
          </form>
        </div>
        <!-- END OF EDIT CATEGORY -->
      </div>




  </div>
  <!-- END OF LIST PTODUCT 1-->







</div>

</div>
</div>
