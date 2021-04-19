<?php
session_start();
?>
<?php

$header = array("name", "email", "");
$categories = array("Vegetables and Fruits", "Dairy and Eggs", "Pantry", "Beverages", "Meat and Poultry", "Snacks");
$numberOfCategories = count($categories);

$_SESSION["header"] = $header;
$_SESSION["categories"] = $categories;
$_SESSION["users"] = $users;





?>