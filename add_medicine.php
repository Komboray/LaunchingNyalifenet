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
            
              <a href="admin_manage_medicine.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          

          <body>

    <!-- <-- ORDER DETAILS LIST --> 
    <div class="details">

        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Medicine</h2>
                <a href="database/medicineView.php"><button> View all medicines</button></a>
      
    </div>
    <div class="contain">
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
             
             <button type='submit' name = 'medsSubmit' style = 'float:inherit; background-color:#FF00FF;'>Add medicine</button>
              </div>

             
              </form>
        </div>
        <br>
        <br>
        <br>
        <br>

        <?php

include "footer.php";                 
?>
    
                    
                
               
        
                
              
          

    





    





        


 



