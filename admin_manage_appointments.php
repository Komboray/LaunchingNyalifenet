<?php

include "admin_header.php";                 
?>


<head>
    
<style>
        

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Enable horizontal scroll on small screens */
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 1px solid #ddd; /* Add border to the table */
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd; /* Add border to cells */
        }

        th {
            background-color: #f2f2f2;
        }

        .add-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block; /* Make the button inline with text */
            margin-bottom: 20px;
        }

        .search-form {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .search-form input[type="text"] {
            width: 70%;
            padding: 10px;
            box-sizing: border-box;
        }

        .search-form button {
            width: 25%;
            padding: 10px;
            box-sizing: border-box;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>

      
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Appointments List</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<div class="container">
  

    <!-- <a href="add_appointment.php" class="add-button">Add New Appointment</a> -->
    
    <a href="#popupFormEdit"><button class="add-button popup-trigger" type="button" >Add an appointment</button></a>
    <form action="manage_appointments.php" method="get" class="search-form">
        <input type="text" name="search" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>AppointmentID</th>
            
                <th>PatientName</th>
                <th>Email</th>
                <th>Contact</th>
                
                <th>AppointmentDate</th>
                <th>AppointmentTime</th>
                <th>Service</th>
                <th>ConsultantDoctor</th>
                <th>AppointmentStatus</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Replace these values with your actual database connection details
           include("database/connect.php");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Search functionality
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $searchCondition = !empty($search) ? "WHERE name LIKE '%$search%' OR dr LIKE '%$search%' OR appointmentStatus LIKE '%$search%'" : '';

            // Fetch appointment records from the database
            $sql = "SELECT * FROM nyaappointments $searchCondition";
            $result = mysqli_query($conn,$sql);

            if (mysqli_num_rows($result)>0){
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                         
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['contact']}</td>
                           
                            <td>{$row['date']}</td>
                            <td>{$row['time']}</td>
                            <td>{$row['serviceSelected']}</td>
                            <td>{$row['dr']}</td>
                            <td>{$row['appointmentStatus']}</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='11'>No records found.</td></tr>";
            }

            // Close connection
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<!-- TRIAL POP-UP FORM THAT I HAVE ACTUALLY USED -->
<div class="popup-form-container1" id="popupFormEdit" style = "background-color: #fff; padding: 20px 16px;">
            <div class="body">

                <!-- FORM HEAD -->
                <div class="head" style = "text-align: center;">
                
            
                    <h1>
                        Booking Form
                    </h1>
                    <p style = "color: #115035;">
                        Let's Start To book Now
                    </p>
                </div>
                <!-- FORM HEAD IMEISHA -->


                <!-- FORM BODY BOX -->
                <form class="body-box" action = "Classes/booking-form.php" method = "POST" style = "padding: 20px;">
                    <div class="row" style = "display: flex; justify-content: space-between; padding: 5px 0;">
                        <div class="col-6" style = "width: 48%;">
                            <p>Patient's Name</p>
                            <input type="text" name="fname" id="fname" placeholder = "Enter Patient's Name" style = "width: 100%;
                                            background-color: #141824;
                                            border: none;
                                            outline: none;
                                            padding: 10px;
                                            font-family: 'Poppins';
                                            margin-top: 5px;
                                            resize: none;
                                            color: #fff;
                                            border-radius: 10px;" required>
                        </div>

                        <div class="col-6" style = "width: 48%;">
                            <p>Email Address</p>
                            <input type="email" name="email" id="email" placeholder = "Email Address" style = "width: 100%;
                                            background-color: #141824;
                                            border: none;
                                            outline: none;
                                            padding: 10px;
                                            font-family: 'Poppins';
                                            margin-top: 5px;
                                            resize: none;
                                            color: #fff;
                                            border-radius: 10px;" required>
                        </div>
                    </div>

                    <div class="row" style = "display: flex; justify-content: space-between; padding: 5px 0;">
                        <div class="col-6" style = "width: 48%;">
                            <p>Contact</p>
                            <input type="tel" name="contact" id="fname" placeholder = "Enter Phone-Number" style = "width: 100%;
                                            background-color: #141824;
                                            border: none;
                                            outline: none;
                                            padding: 10px;
                                            font-family: 'Poppins';
                                            margin-top: 5px;
                                            resize: none;
                                            color: #fff;
                                            border-radius: 10px;" required>
                        </div>

                        <div class="col-6" style = "width: 48%;">
                            <p>AppointmentStatus </p>
                            <select name="appointmentStatus" style = "width: 100%;
                                            background-color: #141824;
                                            border: none;
                                            outline: none;
                                            padding: 10px;
                                            font-family: 'Poppins';
                                            margin-top: 5px;
                                            resize: none;
                                            color: #fff;
                                            border-radius: 10px;" required>
                                <option value="Scheduled">Scheduled</option>
                                <option value="Completed">Completed</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                        </div>
                    </div>

                    <div class="row" style = "display: flex; justify-content: space-between; padding: 5px 0;">
                        <div class="col-6" style = "width: 48%;">
                            <p>Choose the available Doctor</p>
                            <select name="dr" id="dr" style = "width: 100%;
                                            background-color: #141824;
                                            border: none;
                                            outline: none;
                                            padding: 10px;
                                            font-family: 'Poppins';
                                            margin-top: 5px;
                                            resize: none;
                                            color: #fff;
                                            border-radius: 10px;" required>
                                <option value="Dr. Shola">Dr. Schola</option>
                                

                            </select>
                        </div>

                        <div class="col-6" style = "width: 48%;">
                            <p>Select Service</p>
                            <select name="services" id="services" style = "width: 100%;
                                            background-color: #141824;
                                            border: none;
                                            outline: none;
                                            padding: 10px;
                                            font-family: 'Poppins';
                                            margin-top: 5px;
                                            resize: none;
                                            color: #fff;
                                            border-radius: 10px;" required>
                                <option value="Obstetrics">Obstetrics - ksh.3000</option>
                                <option value="Gynecology">Gynecology - ksh.3000</option>
                                <option value="Teens Health">Teens Health - ksh.2500</option>
                                <option value="Surgeries">Surgeries - ksh.20000</option>
                                <option value="In Office Procedures">In Office Procedures - ksh.10000</option>
                                

                            </select>
                        </div>
                    </div>

                    <div class="row" style = "display: flex; justify-content: space-between; padding: 5px 0;">
                        <div class="col-6" style = "width: 48%;">
                            <p>Select the Date</p>
                            <input type="date" name="date" id="date" style = "width: 100%;
                                            background-color: #141824;
                                            border: none;
                                            outline: none;
                                            padding: 10px;
                                            font-family: 'Poppins';
                                            margin-top: 5px;
                                            resize: none;
                                            color: #fff;
                                            border-radius: 10px;" required>
                        </div>

                        <div class="col-6" style = "width: 48%;">
                            <p>Choose the time</p>
                            <select name="time-select" id="time" style = "width: 100%;
                                            background-color: #141824;
                                            border: none;
                                            outline: none;
                                            padding: 10px;
                                            font-family: 'Poppins';
                                            margin-top: 5px;
                                            resize: none;
                                            color: #fff;
                                            border-radius: 10px;">
                                <option value="8.00AM - 8.30AM">8.00AM - 8.30AM</option>
                                <option value="8.30AM - 9.00AM">8.30AM - 9.00AM</option>
                                <option value="9.00AM - 9.30AM">9.00AM - 9.30AM</option>
                                <option value="9.30AM - 10.00AM">9.30AM - 10.00AM</option>
                                <option value="10.00AM - 10.30AM">10.00AM - 10.30AM</option>
                                <option value="10.30AM - 11.00AM">10.30AM - 11.00AM</option>
                                <option value="11.00AM - 11.30AM">11.00AM - 11.30AM</option>
                                <option value="11.30AM - 12.00PM">11.30AM - 12.00PM</option>
                                <option value="12.00PM - 12.30PM">12.00PM - 12.30PM</option>
                                <option value="12.30PM - 1.00PM">12.30PM - 1.00PM</option>
                                <option value="1.00PM - 1.30PM">1.00PM - 1.30PM</option>
                                <option value="1.30PM - 2.00PM">1.30PM - 2.00PM</option>
                                <option value="2.00PM - 2.30PM">2.00PM - 2.30PM</option>
                                <option value="2.30PM - 3.00PM">2.30PM - 3.00PM</option>
                                <option value="3.30PM - 4.00PM">3.30PM - 4.00PM</option>
                                <option value="4.00PM - 4.30PM">4.00PM - 4.30PM</option>
                                <option value="4.30PM - 5.00PM">4.30PM - 5.00PM</option>

                            </select>
                        </div>
                    </div>

                    <div class="row" style = "display: flex; justify-content: space-between; padding: 5px 0;">
                        <div class="col-12" style = "width: 100%;">
                            <p>Enter Email to be sent to the patient for confirmation of booking</p>
                            <textarea name="messages" id="messages" cols="3" rows="10" style = "width: 100%;
                                            background-color: #141824;
                                            border: none;
                                            outline: none;
                                            padding: 10px;
                                            font-family: 'Poppins';
                                            margin-top: 5px;
                                            resize: none;
                                            color: #fff;
                                            border-radius: 10px;" ></textarea>
                        </div>


                    </div>
                    

                    <div class="row">
                        <div class="col-3">
                            <button type="button" onclick="addPredefinedText()" style = "width: 100%;
                                            background-color: purple;
                                            border: none;
                                            outline: none;
                                            padding: 10px;
                                            font-family: 'Poppins';
                                            margin-top: 5px;
                                            resize: none;
                                            color: #fff;
                                            border-radius: 10px;">Generate a Predefined Email</button>
                            
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-3">
                            <input type="submit" name ="Submit-booking" value="Submit-booking" style = "width: 100%;
                                            background-color: #141824;
                                            border: none;
                                            outline: none;
                                            padding: 10px;
                                            font-family: 'Poppins';
                                            margin-top: 5px;
                                            resize: none;
                                            color: #fff;
                                            border-radius: 10px;">
                        </div>


                    </div>






                </form>
                
                <!-- FORM BODY BOX -->


                <!-- THIS IS THE FOOTER END -->


            </div>
            <!-- THIS IS THE MAIN FORM AREA END -->
        </div>
        <script>
            // Function to open the popup form for BOOKING OF APPOINTMENT
function openPopupForm() {
    var popupForm = document.getElementById('popupFormEdit');
    popupForm.style.display = 'block';
  }

  // Function to close the popup form FOR BOOKING OF APPOINTMENT
  function closePopupForm() {
    var popupForm = document.getElementById('popupFormEdit');
    popupForm.style.display = 'none';
  }

  //this is the function that creates the predefined email
  function addPredefinedText() {
    // Get the textarea element
    var textarea = document.getElementById('messages');

    // Get the user input value
    var userInputValue = document.getElementById("fname").value;

    // Get the user input value
    var dateInputValue = document.getElementById("date").value;

    // Get the user input value
    var timeInputValue = document.getElementById("time").value;
     
    // Get the user input value
    var selectElement = document.getElementById("dr");
    // Change the selected option to the second option (index 1)
    var selectedDr = selectElement.options[selectElement.selectedIndex].text;

    // Get the user input value
    var selectService = document.getElementById("services");
    // Change the selected option to the second option (index 1)
    var selectedServices = selectService.options[selectService.selectedIndex].text;


    // Define your predefined subset of text
    var predefinedText = "Dear " + userInputValue + ", \nYou have an appointment with "+ selectedDr + "\non " + dateInputValue + " at " + timeInputValue + "\nyour service is "+ selectedServices +"\nThank you for choosing Nyalife Clinic.";

    // Add the predefined text to the textarea
    textarea.value = predefinedText;
  }
        </script>

</body>


<?php

include "footer.php";                 
?>

