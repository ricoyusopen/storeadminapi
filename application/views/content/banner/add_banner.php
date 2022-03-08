      <div class="col-desk-9 col-sm-9">
        
        <div class="row" style="padding:30px;">

          <form id="form_banner" method="post" action="<?= base_url()?>banner/create" enctype="multipart/form-data">
          <table>
              <tr>
                <td>Jenis/Posisi Banner</td>
                <td>
                  <select name="banner_type_id">
                    <option value="">--Pilih Posisi Banner--</option>
                  <?php
                  foreach ($bannertype as $b){
                      echo "<option value='$b->banner_type_id'>$b->type</option>";
                  }
                  ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Image Banner</td>
                <td>
                  <input class="input input-location" type="file" name="img_banner" id="file_upload" class="file-input" />
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
                  <?php echo anchor('banner','Kembali');?>
                </td>
                </tr>
          </table>
          </form>

        </div>
      </div>
  </div>
  <!-- END OF LIST PTODUCT 1-->


</div>

</div>
</div>
