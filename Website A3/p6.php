<?php 
//start session
session_start();

//check that sumbit is not clicked
if(!isset($_POST["submitButton"]))
{

?>
<html lang = en>
<head> 
<title><?php if (!$error){$title = "SIGN UP";} echo $title ?></title> 
<meta charset="utf-8"/>
</head>

<body>
  <div class="mainForm">
    <h1><?php echo $title ?></h1>

      <form action="<?php echo ($_SERVER["PHP_SELF"]);?>" 
      method="post" name="form">
        Full Name:
        <input type="text" name="fullName" />
        <br /><br />	  
        Email: 
        <input type="email" name="email" /> </label> 
        <br /><br />
        <input type="reset" value="reset" />
        <input type="submit" value="submit" name="submitButton" />

        </form> 

</div>
</body>
</html>

<?php
}
else
{ 

  ?>

      <?php
      //Form Empty Validation
      if (empty($_POST["fullName"])||empty($_POST["email"]) )
      {    
          $error=TRUE;
          $title="Please Go Back";
      } else{
        $title="Welcome!";
      }

      //If incomplete, give error message.
       if (isset($error)) 
      { 
         $title="Please Go Back";
         require("header.php");
         echo "Sorry, the form is incomplete. Please go back and fill out all entries of the form. Thank you.";
      
      } 
      else 
      {
        //Add Sign Up Information To File
        if(!empty($_POST["fullName"]) && !empty($_POST["email"])){

          $found = false;
          $fullName = $_POST["fullName"];
          $email = $_POST["email"];

          $file = fopen("Sign_Up_Information.txt", "r");

          if($file)
          {
            while(($line = fgets($file)))
            {
              $array = explode(":", $line);

              if($array[0] == $fullName){
                if(trim($array[1]) === $email){
                  $found=true;
                  fclose($file);
                }

              }

            }
          } else{
            echo "File does not exist.------------delete after";
            $firstFile = true;
            $file = fopen("Sign_Up_Information.txt", "a");

            fputs($file, "$_POST[fullName]:");
            fputs($file, "$_POST[email]\n");
            fclose($file);

            //Welcome to the site
            require("header.php");
            echo "Welcome to Concordia Supermarket. You're account has been created. Please login to to continue.";?>
            <br /><br />
            <input  type="submit" value="Log In" />
            <?php
          }?>

          <?php

          if ($found)
          {
            $title = "Looks like you account already exsits...";
            require("header.php");
            echo "Please login in from the Log In page, or click the back button to go back to the sign up page.";
            ?>

            <br /><br />
            <input  type="submit" value="Log In" />

            <?php
          }else if (!$found && !$firstFile){
            $file = fopen("Sign_Up_Information.txt", "a");

            fputs($file, "$_POST[fullName]:");
            fputs($file, "$_POST[email]\n");
            fclose($file);

            //Welcome to the site
            require("header.php");
            echo "Welcome to Concordia Supermarket. You're account has been created. Please login to to continue.";?>
            <br /><br />
            <input  type="submit" value="Log In" />
            <?php
          }?>

          <?php
        }else 
        {
            echo "Error!";
        }
        
      }?> 

      <?php

 } 
 ?>
 