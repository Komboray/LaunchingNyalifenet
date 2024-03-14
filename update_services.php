<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="nya-logo.jpg">
     
  
    <style>
 body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.form-container {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

label {
    display: block;
    margin: 10px 0 5px;
}

input, select {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #3498db;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #2980b9;
}


        </style>
    
</head>

<!-- MATERIAL ICONS FROM GOOGLE --> <!-- MATERIAL ICONS FROM GOOGLE -->

<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">


<!-- the css link --><!-- the css link --><!-- the css link --><!-- the css link --><!-- the css link -->

<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<body>

       <?php
// Replace these values with your actual database connection details
include("database/connect.php");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$id = $_GET['id'] ?? '';

// Fetch staff record from the database for the selected ID
$sql = "SELECT * FROM services WHERE ID = $id";
$result = $conn->query($sql);

// Close connection
$conn->close();

// Check if the record exists
if ($result->num_rows == 0) {
    // Redirect to manage_staff.php if the record doesn't exist
    header("Location: manage_services.php");
    exit();
}

// Get the staff details for pre-filling the form
$row = $result->fetch_assoc();
$service = $row['nameOfService'];
$tat = $row['tat'];
$price = $row['price'];


?>



<div class="form-container">
    <h2>Update Service Information</h2>

    <form action="process_update_meds.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">

        <label for="first_name">Name of Service:</label>
        <input type="text" name="first_name" value="<?= $service ?>" required>

        <label for="last_name">TAT:</label>
        <input type="text" name="last_name" value="<?= $tat ?>" required>

        <label for="email">Price:</label>
        <input type="email" name="email" value="<?= $price ?>" required>

        <input type="submit" value="Update Services">
        <a href="charges.php">Go back</a>
    </form>
</div>



       <!--- End Main page Content------>
        
            </div>

    
        </div>

        
    </div>
</body>
<!-- THE DIFF SCRITS --> <!-- THE DIFF SCRITS --> <!-- THE DIFF SCRITS -->

<script src="js/main.js"></script>
</html>