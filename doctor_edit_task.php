
<?php

include "doctor_header.php";                 
?>

<style>
      
        .edit-task-container {
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

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, textarea, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        .submit-button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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
            <h1 class="m-0">Edit Task</h1> 
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

    <div class="edit-task-container">
  

        <form action="process_edit_task.php" method="post">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">

            <label for="task_name">Task Name:</label>
            <input type="text" name="task_name" value="<?= $row['task_name'] ?>" required>

            <label for="description">Description:</label>
            <textarea name="description" rows="4" required><?= $row['description'] ?></textarea>

            <label for="priority">Priority:</label>
            <select name="priority" required>
                <option value="High" <?= ($row['priority'] == 'High') ? 'selected' : '' ?>>High</option>
                <option value="Medium" <?= ($row['priority'] == 'Medium') ? 'selected' : '' ?>>Medium</option>
                <option value="Low" <?= ($row['priority'] == 'Low') ? 'selected' : '' ?>>Low</option>
            </select>

            <label for="deadline">Deadline:</label>
            <input type="date" name="deadline" value="<?= $row['deadline'] ?>" required>

            <label for="status">Status:</label>
            <select name="status" required>
                <option value="Pending" <?= ($row['status'] == 'Pending') ? 'selected' : '' ?>>Pending</option>
                <option value="In Progress" <?= ($row['status'] == 'In Progress') ? 'selected' : '' ?>>In Progress</option>
                <option value="Completed" <?= ($row['status'] == 'Completed') ? 'selected' : '' ?>>Completed</option>
            </select>

            <button type="submit" class="submit-button">Save Changes</button>
        </form>

        <a href="doctor_task.php" class="back-link">Back to Task List</a>
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
