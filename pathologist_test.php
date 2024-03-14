 
<?php
include "pathologist_header.php";  

?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Perform a test</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php       
              include("database/connect.php"); 
                
                  // SQL query to display row count 
                  // in building table 
                  $status = 'requested';
                  $currentDate = date('Y-m-d');
                  $sql = "SELECT `notification` from `labnotifications`
                          WHERE `status` = '$status' AND `date` = '$currentDate'"; 
                
                  if ($result = mysqli_query($conn, $sql)) { 
                
                  // Return the number of rows in result set 
                  $rowcount = mysqli_num_rows($result); 
                    
                  // Display result 
                  printf(" %d\n", $rowcount); 
              } 
                
              // Close the connection 
              mysqli_close($conn); 
                
              ?></h3>

                <p>Notifications</p>
              </div>
              <div class="icon">
                <i class="fas fa-tasks"></i>
              </div>
            
              <a href="pathologist_test.php#notif" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php
              $currentDate = date('Y-m-d');
              include("database/connect.php"); 
              $status = 'requested';
                  // SQL query to display row count 
                  // in building table 
                  $sql = "SELECT `testToDone` from `labnotifications`
                            WHERE `status` = '$status' AND `date` = '$currentDate'"; 
                
                  if ($result = mysqli_query($conn, $sql)) { 
                
                  // Return the number of rows in result set 
                  $rowcount = mysqli_num_rows($result); 
                    
                  // Display result 
                  printf(" %d\n", $rowcount); 
              } 
                
              // Close the connection 
              mysqli_close($conn); 
                
              ?></h3>

                <p>Tests to be performed</p>
              </div>
              <div class="icon">
                <i class="fas fa-tasks"></i>
              </div>
            
              <a href="pathologist_test.php#tests" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <!-- //the other section of imaging -->
          
    
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php
              $currentDate = date('Y-m-d');
              include("database/connect.php"); 
              $status = 'requested';
                  // SQL query to display row count 
                  // in building table 
                  $sql = "SELECT `test` from `imagingrequests`
                            WHERE `status` = '$status' AND `date` = '$currentDate'"; 
                
                  if ($result = mysqli_query($conn, $sql)) { 
                
                  // Return the number of rows in result set 
                  $rowcount = mysqli_num_rows($result); 
                    
                  // Display result 
                  printf(" %d\n", $rowcount); 
              } 
                
              // Close the connection 
              mysqli_close($conn); 
                
              ?></h3>

                <p>Imaging Tests to be performed</p>
              </div>
              <div class="icon">
                <i class="fas fa-tasks"></i>
              </div>
            
              <a href="pathologist_test.php#notif" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
    <!-- /.content-header -->
    <!-- Main content -->

    <?php if(isset($_GET["error"])){
    echo "<p class ='error'> {$_GET["error"]}; </p>";
 
  } ?>
  <?php if(isset($_GET["success"])){
    echo "<p class ='success'> {$_GET["success"]}; </p>";
 
  } ?>

    <section class="content" id="notif">
        <div class="container">
        <ol>
            <?php
            include("database/connect.php");
            $statusR = 'requested';
            //we are going to select the data from the notifications part of the table
            $sql = "SELECT * FROM `labnotifications`
                    WHERE `status` = '$statusR'";
            $res = mysqli_query($conn, $sql);
            if($res){
                $num = mysqli_num_rows($res);
                if($num>0){
                    while($row = mysqli_fetch_assoc($res)){
                        echo"<li><h3>{$row["patients_Lid"]}|</h3><p style='color:red;'>{$row["testToDone"]}|</p><p>{$row["notification"]}</p> <br> <a href='database/performTest.php?id={$row["patients_Lid"]}&test={$row["testToDone"]}&date={$row["date"]}'><button type='button'>Do the test</button></a></li>";
                            
                    }
                }else{
                    echo "<h1 style='color:red;'>You have no notification/Test to be performed!</h1>";
                }
            }

            ?>
            </ol>
            
        </div>
    </section>

    <section class="content" id="notif">
        <div class="container">
        <ol>
            <?php
            include("database/connect.php");
            $statusR = 'requested';
            //we are going to select the data from the notifications part of the table
            $sql = "SELECT * FROM `imagingrequests`
                    WHERE `status` = '$statusR'";
            $res = mysqli_query($conn, $sql);
            if($res){
                $num = mysqli_num_rows($res);
                if($num>0){
                    while($row = mysqli_fetch_assoc($res)){
                        echo"<li><h3>{$row["patient_Imageid"]}|</h3><p style='color:red;'>{$row["test"]}|</p><p>{$row["addInfo"]}</p> <br> <a href='database/performImgTest.php?id={$row["patient_Imageid"]}&test={$row["test"]}&addInfo={$row["addInfo"]}'><button type='button'>Do the test</button></a></li>";
                            
                    }
                }else{
                    echo "<h1 style='color:red;'>You have no notification for imaging/Test to be performed!</h1>";
                }
            }

            ?>
            </ol>
            
        </div>
    </section>

    

    
    
       
     
  





 
<?php

include "footer.php";                 
?>

