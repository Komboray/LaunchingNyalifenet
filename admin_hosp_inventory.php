<?php

include "admin_header.php";                 
?>


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Inventory</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
      
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php
              
              
  
              // localhost is localhost 
              // servername is root 
              // password is empty 
              // database name is database 
              include("database/connect.php"); 
                
                  // SQL query to display row count 
                  // in building table 
                  $sql = "SELECT * from `patients`
                          WHERE `rooms` = 'billing'"; 
                
                  if ($result = mysqli_query($conn, $sql)) { 
                
                  // Return the number of rows in result set 
                  $rowcount = mysqli_num_rows( $result ); 
                    
                  // Display result 
                  printf(" %d\n", $rowcount); 
              } 
                
              // Close the connection 
              mysqli_close($conn); 
                
              ?> </h3>

                <p>Inventory</p>
              </div>
              <div class="icon">
                <i class="fas fa-inbox mr-2"></i>
              </div>
              <a href="admin_hosp_inventory.php#inventory" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div> 
          </div>
       
      </div>
      
      <head>
    <style>
  

        table {
            /*width: 100%;*/
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-container {
            display: flex;
            align-items: center;
        }

        .search-box {
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        .add-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .add-button:hover {
            background-color: #45a049;
        }
        .container {
            max-width: 1200px;
            height:500px;
            margin: 60px auto;
            padding: 60px;
            
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Enable horizontal scroll on small screens */
        }
    </style>
</head>
  <div class="button-container">
        <div>
            <button class="add-button" onclick="location.href='add_inventory.php'">Add Item Stock</button>
        </div>
        <div class="search-container">
            <input type="text" id="searchBox" class="search-box" placeholder="Search...">
            <button onclick="searchRecords()">Search</button>
        </div>
    </div>

    <div class="container">
    <?php
   include "database/connect.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    // Fetch data from the 'inventory' table
    $query = "SELECT * FROM inventory";
    $result = mysqli_query($conn, $query);

    // Check if there is data
    if (mysqli_num_rows($result) > 0) {
        // Display the table header
        echo "<table style='overflow-y: auto;'>";
        echo "<tr>
                <th>Name</th>
                <th>Category</th>
                <th>Supplier</th>
                <th>Store</th>
                <th>Price</th>
                <th>Description</th>
                <th>reOrder quantity</th>
                <th>Quantity in stock</th>
                <th>Inventory value</th>
                <th>reorder time in days</th>
                
                <th>Date</th>
                
              </tr>";

        // Display data rows
        while ($row = mysqli_fetch_assoc($result)) {
          $reorderQuantity = $row['reorderQuantity'] ?? null;
          $inventoryVal = $row['inventoryVal'] ?? null;
          $reOrderTime = $row['reOrderTime'] ?? null;
          $discontinued = $row['discontinued'] ?? null;

            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['category']}</td>
                    <td>{$row['supplier']}</td>
                    <td>{$row['store']}</td>
                    <td>{$row['price']}</td>
                    <td>{$row['description']}</td>
                      <td>$reorderQuantity</td>
                      <td>{$row['quantity']}</td>
                    <td>$inventoryVal</td>
                    <td>$reOrderTime</td>
                    
                    
                    <td>{$row['date']}</td>
                    
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "No records found";
    }

 // Close the connection 
              mysqli_close($conn);    
        
    ?>

    </div>
    <script>
        function searchRecords() {
            var searchBoxValue = document.getElementById("searchBox").value.toLowerCase();
            var table = document.querySelector("table");
            var rows = table.querySelectorAll("tr");

            for (var i = 1; i < rows.length; i++) {
                var cells = rows[i].querySelectorAll("td");
                var found = false;

                for (var j = 0; j < cells.length; j++) {
                    var cellValue = cells[j].textContent.toLowerCase();

                    if (cellValue.includes(searchBoxValue)) {
                        found = true;
                        break;
                    }
                }

                if (found) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    </script>

       
     

  





 
<?php

include "footer.php";                 
?>