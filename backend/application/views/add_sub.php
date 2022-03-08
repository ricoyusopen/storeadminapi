<?php
$id = isset($_REQUEST['idcat']) ? $_REQUEST['idcat'] : '' ;
// $sql ="SELECT product_category_name FROM product_categories WHERE product_category_id='$id'";
// $query = $this->db->query($sql)->row();
$this->load->helper('helper');
$query = ambilCategory($id);


 ?>
<div style="padding:20px;margin-left:100px;margin-top:10px;background-color:rgb(0, 175, 233);width:380px;color:#FFF;">
  <div style="float:right;">
    <button id="btn-close" type="button" name="button">(X)close</button>
  </div>
  <table>
    <tr>
      <td><?= $query->product_category_name ?></td>
    </tr>
      <tr>
        <td>Sub Kategori</td>
        <td><input class="input input-location"  type="text" name="sub_category_name" value=""></td>
      </tr>
      <tr>
        <td>Ikon</td>
        <td>
          <input class="input input-location" type="file" name="icon" id="file_upload" class="file-input" />
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <button type="submit" name="submit" id="save-category">Save</button>
          <button type="reset" >Cancel</button>
        </td>
      </tr>
  </table>
</div>
