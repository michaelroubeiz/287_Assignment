
     
// The event handler function for password checking
function checkPasswords() 
{ 
  // retrieve the passwords entered
  var init = document.getElementById("initial");
  var sec = document.getElementById("second");
	
	// If the 1st password is empty
  if (init.value == "") 
  {
    alert("The password is empty.\n" + "Please enter one");
    return false;
  }
	
	// if the two passwords are not the same
  if (init.value != sec.value) 
  {
    alert("The two passwords are not the same.\n" + "Please re-enter.");
    return false;
  } 
  else
    return true;
}

