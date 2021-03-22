//validate forgot password form
function formValidation () {
    //retrieve email
    var email = document.getElementById("email").value;

    //create pattern
    var pattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    //validate email
    if (!(email.match(pattern)))
    {
        document.getElementById("email").style.borderColor = "red";
        alert("Invalid Email");
        return false;

    }else{
        confirm("valid submission");
    return true; 
    }
}

//reset boarder color on "reset"
function resetInputs()
{
  document.getElementById('email').style.borderColor = "";
} 