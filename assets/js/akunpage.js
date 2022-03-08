function myNominal(){
  // var nominal = $(this).val();
  jQuery("div#alert").show();
  jQuery("div#alert").html("Masukan nilai request ticket deposit kelipatan Rp 10.000, lalu tekan Icon bank yang dituju!");
}

function angka(e) {
  var x      ="";
  var hasil ="";
  if (!/^[0-9]+$/.test(e.value)) {
    e.value = e.value.substring(0,e.value.length-1);
  }

  if (e.value > 9999){
      // for(x=1; x<=e.value; x++){
      //   hasil = e.value % x;
      //   if(hasil == 0){
      //     alert(hasil);
      //   }
      // }

  }

  // if(e.value>1)  {
  //   if(e.value/2 == 1){
  //     true;
  //   }if(e.value/10000 == 2){
  //     true
  // }
}



// function angka(){
//    var reg = /^[0-9]+$/ ;
//    var nominal = $("#nominal").val();
//    if(nominal!="" && nominal.match(reg)){
//      var hasil = nominal / 1000;
//      //if (nominal)
//      //alert (nominal);
//    }else{
//      alert("nominal harus angka");
//    }
//
//
// }

$(document).ready(function(){
  var regex=  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
  var akun  = document.getElementById("akun");
  var tiket = document.getElementById("tiket");

  $(".label-akun").click(function(){
      $(".akun").fadeIn("slow");
      // document.getElementById("kode").value = "";
      // document.getElementById("nama").value = "";
      // document.getElementById("ktp").value = "";
      // document.getElementById("npwp").value = "";
      // document.getElementById("wp").value = "";
      // document.getElementById("alamat_1").value = "";
      // document.getElementById("alamat_2").value = "";
      $(".pass").hide();
      $(".tiket").hide();
      jQuery("div#err_msg").hide();
      jQuery("div#sukses_msg").hide();
  })
  $(".label-pass").click(function(){
      $(".pass").fadeIn("slow");
      document.getElementById("passold").value = "";
      document.getElementById("passnew").value = "";
      document.getElementById("passnew2").value = "";
      $(".akun").hide();
      $(".tiket").hide();
      jQuery("div#err_msg").hide();
      jQuery("div#sukses_msg").hide();
  })
  $(".label-tiket").click(function(){
      $(".tiket").fadeIn("slow");
      jQuery("div#alert").hide();
      document.getElementById("nominal").value = "";
      document.getElementById("pin").value = "";
      $(".pass").hide();
      $(".akun").hide();
      jQuery("div#err_msg").hide();
      jQuery("div#sukses_msg").hide();
  })


  $('#propinsi').click(function(){
    // console.log("test");
        var id_prop = $(this).val();
        $.ajax({
            type   : "POST",
            url    : "<?php echo base_url(); ?>" + "akun/get_kota",
            data   : JSON.stringify({
                                  id_prop     : id_prop
                                }),
            contentType : "application/json;",
            success: function(data){
              var html = '';
                var result = JSON.parse(data);
                if(result.status == 'SUKSES'){
                  var dataKota = result.affect;
                  for(var i=0; i<dataKota.length; i++){
                    html += '<option value='+dataKota[i].ID+'>'+dataKota[i].NAME+'</option>';
                  }
                  $("#kota").html(html);
                }
            },
            error: function(error){
               //alert("error");
            }
        });
        return false;
  });

  $('#kota').click(function(){
        var id_kota = $(this).val();
        $.ajax({
            type   : "POST",
            url    : "<?php echo base_url(); ?>" + "akun/get_kecamatan",
            data   : JSON.stringify({
                                  id_kota     : id_kota
                                }),
            contentType : "application/json;",
            success: function(data){
                var html = '';
                var result = JSON.parse(data);
                if(result.status == 'SUKSES'){
                  var dataKec = result.affect;
                  for(var i=0; i<dataKec.length; i++){
                      html += '<option value='+dataKec[i].ID+'>'+dataKec[i].NAME+'</option>';
                  }
                  $('#kecamatan').html(html);
                }
            },
            error : function(error){
              //allert(error);
            }
        });
        return false;
  });

  $('#kecamatan').click(function(){
        var id_kecamatan = $(this).val();
        $.ajax({
            type   : "POST",
            url    : "<?php echo base_url(); ?>" + "akun/get_kelurahan",
            data   : JSON.stringify({
                                  id_kecamatan     : id_kecamatan
                                }),
            contentType : "application/json;",
            success: function(data){
                var html = '';
                var result = JSON.parse(data);
                if(result.status == 'SUKSES'){
                  var dataKel = result.affect;
                  for(var i=0; i<dataKel.length; i++){
                      html += '<option value=' +dataKel[i].ID+ '>' +dataKel[i].NAME+ '</option>';
                  }
                  $('#kelurahan').html(html);
                }
            },
            error: function(error){
              //allert(error);
            }
        });
        return false;
  });



  $(".icon-bank").click(function(){
    var bank   = this.id;
    var nominal = $("#nominal").val();
    var pin     = $("#pin").val();
    var t       = getDateTime();
    var h       = sha1(bank + nominal + pin  + t);

    if(nominal=='' && pin=='' && bank=='' ){
      jQuery("div#err_msg").show();
      jQuery("div#err_msg").html("Anda Belum Memasukan Apapun!");
      $("#nominal").focus();
    }else if(nominal==''){
      jQuery("div#err_msg").show();
      jQuery("div#msg").html("Anda Belum Memasukan Nominal!");
      $("#nominal").focus();
    }else if(pin==''){
      jQuery("div#err_msg").show();
      jQuery("div#msg").html("Anda Belum Memasukan PIN!");
      $("#pin").focus();
    }else{

      $.ajax({
          type: "POST",
          url:  "<?php echo base_url(); ?>" + "akun/get_tiket",
          data: JSON.stringify({
                                nominal  : nominal,
                                pin      : pin,
                                bank     : bank,
                                msisdn : '<?=$this->session->userdata('msisdn')?>',
                                t: t,
                                h: h
                              }),
          contentType: "application/json;",
          cache: false,
          success: function(resultTiket){
              var resTiket = JSON.parse(resultTiket);
              //console.log(resTiket);
              if(resTiket.Rows[0].RC == '00'){
                //alert(resTiket.message);
                //window.location = "<?=base_url()?>index.php/webreport/logout";
                jQuery("div#sukses_msg").show();
                jQuery("div#sukses").html(resTiket.Rows[0].MESSAGE);
                $("#nominal").val="";
                $("#pin").val="";
              }else if(resTiket.Rows[0].RC == '63'){
                jQuery("div#err_msg").show();
                jQuery("div#msg").html(resTiket.Rows[0].MESSAGE);
              }else{

              }
          }
      });
    }
  });


  $("#submit-pass").click(function(event){
    event.preventDefault();
    var passold    = $("#passold").val();
    var passnew    = $("#passnew").val();
    var passnew2   = $("#passnew2").val();
    var pasol      = document.getElementById('passold');
    var pason      = document.getElementById('passnew');
    var pason2     = document.getElementById('passnew2');
    var tt = getDateTime();
    var hh = sha1(passnew + passnew2 + tt);
    if(passold=='' && passnew=='' && passnew2=='')
      {
        jQuery("div#err_msg").show();
        jQuery("div#msg").html("Anda Belum Memasukan Apapun!");
        pasol.focus();
      } else if(passnew==''){
        jQuery("div#err_msg").show();
        jQuery("div#msg").html("Anda Belum Memasukan Password Baru!");
        pason.focus();
      }else if(passnew2==''){
        jQuery("div#err_msg").show();
        jQuery("div#msg").html("Anda Belum Memasukan Konfirmasi Password Baru!");
        pason2.focus();
      } else {

        if(passnew.match(regex) && passnew==passnew2)
         {
              //alert(passnew + '/' + passnew2);

              $.ajax({
                  type: "POST",
                  url:  "<?php echo base_url(); ?>" + "akun/ubah_pass",
                  data: JSON.stringify({
                                        passlama : passold,
                                        passbaru : passnew,
                                        passbaru2: passnew2,
                                        uname    : '<?=$this->session->userdata('username')?>',
                                        store_id : '<?=$this->session->userdata('store_id')?>',
                                        tt: tt,
                                        hh: hh
                                      }),
                  contentType: "application/json;",
                  cache: false,
                  success: function(resultUbah){
                      var resultResUbah = JSON.parse(resultUbah);
                      //alert(resultResUbah);
                      if(resultResUbah.status == 'SUKSES'){
                        //alert(resultResUbah.pesan);
                        //window.location = "<?=base_url()?>index.php/webreport/logout";
                      }else{
                        jQuery("div#err_msg").show();
                        jQuery("div#msg").html(resultResUbah.pesan);
                      }
                  }
              });
        } else {
          jQuery("div#err_msg").show();
          jQuery("div#msg").html("Password Baru minimal harus 8 karakter, Mengandung huruf besar, huruf kecil dan angka");
          $("#passnew2").focus();
        }
      }
    return false;
  });

  $("#submit-akun").click(function(){
    event.preventDefault();
    $(".pass").hide();
    $(".tiket").hide();
    $(".akun").show();

    var nm   = document.getElementById('nama');
    var ktp  = document.getElementById('ktp');
    var npwp = document.getElementById('npwp');
    var wp   = document.getElementById('wp');
    var ad1  = document.getElementById('alamat_1');
    var ad2  = document.getElementById('alamat_2');
    var pr   = document.getElementById('propinsi');
    var kt   = document.getElementById('kota');
    var kc   = document.getElementById('kecamatan');
    var kl   = document.getElementById('kelurahan');
    var z    = document.getElementById('zip');

    var nama        = $("#nama").val();
    var alamat_1    = $("#alamat_1").val();
    var alamat_2    = $("#alamat_2").val();
    var propinsi    = $("#propinsi").val();
    var kota        = $("#kota").val();
    var kecamatan   = $("#kecamatan").val();
    var kelurahan   = $("#kelurahan").val();
    var zip         = $("#zip").val();
    var ktp         = $("#ktp").val();
    var npwp        = $("#npwp").val();
    var wp          = $("#wp").val();
    var time = getDateTime();
    var hash = sha1(nama + alamat_1 + alamat_2 + propinsi + kota + kecamatan + kelurahan + zip  + ktp + npwp + wp + time);

    if(nama=='' && alamat_1=='' && propinsi=='' && kota=='' && kecamatan=='' && kelurahan=='')
      {
        jQuery("div#err_msg").show();
        jQuery("div#msg").html("Anda Belum Memasukan Apapun!");
        nm.focus();
      } else if (nama=='') {
        jQuery("div#err_msg").show();
        jQuery("div#msg").html("Anda Belum Memasukan Nama!");
        nm.focus();
      } else if (alamat_1=='') {
        jQuery("div#err_msg").show();
        jQuery("div#msg").html("Alamat Belum Diisi!");
        ad1.focus();
      } else if (propinsi=='') {
        jQuery("div#err_msg").show();
        jQuery("div#msg").html("Propinsi belum di pilih!");
        pr.focus();
      } else {
              $.ajax({
                  type: "POST",
                  url:  "<?php echo base_url(); ?>" + "akun/update_akun",
                  data: JSON.stringify({
                                          nama     : nama,
                                          alamat_1 : alamat_1,
                                          alamat_2 : alamat_2,
                                          propinsi : propinsi,
                                          kota     : kota,
                                          kecamatan: kecamatan,
                                          kelurahan: kelurahan,
                                          zip      : zip,
                                          ktp      : ktp,
                                          npwp     : npwp,
                                          wp       : wp,
                                          uname    : '<?=$this->session->userdata('username')?>',
                                          store_id : '<?=$this->session->userdata('store_id')?>',
                                          time      : time,
                                          hash      : hash
                                      }),
              contentType: "application/json;",
              cache: false,
              success: function(resultAkun){
                  var rsAkun = JSON.parse(resultAkun);
                  //alert(rsAkun);
                  if(rsAkun.status == 'SUKSES'){
                    //alert(rsAkun.pesan);
                    //window.location = "<?=base_url()?>index.php/akun";
                    jQuery("div#sukses_msg").show();
                    jQuery("div#sukses").html(rsAkun.pesan);
                  }else{
                    jQuery("div#err_msg").show();
                    jQuery("div#msg").html(rsAkun.pesan);
                  }
              }
              });
      }
    return false;
  });

});
