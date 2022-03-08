      <div class="col-desk-9 col-sm-9">

        <div class="row" style="padding:30px;">

          <?php echo form_open_multipart('category/edit');?>
          <?php echo form_hidden('product_category_id',$category[0]->product_category_id);?>

          <table width="100%">
              <tr>
                <td width="20%">Icon</td>
                <td>
                  <img width="10%" src="<?= API_IMG.'category'.$category[0]->icon ?>" alt="">
                  <input type="file" name="icon" value="">
                </td>
              </tr>
              <tr>
                <td>Kategori</td>
                <td><?php echo form_input('product_category_name',$category[0]->product_category_name);?></td>
              </tr>
              <tr>
                <td colspan="2">
                  <?php echo form_submit('submit','Simpan');?>
                  <?php echo anchor('category','Back');?>
                </td>
              </tr>
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
