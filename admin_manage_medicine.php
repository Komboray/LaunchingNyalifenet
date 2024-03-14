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
            <h1 class="m-0">Dashboard</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php
              
              
  
              // localhost is localhost 
              // servername is root 
              // password is empty 
              // database name is database 
              include("database/connect.php"); 
                
                  // SQL query to display row count 
                  // in building table 
                  $sql = "SELECT * from `medicines`"; 
                
                  if ($result = mysqli_query($conn, $sql)) { 
                
                  // Return the number of rows in result set 
                  $rowcount = mysqli_num_rows( $result ); 
                    
                  // Display result 
                  printf(" %d\n", $rowcount); 
              } 
                
              // Close the connection 
              mysqli_close($conn); 
                
              ?> </h3>

                <p>Medicines</p>
              </div>
              <div class="icon">
                <i class="fas fa-tasks"></i>
              </div>
            
              <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark mr-2">
              <div class="inner">
                <h3></h3>

                <p>Administer medicine to patient</p>
              </div>
              <div class="icon">
                <i class="fas fa-headphones"></i>
              </div>
              <a href="database/adminMeds.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              
            </div>
            
          </div>

        </div>
 
          
          <div>
       
     
<head>
  

<head>
 
    <style>
        /* Your existing CSS styles go here */
        .tables-container {
            display: flex;
            margin-bottom: 20px;
            width: 100%;
        }

        table {
            flex: 1;
            width: 100%;
            border-collapse: collapse;
            margin-right: 10px;
         
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
          background-color: #A9A9A9;
        }

        .choices-container {
            display: flex;
            margin-bottom: 20px;
        }

        .choice-column {
            flex: 1;
            padding: 10px;
            text-align: center;
            cursor: pointer;
        }

        .active-choice {
            background-color: #A9A9A9;
        }
    </style>
</head>
<body>

    <!-- <-- ORDER DETAILS LIST --> 
    <div class="details">

        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Medicine</h2>
                <a href="database/medicineView.php"><button> View all medicines</button></a>
        
        
    </div>
    <?php
        include("database/connect.php");
        $sql = "SELECT *
                FROM `medicines`";
        $res = mysqli_query($conn, $sql);
        if($res){
            $num = mysqli_num_rows($res);

            if($num>0){
                while($row = mysqli_fetch_assoc($res)){
                    echo "<table border='2' style = 'overflow-y:auto;'>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>ingredients</td>
                            <td>dosage</td>
                            <td>Indications</td>
                            
                            <td>Usage</td>
                            
                            
                            
                            <td>Side Effects</td>
                            <td>Warnings</td>
                            <td>Cost</td>
                            <td>Expiry Date</td>
                            
                            <td>Quantity</td>
                            
                            
                            <td>Date of Entry</td>
                        </tr>
                    </thead>
        
                    <tbody>
                    
                        <tr>
                            
                            <td>{$row["Name"]}</td>
                            <td>{$row["ingredients"]}</td>
                            <td>{$row["dosage"]}</td>
                            <td>{$row["indications"]}</td>
                            
                            
                            <td>{$row["usage"]}</td>
                            
                            <td>{$row["sideEffects"]}</td>
                            
                            <td>{$row["warnings"]}</td>
                            
                            <td>{$row["cost"]}</td>
                            <td>{$row["expiryDate"]}</td>
                            <td>{$row["quantity"]}</td>
                            <td>{$row["dateOfEntry"]}</td>
                            
                            <td><span class='status delivered'>In storage</span></td>
                            <td><a href='admin_view_meds.php?id={$row['id']}' style= 'color:red;'>View</a></td>
                        </tr>
        
                        
                    </tbody>
                </table>";
                }
            }else{
                echo "<h1 style='color:purple;text-align:center;'>You have no medicines in storage!</h1>
                <h1 style='color:red;text-align:center;'>Add a medicine below</h1>
        

                <div class='contain' style = 'overflow:auto;'>
                <div class='head'>
                <h2 style='color:blue;text-align:center;'></h2>
                </div>

               <form action='database/meds.php' class='form' id = 'form' method = 'POST'  enctype='multipart/form-data'>
                 <div class='form-control'>
                 <label for='image'>Choose an image of the medicine:</label>
                 <input type='file' name='image' id='image' accept='image/*'>
                 
                 
                    <label for='name'>Name of medicine</label>
                     <input type='text' name='Name' id='name' required>
                     
                     <label for='dosage' >dosage</label>
                     <input type='number' name='dosage' id='dosage' required>
                     
                    
                     
                     <label for='sideEffects' >sideEffects</label>
                     <input type='text' name='sideEffects' id='sideEffects' required>
                     
                     <label for='expiryDate' >expiryDate	</label>
                     <input type='date' name='expiryDate' id='expiryDate' required>
                     
                     <label for='cost' >cost</label>
                     <input type='number' name='cost' id='cost' required>
                     <label for='ingredients' >Ingredients</label>
                     <input type='text' name='ingredients' id='warnings' required>
                     <label for='indications' >Indications</label>
                     <input type='text' name='indications' id='indications' required>
                     <label for='' >Warning Precautions</label>
                     <input type='text' name='warnings' id='warnings' required>
                     <label for='usage' >Usage</label>
                     <input type='text' name='usage' id='usage' required>
                     <label for='quantity' >Quantity</label>
                     <input type='number' name='quantity' id='interactions' required>
                     
                     <button type='submit' name = 'medsSubmit' style = 'float:inherit;'>Add medicine</button>
                      </div>
        
                     
                      </form>
                </div>
        
                
                ";
            }
        }
        ?>
    

    
</div>




</div>
    
</body>


 




<?php

include "footer.php";                 
?>
