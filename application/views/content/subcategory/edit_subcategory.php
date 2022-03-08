      <div class="col-desk-9 col-sm-9">

        <div class="row" style="padding:30px;">

          <?php echo form_open('sub_category/edit');?>
          <?php echo form_hidden('product_sub_category_id',$subcategory[0]->product_sub_category_id);?>

          <table width="100%">
            <tr>
              <td>Kategori Produk</td>
              <td>
                <select name="product_sub_category_id">
                  <option value="">--Pilih Kategori Produk--</option>
                <?php

                foreach ($category as $c){
                    echo "<option value='$c->product_category_id' ";
                    echo $subcategory[0]->product_sub_category_id==$c->product_sub_category_id?'selected':'';
                    echo ">$c->product_category_name</option>";
                }


                ?>
                </select>

              </td>
            </tr>
            <tr><td>Id Sub Kategori</td><td><?php echo form_input('product_sub_category_id',$subcategory[0]->product_sub_category_id);?></td></tr>
            <tr><td>Sub Kategori</td><td><?php echo form_input('sub_category_name',$subcategory[0]->sub_category_name);?></td></tr>
            <tr>
              <td width="20%">Icon</td>
              <td>
                <img width="10%"src="<?= API_IMG.'category/'.$subcategory[0]->icon ?>" alt="">
                <input type="file" name="icon" value="">
                </td>
            </tr>


            <tr><td colspan="2">
                <?php echo form_submit('submit','Simpan');?>
                <?php echo anchor('sub_category','Back');?></td>
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
