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
                  $sql = "SELECT * from patients"; 
                
                  if ($result = mysqli_query($conn, $sql)) { 
                
                  // Return the number of rows in result set 
                  $rowcount = mysqli_num_rows( $result ); 
                    
                  // Display result 
                  printf(" %d\n", $rowcount); 
              } 
                
              // Close the connection 
              mysqli_close($conn); 
                
              ?> </h3>
              <?php if(isset($_GET["error"])){
    echo "<p class ='error'> {$_GET["error"]}; </p>";
 
  } ?>

                <p>Patients Profiles</p>
              </div>
              <div class="icon">
                <i class="fas fa-users mr-2"></i>
              </div>
              <a href="nurse_handlePatient.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div> 
          </div>
        </div>
 
          
          
       
     

  





 
<?php

include "footer.php";                 
?>