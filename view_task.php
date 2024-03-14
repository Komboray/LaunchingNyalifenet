<?php

include "reception_header.php";                 
?>




 
<head>
  
    <style>
    

        .task-container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .task-details {
            margin-top: 20px;
        }

        .label {
            font-weight: bold;
        }

        .value {
            margin-left: 10px;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #007BFF;
        }
    </style>
</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Task Details</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
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
    $row = $result->fetch_assoc();
    ?>

    <div class="task-container">
      

        <div class="task-details">
            <p><span class="label">Task Name:</span> <span class="value"><?= $row['task_name'] ?></span></p>
            <p><span class="label">Description:</span> <span class="value"><?= $row['description'] ?></span></p>
            <p><span class="label">Priority:</span> <span class="value"><?= $row['priority'] ?></span></p>
            <p><span class="label">Deadline:</span> <span class="value"><?= $row['deadline'] ?></span></p>
            <p><span class="label">Status:</span> <span class="value"><?= $row['status'] ?></span></p>
        </div>

        <a href="task.php" class="back-link">Back to Task List</a>
    </div>

    <?php
} else {
    echo "Task not found.";
}

// Close connection
$conn->close();
?>




<?php

include "footer.php";                 
?>

