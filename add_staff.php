<?php
////////////////////////////////THIS IS THE ADMIN ADD STAFF //////////////////////////////////

include "admin_header.php";                 
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add New Staff</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

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
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

  </style>
    
    
</head>


       <?php
// Replace these values with your actual database connection details
include("database/connect.php");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user inputs
function sanitizeInput($input)
{
    return htmlspecialchars(trim($input));
}

// Function to display success or error messages
function showMessage($message, $isError = false)
{
    $class = $isError ? 'error' : 'success';
    echo "<div class='$class'>$message</div>";
}

$profile_picture = '';
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get sanitized form data
    $title = sanitizeInput($_POST['title']);
    $first_name = sanitizeInput($_POST['first_name']);
    $last_name = sanitizeInput($_POST['last_name']);
    $email = sanitizeInput($_POST['email']);
    $phone = sanitizeInput($_POST['phone']);
    $dob = sanitizeInput($_POST['dob']);
    $gender = sanitizeInput($_POST['gender']);
    $designation = sanitizeInput($_POST['designation']);
    $department = sanitizeInput($_POST['department']);
    $role = sanitizeInput($_POST['role']);
    $address = sanitizeInput($_POST['address']);
    $national_id = sanitizeInput($_POST['national_id']);
    if (!empty($_FILES['profile_picture']['name'])) {
        $uploadDir = 'uploads/'; // Specify the directory where uploaded files will be stored
        $uploadFile = $uploadDir . basename($_FILES['profile_picture']['name']);

        // Move the uploaded file to the destination folder
        if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadFile)) {
            showMessage("Profile picture uploaded successfully!");
            $profile_picture = $uploadFile; // Save the file path in the database
        } else {
            showMessage("Error uploading profile picture.", true);
        }
    }
    $password = sanitizeInput($_POST['password']);

    // Insert data into Staff table
    $sql = "INSERT INTO staff (title, first_name, last_name, email, phone, dob, gender, designation, department, role, address, national_id, profile_picture, password)
            VALUES ('$title', '$first_name', '$last_name', '$email', '$phone', '$dob', '$gender', '$designation', '$department', '$role', '$address', '$national_id', '$profile_picture', '$password')";

    if ($conn->query($sql) === TRUE) {
        showMessage("Staff information added successfully!");
    } else {
        showMessage("Error: " . $sql . "<br>" . $conn->error, true);
    }
}

// Close connection
$conn->close();


?>

<body>

    <form action="add_staff.php" method="post">
    <div class="form-container">
    <h2>Add Staff Information</h2>

    <form action="insert_staff.php" method="post">
    <label for="title">Title:</label>
        <select name="title" required>
            <option value="Dr">Dr.</option>
            <option value="Mr">Mr.</option>
            <option value="Mrs">Mrs.</option>
            <option value="Ms">Ms.</option>
        </select>

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="phone">Phone:</label>
        <input type="tel" name="phone" required>

        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" required>

        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <label for="designation">Designation:</label>
        <select name="designation" required>
            <option value="Doctor">Doctor</option>
            <option value="Nurse">Nurse</option>
            <option value="Receptionist">Receptionist</option>
            <option value="Administrator">Administrator</option>
            <option value="Pharmacist">Pharmacist</option>
            <option value="Pathologist">Pathologist</option>
            <option value="Accountant">Accountant</option>
        </select>

        <label for="department">Department:</label>
        <select name="department" required>
            <option value="Obstetrics and Gynaecology">Obstetrics and Gynaecology</option>
            <option value="Front Desk">Front Desk</option>
            <option value="Radiography">Radiography</option>
            <option value="Billing">Billing</option>
            <option value="Pharmacy">Pharmacy</option>
            <option value="Laboratory">Laboratory</option>
            <option value="Out Patient Department">Out Patient Department</option>
            <option value="In Patient Department">In Patient Department</option>
        </select>
        
        <label for="role">Role:</label>
        <select name="role" required>
            <option value="Doctor">Doctor</option>
            <option value="Nurse">Nurse</option>
            <option value="Receptionist">Receptionist</option>
            <option value="Administrator">Administrator</option>
            <option value="Pharmacist">Pharmacist</option>
            <option value="Pathologist">Pathologist</option>
            <option value="Accountant">Accountant</option>
        </select>

        <label for="address">Address:</label>
        <input type="text" name="address" required>

        <label for="national_id">National ID:</label>
        <input type="text" name="national_id" >

        <label for="profile_picture">Profile Picture:</label>
        <input type="file" name="profile_picture" accept="image/*" >

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        
        <input type="submit" value="Add Staff">
    </form>

    <?php
    // Display success or error messages
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        showMessage("Staff information added successfully!");
    }
    ?>
</div>

</body>

 
<?php

include "footer.php";                 
?>

