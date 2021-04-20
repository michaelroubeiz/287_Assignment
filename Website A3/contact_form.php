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
    $file = fopen("Sign_Up_Information.txt", "r");
}
if($file)
{
    while(($line = fgets($file)))
    {
       
        $array = explode(":", $line);
        
        if($array[0] == $UserName){
            echo $UserName;
            $found=true;
            fclose($file);
        
        }

        if($found)
        {
            header("Location:P11.php ");
        }else {
            echo "File is not found...Please Sign Up";
            header("Location:P6.php ");
            }
            
    }
}     
    ?>
<br />
<br />
</body>
</html>
