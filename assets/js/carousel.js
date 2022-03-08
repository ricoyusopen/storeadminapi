setInterval(()=>{
    actionSlideRight();
},8000);

var x = document.getElementsByClassName("image-carousel");
var point = document.getElementsByClassName("point");
var activeIndex = 0;

document.getElementById("get-carousel-left").addEventListener("click",actionSlideLeft);
function actionSlideLeft(){
    // console.log(x);
    var activeIndex = 0;
    for(var i = 0; i < x.length; i ++){
        // console.log("diplay i = "+i+" "+x[i].style.display);
        if(x[i].style.display == "block"){
            activeIndex = i;
        }
    }
    // console.log("carousel aktif = ",parseInt(activeIndex+1));

    x[activeIndex].style.display = "none";
    point[activeIndex].style.background = "rgba(248,248,248,1)";
    if((activeIndex-1)<0){
        activeIndex = x.length;
    }
    x[activeIndex-1].style.animation = "show-banner 2s infinite";
    x[activeIndex-1].style.display = "block";
    setTimeout(() => {
        x[activeIndex-1].style.animation = "";
    }, 2000);
    point[activeIndex-1].style.background = "rgb(104, 101, 101)";
}

document.getElementById("get-carousel-right").addEventListener("click",actionSlideRight);
function actionSlideRight(){
    // console.log(x);
    for(var i = 0; i < x.length; i ++){
        // console.log("diplay i = "+i);
        if(x[i].style.display == "block"){
            activeIndex = i;
        }
    }
    // console.log("carousel aktif = ",parseInt(activeIndex-1));

    x[activeIndex].style.display = "none";
    // x[activeIndex].style.position = "relative";
    point[activeIndex].style.background = "rgba(248,248,248,1)";
    if((activeIndex+1)>=x.length){
        activeIndex = -1;
    }
    x[activeIndex+1].style.animation = "show-banner 2s infinite";
    x[activeIndex+1].style.display = "block";
    setTimeout(() => {
        x[activeIndex+1].style.animation = "";
    }, 2000);
    point[activeIndex+1].style.background = "rgb(104, 101, 101)";
}


function indexBanner(idx){
    for(var i = 0; i < x.length; i ++){
        //console.log("diplay i = "+i);
        if(x[i].style.display == "block"){
            activeIndex = i;
        }
    }
    if(idx==activeIndex){
        return;
    }
    console.log(idx-activeIndex);
    if(idx>activeIndex){
        var hasilSelisih = idx-activeIndex;
        if((hasilSelisih) > 1){
            for(var k = 0;k<(hasilSelisih);k++){
                actionSlideRight();
                // console.log("aksi ke "+i);
            }
        }else{
            actionSlideRight();
        }
    }else{
        var hasilSelisih = activeIndex-idx;
        if((hasilSelisih) > 1){
            for(var l = 0;l<(hasilSelisih);l++){
                actionSlideLeft();
            }
        }else{
            actionSlideLeft();
        }
    }
}
