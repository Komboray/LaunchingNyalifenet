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

.view-container {
    max-width: 600px;
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

.staff-info {
    margin-top: 20px;
}

label {
    display: block;
    margin: 10px 0 5px;
    font-weight: bold;
}

span {
    display: inline-block;
    margin-bottom: 10px;
}

img {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
}

.back-button {
    display: block;
    background-color: #3498db;
    color: #fff;
    padding: 8px 12px;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
    margin-top: 20px;
}

.back-button:hover {
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
    <!---------------------------------MAIN--------------------------------------------------->

    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <span class="material-symbols-outlined">menu</span>
                        
            </div>

            
            
            <!-- <div class="user">
                <img src="" alt="" >
            </div> -->

        </div>
        <?php
// Replace these values with your actual database connection details
include("database/connect.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the staff ID from the URL parameter
$id = $_GET['id'] ?? '';

// Fetch staff record from the database for the selected ID
$sql = "SELECT * FROM Staff WHERE ID = $id";
$result = $conn->query($sql);

// Close connection
$conn->close();

// Check if the record exists
if ($result->num_rows == 0) {
    // Redirect to manage_staff.php if the record doesn't exist
    header("Location: manage_staff.php");
    exit();
}

// Get the staff details
$row = $result->fetch_assoc();
$title = $row['title'];
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email'];
$phone = $row['phone'];
$dob = $row['dob'];
$gender = $row['gender'];
$designation = $row['designation'];
$department = $row['department'];
$role = $row['role'];
$address = $row['address'];
$national_id = $row['national_id'];
$profile_picture = $row['profile_picture'];
$password = $row['password'];
?>
        
<div class="view-container">
    <h2>View Staff Information</h2>

    <div class="staff-info">
        <label>Title:</label>
        <span><?= $title ?></span>

        <label>First Name:</label>
        <span><?= $first_name ?></span>

        <label>Last Name:</label>
        <span><?= $last_name ?></span>

        <label>Email:</label>
        <span><?= $email ?></span>

        <label>Phone:</label>
        <span><?= $phone ?></span>

        <label>Date of Birth:</label>
        <span><?= $dob ?></span>

        <label>Gender:</label>
        <span><?= $gender ?></span>

        <label>Designation:</label>
        <span><?= $designation ?></span>

        <label>Department:</label>
        <span><?= $department ?></span>

        <label>Role:</label>
        <span><?= $role ?></span>

        <label>Address:</label>
        <span><?= $address ?></span>

        <label>National ID:</label>
        <span><?= $national_id ?></span>

        <label>Profile Picture:</label>
        <img src="<?= $profile_picture ?>" alt="Profile Picture">

        <!-- Note: Displaying password for viewing purposes only -->
        <label>Password:</label>
        <span><?= $password ?></span>
    </div>

    <a href="manage_staff.php" class="back-button">Back to Staff List</a>
</div>

            </div>

    
        </div>

        
    </div>
</body>
<!-- THE DIFF SCRITS --> <!-- THE DIFF SCRITS --> <!-- THE DIFF SCRITS -->

<script src="js/main.js"></script>
</html>