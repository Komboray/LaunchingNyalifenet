<?php
// Replace these values with your actual database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nyalife(3)";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$id = $_POST['id'];
$task_name = $_POST['task_name'];
$description = $_POST['description'];
$priority = $_POST['priority'];
$deadline = $_POST['deadline'];
$status = $_POST['status'];

// Update data in the "tasks" table
$sql = "UPDATE tasks SET task_name='$task_name', description='$description', priority='$priority', deadline='$deadline', status='$status' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Task updated successfully!";
} else {
    echo "Error updating task: " . $conn->error;
}

// Close connection
$conn->close();
?>
