function formValidation () {
  //retrieve email
  var email = document.getElementById("email").value;
  var pattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

  //retrieve password
  var pass = document.getElementById("password").value;

  //variables
  var checkEmail = ""
  var checkPass = ""

    //validate email
    if (!(email.match(pattern)))
    {
        document.getElementById("email").style.borderColor = "red";
        checkEmail = " \nEmail ";
        
    }

    //validate password
    if (pass == "") 
    {
        document.getElementById("password").style.borderColor = "red";
        checkPass = "\nEmpty Password... ";
        
    }else{
        document.getElementById("password").style.borderColor = "green";
    }

    if (checkEmail != ""||checkPass != ""){
        alert("Invalid: "+ checkEmail + checkPass);
    return false;
    }else{
        if (!(pass == "") && (email.match(pattern))){
            confirm("valid submission");
        }
    return true; 
    }
}

function resetInputs()
{

  document.getElementById('email').style.borderColor = "";
  document.getElementById('password').style.borderColor = "";

  
} 