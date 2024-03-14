 
<?php

include "reception_header.php";                 
?>



<head>
  
    <style>
     
        .table-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .search-form {
            display: flex;
            align-items: center;
        }

        input[type="text"] {
            margin-right: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .add-button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
        }

        .edit-button, .view-button, .delete-button {
            background-color: #008CBA;
            color: white;
            padding: 5px 8px;
            text-decoration: none;
            border-radius: 3px;
            margin-right: 5px;
            cursor: pointer;
        }

        .delete-button {
            background-color: #f44336;
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
            <h1 class="m-0">Task List</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php
// Replace these values with your actual database connection details
include("database.connect.php");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Search functionality
$search = isset($_GET['search']) ? $_GET['search'] : '';
$searchCondition = !empty($search) ? "WHERE task_name LIKE '%$search%' OR priority LIKE '%$search%' OR deadline LIKE '%$search%' OR status LIKE '%$search%'" : '';

// Fetch task records from the database
$sql = "SELECT id, task_name, priority, deadline, status FROM tasks $searchCondition";
$result = $conn->query($sql);

// Close connection
$conn->close();
?>

<div class="table-container">
    <div class="header">
        <a href="add_task.php" class="add-button">Add New Task</a>
        <form action="task.php" method="get" class="search-form">
            <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Task Name</th>
            <th>Priority</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['task_name']}</td>
                        <td>{$row['priority']}</td>
                        <td>{$row['deadline']}</td>
                        <td>{$row['status']}</td>
                        <td>
                            <a href='edit_task.php?id={$row['id']}' class='edit-button'>Edit</a>
                            <a href='view_task.php?id={$row['id']}' class='view-button'>View</a>
                            <button class='delete-button' onclick='confirmDelete({$row['id']})'>Delete</button>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found.</td></tr>";
        }
        ?>
    </table>
</div>

<script>
function confirmDelete(id) {
    var confirmDelete = confirm("Are you sure you want to delete this task?");
    
    if (confirmDelete) {
        window.location.href = 'delete_task.php?id=' + id;
    }
}
</script>






<?php

include "footer.php";                 
?>