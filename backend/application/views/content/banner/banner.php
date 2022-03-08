<div class="col-desk-9 col-sm-9">
  <?php
  $pop_msg = $this->session->flashdata('hasil');
  if($pop_msg != ""){
    echo $pop_msg;
  }
   ?>
        <div id="data-banner" class="row" style="padding:30px;">
            <div onclick="add_banner()" style="padding:15px;cursor:pointer;width:200px;;background-color:transparent;vertical-align:middle;margin-bottom:10px;">
              <img src="<?= base_url() ?>assets/icons/add.png" alt="" style="width:30px;height:30px;float:left;margin-right:10px;">Tambah Banner
            </div>
            <table class="display" id="banner"  style="text-align:left;font-size:14px;">
                <thead>
                    <tr>
                        <th >No</th>
                        <th >Image Banner</th>
                        <th >Deskripsi</th>
                        <th >Tipe Banner</th>
                        <th >Link</th>
                        <th >Time Start</th>
                        <th >Opsi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  $x=0;
                  foreach ($banner as $ban) {
                  $x++;
                  ?>
                  <tr>
                    <td><?= $x ?></td>
                    <td> <img width="10%"src="<?= API_IMG.'banner/'.$ban->image_name ?>" alt=""></td>
                    <td><?= $ban->description ?></td>
                    <td><?= $ban->type?></td>
                    <td><?= $ban->link_click ?></td>
                    <td><?= $ban->time_start ?></td>
                    <td>
                      <img onclick="get_banner_by_id(<?= $ban->banner_id ?>)" src="<?= base_url() ?>assets/icons/edits.jpg" width="30%" alt="" style="cursor:pointer;">
                      <img onclick="delete_banner(<?= $ban->banner_id ?>)" src="<?= base_url() ?>assets/icons/trash.png" width="30%" alt=""  style="cursor:pointer;">
                    </td>
                  </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>

        <!-- ADD BANNER-->
        <div id="add-banner" class="row" style="padding:30px;display:none;">
          <div class="title"></div>
          <form id="form-add-banner" method="post" action="<?= base_url() ?>banner/ajax_add" enctype="multipart/form-data">
            <table>
                <tr>
                  <td>Jenis/Posisi Banner</td>
                  <td>
                    <select id="bannertype" name="banner_type_id">
                      <option id="option" value="">--Pilih Posisi Banner--</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Image Banner</td>
                  <td>
                    <input class="input input-location" type="file" name="img_banner" id="file" class="file-input" />
                  </td>
                </tr>
                <tr>
                  <td>Link Click</td>
                  <td><input class="input input-location"  type="text" name="link_click" value=""></td>
                </tr>
                <tr>
                  <td>Deskripsi Banner</td>
                  <td><textarea class="input input-location" name="description" rows="8" cols="80"></textarea></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <button type="submit" name="submit" id="save-banner">Save</button>
                    <button type="reset" >Cancel</button>
                    <a href="<?= base_url() ?>banner">Kembali</a>
                  </td>
                  </tr>
            </table>
          </form>
        </div>
        <!-- END OF ADD BANNER -->


        <!-- EDIT BANNER-->
        <div id="edit-banner" class="row" style="padding:30px;display:none;">
          <div class="title"></div>
          <form id="form-edit-banner" method="post" action="<?= base_url() ?>banner/ajax_update_banner" enctype="multipart/form-data">
            <input type="hidden" name="banner_id" value="">
            <table width="100%">
                <tr>
                  <td>IMAGE BANNER</td>
                  <td>
                    <img id="img" width="10%" src="" alt=""><br>
                    <input type="file" name="img_banner" value="">
                  </td>
                </tr>
                <tr>
                  <td>Jenis/Posisi Banner</td>
                  <td>
                    <select name="banner_type_id" id="banner_type_id">
                      <?php foreach($bannertype as $btype){ ?>
                      <option value="<?=$btype->banner_type_id ?>"><?=$btype->type ?></option>
                    <?php } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>LINK</td>
                  <td><input type="text" value="" name="link_click"></td>
                </tr>
                <tr>
                  <td>DESCRIPTION</td>
                  <td><textarea id="description" name="description"></textarea></td>
                </tr>
                <tr><td colspan="2">
                    <?php echo form_submit('submit','Simpan');?>
                    <?php echo anchor('banner','Back');?></td></tr>
            </table>
          </form>
        </div>
        <!-- END OF EDIT BANNER -->

      </div>
  </div>
  <!-- END OF LIST PTODUCT 1-->


</div>

</div>
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/jquery/jquery.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/datatables/jquery.dataTables.js'?>"></script>
