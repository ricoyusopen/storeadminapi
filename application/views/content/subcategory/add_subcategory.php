      <div class="col-desk-9 col-sm-9">

        <div class="row" style="padding:30px;">

          <form id="form_category" method="post" action="<?= base_url()?>sub_category/create" enctype="multipart/form-data">
          <table>
              <tr>
                <td>Kategori Produk</td>
                <td>
                  <select name="product_category_id">
                    <option value="">--Pilih Kategori Produk--</option>
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
                <td><input class="input input-location"  type="text" name="sub_category_name" value=""></td>
              </tr>

              <tr>
                <td>Ikon Sub Kategori</td>
                <td>
                  <input class="input input-location" type="file" name="icon" id="file_upload" class="file-input" />
                </td>
              </tr>
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
      </div>
  </div>
  <!-- END OF LIST PTODUCT 1-->


</div>

</div>
</div>
