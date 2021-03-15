function formValidation () {
    //retrieve email
    var email = document.getElementById("email").value;
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