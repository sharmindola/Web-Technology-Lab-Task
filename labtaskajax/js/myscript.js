function searchByIP(){

var ip = document.getElementById("search").value;
//alert(email);
var xttp= new XMLHttpRequest();

xttp.onreadystatechange = function () {
if(this.readyState==4 && this.status==200)
    document.getElementById("show").innerHTML = this.responseText;
};


xttp.open("GET","../control/ajaxrequest.php?search="+ip,true);
xttp.send();
}
