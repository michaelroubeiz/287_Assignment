
<!DOCTYPE html>
<html lang = "en">

    <head>
        <meta charset = "UTF-8">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="p12Style.css"/>

        <!-- bootstrap for nav bar toggle -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <title>P12 Add Order</title>

        <nav class="navbar navbar-expand-md" id="top_bar">
            <a class="navbar-brand"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"> &#9660</span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <a class="nav-link" href="P1.php">Homepage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="P9.php">User list</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="P11.php">Order list</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout_P7.php">End Session</a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <div class="header">
            <a href=hp1.php>
                <h1>Concordia Supermarket</h1>
            </a>
            <p>Best place to find all your needs</p>
        </div>

        <nav class="navbar navbar-expand-md">
            <a class="navbar-brand" href="homepage.html">Categories</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"> &#9660</span>
            </button>
    
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                <li class="nav-item">
                        <a class="nav-link" href="P2.php?aisle_id=1">Vegetable and fruits</a>
                    </li>       
                    
                    <li class="nav-item">
                        <a class="nav-link" href="P2.php?aisle_id=2">Dairy and Eggs</a>
                    </li> 
    
                    <li class="nav-item">
                        <a class="nav-link" href="P2.php?aisle_id=3">Pantry</a>
                    </li> 
    
                    <li class="nav-item">
                        <a class="nav-link" href="P2.php?aisle_id=4">Beverages</a>
                    </li> 
    
                    <li class="nav-item">
                        <a class="nav-link" href="P2.php?aisle_id=5">Meat and Poultry</a>
                    </li> 
    
                    <li class="nav-item">
                        <a class="nav-link" href="P2.php?aisle_id=6">Snacks</a>
                    </li> 
                </ul>
            </div>
        </nav>

        <!-- footer --->
        <div class="bottom_row" >
            <button class="collapsible" id="info_button">Info</button>
            <div class="content">
                <br>
                <h3>Welcome to Concordia Supermarket! </h3>
                <p>Click on any aisle to be brought to a page of products. Add these products to your cart and get an estimation on how much they'll cost!</p>
        
                <a href="contact_us.html">Contact Us</a>
            </div>
        </div>

        <script>
            var bt = document.getElementById("info_button");

            bt.addEventListener("click", function() 
            {
                this.classList.toggle("active");

                var content = this.nextElementSibling;
                if (content.style.maxHeight)
                {
                    content.style.maxHeight = null;
                } 
                else 
                {
                    content.style.maxHeight = content.scrollHeight + "px";
                } 
            });
        </script>
    </head>


    <body>
        <!--- form --->
        <form method = "POST">
            <table>        
            <caption>Add Order</caption>
                 <tr>
                    <td><b>Customer email</b></td>
                    <td><input name = "orderNumber" class = "textInput" type="text" required pattern = "[[0-9a-zA-Z.+_]+@[0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}" title = "ten digit number"></td>
                 </tr>
            </table>
            <input class = "submitButton" type = "submit" value = "Submit">
        </form>
        <?php
            if(isset($_POST['orderNumber']))
            {
                $order_file = fopen('orders.txt', 'a') or die("Unable to open file:(");
                $str_order = ("\n" . $_POST['orderNumber']);
                fwrite($order_file, $str_order);
                fclose($order_file);
            }
        ?>
        <form action="/P11.php">
            <button class = "cancelButton">Return</button>
        </form>
    </body>
</html>
