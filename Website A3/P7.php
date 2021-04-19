<?php
session_start();
global $i;
global $id;
global $backup;
$thisPage = basename($_SERVER["PHP_SELF"]);
include "header_P7.php";
include "fncs_P7P8.php";

$_SESSION["add" . $i] = 0;
for ($i = 0; $i < $numCategories; $i++) {
    if (isset($_POST["add" . $i]) && !empty($_POST["add" . $i])) {
        $_SESSION["add" . $i] + 1;
        header("Location: P8Add.php");
        exit();
    }
}

#echo $i;
$file = fopen("products.txt", "r");
$fsize = filesize("products.txt");
$page = fread($file, $fsize);
fclose($file);
$output = explode(PHP_EOL, $page);


if (!isset($_SESSION["ONCE"])) {
    $_SESSION["ONCE"] = 0;
    $backup = $output;
    $backup = implode(PHP_EOL, $backup);
    $_SESSION["backup"] = $backup;
}




$_SESSION["add"]++;
$id = 36;
if (isset($_SESSION["submit"])) {
    $addedProduct = array(++$id, $_SESSION["product"], $_SESSION["image"], $_SESSION["quantity"], $_SESSION["size"], $_SESSION["type"], $_SESSION["nutritional_source"], $_SESSION["available"], $_SESSION["price"]);
    $index = array_search($_SESSION["add" . $i], $output);
    $index++;
    array_splice($output, $index, 0, $addedProduct);
    file_put_contents("products.txt", implode("\n", $output));
}
unset($_SESSION["submit"]);

$new = array();
$count = 0;
for ($k = 0; $k < 6; $k++) {
    $_SESSION["count"] = $count;
    $j = 0;
    while ($output[$_SESSION["count"]] !== "#") {
        for ($i = 0; $i <= 8; $i++) {
            $new[$k][$j][$i] = $output[$_SESSION["count"]];
            $_SESSION["products"] = $new;
            $_SESSION["count"] = ++$count;
        }
        $j++;
    }
    $_SESSION["count"] = ++$count;
}
$_SESSION["products"] = $new;

?>

<script type="text/javascript">
    var counter = 0;
    var products_array = <?php echo json_encode($_SESSION["products"]); ?>;
    var categories_array = <?php echo json_encode($_SESSION["categories"]); ?>;
    var header_array = <?php echo json_encode($_SESSION["header"]); ?>;
    var body = document.getElementsByTagName("body")[0]; //Banner and Tables
    var aisles = document.createElement("div"); //Everything but banner
    aisles.className = "container";
    br();
    for (var i = 0; i < products_array.length; i++) {
        var title = document.createElement("h3");
        title.appendChild(document.createTextNode(categories_array[i])); //Categories
        title.id = "category" + (i);

        aisles.appendChild(title);

        var table = document.createElement("table");
        table.name = "table" + (i);
        var tBody = document.createElement("tbody");

        var row = document.createElement("tr");
        for (var l = 0; l < header_array.length; l++) { //Top row for the tables
            var colTitle = document.createElement("th");
            if (l == header_array.length - 1) {
                document.getElementsByName("colTitle").innerHTML = addButton(this);
            } else {
                colTitle.appendChild(document.createTextNode(header_array[l]));
            }
            row.appendChild(colTitle);
        }
        tBody.appendChild(row);

        for (var j = 0; j < products_array[i].length; j++) { //All rows
            var row = document.createElement("tr");
            for (var k = 0; k < products_array[i][j].length + 1; k++) { //Individual rows

                switch (k) {
                    case 2:
                        var cell = document.createElement("td");
                        var image = document.createElement("img");
                        image.src = products_array[i][j][k];
                        image.style.width = "100px";
                        image.style.height = "100px";
                        image.alt = "poo";
                        cell.appendChild(image);
                        break;
                    case 3:
                        var cell = document.createElement("td");
                    case 4:
                    case 5:
                    case 6:
                        var list = document.createElement("ul");
                        list.style.listStyle = "circle";
                        list.style.margin = "5px";
                        var element = document.createElement("li");
                        element.textContent = (products_array[i][j][k]);
                        list.appendChild(element);
                        cell.appendChild(list);
                        break;
                    case 9:
                        var cell = document.createElement("td");
                        document.getElementsByName("cell").innerHTML = editDeleteButtons(this);
                        break;
                    default:
                        var cell = document.createElement("td");
                        cell.appendChild(document.createTextNode(products_array[i][j][k]));
                }
                row.appendChild(cell);
            }
            tBody.appendChild(row);
        }

        tBody.className = "table table-striped table-hover";
        table.appendChild(tBody);
        aisles.appendChild(table)
        body.appendChild(aisles);
        table.className = "container";
        table.id = "Vegetables_and_Fruits_Table";
        table.style.textAlign = "center";
        table.setAttribute("border", "2");
        br();
        br();
    }

    function addButton(i) {
        var form = document.createElement("form");
        form.id = "add";
        form.method = "POST";
        var addbtn = document.createElement("button");
        addbtn.innerHTML = form;
        addbtn.type = "submit";
        addbtn.className = "btn btn-secondary btn-lg btn-block";
        addbtn.value = "Add";
        addbtn.textContent = "Add";
        addbtn.name = "add".concat(counter);
        form.appendChild(addbtn);
        colTitle.appendChild(form);
        counter++;
    }

    function editDeleteButtons(target) {
        var form1 = document.createElement("form");
        form1.action = "P8Edit.php";
        form1.id = "edit-delete";
        var editbtn = document.createElement("button");
        editbtn.type = "submit";
        editbtn.className = "btn btn-secondary btn-lg btn-block";
        editbtn.value = "Edit";
        editbtn.textContent = "Edit";
        editbtn.style.margin = "0px";
        form1.appendChild(editbtn);
        cell.appendChild(form1);

        var form2 = document.createElement("form");
        form2.id = "edit-delete";
        form2.method = "POST";
        var deletebtn = document.createElement("button");
        deletebtn.type = "button";
        deletebtn.value = "Delete";
        deletebtn.className = "btn btn-secondary btn-lg btn-block, fa fa-trash-o";
        deletebtn.style.fontSize = "24px";
        deletebtn.name = "deleteButton";
        deletebtn.onclick = function() {
            deleteRow(this)
        };
        form2.appendChild(deletebtn);
        cell.appendChild(form2);
    }

    function br() {
        var addSpace = document.createElement("br");
        aisles.appendChild(addSpace);
    }
    //Deletes current product
    function deleteRow(target) {
        var row = target.parentNode.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
</script>

</body>

</html>
