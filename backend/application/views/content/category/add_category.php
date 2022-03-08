      <div class="col-desk-9 col-sm-9">
        <div class="row" style="padding:30px;">
          <form id="form-add" method="post" action="<?= base_url()?>category/create" enctype="multipart/form-data">
          <table>
              <tr>
                <td>Kategori</td>
                <td><input class="input input-location"  type="text" name="product_category_name" value=""></td>
              </tr>
              <tr>
                <td>Ikon Kategori</td>
                <td>
                  <input class="input input-location" type="file" name="icon" id="file_upload" class="file-input" />
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <button type="submit" name="submit" id="save-category">Save</button>
                  <button type="reset" >Cancel</button>
                  <?php echo anchor('category','Kembali');?>
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
