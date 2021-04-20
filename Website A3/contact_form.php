<?php
    include ("header.php");
?>

<html>
<body>
<link rel="stylesheet" type="text/css" href="css/contact_us.css">

<?php
if(!empty($_POST["UserName"]) ){
    

    $found = false;
    $UserName = $_POST["UserName"];
    //$email = $_POST["email"];
    echo $UserName;
    $file = fopen("Sign_Up_Information.txt", "r");
}
if($file)
{
    echo "File open";
    while(($line = fgets($file)))
    {
       
        $array = explode(":", $line);
        
        if($array[0] == $UserName){
        
        header("Location:P11.php ");
        }
        else {
        header("Location:P6.php");
        }
        }
}     
    ?>
<br />
<br />
</body>
</html>

