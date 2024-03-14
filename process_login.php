<?php
// Replace these values with your actual database connection details
include("database/connect.php");


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS); 
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS); 



// Check user credentials in the "staff" table
$sql = "SELECT * FROM staff WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $role = $row['designation'];

    // Redirect based on the user's role
    switch ($role) {
        case 'Doctor':
            header("Location: doctor_index.php");
            break;

        case 'Receptionist':
            header("Location: reception_index.php");
            break;

        case 'Administrator':
            header("Location: admin_index.php");
            break;

        case 'Lab':
            header("Location: pathologist_index.php");
            break;
        // Add more cases for additional roles if needed
        case 'Nurse':
            header("Location: nurse_index.php");
            break;

        default:
            // Redirect to a default page if the role is not recognized
            header("Location: default_index.php");
            break;
    }
} else {
    header("Location:../index.php?error=Invalid email or password. Please try again");
    
}

// Close connection
$conn->close();
?>
