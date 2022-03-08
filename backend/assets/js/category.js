$(document).ready(function(){
  $('#category').dataTable();
});

function add_category() {
  save_method = 'add';
  $('#data-cat').hide();
  $('#add-cat').fadeIn();
}

function get_category_by_id(id)   {
  save_method = 'update';
  api_img = 'http://localhost/serviceadmin/uploads/category/';
  $.ajax({
    url : "<?php echo base_url('category/ajax_get_category_by_id?id=')?>"+id,
    type: "GET",
    dataType: "JSON",
    success: function(data)  {
        // console.log(data[0].icon);
        $('[name="product_category_id"]').val(data[0].product_category_id);
        $("#img").attr("src", api_img+data[0].icon);
        $('[name="product_category_name"]').val(data[0].product_category_name);

        $('#data-cat').hide();
        $('#edit-cat').fadeIn();
        $('#edit-cat .title').html('<h2>Edit Category</h2>');
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert('Error get data from ajax');
    }
  });
}




$(document).ready(function (e){

  $("#form-add-category").on('submit',(function(e){
    e.preventDefault();
    console.log(this);
    // Get form
    //var form = $('#form-edit')[0];
    //console.log('--> ',form);
    var formData = new FormData(this);
    $.ajax({
      type: "POST",
      enctype: 'multipart/form-data',
      url: $(this).attr('action'),
      data:formData,
      contentType: false,
      cache: false,
      processData:false,
      success: function(data){
         console.log(data);
         location.reload();
      },
      error: function(){}
    });
  }));


  $("#form-edit-category").on('submit',(function(e){
    e.preventDefault();
    console.log(this);
    // Get form
    //var form = $('#form-edit')[0];
    //console.log('--> ',form);
    var formData = new FormData(this);
    $.ajax({
      type: "POST",
      enctype: 'multipart/form-data',
      url: $(this).attr('action'),
      data:formData,
      contentType: false,
      cache: false,
      processData:false,
      success: function(data){
         console.log(data);
         location.reload();
      },
      error: function(){}
    });
  }));

});


function delete_category(id) {
  if(confirm('Yakin Ingin Hapus Data Id '+ id + '?'))
  {
    // ajax delete data from database
      $.ajax({
        url : "<?php echo site_url('category/ajax_delete?id=')?>"+id,
        type: "GET",
        data: id,
        dataType: "JSON",
        success: function(data)   {
           console.log(data);
           if(data.code == 200){
             alert(data.message);
             location.reload();
           }else{
            alert('Terjadi kesalahan');
           }
           //alert('Data id ' + id + ' Berhasil Di Hapus');
           //location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error deleting data');
        }
    });

  }
}
