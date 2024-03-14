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
$sql = "SELECT * FROM staff WHERE ID = $id";
$result = $conn->query($sql);

// Close connection
$conn->close();

// Check if the record exists
if ($result->num_rows == 0) {
    // Redirect to manage_staff.php if the record doesn't exist
    header("Location: manage_staff.php");
    exit();
}

// Get the staff details for pre-filling the form
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



<div class="form-container">
    <h2>Update Staff Information</h2>

    <form action="process_update_staff.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">

        <label for="title">Title:</label>
        <select name="title" required>
            <option value="Dr" <?= ($title == 'Dr') ? 'selected' : '' ?>>Dr.</option>
            <option value="Mr" <?= ($title == 'Mr') ? 'selected' : '' ?>>Mr.</option>
            <option value="Mrs" <?= ($title == 'Mrs') ? 'selected' : '' ?>>Mrs.</option>
            <option value="Ms" <?= ($title == 'Ms') ? 'selected' : '' ?>>Ms.</option>
        </select>

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="<?= $first_name ?>" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="<?= $last_name ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= $email ?>" required>

        <label for="phone">Phone:</label>
        <input type="tel" name="phone" value="<?= $phone ?>" required>

        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" value="<?= $dob ?>" required>

        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="Male" <?= ($gender == 'Male') ? 'selected' : '' ?>>Male</option>
            <option value="Female" <?= ($gender == 'Female') ? 'selected' : '' ?>>Female</option>
            <option value="Other" <?= ($gender == 'Other') ? 'selected' : '' ?>>Other</option>
        </select>

        <label for="designation">Designation:</label>
        <select name="designation" required>
            <option value="Doctor" <?= ($designation == 'Doctor') ? 'selected' : '' ?>>Doctor</option>
            <option value="Nurse" <?= ($designation == 'Nurse') ? 'selected' : '' ?>>Nurse</option>
            <option value="Receptionist" <?= ($designation == 'Receptionist') ? 'selected' : '' ?>>Receptionist</option>
            <option value="Administrator" <?= ($designation == 'Administrator') ? 'selected' : '' ?>>Administrator</option>
            <option value="Pharmacist" <?= ($designation == 'Pharmacist') ? 'selected' : '' ?>>Pharmacist</option>
            <option value="Pathologist" <?= ($designation == 'Pathologist') ? 'selected' : '' ?>>Pathologist</option>
            <option value="Accountant" <?= ($designation == 'Accountant') ? 'selected' : '' ?>>Accountant</option>
        </select>

        <label for="department">Department:</label>
        <select name="department" required>
            <option value="Obstetrics and Gynaecology" <?= ($department == 'Obstetrics and Gynaecology') ? 'selected' : '' ?>>Obstetrics and Gynaecology</option>
            <option value="Front Desk" <?= ($department == 'Front Desk') ? 'selected' : '' ?>>Front Desk</option>
            <option value="Radiography" <?= ($department == 'Radiography') ? 'selected' : '' ?>>Radiography</option>
            <option value="Billing" <?= ($department == 'Billing') ? 'selected' : '' ?>>Billing</option>
            <option value="Pharmacy" <?= ($department == 'Pharmacy') ? 'selected' : '' ?>>Pharmacy</option>
            <option value="Laboratory" <?= ($department == 'Laboratory') ? 'selected' : '' ?>>Laboratory</option>
            <option value="Out Patient Department" <?= ($department == 'Out Patient Department') ? 'selected' : '' ?>>Out Patient Department</option>
            <option value="In Patient Department" <?= ($department == 'In Patient Department') ? 'selected' : '' ?>>In Patient Department</option>
        </select>

        <label for="role">Role:</label>
        <select name="role" required>
            <option value="Doctor" <?= ($role == 'Doctor') ? 'selected' : '' ?>>Doctor</option>
            <option value="Nurse" <?= ($role == 'Nurse') ? 'selected' : '' ?>>Nurse</option>
            <option value="Receptionist" <?= ($role == 'Receptionist') ? 'selected' : '' ?>>Receptionist</option>
            <option value="Administrator" <?= ($role == 'Administrator') ? 'selected' : '' ?>>Administrator</option>
            <option value="Pharmacist" <?= ($role == 'Pharmacist') ? 'selected' : '' ?>>Pharmacist</option>
            <option value="Pathologist" <?= ($role == 'Pathologist') ? 'selected' : '' ?>>Pathologist</option>
            <option value="Accountant" <?= ($role == 'Accountant') ? 'selected' : '' ?>>Accountant</option>
        </select>

        <label for="address">Address:</label>
        <input type="text" name="address" value="<?= $address ?>" required>

        <label for="national_id">National ID:</label>
        <input type="text" name="national_id" value="<?= $national_id ?>">

        <label for="profile_picture">Profile Picture:</label>
        <input type="file" name="profile_picture" accept="image/*">

        <label for="password">Password:</label>
        <input type="password" name="password" value="<?= $password ?>" required>

        <input type="submit" value="Update Staff">
        <a href="admin_manage_staff.php">Go back</a>
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