// Ajax post
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

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function openMenu(){
    var x= document.getElementById("box-nav-left-id").style;
    console.log(x.display);
    if (x.display == "" || x.display == "none") {
        x.display = "block";
    } else {
        x.display = "none";
    }
}

// document.getElementById("info-news").addEventListener("click", onCLickinfoNews);
// function onCLickinfoNews(){
//     var x= document.getElementById("box-info-news").style;
//     var y= document.getElementById("box-info-inbox").style;
//     var z= document.getElementById("box-info-notif").style;
//     if (x.display == "" || x.display == "none") {
//         x.display = "block";
//         y.display = "none";
//         z.display = "none";
//     } else {
//         x.display = "none";
//     }
// }
// document.getElementById("info-inbox").addEventListener("click", onCLickinfoInbox);
// function onCLickinfoInbox(){
//     var x= document.getElementById("box-info-news").style;
//     var y= document.getElementById("box-info-inbox").style;
//     var z= document.getElementById("box-info-notif").style;
//     if (y.display == "" || y.display == "none") {
//         x.display = "none";
//         y.display = "block";
//         z.display = "none";
//     } else {
//         y.display = "none";
//     }
// }
// document.getElementById("info-notif").addEventListener("click", onCLickinfoNotif);
// function onCLickinfoNotif(){
//     var x= document.getElementById("box-info-news").style;
//     var y= document.getElementById("box-info-inbox").style;
//     var z= document.getElementById("box-info-notif").style;
//     if (z.display == "" || z.display == "none") {
//         x.display = "none";
//         y.display = "none";
//         z.display = "block";
//     } else {
//         z.display = "none";
//     }
// }

//favorite books
var keyvalue = "";
var nama = document.getElementById("input-nama");
var content = "";
var nomorMirip = "";
function listNoFavorit(){
    
    var list = document.getElementById("list");
    var retrievedObject = localStorage.getItem('favoriteNumber');
    //console.log(retrievedObject);
    var dataExisting = retrievedObject == null?[]:JSON.parse(retrievedObject);
    content = "";
    nomorMirip = "";
    for (var i = (dataExisting.length-1); i >= 0; i--){
        if(
            dataExisting[i].nama.toUpperCase().includes(keyvalue.toUpperCase()) ||
            dataExisting[i].nomor.includes(keyvalue)
        ){
            nomorMirip = dataExisting[i].nomor;
            content += '<div style="position:relative;font-family:segoe UI; box-shadow:1px 1px px 1px #ccc; background-color:#fefefe;padding:4px;margin-bottom:2px;padding-left:10px">'+
                            '<span style="font-weight:600">'+dataExisting[i].nama+'</span><br>'+
                            '<span>'+dataExisting[i].nomor+'</span>'+
                            '<span style="float:right;position:absolute;top:30%;right:60px;"><a href="#" onclick="hapusNomorFavorit(\''+i+'\')" style="color:#707070;">Hapus</a> | </span>'+
                            '<span style="float:right;position:absolute;top:30%;right:20px;"><a href="#" onclick="salinNomor(\''+dataExisting[i].nomor+'\')" style="color:#707070;">Salin</a></span>'+
                        '</div>';
        }else{
            continue;
        }
    }
    content += !content.includes('tambahKeNomorFavorit') && keyvalue != nomorMirip?'<button onclick="tambahKeNomorFavorit(\''+keyvalue+'\')" class="button" title="Tambahkan ke nomor favorit"> '+keyvalue+' (+Tambahkan ke No Favorit) </button>':'';
    list.innerHTML = content;
    if(keyvalue.length == 0){
        list.innerHTML = "";
    }
    //nama.value = "";
}

function tambahKeNomorFavorit(nomor){
    var promptNama = prompt("Nama", "");
    while(promptNama == ""){
        alert("Nama harus diisi");
        promptNama = prompt("Nama", "");
    }
    if(promptNama == null){
        alert("Dibatalkan");
        return;
    }
    var promptNomor = prompt("Nomor", nomor);
    while(promptNomor == ""){
        alert("Nomor harus diisi");
        promptNomor = prompt("Nomor", nomor);
    }
    if(promptNomor == null){
        alert("Dibatalkan");
        return;
    }
    
    var retrievedObject = localStorage.getItem('favoriteNumber');
    var dataExisting = retrievedObject == null?[]:JSON.parse(retrievedObject);
  
    var object = { 'nama': promptNama, 'nomor': promptNomor };
    dataExisting.push(object);
    
    localStorage.setItem('favoriteNumber', JSON.stringify(dataExisting));
    listNoFavorit();
    alert(nomor + " berhasil ditambahkan ke nomor favorit");
}

function hapusNomorFavorit(index){
    var retrievedObject = localStorage.getItem('favoriteNumber');
    var dataExisting = retrievedObject == null?[]:JSON.parse(retrievedObject);
    var dataAfter = [];
    for(var i=0;i<dataExisting.length;i++){
        if(i == index){
            continue;
        }
        dataAfter.push({ 'nama': dataExisting[i].nama, 'nomor': dataExisting[i].nomor });
    }
    localStorage.setItem('favoriteNumber', JSON.stringify(dataAfter));
    listNoFavorit();
}

function onKeyUpNoFavorit(data){
    keyvalue = data.value;
    // alert("TEST");
    listNoFavorit();
}

var isExist = 0;

function salinNomor(nomorSalinan){
    isExist = 0;
    var inputTujuan = document.getElementById("input-no-tujuan");
    var inputPelanggan = document.getElementById("input-id-pelanggan");
    var inputNoVirAccKel2 = document.getElementById("input-NoVirAccKel");
    if(inputTujuan != undefined){
        inputTujuan.value = nomorSalinan;
        onkeyUp(0);
    }else if(inputPelanggan != undefined){
        inputPelanggan.value = nomorSalinan;
        inputNoVirAccKel2.value = nomorSalinan;
    }
}

var activityFavorite = document.getElementById("activity-favorite");

function closeFavoriteBook(){
    nama.value = "";
    activityFavorite.style.display = "none";
}

function openFavoriteBook(){
    activityFavorite.style.display = "block";
    nama.focus();
}

//klik tiket deposit
function openTiketDeposit(){
    var urlTmp = document.URL;
    console.log("OPEN",urlTmp);
    if(urlTmp.includes("action=tiketdeposit")){
        $(".tiket").fadeIn("slow");
        jQuery("div#alert").hide();
        document.getElementById("nominal").value = "";
        document.getElementById("pin").value = "";
        $(".pass").hide();
        $(".akun").hide();   
    }
}
openTiketDeposit();

function home(){
    var base_url = "";
    var urlTmp = document.URL;
    var urlSplit = urlTmp.split("/");
    for(var i = 0; i< 4; i ++){
        base_url += urlSplit[i]+"/";
    }

    window.location.href = base_url;
}
//end

function asyncNoFavorit(){
    var base_url = "";
    var urlTmp = document.URL;
    var urlSplit = urlTmp.split("/");
    for(var i = 0; i< 4; i ++){
        base_url += urlSplit[i]+"/";
    }
    if(!urlTmp.includes('belanja')){
        return;
    }
    var t = getDateTime();
    var h = sha1(t);
    var retrievedObject = localStorage.getItem('favoriteNumber');
    var dataExisting = retrievedObject == null?null:JSON.parse(retrievedObject);
    $.ajax({
        type: "POST",
        url:  base_url+"memberarea/index.php/webreport/updatenomorfavorit",
        data: JSON.stringify({
            list : dataExisting,
            t : t,
            h : h
        }),
        contentType: "application/json;",
        cache: false,
        success: function(result){
            var rs = JSON.parse(result);
            localStorage.setItem('favoriteNumber', JSON.stringify(rs.list_update));
            //count_news = rs.COUNT;
            //newsContainer();
            //console.log(count_news);
            // console.log(rs);
        },
        error: function (request, status, error) {
            //newsContainer();
            //console.log(request.responseText);
        }
    });
}

asyncNoFavorit();

function showMenuDashboard(){
    var btnMenu = document.getElementById("list-menu-dashboard");
    if(btnMenu.style.display == "none" || btnMenu.style.display == ""){
        btnMenu.style.display = "block";
    }else{
        btnMenu.style.display = "none";
    }
}