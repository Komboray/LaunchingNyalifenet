 
<?php

include "booking_header.php";   

?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
         
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
        
     
<head>
   
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            font-weight: bold;
        }

        select, input {
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Book Appointment</h2>

    <form action="process_book_appointment.php" method="post">
        <label for="service">Select Service:</label>
        <select name="service" required>
            <option value="Obstetrics">Obstetrics</option>
            <option value="Gynecology">Gynecology</option>
            <option value="Teens Health">Teens Health</option>
            <option value="Surgeries">Surgeries</option>
            <option value="In Office Procedures">In Office Procedures</option>
        </select>

        <label for="doctor">Select Doctor:</label>
        <select name="doctor" required>
            <!-- Add options for available doctors -->
            <option value="Dr. Schola Airo">Dr. Schola Airo</option>
           
        </select>

        <label for="date">Select Date:</label>
        <input type="date" name="date" required>

        <label for="time">Select Time:</label>
        <input type="time" name="time" required>

        <label for="name">Your Name:</label>
        <input type="text" name="name" required>

        <label for="phone">Your Phone:</label>
        <input type="tel" name="phone" required>

        <label for="email">Your Email:</label>
        <input type="email" name="email" required>

        <button type="submit">Book Appointment</button>
    </form>
</div>





</div>  
 
<?php

include "footer.php"; 
//@codebyvakotech
?>


 
