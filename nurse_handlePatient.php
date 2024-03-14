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
                
            //   // Close the connection 
            //   mysqli_close($conn); 
                
              ?> </h3>

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
          
        <!-- ORDER DETAILS LIST -->
        <div class="details">

            <div class="recentOrders">

                <div class="cardHeader">
                    <h2>Today's Patients</h2>
                    <!-- <button type="button" class="btn"><a href="http://" style="text-decoration: none;">View all</a></button> -->
                </div>
    
                <table cellpadding="2" cellspacing="1">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Stage</td>
                            <td>Visit</td>
                            <td>Status</td>
                            <td>Add Triage details</td>
                            <td></td>
                            
                        </tr>
                    </thead>
        
                    <tbody>
                        <?php
                        $currentDate = date("Y-m-d");
                        // echo "<h1>$currentDate </h1>";
                        $sql = "SELECT *
                                FROM `patients`
                                WHERE `date` = '$currentDate'";

                        $result = mysqli_query($conn, $sql);
                        if($result){
                            $num = mysqli_num_rows($result);

                            if($num>0){
                                while($row = mysqli_fetch_assoc($result)){

                                    echo "
                                    <tr>
                                    
                                        <td>{$row["FirstName"]}</td>
                                        <td>{$row["rooms"]}</td>
                                        <td>{$row["timeOfArrival"]}</td>
                                        <td><span class='status delivered'>In the line</span></td>
                                        <td><a href='database/addTriageDetails.php?id={$row["PatientID"]}&name={$row["FirstName"]}&dob={$row["DOB"]}'><span class='material-symbols-outlined' style='color:red;'>add</span></a></td>
                                        <td><a href='nurse-medicines.php'><span class='material-symbols-outlined' style='color:red;'>vaccines</span></a></td>                                        
                                    </tr>
                                    ";
                                }
                            }else{
                                echo "<h1 style = 'color:red;'>There is no patient today</h1>";
                            }
                        }
                        


                        ?>
                
                    </tbody>
                </table>
                

            </div>

      
            <!-- NEW CUSTOMERS -->
            <div class="recentCustomers">
                <div class="cardHeader">
                    <h2>Recent Patients</h2>
                </div>
                  <?php

                    $sql = "SELECT *
                            FROM `patients`";
                    $res = mysqli_query($conn, $sql);

                    if($res){

                        $num = mysqli_num_rows($res);

                        if($num > 0){
                            while($row = mysqli_fetch_assoc($res)){
                                // <table>
                                // <tr>                
            
                                //     <td class='popup-trigger' onclick='openPopupForm()' style = 'text-decoration:none;'>
                                //         <h4>{$row["username"]} <br> <span>{$row["email"]}</span></h4>
                                //     </td>
                                // </tr>
            
                                // </table>
                                echo "
                                <table id='userTable'>
                                <tr class='clickable-row'>                
            
                                    <td class='popup-trigger view_data' onclick='openPopupForm()' style = 'text-decoration:none;'>
                                        <h4 class='user_id'> <br>{$row["FirstName"]} <br> <span>{$row["EmailAddress"]}</span></h4>
                                    </td>
                                </tr>
            
                                </table>
                                
                                
                                
                                ";
                            }
                        }
                    }
                  
                ?>

                
                
            </div>



    
        </div>
                        

</div>

       
     

  <!-- //BELOW IS THE ADDED PART    //BELOW IS THE ADDED PART //BELOW IS THE ADDED PART -->
  


 
  <?php

include "footer.php";                 
?>