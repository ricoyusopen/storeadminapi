<!-- footer -->
<div class="row">
    <div class="col-desk-12 col-md-12 col-sm-12">
        <div class="footer-top">
            <div class="footer-top-content">
                <div class="row">
                    <div class="col-desk-3 col-sm-2">
                        <img class="logo-metro" src="<?=base_url()?>assets/icons/metro-multi-payment.PNG" alt="logo metro multipayment">
                    </div>
                    <div class="col-desk-9 col-sm-10">
                        <div class="relative-position">
                            <span class="label-footer">Semua ada dan terpercaya</span>
                            <span class="social-media-label">Temukan kami di</span>
                            <div class="social-media-link-parent">
                                <a class="social-media-link" href=""><img src="<?=base_url()?>assets/icons/facebook-logo.svg" alt=""></a>
                                <a class="social-media-link" href=""><img src="<?=base_url()?>assets/icons/twitter-logo.svg" alt=""></a>
                                <a class="social-media-link" href=""><img src="<?=base_url()?>assets/icons/youtube.svg" alt=""></a>
                                <a class="social-media-link" href=""><img src="<?=base_url()?>assets/icons/instagram.svg" alt=""></a>
                                <a class="social-media-link" href=""><img src="<?=base_url()?>assets/icons/linkedin-logo.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / -->
<div class="row">
    <div class="col-desk-12 col-md-12 col-sm-12">
        <div class="footer-botom">
            <div class="footer-content">
                <div class="row">
                    <div class="col-desk-3 col-sm-3">
                        <span class="text-title">Metro Multistore</span>
                        <table class="footer-table">
                            <tr>
                                <td><img class="img-medium" src="<?=base_url()?>assets/icons/address.svg" alt=""></td>
                                <td>Jl. Caman Raya No. 177, Jatibening, Pondok Gede, Bekasi Kota</td>
                            </tr>
                            <tr>
                                <td><img class="img-medium" src="<?=base_url()?>assets/icons/phone-black.svg" alt=""></td>
                                <td>Phone : (021) 850-5555</td>
                            </tr>
                            <tr>
                                <td><img class="img-medium" src="<?=base_url()?>assets/icons/email-black.svg" alt=""></td>
                                <td>metromultistore@metroreload.biz</td>
                            </tr>
                        </table>
                        <span class="text-title">Temukan Kami di</span><br>
                        <a class="social-media-link" href=""><img src="<?=base_url()?>assets/icons/facebook-logo.svg" alt=""></a>
                        <a class="social-media-link" href=""><img src="<?=base_url()?>assets/icons/twitter-logo.svg" alt=""></a>
                        <a class="social-media-link" href=""><img src="<?=base_url()?>assets/icons/youtube.svg" alt=""></a>
                        <a class="social-media-link" href=""><img src="<?=base_url()?>assets/icons/instagram.svg" alt=""></a>
                        <a class="social-media-link" href=""><img src="<?=base_url()?>assets/icons/linkedin-logo.svg" alt=""></a>
                    </div>
                    <div class="col-desk-3 col-sm-3">
                        <span class="text-title">Product</span><br>
                        <table class="table-product-footer">
                            <tr><td><a class="text-footer-link" href="">Promotion</a></td></tr>
                            <tr><td><a class="text-footer-link" href="">New Products</a></td></tr>
                            <tr><td><a class="text-footer-link" href="">Best Sales</a></td></tr>
                            <tr><td><a class="text-footer-link" href="">Login</a></td></tr>
                            <tr><td><a class="text-footer-link" href="">My Account</a></td></tr>
                        </table>
                    </div>
                    <div class="col-desk-3 col-sm-3">
                        <span class="text-title">Our Company</span><br>
                        <table class="table-product-footer">
                            <tr><td><a class="text-footer-link" href="">Delivery</a></td></tr>
                            <tr><td><a class="text-footer-link" href="">Legal Notice</a></td></tr>
                            <tr><td><a class="text-footer-link" href="">Term And Conditions</a></td></tr>
                            <tr><td><a class="text-footer-link" href="">About Us</a></td></tr>
                            <tr><td><a class="text-footer-link" href="">Secure Payment</a></td></tr>
                            <tr><td><a class="text-footer-link" href="">Contact Us</a></td></tr>
                            <tr><td><a class="text-footer-link" href="">Store</a></td></tr>
                        </table>
                    </div>
                    <div class="col-desk-3 col-sm-3">
                        <span class="text-title">Our Company</span><br>
                        <div class="footer-our-company">
                            <span class="text-footer-link">Subscribe To Out Newsletter And Join Other</span><br>
                            <form action="">
                                <input class="input-email-subscribe" type="email" placeholder="Your email"><br>
                                <div class="to-right">
                                    <button class="subscribe-button">Subscribe</button>
                                </div>
                            </form>
                        </div>
                        <table>
                            <tr>
                                <td><span class="text-footer-link">Payment</span></td>
                                <td>
                                    <img class="img-small" src="<?=base_url()?>assets/icons/visa-pay-logo.svg" alt="">
                                    <img class="img-small" src="<?=base_url()?>assets/icons/master-card-logo.svg" alt="">
                                    <img class="img-small" src="<?=base_url()?>assets/icons/credit-card.svg" alt="">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url().'assets/jquery/jquery.min.js'?>"></script>
<script src="<?php echo base_url() ?>assets/js-sha1/sha1.min.js"></script>
<script type="text/javascript">

$(document).ready(function (){
  $('.img-produk').click(function(){
    var srcimg = this.src;
    // alert(srcimg);
    $(".main-image").attr("src", srcimg);
  });

  $('#to-login, #login').click(function(){
    $(".err_msg").hide();
    $("#box-register").hide();
    $("#box-login").slideToggle();
  });

  $('#to-daftar, #register').click(function(){

    $(".err_msg").hide();
    $("#box-login").hide();
    $("#box-register").slideToggle();
  });

  $('.forgot').click(function(){
    $("#box-login").hide();
    $("#box-register").hide();
    $("#box-forgot").slideToggle();
  });

  $('.cancel').click(function(){
    $("#box-register").slideUp();
    $("#box-forgot").slideUp();
    $("#box-login").slideUp();
  });



  var regex=  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

  function getDateTime() {
      var now     = new Date();
      var year    = now.getFullYear();
      var month   = now.getMonth()+1;
      var day     = now.getDate();
      var hour    = now.getHours();
      var minute  = now.getMinutes();
      var second  = now.getSeconds();
      if(month.toString().length == 1) {
          var month = '0'+month;
      }
      if(day.toString().length == 1) {
          var day = '0'+day;
      }
      if(hour.toString().length == 1) {
          var hour = '0'+hour;
      }
      if(minute.toString().length == 1) {
          var minute = '0'+minute;
      }
      if(second.toString().length == 1) {
          var second = '0'+second;
      }
      var dateTime = year+'/'+month+'/'+day+' '+hour+':'+minute+':'+second;
      return dateTime;
  }

  //LOGIN
  $('#submit-login').click(function(event){
      event.preventDefault();
      var id          = $("#id").val();
          password    = $("#password").val();
          time        = getDateTime();
          hash        = sha1(id + password + time);

      if(id=='' && password=='')	{
        // alert('kosong');
				$(".err_msg").fadeIn();
				$(".msg").html("Anda Belum Memasukan Apapun!");
        document.getElementById('id').focus();
      } else if (id=='') {
        $(".err_msg").fadeIn();
        $(".msg").html("ID/Username Masih Kosong!");
        document.getElementById('id').focus();
      } else if (password=='') {
        $(".err_msg").fadeIn();
        $(".msg").html("Anda Belum Memasukan Password!");
        document.getElementById('password').focus();
      } else  {
         regexResult = password.match(regex)?1:0;
         $.ajax({
             type: "POST",
             url: "<?= base_url() ?>member/cek_login",
             data :JSON.stringify({
                     id          : id,
                     password    : password,
                     time        : time,
                     hash        : hash,
                     regexResult : regexResult
                   }),
             contentType: "application/json;",
             cache: false,
             success: function(result)  {
               var resultRes = JSON.parse(result);
               console.log(resultRes);
                if(resultRes.status=="SUCCESS"){
                  $("#box-register").slideUp();
                  $("#box-forgot").slideUp();
                  $("#box-login").slideUp();
                  window.location = "<?=base_url()?>";
                } else if(resultRes.status=="WRONG PASS"){
                  $(".err_msg").fadeIn();
                  $(".msg").html(resultRes.pesan);
                  $("#password").focus();
                } else if(resultRes.status=="UNREGISTERED"){
                  $(".err_msg").fadeIn();
                  $(".msg").html(resultRes.pesan);
                  $("#id").focus();
                } else if(resultRes.status=="CHANGE PASSWORD"){
                  $(".err_msg").fadeIn();
                  $(".msg").html(resultRes.pesan);
                  $("#password").focus();
                } else if(resultRes.status=="HASHING FAILED"){
                  $(".err_msg").fadeIn();
                  $(".msg").html(resultRes.pesan);
                  $("#password").focus();
                }
             }
         });

      }
    return false;
  });



  $("#form-cart").on('submit',(function(e){
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

         //location.reload();
      },
      error: function(){}
    });
  }));


  $('#submit-register').click(function(event){
      event.preventDefault();

     $.ajax({
         type: "POST",
         url: "<?= base_url() ?>member/register",
         data: {
                 messenger: $("#messenger").val(),
                 user_name: $("#user_name").val(),
                 full_name: $("#full_name").val(),
                 password: $("#password").val()
                },
         dataType: "JSON",
         success: function(data)  {

         }
     });

  });

  // $('#add-to-cart').click(function(event){
  //     event.preventDefault();
  //    $.ajax({
  //        type: "POST",
  //        url: "<?= base_url() ?>order/toCart",
  //        data: {
  //                order_id: $("#order_id").val(),
  //                product_id: $("#product_id").val(),
  //                order_date: $("#order_date").val(),
  //                member_id: $("#member_id").val(),
  //                quantity: $("#quantity").val(),
  //                no_resi: $("#no_resi").val()
  //               },
  //        dataType: "JSON",
  //        success: function(data)  {
  //
  //        }
  //    });
  //
  // });

  $('#add-to-wishlist').click(function(){
     $.ajax({
         type: "POST",
         url: "<?= base_url() ?>order/wishlist",
         data: {
                 messenger: $("#messenger").val(),
                 user_name: $("#user_name").val(),
                 full_name: $("#full_name").val(),
                 password: $("#password").val()
                },
         dataType: "JSON",
         success: function(data)  {

         }
     });

  });


  function totalCart(){
    $.ajax({
        url    : "<?= base_url() ?>order/get_cart?member_id=rico123",
        type  : "GET",
        dataType   : "JSON",
        success : function(data){
            $("#total-cart").val(data[0].product_id);
            $("#total-shoping").val(data[0].product_id);
        }
    });
  }


  function category() {
      $.ajax({
          url : "<?php echo base_url('store/category')?>",
          type: "GET",
          dataType: "JSON",
          success: function(data)  {
              //console.log(data);
              var html = '';
              var i;
              for(i=0; i<data.length; i++){
                  // html+=  '<div class="item-category" onclick="view_product('+data[i].product_category_id+')">' +
                  //             '<span id='+ data[i].product_category_id + '>' + data[i].product_category_name+ '</span>'+
                  //         '</div>'
                  html+=  '<a href="<?= base_url() ?>products/get_product_by_category?id='+data[i].product_category_id+'">'+
                          '<div class="item-category">' +
                              '<span id='+ data[i].product_category_id + '>' + data[i].product_category_name+ '</span>'+
                          '</div>'+
                          '</a>'
              }
              $('.list-menu').html(html);
          }

      });
  }
});

function subCat(parent_id) {
  $.ajax({
      url : "<?php echo base_url('products/get_subcat_product?parent_id=')?>"+parent_id,
      type : "GET",
      dataType  : "JSON",
      success : function(resData){
        console.log(resData[0].parent_category_name);
        $("#subcategory").html(resData[0].parent_category_name);
      }
  });
}



function product_related(rel) {
    $.ajax({
        url : "<?php echo base_url('store/related?id=')?>"+rel,
        type: "GET",
        dataType: "JSON",
        success: function(data)  {
            console.log(data);
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
                html+=  '<div class="item" onclick="detail_product('+data[i].product_id+')">' +
                            '<a href="#">' +
                                '<img class="image" src=<?=API_IMG?>products/' + data[i].image1 +'  alt=""><br>' +
                                '<span class="product-name" >'+data[i].product_name+'</span><br>' +
                                '<span class="price">Rp.'+data[i].price+'</span>' +
                            '</a>' +
                        '</div>'
            }
            $('#list-related').html(html);
        }
        // },
        // error: function (jqXHR, textStatus, errorThrown)
        // {
        //     alert('Error get data from ajax');
        // }
    });
}


function view_product(id)   {

  api_img = 'http://localhost:7777/serviceadmin/uploads/products/';
  $.ajax({
    url : "<?php echo base_url('store/ajax_get_product_by_category?category_id=')?>"+id,
    type: "GET",
    dataType: "JSON",
    success: function(data)  {
      console.log(data);
      $("#product-detail-top").hide();
      $("#product-detail-bottom").hide();
      $("#product-related").hide();
      $("#list-product2").hide();
      $("#detail-product").hide();
      $("#box-customer-service").hide();

      $("#home-icon").hide();
      $("#home-banner").hide();
      $("#home-product1").hide();
      $("#home-product2").hide();
      $("#home-product3").hide();
      $("#home-banner1").hide();
      $("#home-banner2").hide();
      $("#home-banner3").hide();

      var html = '';
      var i;
      for(i=0; i<data.length; i++){
            $("#cat").html(data[i].product_category_name);
            html+=   '<div class="item" onclick="detail_product('+data[i].product_id+')">' +
                        '<a href="#">'+
                            '<img class="image" src=<?=API_IMG?>products/' + data[i].image1 +'  alt=""><br>' +
                        '</a>' +
                        '<div class="atribut">'+
                          '<span class="product-name">'+ data[i].product_name +'</span> <br>' +
                          '<span class="price">Rp. '+ data[i].price  +'</span><br>' +
                          '<img class="img-wish" src="<?=base_url() ?>assets/icons/heart.png" alt="">' +
                        '</div>' +
                     '</div>' ;
      }
      $("#view-product").fadeIn();
      $('#list-product').html(html);
      // $('#etalase-product').hide();
      // $('#detail').fadeIn();

    }

  });
}


const formatter = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'IDR',
  minimumFractionDigits: 2
})


function detail_product(id){
  api_img = 'http://localhost:7777/serviceadmin/uploads/products/';
  $.ajax({
    url  : "<?php echo base_url('products/detail_product?id=')?>"+id,
    type : "GET",
    dataType  : "JSON",
    success: function(data) {
      console.log(data[0].parent_category_id);
      

      subCat(data[0].parent_category_id);

      $("#home-icon").hide();
      $("#home-banner").hide();
      $("#home-product1").hide();
      $("#home-product2").hide();
      $("#home-product3").hide();
      $("#home-banner1").hide();
      $("#home-banner2").hide();
      $("#home-banner3").hide();
      $("#view-product").hide();


      $("#list-product").hide();
      $("#detail-product").fadeIn();
      $("#view-product").fadeIn();
      $("#product-detail-top").fadeIn();
      $("#product-detail-bottom").fadeIn();
      $("#product-related").fadeIn();
      $("#list-product2").fadeIn();
      $("#box-customer-service").fadeIn();

      $("#imgutama").attr("src", api_img+data[0].image1);
      $("#image1").val(api_img+data[0].image1);
      $("#img1").attr("src", api_img+data[0].image1);
      $("#img2").attr("src", api_img+data[0].image2);
      $("#img3").attr("src", api_img+data[0].image3);
      $("#img4").attr("src", api_img+data[0].image4);
      $(".product_name").html(data[0].product_name);
      $("#product_id").val(data[0].product_id);
      $("#product_name").val(data[0].product_name);

      var dis = data[0].price - (data[0].price * data[0].discount);

      if(data[0].discount != 0){
        var disc = formatter.format(data[0].price - ( (data[0].discount/100) * data[0].price ));
            price = formatter.format(data[0].price);
        $(".after-discount").html(disc);
        $(".before-discount").html(price);
      } else {
        var disc = formatter.format(data[0].price );
        $(".after-discount").html(disc);
      }

      $("#condition").html(data[0].product_condition);
      $("#category").html(data[0].product_category_name);

      $("#description").html(data[0].description);
      $("#weight").html(data[0].weight);
      $("#brand").html(data[0].brand);
      $(".total-discount").html(data[0].discount + "%");

      product_related(data[0].parent_category_id);
    }


  });

}


// function get_product_by_id(id)   {
//   save_method = 'update';
//   api_img = 'http://localhost/serviceadmin/uploads/products/';
//   $.ajax({
//     url : "<?php echo base_url('products/ajax_get_product_by_id?id=')?>"+id,
//     type: "GET",
//     dataType: "JSON",
//     success: function(data)  {
//       console.log(data[0].condision);
//         $('[name="product_id"]').val(data[0].product_id);
//         $("#select_category_edit").val(data[0].product_category_id);
//         $("#img1").attr("src", api_img+data[0].image1);
//         $("#img2").attr("src", api_img+data[0].image2);
//         $("#img3").attr("src", api_img+data[0].image3);
//         $("#img4").attr("src", api_img+data[0].image4);
//         // $('#image1').val(data[0].image1);
//         // $('#image2').val(data[0].image2);
//         // $('#image3').val(data[0].image3);
//         // $('#image4').val(data[0].image4);
//         $('[name="product_name"]').val(data[0].product_name);
//         $('[name="description"]').val(data[0].description);
//         $('[name="price"]').val(data[0].price);
//         // $("input:radio[name=condision_edit][value=" + data[0].condision + "]").attr('checked', 'checked');
//         // $("input[name='"+name+"'][value='"+value+"']").prop('checked', true);
//         $('input[name="condision_edit"]').filter("[value=" +data[0].condision +"]").attr('checked', true);
//         $('[name="weight"]').val(data[0].weight);
//         $('[name="brand"]').val(data[0].brand);
//         $('[name="discount"]').val(data[0].discount);
//
//         $('#data-product').hide();
//         $('#edit-product').fadeIn();
//         $('#edit-product .title').html('<h2>Edit Produk</h2>');
//     },
//     error: function (jqXHR, textStatus, errorThrown)
//     {
//         alert('Error get data from ajax');
//     }
//   });
// }


</script>

</body>
</html>
