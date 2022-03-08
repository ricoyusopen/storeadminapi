$('#banner').dataTable(); //load data banner

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

banner_type(); //load banner_type

function add_banner() {
  save_method = 'add';
  $('#data-banner').hide();
  $('#add-banner').fadeIn();
  $('#add-banner .title').html('<h2>Add Banner</h2>');
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
