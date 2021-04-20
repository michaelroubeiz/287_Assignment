<?php
session_start();

if($_SESSION["email"]=="admin"){
    if(!isset($_POST['logout'])){
        echo "";
?>
<link rel="stylesheet" type="text/css" href="P5P6_loginStyle.css">
<html lang = "en">
<head>
<title>Admin</title>
<meta charset="utf-8"/>

<meta name="viewport" content="width=device-width, initial-scale=0">  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<nav class="navbar navbar-expand-md" id="top_bar">
            <a class="navbar-brand"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"> &#9660</span>
            </button>
    
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="grocery_cart.html">Grocery Cart</a>
                    </li>       
                    
                    <li class="nav-item">
                        <a class="nav-link" href="p5p6_LoginPage.html">Login</a>
                    </li> 
    
                    <li class="nav-item">
                        <a class="nav-link" href="P7.html">Product list</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="P9.html">User list</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="P11.html">Order list</a>
                    </li>
    
                </ul>
            </div>
        </nav>
        <div class="header">
        <a class="nav-link" href="P5P6_LoginPage.html">
            <h1>Concordia Supermarket</h1>
        </a>
        <p>Best place to find all your needs</p>

        </div>
     <!--Navbar-->
     <nav class="navbar navbar-expand-md">
     <a class="navbar-brand" href="">Categories</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"> &#9660</span>
     </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="aisles.html?aisle_id=1">Vegetable and fruits</a>
            </li>       
            
            <li class="nav-item">
                <a class="nav-link" href="aisles.html?aisle_id=2">Dairy and Eggs</a>
            </li> 

            <li class="nav-item">
                <a class="nav-link" href="aisles.html?aisle_id=3">Pantry</a>
            </li> 

            <li class="nav-item">
                <a class="nav-link" href="aisles.html?aisle_id=4">Beverages</a>
            </li> 

            <li class="nav-item">
                <a class="nav-link" href="aisles.html?aisle_id=5">Meat and Poultry</a>
            </li> 

            <li class="nav-item">
                <a class="nav-link" href="aisles.html?aisle_id=6">Snacks</a>
                  </li> 
              </ul>
          </div>
      </nav>
    </head>

<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <p>Logged in as Admin</p>
        <input class="btn btn-secondary " type="submit" value="Log Out" name="logout">
        <style>
            .btn
            {
              background: rgb(180, 60, 60);
              border-radius: 4px;
              border: 2px solid rgb(180, 60, 60);
              font-size: 15px;
              color: #fff;
            }
            .btn:hover {
              background: #c2bebe;
              color: #fff;
              border: 2px solid #c2bebe;
            }
            </style>
</form>


<div class="footer" >
      <button class="collapsible" id="info_button">Info</button>
      <div class="content">
          <br>
          <h3>Welcome to Concordia Supermarket! </h3>
          <p>Click on any aisle to be brought to a page of products. Add these products to your cart and get an estimation on how much they'll cost!</p>
      </div>

      <script>
        var bt = document.getElementById("info_button");

        bt.addEventListener("click", function() {
            this.classList.toggle("active");

            var content = this.nextElementSibling;
            if (content.style.maxHeight){
            content.style.maxHeight = null;
            } 
            else {
            content.style.maxHeight = content.scrollHeight + "px";
            } 
        });
    </script>
</div>


</body>

<?php
    if(!isset($_POST['logout'])){unset($_SESSION["email"]);}

    }else{
        unset($_SESSION["email"]);
    }
}else{
    header('Location: redirectToLogin.php');
}
?>