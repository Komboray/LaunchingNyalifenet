<?php


include "database/connect.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    if(isset($_POST["inventory"])){
        $name = $_POST['name'];
    $category = $_POST['category'];
    $supplier = $_POST['supplier'];
    $store = $_POST['store'];
    
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $reorder_quantity = $_POST['reorderQuantity'];
   
    $re_order_time = $_POST['reOrderTime'];
    $Discontinued = $_POST['discontinued'];
    $inventoryVal = $quantity*$price;

    // Perform SQL insertion
    $query = "INSERT INTO inventory (name, category, supplier, store, description, quantity, price,reorderQuantity,reOrderTime,inventoryVal,Discontinued)
              VALUES ('$name', '$category', '$supplier', '$store', '$description', '$quantity', '$price','$reorder_quantity','$re_order_time','$inventoryVal','$Discontinued')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        // Item added successfully, redirect to inventory page
        header("Location: admin_hosp_inventory.php?success=item added successfully");
        exit();
    } else {
        // Handle insertion error
        header("Location: admin_hosp_inventory.php?error=item was not added an error occured");
         mysqli_error($conn);
    }
    }
}

?>
