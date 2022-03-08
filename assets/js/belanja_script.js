document.getElementById("box-menu").addEventListener("click", openMenu);
function openMenu(){
    var x= document.getElementById("list-menu").style;
    console.log(x.display);
    if (x.display == "" || x.display == "none") {
        x.display = "block";
    } else {
        x.display = "none";
    }
}