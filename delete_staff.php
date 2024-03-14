<?php
// Replace these values with your actual database connection details
include("database/connect.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the staff ID from the URL parameter
$id = $_GET['id'] ?? '';

// Check if the ID is valid and exists in the database
$sql = "SELECT * FROM Staff WHERE ID = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    // Redirect to manage_staff.php if the record doesn't exist
    header("Location: manage_staff.php");
    exit();
}

// Delete the staff record
$sql_delete = "DELETE FROM Staff WHERE ID = $id";

if ($conn->query($sql_delete) === TRUE) {
    $message = "Staff record deleted successfully!";
} else {
    $message = "Error deleting staff record: " . $conn->error;
}

// Close connection
$conn->close();
?>