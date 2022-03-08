<div style="padding:30px;margin-left:300px;margin-top:20px;background-color:blue;width:380px;">
  <form id="form_sub" method="post" action="<?= base_url()?>sub_category/create" enctype="multipart/form-data">
  <table>
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
