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
                //   $sql = "SELECT * from messages"; 
                
                //   if ($result = mysqli_query($conn, $sql)) { 
                
                  // Return the number of rows in result set 
                //   $rowcount = mysqli_num_rows( $result ); 
                    
                  // Display result 
            //       printf(" %d\n", $rowcount); 
            //   } 
                
              // Close the connection 
              mysqli_close($conn); 
                
              ?> </h3>

                <p>Video Chat</p>
              </div>
              <div class="icon">
                <i class="fas fa-users mr-2"></i>
              </div>
              <a href="nurse_messaging.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div> 
          </div>
        </div>

<body>
<div class="container">
            
        

            <div class="search">
                <label for="search">
                    
                    <input type="search" name="search" id="search" value="Search here">
                </label>
            </div>
            
            <!-- <div class="user">
                <img src="" alt="" >
            </div> -->

        </div>

        <!-- NEW PROG BEGINS HERE -->

        <section class ="timeline-section">

        <!-- this wasnt There --><!-- this wasnt There --><!-- this wasnt There --><!-- this wasnt There --><!-- this wasnt There -->
       
        <div>
            <!-- TESTIMONIALS -->

        <section class="testimonials">
            
            
            <?php
            include('database/connect.php');

            $sql = "SELECT * 
                    FROM `group_messo`";

            $response = mysqli_query($conn, $sql);

            if($response){
                $num = mysqli_num_rows($response);

                if($num > 0){
                    while($row = mysqli_fetch_assoc($response)){
                        // echo $row["name"] . "<br>";
                        // echo $row["email"] . "<br>";
                        // echo $row["comment"] . "<br>";
                        echo"
                            <div class='row'>
                            <div class='testimonial-col'>
                            
                            <div>
                            <p>
                            {$row['message']}
                            </p>
                        // <h3> {$row['name']}</h3>
                        </div>

                        </div>

                        
                        </div>";
                    }
                }else{
                    echo "<h1>You Do not have any messages</h1>";
                }
            }

            
            ?>

        </section>

        
            
            

        <?php

          
                    
                
                          echo "<h1 style='color:red;text-align:center;'>Send To individual</h1>
        

                                <div class='contain'>
                                <div class='head'>
                                <h2 style='color:blue;text-align:center;'></h2>
                                </div>
                            
                                      <div class='comment-box'>
                                        <h3>Start a chat</h3>
                                        <form action='single_mess.php' class='comment-form' method = 'POST'>
                                            
                                            <textarea name='individual-sms' id='comment' rows='5' placeholder='Enter your comment' required></textarea>
                                            <button type='submit-individual' name = 'submit-individual' class='hero-btn red-btn'>SEND MESSAGE</button>
                                        </form>         
                                        </div>

                                        
                                </div>
                                <hr>
                                
                                <h1 style='color:red;text-align:center;'>Group Chat</h1>
        

                                <div class='contain'>
                                <div class='head'>
                                <h2 style='color:blue;text-align:center;'></h2>
                                </div>
                            
                                      <div class='comment-box'>
                                        <h3>Start a chat</h3>
                                        <form action='group_mess.php' class='comment-form' method = 'POST'>
                                            
                                            <textarea name='group-sms' id='comment' rows='5' placeholder='Enter your comment' required></textarea>
                                            <button type='submit' name = 'submit-group' class='hero-btn red-btn'>SEND MESSAGE</button>
                                        </form>         
                                        </div>

                                        
                                </div>
                                ";


                                

                            
                     



                     ?>
            </div>
</body>




 
<?php

include "footer.php";                 
?>