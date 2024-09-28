function validateForm() {
  data();
  emailVal();
  passwordValidation();
  confirmPassword();
  validatePhoneNumber();
  namealPattern();
    if (data() && emailVal() && passwordValidation() && confirmPassword() && validatePhoneNumber() &&namealPattern()  )
    {
       
        return true;
    }
    else {
        return false;
    }
   
  
}

function data() {
  var a = document.getElementById("full_name").value;
  var b = document.getElementById("email").value;
  var c = document.getElementById("password").value;
  var d = document.getElementById("confirm_password").value;
  var e = document.getElementById("date_of_birth").value;
  var f = document.getElementById("gender").value;
  var g = document.getElementById("phone_number").value;


  // Check if any field is empty
  if (a == "" || b == "" || c == "" || d == "" || e == "" || f == "" || g == "") {
    document.getElementById("demo").innerHTML = "All fields are Required.";
    return true;
  }
  else {
    document.getElementById("demo").innerHTML = "All fields are okay.";
    return false;
  }
}
function emailVal() {
        var email = document.getElementById("email").value;
    if (email.endsWith("gmail.com"))
            {
                document.getElementById("output1").innerHTML = "Valid Email";
                return true;
            }
             else {
                document.getElementById("output1").innerHTML = "invalid Email";
                return false;
            }
        }


function passwordValidation() {
    var pass = document.getElementById("password").value;
    if (pass.length > 7) {
        document.getElementById("output2").innerHTML = "Successful";
        return true;
    }
    else {
        document.getElementById("output2").innerHTML = "please enter a valid password.";
        return false;

    }
}
function confirmPassword() {
  var pass = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirm_password").value;
  if (pass == confirmPassword) {
    document.getElementById("output3").innerHTML = "Password Matched";
    return false;
  }
  else {
    document.getElementById("output3").innerHTML = "Password do not matched";
    return true;
  }
}
function validatePhoneNumber() {
    var phoneNumber = document.getElementById("phone_number").value;
    var phonePattern = /^[0-9]+$/;
    if (!phonePattern.test(phoneNumber)) {
        document.getElementById("output4").innerHTML = "Phone number must contain only numeric values.";
        return false;
  }
  else {
   
    return true;
  }
    
}

function namealPattern() {
    var uname = document.getElementById("full_name").value;
    const namePattern = /^[A-Za-z\s]+$/;
 
    if (!namePattern.test(uname)) {
        document.getElementById("output5").innerHTML = "Full Name must contain only alphabets.";
        return false;
  }
  else {
    
    return true;
  }
   
}