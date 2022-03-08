var count = 0;
var base_url = "";
function inboxContainer(){
    var count_content = "";
    if(count > 0){
        filterCount();
        count_content = '<span id="count-inbox" style="border-radius: 10px;padding:3px;background-color: red;position: absolute;right:6;">'+count+'</span>';
    }
    
    var content = 
    '<a class="info-group click-area" href="'+base_url+'pesan?action=view"> <img width="40px" height="40px" src="'+base_url+'images/asset/assetwebsite-15.png">'+
        count_content+ 
    '</a>';
    document.getElementById("info-notif-group").innerHTML = content;
}
function asyncInbox(){
    var t = getDateTime2();
    var h = sha1(t);
    $.ajax({
        type: "POST",
        url:  base_url+"/GrupNotifikasi/inbox",
        data: JSON.stringify({
            t : t,
            h : h
        }),
        contentType: "application/json;",
        cache: false,
        success: function(result){
            var rs = JSON.parse(result);
            count = rs.COUNT;
            inboxContainer();
            //console.log(count);
            // console.log(rs);
        },
        error: function (request, status, error) {
            inboxContainer();
            //console.log(request.responseText);
        }
    });
}
function filterCount(){
    if(count > 10){
        if(count > 100){
            count = "100+"
        }else if(count > 90){
            count = "90+"
        }else if(count > 80){
            count = "80+"
        }else if(count > 70){
            count = "70+"
        }else if(count > 60){
            count = "60+"
        }else if(count > 50){
            count = "50+"
        }else if(count > 40){
            count = "40+"
        }else if(count > 30){
            count = "30+"
        }else if(count > 20){
            count = "20+"
        }else if(count > 10){
            count = "10+"
        }
    }
}
function inboxTimer(){
    var urlTmp = document.URL;
    var urlSplit = urlTmp.split("/");
    for(var i = 0; i< 4; i ++){
        base_url += urlSplit[i]+"/";
    }
    inboxContainer();
    setInterval(function(){
        //console.log("RUN");
        asyncInbox();
    },10000);
}
inboxTimer();
