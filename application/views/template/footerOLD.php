<script type="text/javascript" src="<?php echo base_url().'assets/jquery/jquery.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/datatables/jquery.dataTables.js'?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#products').dataTable();
        $('#banner').dataTable();
        $('#member').dataTable();
        $('#category').dataTable();
        $('#profile').dataTable();


        $('#adddata').click(function(){
          $('#list-category').slideToggle();

        });

          //var baseURL =  "<?php echo base_url();?>";
          // jQuery(function($){
          //   $('span.catname').click(function(ev){
          //     ev.preventDefault();
          //     var  uid = $(this).data('id');
          //     $.get(baseURL + 'add_sub.php?idcat=' + uid, function(html){
          //       $('#sub .det').html(html);
          //       $('#detail').det('show', {backdrop: 'static'});
          //       });
          //   });
          // });
          //
          // $("#btn-close").click(function(){
          //   $("#sub").hide();
          // });


          // $("#save-category").click(function(){
      		// 	var data = $('.form-cat').serialize();
      		// 	$.ajax({
      		// 		type: 'POST',
      		// 		url: "category",
      		// 		data: data,
      		// 		success: function() {
      		// 			window.location.href;
      		// 		}
      		// 	});
      		// });






        // //fungsi tampil barang
        // function tampil_data_product(){
        //     $.ajax({
        //         type  : 'ajax',
        //         url   : '<?php echo base_url()?>product/data_product',
        //         async : false,
        //         dataType : 'json',
        //         success : function(data){
        //             var html = '';
        //             var i;
        //             for(i=0; i<data.length; i++){
        //                 html += '<tr>'+
        //                         '<td>'+data[i].barang_kode+'</td>'+
        //                         '<td>'+data[i].barang_nama+'</td>'+
        //                         '<td>'+data[i].barang_harga+'</td>'+
        //                         '</tr>';
        //             }
        //             $('#show_product').html(html);
        //         }
        //
        //     });
        // }

    });



    // $(document).on("click", "save-banner", function () {
    // formData = new FormData(document.forms.namedItem("file_upload_form"));
    // $.ajax({
    //     url: base_url + '/banner/create',
    //     type: 'POST',
    //     data: formData,
    //     cache: false,
    //     contentType: false,
    //     processData: false,
    //     dataType: 'json',
    //     success: function (data) {
    //         if (data.Result == "Success") {
    //             console.log("File uploaded successfully");
    //         } else {
    //             console.log("Server problem try again");
    //         }
    //
    //     }
    // });

</script>
<script type="text/javascript">
banner_type();
category();
subcategory();
var save_method;
var table;
var api_img;

function add_category() {
  save_method = 'add';
  $('#data-cat').hide();
  $('#add-cat').fadeIn();
}

// function add_subcategory() {
//   save_method = 'add';
//   $('#data-subcat').hide();
//   $('#add-subcat').fadeIn();
// }

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
       }
        // },
        // error: function (jqXHR, textStatus, errorThrown)
        // {
        //     alert('Error get data from ajax');
        // }
    });
}


function subcategory() {
    save_method = 'add';
    var idkat = $("#input_aktifasi").val();
    $.ajax({
        url : "<?php echo base_url('sub_category/add')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)  {
            console.log();
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
                html += '<option value=' + data[i].product_category_id + '>'+data[i].product_category_name+'</option>';
            }
            $('#id_kategori').html(html);
        }
        // },
        // error: function (jqXHR, textStatus, errorThrown)
        // {
        //     alert('Error get data from ajax');
        // }
    });
}


function category() {
    save_method = 'add';
    $.ajax({
        url : "<?php echo base_url('category/add')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)  {
            console.log();
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
                html += '<option value=' + data[i].product_category_id + '>'+data[i].product_category_name+'</option>';
            }
            $('#id_kategori').html(html);
        }
        // },
        // error: function (jqXHR, textStatus, errorThrown)
        // {
        //     alert('Error get data from ajax');
        // }
    });
}



$('#select_category_id, #select_category_edit').change(function(){
         var idkat = $(this).val();
         $.ajax({
             url    : "<?php echo base_url(); ?>" + "products/get_subcategory?id="+idkat,
             type   : "GET",
             dataType   : "JSON",
             // contentType : "application/json;",
             success: function(data){
               console.log(data);
               var html = '';
               var i ='';
               for(i=0; i<data.length; i++){
                   html += '<option value=' + data[i].product_category_id + '>'+data[i].product_category_name+'</option>';
               }
               $("#select_parent_id").html(html);
               $("#select_parent_edit").html(html);
                 // var result = JSON.parse(data);
                 // if(result.status == 'SUKSES'){
                 //   var dataKota = result.affect;
                 //   for(var i=0; i<dataKota.length; i++){
                 //     html += '<option value='+dataKota[i].ID+'>'+dataKota[i].NAME+'</option>';
                 //   }
                 //   $("#kd_kota").html(html);
                 // }
             },
             error: function(error){

             }
         });
         return false;
   });


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
function get_profile_by_keyname(keyname)   {
  save_method = 'update';
  $.ajax({
    url : "<?php echo base_url('profile/ajax_get_profile_by_keyname?keyname=')?>"+keyname,
    type: "GET",
    dataType: "JSON",
    success: function(data)  {
        // console.log(data[0].icon);
        $('[name="key_name"]').val(data[0].key_name);
        $('[name="value_name"]').val(data[0].value_name);

        $('#data-profile').hide();
        $('#edit-profile').fadeIn();
        $('#edit-profile .title').html('<h2>Edit Store Profile</h2>');
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert('Error get data from ajax');
    }
  });
}

function get_member_by_id(id)   {
  save_method = 'update';
  api_img = 'http://localhost/serviceadmin/uploads/member/';
  $.ajax({
    url : "<?php echo base_url('member/ajax_get_member_by_id?id=')?>"+id,

    type: "GET",
    dataType: "JSON",
    success: function(data)  {
        // console.log(data[0].icon);
        $("#img").attr("src", api_img+data[0].usr_img_name);
        $("#full_name").html(data[0].full_name);
        $("#email").html(data[0].email);
        $("#kontak").html(data[0].kontak);
        $("#join_date").html(data[0].join_date);


        $('#data-member').hide();
        $('#view-member').fadeIn();
        $('#view-member .title').html('<h2>Detail Member</h2>');
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert('Error get data from ajax');
    }
  });
}


function get_category_by_id(id)   {
  save_method = 'update';
  api_img = 'http://localhost/serviceadmin/uploads/category/';
  $.ajax({
    url : "<?php echo base_url('category/ajax_get_category_by_id?id=')?>"+id,
    type: "GET",
    dataType: "JSON",
    success: function(data)  {
        console.log(data[0].product_category_id);
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


function get_subcategory_by_id(id)   {

  api_img = 'http://localhost/serviceadmin/uploads/subcategory/';
  $.ajax({
    url : "<?php echo base_url('sub_category/ajax_get_subcategory_by_id?id=')?>"+id,
    type: "GET",
    dataType: "JSON",
    success: function(data)  {
         console.log(data[0].product_category_id);
        $('[name="product_category_id"]').val(data[0].product_category_id);
        $("#img_sub").attr("src", api_img+data[0].icon);
        $('[name="sub_category_name"]').val(data[0].product_category_name);
        $('#select_product_category').val(data[0].parent_category_id);
        $('#data-subcat').hide();
        $('#edit-subcat').fadeIn();
        $('#edit-subcat .title').html('<h2>Edit Sub Category</h2>');
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert('Error get data from ajax');
    }
  });
}


function add_subcategory(id)   {

  api_img = 'http://localhost/serviceadmin/uploads/category/';
  $.ajax({
    url : "<?php echo base_url('sub_category/get_category_for_add?id=')?>"+id,
    type: "GET",
    dataType: "JSON",
    success: function(data)  {
         console.log(data[0].product_category_id);
        $('[name="product_category_id"]').val(data[0].product_category_id);
        $("#img").attr("src", api_img+data[0].icon);
        $('#category_name').html(data[0].product_category_name);

        $('#data-subcat').hide();
        $('#add-subcat').fadeIn();
        $('#add-subcat .title').html('<h2>Tamba Sub Kategory</h2>');
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

function get_product_by_id(id)   {
  save_method = 'update';
  api_img = 'http://localhost/serviceadmin/uploads/products/';
  $.ajax({
    url : "<?php echo base_url('products/ajax_get_product_by_id?id=')?>"+id,
    type: "GET",
    dataType: "JSON",
    success: function(data)  {
      console.log(data[0].product_category_id);
        $('[name="product_id"]').val(data[0].product_id);
        $("#product_category_id").val(data[0].product_category_id);
        $("#img1").attr("src", api_img+data[0].image1);
        $("#img2").attr("src", api_img+data[0].image2);
        $("#img3").attr("src", api_img+data[0].image3);
        $("#img4").attr("src", api_img+data[0].image4);
        $('[name="product_name"]').val(data[0].product_name);
        $('[name="description"]').val(data[0].description);
        $('[name="price"]').val(data[0].price);
        $('[name="weight"]').val(data[0].weight);
        $('[name="brand"]').val(data[0].brand);
        $('[name="discount"]').val(data[0].discount);

        $('#data-product').hide();
        $('#edit-product').fadeIn();
        $('#edit-product .title').html('<h2>Edit Produk</h2>');
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



  $("#form-add-subcategory").on('submit',(function(e){
    e.preventDefault();
    console.log(this);
    //Get form
    // var form = $('#form-add-subcategory')[0];
    // console.log('--> ',form);
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
         // console.log(data);
         location.reload();
      },
      error: function(){}
    });
  }));



  $("#form-edit-subcategory").on('submit',(function(e){
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


  $("#form-add-product").on('submit',(function(e){
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
         // location.reload();
      },
      error: function(){}
    });
  }));




});

function delete_banner(id) {
  if(confirm('Yakin Ingin Hapus Banner dengan Id '+ id + '?'))
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


function delete_subcategory(id) {
  if(confirm('Yakin Ingin Hapus Data ID => '+ id + '?'))
  {
    // ajax delete data from database
      $.ajax({
        url : "<?php echo site_url('sub_category/ajax_delete?id=')?>"+id,
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
  if(confirm('Yakin Ingin Hapus Data?'))
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



function delete_product(id) {
  if(confirm('Yakin Ingin Hapus Data?'))
  {
    // ajax delete data from database
      $.ajax({
        url : "<?php echo site_url('products/ajax_delete?id=')?>"+id,
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
</script>


</body>
</html>
