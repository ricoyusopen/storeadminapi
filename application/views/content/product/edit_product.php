      <div class="col-desk-9 col-sm-9">

        <div class="row" style="padding:30px;">

          <?php echo form_open_multipart('products/edit');?>
          <?php echo form_hidden('id_produk',$product[0]->product_id);?>

          <form id="form_category" method="post" action="<?= base_url()?>products/edit" enctype="multipart/form-data">
            <table>
                <tr>
                  <td>Kategori Produk</td>
                  <td>
                    <select name="id_kategori">
                    <?php
                    foreach ($category as $c){
                        echo "<option value='$c->product_category_id' ";
                        echo $product[0]->product_category_id==$c->product_category_id?'selected':'';
                        echo "$c->product_category_name</option>";
                    }
                    ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Nama Produk</td>
                  <td><?php echo form_input('nm_produk',$product[0]->product_name);?></td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td>
                    <?php echo form_input('harga',$product[0]->price);?>
                  </td>
                </tr>
                <tr>
                  <td>Kondisi</td>
                  <td>
                    <input type="radio" name="kondsi" value="Baru"> Baru
                    <input type="radio" name="kondsi" value="Bekas"> Bekas
                  </td>
                </tr>
                <tr>
                  <td>Berat</td>
                  <td>
                    <?php echo form_input('kondisi',$product[0]->condition);?>
                  </td>
                </tr>
                <tr>
                  <td>Merek</td>
                  <td><?php echo form_input('merek',$product[0]->brand);?></td>
                </tr>
                <tr>
                  <td>Diskon</td>
                  <td><?php echo form_input('diskon',$product[0]->discount);?></td>
                </tr>
                <tr>
                  <td>Produk Variant</td>
                  <td><?php echo form_input('variant',$product[0]->product_variant_id);?></td>
                </tr>
                <tr>
                  <td>Image 1</td>
                  <td>
                    <input type="file" name="img1" value=""><br>
                    <img width="10%" src="<?= API_IMG.'products/'.$product[0]->image1 ?>" alt="">
                  </td>
                </tr>
                <tr>
                  <td>Image 2</td>
                  <td>
                    <input type="file" name="img2" value=""><br>
                    <img width="10%" src="<?= API_IMG.'products/'.$product[0]->image2 ?>" alt="">
                  </td>
                </tr>
                <tr>
                  <td>Image 3</td>
                  <td>
                    <input type="file" name="img3" value=""><br>
                    <img width="10%" src="<?= API_IMG.'products/'.$product[0]->image3 ?>" alt="">
                  </td>
                </tr>
                <tr>
                  <td>Image 4</td>
                  <td>
                    <input type="file" name="img4" value=""><br>
                    <img width="10%" src="<?= API_IMG.'products/'.$product[0]->image4 ?>" alt="">
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <button type="submit" name="submit" id="save-category">Save</button>
                    <button type="reset" >Cancel</button>
                    <?php echo anchor('products','Kembali');?>
                  </td>
                </tr>

            </table>
            </form>
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
