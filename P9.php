<?php
session_start();

$thisPage = basename($_SERVER["PHP_SELF"]);

global $backup;
global $a;
global $id;
include "header_P9.php";


$_SESSION["add" . $a] = 0;
for ($a = 0; $a < $numberOfCategories; $a++)
 {
if (isset($_POST["add" . $a]) && !empty($_POST["add" . $a])) 
{
  $_SESSION["add" . $a] + 1;
  header("Location: P9Add.php");
    exit();
  }
}

$file = fopen("users.txt", "r");
$size_file = filesize("users.txt");
$page = fread($file, $size_file);
fclose($file);
$output = explode(PHP_EOL, $page);




$_SESSION["add"]++;
$id = 2;
if (isset($_SESSION["submit"])) {
    $addedUser = array(++$id, $_SESSION["name"], $_SESSION["email"]);
    $index = array_search($_SESSION["add" . $a], $output);
    $index++;
    array_splice($output, $index, 0, $addedUser);
    file_put_contents("users.txt", implode("\n", $output));
}
unset($_SESSION["submit"]);



?>

<script type="text/javascript">
    var counter = 0;
    var categoriesArray = <?php echo json_encode($_SESSION["categories"]); ?>;
    var headerArray = <?php echo json_encode($_SESSION["header"]); ?>;
    var body = document.getElementsByTagName("body")[0]; 
    var namesArray = <?php echo json_encode($_SESSION["names"]); ?>;
  
   


    for (var i = 0; i < usersArray.length; i++) 
    {
        var title = document.createElement("h1");
        title.appendChild(document.createTextNode(categoriesArray[i])); 
        title.id = "category" + (i);

    
        var table = document.createElement("table");
        table.name = "table" + (i);
        var tableBody = document.createElement("tableBody");

        var row = document.createElement("tr");
        for (var l = 0; l < headerArray.length; l++) 
        { 
            var colTitle = document.createElement("th");
            if (l == headerArray.length - 1) {
                document.getElementsByName("colTitle").innerHTML = addButton(this);
            } else {
                colTitle.appendChild(document.createTextNode(headerArray[l]));
            }
            row.appendChild(colTitle);
        }
        tableBody.appendChild(row);

        for (var j = 0; j < usersArray[i].length; j++) { 
            var row = document.createElement("tr");
            for (var k = 0; k < usersArray[i][j].length + 1; k++) { 

                switch (k) {
                    case 0:
                        var cell = document.createElement("td");
                        var email = document.createElement("p"); // not sure about how to create Element for emails
                        cell.appendChild(email);
                        break;
                    case 1:
                        var cell = document.createElement("td");
    
                    case 2:
                        var cell = document.createElement("td");
                        document.getElementsByName("cell").innerHTML = deleteEdit(this);
                        break;
                    default:
                        var cell = document.createElement("td");
                        cell.appendChild(document.createTextNode(usersArray[i][j][k]));
                }
                row.appendChild(cell);
            
            }
            tableBody.appendChild(row);
        }

        tableBody.className = "table table-striped table-hover";
        table.appendChild(tableBody);
        
        table.id = "Users_Table";
        table.style.textAlign = "center";
        table.setAttribute("border", "4");
        

 
    function deleteRow(target) 
    {
        var row = target.parentNode.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }


    function addButton(i) 
    {
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

    function deleteEdit(target) {
        var first_form = document.createElement("form");
        first_form.action = "P9Edit.php";
        first_form.id = "edit-delete";
        var editbtn = document.createElement("button");
        editbtn.type = "submit";
        editbtn.className = "btn btn-secondary btn-lg btn-block";
        editbtn.value = "Edit";
        editbtn.textContent = "Edit";
        editbtn.style.margin = "0px";
        first_form.appendChild(editbtn);
        cell.appendChild(first_form);

        var second_form = document.createElement("form");
        second_form.id = "edit-delete";
        second_form.method = "POST";
        var deletebtn = document.createElement("button");
        deletebtn.type = "button";
        deletebtn.value = "Delete";
        deletebtn.className = "btn btn-secondary btn-lg btn-block, fa fa-trash-o";
        deletebtn.style.fontSize = "24px";
        deletebtn.name = "deleteButton";
        deletebtn.onclick = function() {
            deleteRow(this)
        };
        second_form.appendChild(deletebtn);
        cell.appendChild(second_form);
    }

 
</script>

</body>

</html>
