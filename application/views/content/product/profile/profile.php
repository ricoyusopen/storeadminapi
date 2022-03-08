<div class="col-desk-9 col-sm-9">

        <div id="data-profile" class="row" style="padding:30px;">
            <table class="display" id="profile" width="100%" style="text-align:left;font-size:14px;">
                <thead>
                    <tr>
                        <th width="15%">Nama Informasi</th>
                        <th width="15%">Keterangan Informasi</th>
                        <th width="15%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php    foreach ($profile as $pro) {     ?>
                  <tr>
                    <td><?= $pro->key_name ?></td>
                    <td><?= $pro->value_name ?></td>
                    <td>
                      <button onclick="get_profile_by_keyname(<?= $pro->key_name ?>)" type="button" name="button">Edit</button>
                      <button onclick="delete_profile(<?= $pro->key_name ?>)" type="button" name="button">Delete</button>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- EDIT PRODILE -->
        <div id="edit-profile" class="row" style="padding:30px;display:none;">
          <form id="form-edit-profile" class="" action="<?= base_url() ?>profile/ajax_update_profile" method="post" enctype="multipart/form-data">
          <input type="hidden" name="product_category_id" value="">
          <div class="title"> </div>
          <table width="100%">
              <tr>
                <td width="30%">
                  Nama Informasi
                </td>
                <td>
                  <input id="full_name" type="text" name="full_name" value="">
                  <?php //echo form_input('full_name',$profile[0]->key_name);?>
                </td>
              </tr>
              <?php
              if($profile[0]->key_name!="ICON"){ ?>
              <tr>
                <td width="70%">Keterangan</td>
                <td>
                  <textarea id="value_name" name="value_name" rows="8" cols="80"></textarea>
                </td>
              </tr>
              <?php }else{ ?>
              <tr>
                <td width="80%">Icon</td>
                <td>
                  <img id="img" src="" alt="" width="30%">
                  <input id="file" type="file" name="icon" value="">
                </td>
              </tr>
            <?php } ?>
              <tr>
                <td colspan="2">
                  <button id="idprof" type="submit" name="button">Simpan</button>
                  <button type="reset" name="button">Cancel</button>
                  <a href="<?= base_url() ?>profile">Back</a>
                </td>
              </tr>
          </table>
          </form>
        </div>
        <!-- END OF EDIT PROFILE -->
      </div>
  </div>
  <!-- END OF LIST PTODUCT 1-->


</div>

</div>
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/jquery/jquery.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/datatables/jquery.dataTables.js'?>"></script>
