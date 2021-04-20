<?php
session_start();
global $i;
$thisPage = basename($_SERVER["PHP_SELF"]);
include "header_P7.php";

if (array_key_exists("submit", $_POST)) {
    setValues();
}
function setValues()
{
    if (isset($_POST["submit"]) && !empty($_POST["submit"])) {
        $_SESSION["product"] = $_POST["product"];
        $_SESSION["image"] = $_POST["image"];
        $_SESSION["quantity"] = $_POST["quantity"];
        $_SESSION["size"] = $_POST["size"];
        $_SESSION["type"] = $_POST["type"];
        $_SESSION["nutritional_source"] = $_POST["nutritional_source"];
        $_SESSION["available"] = $_POST["available"];
        $_SESSION["price"] = $_POST["price"];
        $_SESSION["submit"] = $_POST["submit"];
        header("Location: P7.php");
        exit();
    } else {
        echo "error";
    }
}

if (isset($_POST["cancel"])) {
    header("Location: P7.php");
    exit();
}


?>

<script type="text/javascript">
    function validate() {
        var product = document.getElementsByName("product").value;
        var image = document.getElementsByName("image").value;
        var quantity = document.getElementsByName("quantity").value;
        var size = document.getElementsByName("size").value;
        var type = document.getElementsByName("type").value;
        var nutritional_source = document.getElementsByName("nutritional_source").value;
        var available = document.getElementsByName("available").value;
        var price = document.formsgetElementsByName("price").value;
        if ((product == null || product == "") && (image == null || image == "") && (quantity == null || quantity == "") && (size == null || size == "") && (type == null || type == "") && (nutritional_source == null || nutritional_source == "") && (available == null || available == "") && (price == null || price == "")) {
            alert("Not all boxes filled!");
            return false;
        }
    }
</script>


</head>

<body>
    <form class="form-horizontal" name="Form" method="POST">
        <div class="form-group">
            <label for="inputName3" class="col-sm-2 control-label">
                <br />
                <h3>Add Product</h3>
            </label>
        </div>
        <div class="form-group">
            <label for="inputName3" class="col-sm-2 control-label">
                <h5>Product:</h5>
            </label>
            <div class="col-sm-10">
                <input name="product" type="text" class="form-control" id="inputName3" placeholder="ex: Banana" />
            </div>
        </div>
        <div class="form-group">
            <label for="inputName3" class="col-sm-2 control-label">
                <h5>Select Image<span style="font-size:15px"> (png or jpg)</span>:</h5>
            </label>
            <div class="col-sm-10">
                <input name="image" type="file" class="form-control" accept="image/png, image/jpeg" id="inputName3" placeholder="jpeg and png only" />
            </div>
        </div>

        <div class="form-group">
            <label for="inputDescription3" class="col-sm-2 control-label">
                <h5>Description:</h5>
            </label>

            <div class="form-group">
                <div class="col-sm-10">
                    <label for="title">Quantity:</label>
                    <input name="quantity" type="text" class="form-control" placeholder="ex: 46 (per box)" />
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10">
                    <label for="title">Size:</label>
                    <input name="size" type="text" class="form-control" placeholder="ex: 8cm" />
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10 ">
                    <label for="title ">Type:</label>
                    <input name="type" type="text" class="form-control" placeholder="ex: Beverage" />
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10 ">
                    <label for="title ">Nutritional Source:</label>
                    <input name="nutritional_source" type="text" class="form-control" placeholder="ex: Potassium, Fiber" />
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="inputQuantity3" class="col-sm-2 control-label">
                <h5>Quantity <span style="font-size:15px">(# Available)</span>:</h5>
            </label>
            <div class="col-sm-10">
                <input name="available" type="text" class="form-control" id="inputQuantity3" placeholder="ex: 5" />
            </div>
        </div>

        <div class="form-group">
            <label for="inputQuantity3" class="col-sm-2 control-label">
                <h5>Price:</h5>
            </label>
            <div class="col-sm-10">
                <input name="price" type="text" class="form-control" id="inputPrice3" placeholder="ex: $0.33/190g" />
            </div>
        </div>

        <div>
            <br />
            <button type="submit" name="cancel" value="Cancel" class="btn btn-secondary btn-lg btn-block" style="width:100px">Cancel</button>
            <br />
            <button type="submit" onclick="" name="submit" value="Enter" class="btn btn-secondary btn-lg btn-block" style="width:100px">Save</button>
        </div>
    </form>
</body>

</html>