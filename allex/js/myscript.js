function formValidation(){
if(checkQuantity())
{
    return true;
}
else{
    return false;
}
}

function checkQuantity(){

    var quatity = document.getElementById("quantity").value;
    if(quatity == ""){
        document.getElementById("quantityError").innerHTML = "Must be a number";
        return false;
    }
    else {
        return true;
    }

}

function searchOrder(){

var email = document.getElementById("search").value;
//alert(email);
var xttp= new XMLHttpRequest();

xttp.onreadystatechange = function () {
if(this.readyState==4 && this.status==200)
    document.getElementById("show").innerHTML = this.responseText;
};


xttp.open("GET","../control/ajaxrequest.php?search="+email,true);
xttp.send();
}
