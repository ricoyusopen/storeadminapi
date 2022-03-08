      <div class="col-desk-9 col-sm-9">

        <div class="row" style="padding:30px;">

          <?php echo form_open_multipart('banner/edit');?>
          <?php echo form_hidden('banner_id',$banner[0]->banner_id);?>

          <table width="100%">
              <tr>
                <td>IMAGE BANNER</td>
                <td>
                  <img width="40%"src="<?= API_IMG.'banner/'.$banner[0]->image_name ?>" alt="">
                  <input type="file" name="img_banner" value="">
                </td>
              </tr>
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
              <tr><td>LINK</td><td><?php echo form_input('link_click',$banner[0]->link_click);?></td></tr>
              <tr><td>DESCRIPTION</td><td><?php echo form_textarea('description',$banner[0]->description);?></td></tr>
              <tr><td colspan="2">
                  <?php echo form_submit('submit','Simpan');?>
                  <?php echo anchor('banner','Back');?></td></tr>
          </table>
          <?php
          echo form_close();
          ?>
        </div>
      </div>
  </div>
  <!-- END OF LIST PTODUCT 1-->


</div>

</div>
</div>
