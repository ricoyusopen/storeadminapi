banner_type();
var save_method;
var table;
var api_img;

function add_category() {
  save_method = 'add';
  $('#data-cat').hide();
  $('#add-cat').fadeIn();
}

function add_banner() {
  save_method = 'add';
  $('#data-banner').hide();
  $('#add-banner').fadeIn();
  $('#add-banner .title').html('<h2>Add Banner</h2>');
}

function add_product() {
  save_method = 'add';
  $('#data-product').hide();
  $('#add-product').fadeIn();
  $('#add-product .title').html('<h2>Add Product</h2>');
}

// function add_bannerOLD() {
//     save_method = 'add';
//     $.ajax({
//         url : "",
//         type: "GET",
//         dataType: "JSON",
//         success: function(data)  {
//             console.log();
//             var html = '';
//             var i;
//             for(i=0; i<data.length; i++){
//                 html += '<option value='+data[i].banner_type_id+'>'+data[i].type+'</option>';
//             }
//             $('#bannertype').html(html);
//             $('#data-banner').hide();
//             $('#add-banner').fadeIn();
//             $('#add-banner .title').html('<h2>Add Banner</h2>');
//         },
//         error: function (jqXHR, textStatus, errorThrown)
//         {
//             alert('Error get data from ajax');
//         }
//     });
// }

function banner_type() {
    save_method = 'add';
    $.ajax({
        url : "<?php echo base_url('banner/add')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)  {
            console.log();
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
                html += '<option value='+data[i].banner_type_id+'>'+data[i].type+'</option>';
            }
            $('#bannertype').html(html);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function category() {
    save_method = 'add';
    $.ajax({
        url : "<?php echo base_url('category')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)  {
            console.log();
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
                html += '<option value='+data[i].product_category_id+'>'+data[i].product_category_name+'</option>';
            }
            $('#id_kategori').html(html);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}


// function save() {
//   $('#pesan_kirim').html('Loading ...');
//   $('#pesan_kirim').slideDown('slow');
//   var product_category_name   = $('[name="product_category_name"]').val();
//   // var jenis  = $('input[name=jenis]:checked').val();
//   // var status   = $('input[name=status]:checked').map(function(){
//   //           return $(this).val();
//   //        }).get();
//   var fd = new FormData();
//   var files = $('#file')[0].files[0];
//   fd.append('file',files);
//
//
//     $.ajax({
//       url : "<?= base_url('category/ajax_create')?>",
//       type: "POST",
//       data: 'product_category_name='+product_category_name+'&icon='+file,
//       dataType: "JSON",
//       success: function(data)  {
//         // console.log(data[0].product_category_name);
//          $('#add-cat').hide();
//         location.reload();
//       },
//       error: function (jqXHR, textStatus, errorThrown)  {
//           alert('Error adding / update data');
//       }
//   });
// }


// function save_banner() {
//   var banner_type_id = $('[name="banner_type_id"]').val();
//   var link_click     = $('[name="link_click"]').val();
//   var description    = $('[name="description"]').val();
//   var fd = new FormData();
//   var files = $('#file')[0].files[0];
//   fd.append('file',files);
//     $.ajax({
//       url : "",
//       type: "POST",
//       data: 'product_category_name='+product_category_name+'&icon='+file,
//       dataType: "JSON",
//       success: function(data)  {
//         // console.log(data[0].product_category_name);
//          $('#add-cat').hide();
//         location.reload();
//       },
//       error: function (jqXHR, textStatus, errorThrown)  {
//           alert('Error adding / update data');
//       }
//   });
// }


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


function get_banner_by_id(id)   {
  save_method = 'update';
  api_img = 'http://localhost/serviceadmin/uploads/banner/';
  $.ajax({
    url : "<?php echo base_url('banner/ajax_get_banner_by_id?id=')?>"+id,
    type: "GET",
    dataType: "JSON",
    success: function(data)  {
      console.log(data[0].image_name);
        $('[name="banner_id"]').val(data[0].banner_id);
        $("#img").attr("src", api_img+data[0].image_name);
        $("#banner_type_id").val(data[0].banner_type_id);
        $('[name="description"]').val(data[0].description);
        $('[name="link_click"]').val(data[0].link_click);

        $('#data-banner').hide();
        $('#edit-banner').fadeIn();
        $('#edit-banner .title').html('<h2>Edit Banner</h2>');
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

  // $("#icon-file").click(function(){
  //       var fd = new FormData();
  //       var files = $('#icon-file')[0].files[0];
  //       fd.append('icon',files);
  //       $("#icon-file").attr("src",files);
  //       $(".preview img").show();
  //   });

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



  $("#form-add-banner").on('submit',(function(e){
    e.preventDefault();
    console.log(this);

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

  $("#form-edit-banner").on('submit',(function(e){
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

function delete_banner(id) {
  if(confirm('Yakin Ingin Hapus Data Id '+ id + '?'))
  {
    // ajax delete data from database
      $.ajax({
        url : "<?php echo site_url('banner/ajax_delete?id=')?>"+id,
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
