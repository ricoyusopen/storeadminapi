var count_news = 0;
function newsContainer(){
    var count_content_news = "";
    if(count_news > 0){
        filterCountNews();
        count_content_news = '<span id="count-inbox" style="border-radius: 10px;padding:3px;background-color: red;position: absolute;right:6;">'+count_news+'</span>';
    }
    
    var content_news = 
    '<a id="info-news" class="info-group click-area" href="'+base_url+'berita?action=view">'+
        '<img width="40px" height="40px" src="'+base_url+'images/asset/assetwebsite-19.png">'+
        count_content_news+
    '</a>'
    document.getElementById("info-news-group").innerHTML = content_news;
}
function asyncNews(){
    var t = getDateTime2();
    var h = sha1(t);
    $.ajax({
        type: "POST",
        url:  base_url+"/GrupNotifikasi/news",
        data: JSON.stringify({
            t : t,
            h : h
        }),
        contentType: "application/json;",
        cache: false,
        success: function(result){
            var rs = JSON.parse(result);
            count_news = rs.COUNT;
            newsContainer();
            //console.log(count_news);
            // console.log(rs);
        },
        error: function (request, status, error) {
            newsContainer();
            //console.log(request.responseText);
        }
    });
}
function filterCountNews(){
    if(count_news > 10){
        if(count_news > 100){
            count_news = "100+"
        }else if(count_news > 90){
            count_news = "90+"
        }else if(count_news > 80){
            count_news = "80+"
        }else if(count_news > 70){
            count_news = "70+"
        }else if(count_news > 60){
            count_news = "60+"
        }else if(count_news > 50){
            count_news = "50+"
        }else if(count_news > 40){
            count_news = "40+"
        }else if(count_news > 30){
            count_news = "30+"
        }else if(count_news > 20){
            count_news = "20+"
        }else if(count_news > 10){
            count_news = "10+"
        }
    }
}
function inboxTimer(){
    newsContainer();
    setInterval(function(){
        //console.log("RUN");
        asyncNews();
    },10000);
}
inboxTimer();
