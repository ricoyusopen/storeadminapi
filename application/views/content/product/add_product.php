      <div class="col-desk-9 col-sm-9">

        <div class="row" style="padding:30px;">
          <?php
            $time = date("Y-m-d H:i:s");
           ?>
          <form id="form_category" method="post" action="<?= base_url()?>products/create" enctype="multipart/form-data">
          <table>
              <tr>
                <td>Kategori Produk</td>
                <td>
                  <select name="id_kategori">
                    <option value="">--Pilih Kategori Produk--</option>
                  <?php
                  foreach ($kategori as $k){
                      echo "<option value='$k->product_category_id'>$k->product_category_name</option>";
                  }
                  ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Nama Produk</td>
                <td>
                  <input placeholder="Nama Produk" class="input input-location"  type="text" name="nm_produk" value="">
                  <input type="hidden" name="time_start" value="<?= $time ?>">
                </td>
              </tr>
              <tr>
                <td>Deskripsi Produk</td>
                <td>
                  <textarea name="deskripsi" rows="5" cols="30"></textarea>
                </td>
              </tr>
              <tr>
                <td>Harga</td>
                <td>
                  <input placeholder="Harga Produk" class="input input-location"  type="text" name="harga" value="">
                </td>
              </tr>
              <tr>
                <td>Kondisi</td>
                <td>
                  <input type="radio" name="kondisi" value="Baru"> Baru
                  <input type="radio" name="kondisi" value="Bekas"> Bekas
                </td>
              </tr>
              <tr>
                <td>Berat</td>
                <td>
                  <input placeholder="Berat Produk" class="input input-location"  type="text" name="berat" value=""> Kg
                </td>
              </tr>
              <tr>
                <td>Merek</td>
                <td><input placeholder="Merek Produk" class="input input-location"  type="text" name="merek" value=""></td>
              </tr>
              <tr>
                <td>Diskon</td>
                <td><input placeholder="Diskon Produk" class="input input-location"  type="text" name="diskon" value=""></td>
              </tr>
              <tr>
                <td>Produk Variant</td>
                <td><input placeholder="Produk Variant" class="input input-location"  type="text" name="id_varian" value=""></td>
              </tr>
              <tr>
                <td>Image Produk</td>
                <td>
                  <?php for ($i=1; $i <=4 ; $i++) :?>
                    <input type="file" name="img<?php echo $i;?>"><br/>
                <?php endfor;?>
                </td>
              </tr>
              <!-- <tr>
                <td>Image 2</td>
                <td><input type="file" name="img2" value=""> </td>
              </tr>
              <tr>
                <td>Image 3</td>
                <td><input type="file" name="img3" value=""> </td>
              </tr>
              <tr>
                <td>Image 4</td>
                <td><input type="file" name="img4" value=""> </td>
              </tr> -->
              <tr>
                <td colspan="2">
                  <button type="submit" name="submit" id="save-category">Save</button>
                  <button type="reset" >Cancel</button>
                  <?php echo anchor('products','Kembali');?>
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
