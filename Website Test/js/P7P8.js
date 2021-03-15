function br() {
    var addSpace = document.createElement("br");
    aisles.appendChild(addSpace);
}

function addButton(i) {
    var form = document.createElement("form");
    form.action = "P8Add.html";
    form.id = "add";
    var addbtn = document.createElement("button");
    addbtn.innerHTML = form;
    addbtn.type = "submit";
    addbtn.className = "btn btn-secondary btn-lg btn-block";
    addbtn.value = "Add";
    addbtn.textContent = "Add";
    form.appendChild(addbtn);
    colTitle.appendChild(form);
}

function editDeleteButtons(target) {
    var form1 = document.createElement("form");
    form1.action = "P8Edit.html";
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
    var deletebtn = document.createElement("button");
    deletebtn.type = "button";
    deletebtn.value = "Delete";
    deletebtn.className = "btn btn-secondary btn-lg btn-block, fa fa-trash-o";
    deletebtn.style.fontSize = "24px";
    deletebtn.onclick = function() { deleteRow(this) };
    form2.appendChild(deletebtn);
    cell.appendChild(form2);
}

var product_array = [
    //Fruits and Vegetables
    [
        ["Banana", "../images/banana.png", "Quantity: 6 (per bunch)", "Size: 7-8 inches", "Type: Fruit", "Nutritional Source: Potassium, Fiber", 10, "$0.33/190g"],
        ["Apple", "../images/apple.png", "Quantity: 48 (per box)", "Size: 2 3⁄4 to 3 1⁄4 inches in diameter", "Type: Fruit", "Nutritional Source: Fiber, Vitamin C", 8, "$0.86/170g"],
        ["Tomato", "../images/tomato.png", "Sold Individually", "Size: 50 to 70mm in diameter", "Type: Fruit", "Nutritional Source: Vitamin A, Fiber", 7, "$1.76/200g"],
        ["Lettuce", "../images/lettuce.png", "Sold Individually", "Size: 8 inches in diameter", "Type: Vegetable", "Nutritional Source: Vitamin A, Vitamin C", 11, "$2.99/800g"],
        ["Carrot", "../images/carrot.png", "Quantity: 12 (per bunch)", "Size: 10 inches", "Type: Vegetable", "Nutritional Source: Fiber, Calcium", 15, "$1.99/38g"],
        ["Onion", "../images/onion.png", "Sold Individually", "Size: 4.5 inches", "Type: Vegetable", "Nutritional Source: Fiber", 4, "$4.39/300g"]
    ],

    //Dairy and Eggs
    [
        ["Eggs", "../images/eggs.jpg", "Quantity: 12 (per box)", "Size: 10 inches", "Type: Eggs", "Nutritional Source: Iron", 5, "$3.49/340g"],
        ["Milk", "../images/milk.png", "Quantity: 2 bags", "Size: 10 inches", "Type: Dairy", "Nutritional Source: Protein, Calcium", 19, "$6.86/4L"],
        ["Cheese", "../images/cheese.png", "Sold Individually", "Size: 27cm", "Type: Dairy", "Nutritional Source: Fat, Calcium", 17, "$5.49/270g"],
        ["Butter", "../images/butter.png", "Sold Individually", "Size: 10cm", "Type: Dairy", "Nutritional Source: Fat", 3, "$4.69/454g"],
        ["Yogurt", "../images/yogurt.png", "Sold Individually", "Size: 8cm", "Type: Dairy", "Nutritional Source: Protein, Carbs", 13, "$6.99/750g"],
        ["Cream Cheese", "../images/cream_cheese.jpg", "Sold Individually", "Size: 8cm", "Type: Dairy", "Nutritional Source: Fat, Carbs", 35, "$5.49/250g"]
    ],

    //Pantry
    [
        ["Ketchup", "../images/ketchup.png", "Sold Individually", "Size: 12cm", "Type: Condiment", "Nutritional Source: Sugar, Sodium", 34, "$3.99/1L"],
        ["Salt", "../images/salt.png", "Sold Individually", "Size: 10cm", "Type: Seasoning", "Nutritional Source: Sodium", 3, "$6.49/1.36kg"],
        ["Sugar", "../images/sugar.jpg", "Sold Individually", "Size: 15cm", "Type: Condiment", "Nutritional Source: Protein, Carbs", 9, "$3.49/2kg"],
        ["Olive Oil", "../images/olive oil.png", "Sold Individually", "Size: 20cm", "Type: Condiment", "Nutritional Source: Fat", 10, "$12.99/1L"],
        ["Spaghetti", "../images/spaghetti.jpg", "Sold Individually", "Size: 15cm", "Type: Pasta", "Nutritional Source: Carbs", 15, "$2.39/500g"],
        ["Mayonnaise", "../images/mayonnaise.jpg", "Sold Individually", "Size: 13cm", "Type: Condiment", "Nutritional Source: Fat", 67, "$6.49/600g"]
    ],

    //Beverages
    [
        ["Water", "../images/water.png", "Quantity: 15 (per box)", "Size: 15cm", "Type: Beverage", "Nutritional Source: Water", 13, "$4.49/330ml"],
        ["Juice", "../images/juice.png", "Sold Individually", "Size: 17cm", "Type: Beverage", "Nutritional Source: Water, Sugar", 8, "$2.79/190g"],
        ["Soft Drink (Coca Cola)", "../images/coca-cola.png", "Sold Individually", "Size: 12cm", "Type: Beverage", "Nutritional Source: Sugar", 27, "$1.89/1.25L"],
        ["Coffee", "../images/coffee.jpg", "Sold Individually", "Size: 11cm", "Type: Dairy", "Nutritional Source: Micronutrients", 12, "$$6.99/100g"],
        ["Tea", "../images/tea.png", "Sold Individually", "Size: 10cm", "Type: Beverage", "Nutritional Source: Antioxidants", 18, "$3.49/24oz"],
        ["Almond Milk", "../images/almond_milk.jpg", "Quantity: 3 (per box)", "Size: 10cm", "Type: Beverage", "Nutritional Source: Fats, Protein", 3, "$3.70/300g"]
    ],

    //Meat and Poultry
    [
        ["Ground Beef", "../images/ground_beef.png", "Sold Individually", "Size: 8cm", "Type: Meat", "Nutritional Source: Protein", 24, "$1.54/100g"],
        ["Chicken", "../images/chicken.png", "Sold Individually", "Size: 10cm", "Type: Poultry", "Nutritional Source: Protein", 48, "$12.54/1.6kg"],
        ["Steak", "../images/steak.jpg", "Sold Individually", "Size: 9cm", "Type: Meat", "Nutritional Source: Protein", 17, "$8.88/130g"],
        ["Wieners", "../images/sausage.png", "Sold Individually", "Size: 8cm", "Type: Meat", "Nutritional Source: Protein", 321, "$$5.99/100g"],
        ["Turkey", "../images/turkey.jpg", "Sold Individually", "Size: 16cm", "Type: Poultry", "Nutritional Source: Protein", 13, "$61.83/8kg"],
        ["Duck", "../images/duck.jpg", "Sold Individually", "Size: 12cm", "Type: Poultry", "Nutritional Source: Protein", 13, "$19.28/500g"]
    ],

    //Snacks
    [
        ["Popcorn", "../images/popcorn.png", "Quantity: 6 (per box)", "Size: 12cm", "Type: Snack", "Nutritional Source: Magnesium, Phosphorus", 3, "$5.59/340g"],
        ["Lays Chips", "../images/chips.png", "Sold Individually", "Size: 7cm", "Type: Snack", "Nutritional Source: Fat, Sodium", 8, "$1.89/50g"],
        ["Chocolate", "../images/chocolate.png", "Sold Individually", "Size: 12cm", "Type: Snack", "Nutritional Source: Sugar, Protein", 50, "$3.39/135g"],
        ["Cookies", "../images/cookies.jpg", "Sold Individually", "Size: 12cm", "Type: Snack", "Nutritional Source: Sugar, Carbohydrates", 23, "$3.99/255g"],
        ["Nuts", "../images/nuts.jpg", "Sold Individually", "Size: 13cm", "Type: Snack", "Nutritional Source: Magnesium, Fiber", 43, "$12.99/300g"],
        ["Jell-o", "../images/jello.jpg", "Quantity: 2 (per box)", "Size: 7cm", "Type: Snack", "Nutritional Source: Sugar", 17, "$3.29/265g"]
    ]
];

//For titles for each table
var categories = ["Vegetables and Fruits", "Dairy and Eggs", "Pantry", "Beverages", "Meat and Poultry", "Snacks"];
var header = ["Product", "Image", "Description", "Quantity", "Price", ""] //For th




// function addProduct() {
//     var product = document.getElementById("product").value;
//     // var image = document.getElementById("image").value;
//     var description = document.getElementById("description").value;
//     // var quantity = document.getElementById("quantity").value;
//     // var price = document.getElementById("price").value;

//     document.getElementsByTagName("h2")[0].innerHTML += "doo";
//     // document.getElementsByName("table" + (i)).innerHTML += ("<tr><td>" + product + "</td><td>" + description + "</td></tr>");

//     // var getTable = document.getElementsByTagName("table")[i];
//     // var newRow = getTable.createElement("tr");
//     // var cell1 = newRow.createElement("td");
//     // cell1.innerHTML = document.createTextNode(document.getElementById("product").value);
//     //var cell2 = newRow.insertCell(1);

//     // var cell3 = newRow.insertCell(2);
//     // cell3.innerHTML = document.createTextNode(document.getElementById("description").value);
//     // var cell4 = newRow.insertCell(3);
//     // cell4.innerHTML = document.createTextNode(document.getElementById("quantity").value);
//     // var cell5 = newRow.insertCell(4);
//     // cell5.innerHTML = document.createTextNode(document.getElementById("price").value);

//     //  newRow.appendChild(cell1, cell2, cell3, cell4, cell5);
//     // tBody.appendChild(newRow);


//     // var table = document.getElementById("table"); // set this to your table

//     // var tbody = document.createElement("tbody");
//     // table.appendChild(tbody);
//     // orderArray.forEach(function(items) {
//     //     var row = document.createElement("tr");
//     //     items.forEach(function(item) {
//     //         var cell = document.createElement("td");
//     //         cell.textContent = item;
//     //         row.appendChild(cell);
//     //     });
//     //     tbody.appendChild(row);
//     // });
// }


// function editValues(target) {
//     var newProduct = P8Edit.getElementById("product").value;
//     // var newImage = P8Edit.getElementById("image").value;
//     // var newDescription = P8Edit.getElementById("description").value;
//     // var newQuantity = P8Edit.getElementById("quantity").value;
//     // var newPrice = P8Edit.getElementById("price").value;

//     var productCell = target.parentNode.parentNode.firstChild;
//     productCell.parentNode.innerHTML = newProduct;

// }

//Deletes current product
function deleteRow(target) {
    var row = target.parentNode.parentNode.parentNode;
    row.parentNode.removeChild(row);
}