<?php
// Replace these values with your actual database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nyalife(3)";

// Get the task ID from the URL parameter
$taskID = $_GET['id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch task information based on the provided ID
$sql = "SELECT * FROM tasks WHERE id = $taskID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Delete task record from the "tasks" table
    $deleteSql = "DELETE FROM tasks WHERE id = $taskID";

    if ($conn->query($deleteSql) === TRUE) {
        // Redirect to task.php after successful deletion
        header("Location: doctor_task.php");
        exit();
    } else {
        echo "Error deleting task: " . $conn->error;
    }
} else {
    echo "Task not found.";
}

// Close connection
$conn->close();
?>
