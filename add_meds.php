 
<?php

include "reception_header.php";                 
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
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php
              
              
  
                // localhost is localhost 
                // servername is root 
                // password is empty 
                // database name is database 
                include("database/connect.php"); 
                  
                    // SQL query to display row count 
                    // in building table 
                    $sql = "SELECT * from medicines"; 
                  
                    if ($result = mysqli_query($conn, $sql)) { 
                  
                    // Return the number of rows in result set 
                    $rowcount = mysqli_num_rows( $result ); 
                      
                    // Display result 
                    printf(" %d\n", $rowcount); 
                } 
                  
                // Close the connection 
                mysqli_close($conn); 
                  
                ?> 
</h3>

                <p>Appointments</p>
              </div>
              <div class="icon">
                <i class="fas fa-calendar-check mr-2"></i>
              </div>
              <a href="manage_appointments.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
             
          </div>
          <!-- ./col -->
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

                <p>Patients Profiles</p>
              </div>
              <div class="icon">
                <i class="fas fa-users mr-2"></i>
              </div>
              <a href="manage_patients.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>4</h3>

                <p>Tasks</p>
              </div>
              <div class="icon">
                <i class="fas fa-tasks"></i>
              </div>
            
              <a href="task.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          

        </div>
        
                <br>
                <br>
                <!-- THIS IS THE FORM THAT EDITS USER DETAILS -->

    <div id="popupFormEdit" class="popup-form-container">
       <h3 style = "color:red">Are you sure you want to remove the patient from the Line</h3>
        <form action = "database/edit-from.php" method = "POST">
            <label for="name">Enter the email you want to update:</label>
            <input type="email" id="email-compared" name="email-compared" placeholder = "Confrim from recent patients" required><br>

            <label for="name">Name:</label>
            <input type="text" id="name-edit" name="name-edit" placeholder = "Enter new name" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email-edit" name="email-edit" placeholder = "Enter new email" required><br>
            <br>
            <button type="submit" name="Send-update">Yes</button>
        </form>
        <br>
        <span onclick="closePopupForm()">Close</span>
    </div>

    <!-- THIS IS THE END OF THE FORM THAT EDITS USER DETAILS -->

    <div class='timeline-items'>
    <?php
                        include("database/connect.php");
                        $currentDate = date("Y-m-d");
                        
                        $sql = "SELECT *
                                FROM `patients`
                                WHERE `date` = '$currentDate'";

                        $result = mysqli_query($conn, $sql);
                        if($result){
                            $num = mysqli_num_rows($result);

                            if($num>0){
                                while($row = mysqli_fetch_assoc($result)){

                                    echo "
                                    
                                    <div class='timeline-item' onclick='openPopupForm()'>
                                    <div class='timeline-dot'></div>
                                    <div class='timeline-date'> {$row["FirstName"]} </div>
                                    <div class='timeline-content'>
                                    <div style='color:white;'>Room:{$row["rooms"]}</div>
                                    
                                    <div style='color:white;'>Arrival: {$row["visitTime"]}</div>
                                    <span class='status delivered'>In the line</span>

                                    


                                    </div>
                                    ";
                                    echo "{$row["statusLine"]}";
                                }
                            }else{
                              echo "<h2 style = 'color:red;'>There are no patients today! </h2>";
                            }
                        }
                        


                        ?>
                        

</div>


            
                <!-- ///ABOVE IS THE ADDED PART -->
                
            </div>            

          </div>  
          <script>
            // Function to open the popup form for editing user details
              function openPopupForm() {
                  var popupForm = document.getElementById('popupFormEdit');
                  popupForm.style.display = 'block';
                }

                // Function to close the popup form for editing user details
                function closePopupForm() {
                  var popupForm = document.getElementById('popupFormEdit');
                  popupForm.style.display = 'none';
                }
          </script>
 
<?php

include "footer.php";                 
?>

