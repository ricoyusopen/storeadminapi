      <div class="col-desk-9 col-sm-9">

        <div class="row" style="padding:30px;">

          <?php echo form_open('member/edit');?>
          <?php echo form_hidden('member_id',$profile[0]->key_name);?>

          <table width="100%">
              <tr><td width="30%">Nama Informasi</td><td><?php echo form_input('full_name',$profile[0]->key_name);?></td></tr>
              <?php
              if($profile[0]->key_name!="ICON"){
                ?>
              <tr>
                <td width="70%">Keterangan</td>
                <td>
                  <textarea name="value_name" rows="8" cols="80"><?= $profile[0]->value_name ?></textarea>
                </td>
              </tr>
                <?php }else{ ?>
              <tr>
                <td width="80%">Icon</td>
                <td>
                  <input type="file" name="icon" value="">
                </td>
              </tr>
            <?php } ?>
              <tr><td colspan="2">
                  <?php echo form_submit('submit','Simpan');?>
                  <?php echo anchor('profile','Back');?></td></tr>
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
