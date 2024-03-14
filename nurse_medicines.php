<?php

include "nurse_header.php";                 
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Administer Medicine</h1> 
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
                  $sql = "SELECT * from adminmeds"; 
                
                  if ($result = mysqli_query($conn, $sql)) { 
                
                  // Return the number of rows in result set 
                  $rowcount = mysqli_num_rows( $result ); 
                    
                  // Display result 
                  printf(" %d\n", $rowcount); 
              } 
                
              // Close the connection 
              mysqli_close($conn); 
                
              ?> </h3>

                <p>Medicines to be administered</p>
              </div>
              <div class="icon">
                <i class="fas fa-users mr-2"></i>
              </div>
              <a href="nurse_medicines.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          
            
          </div>

        </div>

        <!-- <-- ORDER DETAILS LIST --> 
        <div class="details">

            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Administer Medicine</h2>
                    
                </div>
                <?php
                include("database/connect.php");
                $sql =  "SELECT * 
                        FROM `medicines`";
                $response = mysqli_query($conn, $sql);
                    if($response){
                        $num = mysqli_num_rows($response);
                        if($num>0){
                            while($row = mysqli_fetch_assoc($response)){
                                echo"
                                <table border='2' style = 'overflow-y:auto;'>
                                <thead>
                                    <tr>
                                
                                    
                                    <td>Name</td>
                                    <td>Ingredients</td>
                                    <td>dosage</td>
                                    <td>Indications</td>
                                    
                                    <td>Usage</td>
                                    
                                    
                                    
                                    <td>Side Effects</td>
                                    <td>warnings</td>
                                    <td>Cost</td>
                                    <td>Expiry Date</td>
                                    
                                    <td>quantity</td>
                                    
                                    <td>Date of Entry</td>
                                    
                                    

                                    </tr>
                                </thead>
                    
                                <tbody>
                                    <tr>
                                    <td>{$row["Name"]}</td>
                                    <td>{$row["ingredients"]}</td>
                                    <td>{$row["dosage"]}</td>
                                    <td>{$row["indications"]}</td>
                                    
                                    <td>{$row["indications"]}</td>
                                    <td>{$row["sideEffects"]}</td>
                                    <td>{$row["warnings"]}</td>
                                    <td>{$row["cost"]}</td>
                                    
                                    <td>{$row["expiryDate"]}</td>
                                    <td>{$row["quantity"]}</td>
                                    <td>{$row["dateOfEntry"]}</td>
                                    
                                        <td><a href='database\administerMeds.php?id={$row["id"]}&name={$row["Name"]}'><span class='material-symbols-outlined' style='color:red;' onclick='togglePopup()'>vaccines</span></a></td>
                                        
                                    </tr>
                    
                                    
                                </tbody>
                            </table>
                                ";

                            }
                        }else{
                            echo "<h1 style = 'color:red;'>There is no medicine to be administered!</h1>";
                    }
                    }
                ?>
                
    
                
            </div>

            

    
        </div>
 

  





 
<?php

include "footer.php";                 
?>