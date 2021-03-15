
// // The event handler function for password checking
// function checkPasswords() 
// { 
//   // retrieve the passwords entered
//   var init = document.getElementById("initial");
//   var sec = document.getElementById("second");
	
// 	// If the 1st password is empty
//   if (init.value == "") 
//   {
//     document.getElementById("initial").style.borderColor = "red";
//     document.getElementById("second").style.borderColor = "red";
//     alert("The password is empty.\n" + "Please enter one");
//     return false;
//   }
	
// 	//if the two passwords are not the same
//   if (init.value != sec.value) 
//   {
//     document.getElementById("initial").style.borderColor = "red";
//     document.getElementById("second").style.borderColor = "red";
//     alert("The two passwords are not the same.\n" + "Please re-enter.");
//     return false;
//   } 
//   else {
//   document.getElementById("initial").style.borderColor = "green";
//   document.getElementById("second").style.borderColor = "green";
//     return true;
//   }
// }

// // The event handler function for email checking
// function checkEmail(){
//     var email = document.getElementById("email").value;
//     var pattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

//     if (!(email.match(pattern)))
//     {
//         document.getElementById("email").style.borderColor = "red";
//         alert("wrong");
//     } 

 
// }

// // The event handler function for postal code checking
// function checkPostalCode(){
   
//     var pstCode = document.getElementById("pstCode").value;
//     var pattern = /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/;

//     if (!(pstCode.match(pattern)))
//     {
//         document.getElementById("pstCode").style.borderColor = "red";
//         alert("wrong pstcode");
//     } 

// }

// // The event handler function for first name checking
// function checkName(){
//     //alert("first name");
//     var firstName = document.getElementById("firstName").value;
//     var lastName = document.getElementById("lastName").value;
//     var pattern = /^[a-zA-Z]+(?:-[a-zA-Z]+)*$/;

//     if (!(firstName.match(pattern)))
//     {
//         document.getElementById("firstName").style.borderColor = "red";
//         alert("wrong first name");
//     }  

//     if (!(lastName.match(pattern)))
//     {
//         document.getElementById("lastName").style.borderColor = "red";
//         alert("wrong last name");
//     } 
// }

function formValidation () {
  //retrieve names
  var firstName = document.getElementById("firstName").value;
  var lastName = document.getElementById("lastName").value;
  var pattern1 = /^[a-zA-Z]+(?:-[a-zA-Z]+)*$/;

  //retrieve email
  var email = document.getElementById("email").value;
  var pattern2 = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  
  //retrieve postal code
  var pstCode = document.getElementById("pstCode").value;
  var pattern3 = /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/;

  // retrieve the passwords entered
  var init = document.getElementById("initial");
  var sec = document.getElementById("second");

  //variables
  var checkFirstName = "";
  var checkLastName= "";
  var checkEmail= "";
  var checkPostalCode= "";

  //validate names
  if (!(firstName.match(pattern1)))
  {
      document.getElementById("firstName").style.borderColor = "red";
      //alert("First Name");
      checkFirstName = " First Name ";
      
  } 
  else
  {
      document.getElementById("firstName").style.borderColor = "green";
  }

  if (!(lastName.match(pattern1)))
  {
      document.getElementById("lastName").style.borderColor = "red";
      //alert("Last Name");
      checkLastName = " Last Name ";
      
  }  
  else
  {
    document.getElementById("lastName").style.borderColor = "green";
  }

  //validate email
  if (!(email.match(pattern2)))
  {
      document.getElementById("email").style.borderColor = "red";
      //alert("Email");
      checkEmail = " Email ";
      
  } else
  {
    document.getElementById("email").style.borderColor = "green";
  }

  //validate postal code
  if (!(pstCode.match(pattern3)))
  {
      document.getElementById("pstCode").style.borderColor = "red";
      //alert("Postal Code");
      checkPostalCode = " Postal Code ";
      
  } else
  {
    document.getElementById("pstCode").style.borderColor = "green";
  }

  //if the two passwords are not the same
  if (init.value != sec.value) 
  {
    document.getElementById("initial").style.borderColor = "red";
    document.getElementById("second").style.borderColor = "red";
    alert("The two passwords are not the same.\n" + "Please re-enter.");
    
  } 
  else if (init.value == "") 
  {
    document.getElementById("initial").style.borderColor = "red";
    document.getElementById("second").style.borderColor = "red";
    alert("The password is empty.\n" + "Please enter one");
    
  }else
  {
    document.getElementById("initial").style.borderColor = "green";
    document.getElementById("second").style.borderColor = "green";
     
  }

  if (checkFirstName != ""||checkLastName != ""||checkEmail != ""|(checkPostalCode != ""))
  {
    alert("Invalid inputs: " + checkFirstName + checkLastName + checkEmail + checkPostalCode);
    return false;
  }else {
      if (!(init.value != sec.value) && !(init.value == "")){
        confirm("valid submission");
      }
    
    return true;
  }

}

function resetInputs()
{
  
  document.getElementById('firstName').style.borderColor = "";
  document.getElementById('lastName').style.borderColor = "";
  document.getElementById('email').style.borderColor = "";
  document.getElementById('pstCode').style.borderColor = "";
  document.getElementById('initial').style.borderColor = "";
  document.getElementById('second').style.borderColor = "";

} 