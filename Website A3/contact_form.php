<?php
    include ("header.php");
?>

<html>
<body>
<link rel="stylesheet" type="text/css" href="css/contact_us.css">

<?php
            echo $_POST["UserName"].", <b>Your request has been submitted</b> ". "<br />"; 
            echo "Request sent for the following item: ". $_POST["ItemName"]. "<br />";
            echo "Your Order Number is: ". $_POST["OrderNumber"]. "<br />";
            echo "Specifications: ". $_POST["questions?"];
      
           
    ?>
<br />
<br />
</body>

