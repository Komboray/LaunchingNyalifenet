<?php
include "admin_header.php";                 
?>


 
<body>

    <section class="content" id="notif">
    <?php
// Replace these values with your actual database connection details
include("database/connect.php");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Search functionality
$search = isset($_GET['search']) ? $_GET['search'] : '';
$searchCondition = !empty($search) ? "WHERE first_name LIKE '%$search%' OR Designation LIKE '%$search%' OR Department LIKE '%$search%' OR Email LIKE '%$search%' OR Phone LIKE '%$search%'" : '';

// Fetch staff records from the database
$sql = "SELECT * FROM `staff`";
$result = $conn->query($sql);
?>



<div class="container">
    <div class="header">
        <a href="add_staff.php" class="add-button">Add New Staff</a>
        <form action="admin_manage_staff.php" method="get" class="search-form">
            <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <table >
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Department</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = "SELECT * FROM `staff`";
        $res = mysqli_query($conn, $sql);

        if($res){
            $num = mysqli_num_rows($res);
            if($num>0){
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['first_name']}</td>
                            <td>{$row['designation']}</td>
                            <td>{$row['department']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['phone']}</td>
                            <td>
                            <button onclick=\"location.href='update_staff.php?id={$row['id']}'\" class='edit-button'>Edit</button>
                                <button onclick=\"location.href='view_staff.php?id={$row['id']}'\" class='view-button'>View</button>
                            <button class='delete-button' onclick='confirmDelete({$row['id']})'>Delete</button>
            
                            </td>
                          </tr>";
                }
            }
           
        } else {
            echo "<tr><td colspan='7'>No records found.</td></tr>";
            
        }
        ?>
    </table>
</div>





       <!--- End Main page Content------>
  
        
    </div>
    </section>
    

</body>
<script>
function confirmDelete(id) {
    var confirmDelete = confirm("Are you sure you want to delete this staff record?");
    
    if (confirmDelete) {
        window.location.href = 'delete_staff.php?id=' + id;
    }
}
</script>

 
<?php
include "footer.php";                 
?>
