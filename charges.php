<?php

include "admin_header.php";                 
?>

    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.table-container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.add-button {
    background-color: #3498db;
    color: #fff;
    padding: 8px 12px;
    text-decoration: none;
    border-radius: 5px;
}

.search-form {
    display: flex;
    margin-top: 10px;
}

input[type="text"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button[type="submit"] {
    background-color: #2ecc71;
    color: #fff;
    padding: 8px 12px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.staff-table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

.staff-table th, .staff-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.staff-table th {
    background-color: #3498db;
    color: #fff;
}

.staff-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.edit-button, .view-button, .delete-button {
    background-color: #3498db;
    color: #fff;
    padding: 6px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    margin-right: 5px;
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
            <h1 class="m-0">Manage Services</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

       <?php
// Replace these values with your actual database connection details
include("database/connect.php");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Search functionality
$search = isset($_GET['search']) ? $_GET['search'] : '';
$searchCondition = !empty($search) ? "WHERE nameOfService LIKE '%$search%' OR id LIKE '%$search%' OR tat LIKE '%$search%' OR price LIKE '%$search%'" : '';

// Fetch staff records from the database
$sql = "SELECT `id`, `nameOfService`, `tat`, `price` FROM `services` $searchCondition";
$result = $conn->query($sql);


?>



<div class="table-container">
    <div class="header">
        <a href="manage_services.php" class="add-button">Add service</a>
        <form action="manage_staff.php" method="get" class="search-form">
            <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <table class="staff-table">
        <tr>
            <th>ID</th>
            <th>Name of Service</th>
            <th>tat</th>
            <th>price</th>
            
        </tr>
        <?php
        $sql = "SELECT * FROM `services`";
        $res = mysqli_query($conn, $sql);

        if($res){
            $num = mysqli_num_rows($res);
            if($num>0){
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nameOfService']}</td>
                            <td>{$row['tat']}</td>
                            <td>{$row['price']}</td>
                            
                            <td>
                            <button onclick=\"location.href='update_services.php?id={$row['id']}'\" class='edit-button'>Edit</button>
                                
                            <button class='delete-button' onclick='confirmDelete({$row['id']})'>Delete</button>
            
                            </td>
                          </tr>";
                }
            }
           
        } else {
            echo "<tr><td colspan='7'>No records found.</td></tr>";
            // Close connection
$conn->close();
        }
        ?>
    </table>
</div>





       <!--- End Main page Content------>
        
            </div>

    
        </div>

        
    </div>
</body>
<script>
function confirmDelete(id) {
    var confirmDelete = confirm("Are you sure you want to delete this service record?");
    
    if (confirmDelete) {
        window.location.href = 'delete_services.php?id=' + id;
    }
}
</script>

 
<?php

include "footer.php";                 
?>
