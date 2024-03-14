<?php
include("connect.php");
//we are going to get the data from the previous page
$name = $_GET["name"];
$id = $_GET["id"];
$email = $_GET["email"];
$contact = $_GET["contact"];


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["submitRebooking"])){
        $appointmentStatus = filter_input(INPUT_POST, "appointmentStatus", FILTER_SANITIZE_SPECIAL_CHARS);
        $date = filter_input(INPUT_POST, "date", FILTER_SANITIZE_SPECIAL_CHARS);
        $time = filter_input(INPUT_POST, "time-select", FILTER_SANITIZE_SPECIAL_CHARS);
        $services = filter_input(INPUT_POST, "services", FILTER_SANITIZE_SPECIAL_CHARS);
        $messages = $_POST["messages"];
        $sql = "UPDATE `nyaappointments`
                SET `date` = '$date', `appointmentStatus` = '$appointmentStatus', `time` = '$time', `serviceSelected` = '$services', `emailText` = '$messages'
                WHERE `id` = '$id'";
        $response = mysqli_query($conn, $sql);

        if($response){
            // echo "The details have been updated successfully!";
            header("Location:../doctor_manage_appointment.php?success=The appointment has been updated successfully");
        }

    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reschedule Appointments</title>
    <link rel="icon" type="image/x-icon" href="../nya-logo.jpg">
</head>
<body>
    <!-- TRIAL POP-UP FORM THAT I HAVE ACTUALLY USED -->
<div class="popup-form-container1" id="popupFormEdit" style = "background-color: #fff; padding: 20px 16px;">
            <div class="body">

                <!-- FORM HEAD -->
                <div class="head" style = "text-align: center;">
                
            
                    <h1>
                        Booking Form
                    </h1>
                    <h3 style = "color: red;">
                        Choose the new appointment date for the patient
                    </h3>
                </div>
                <!-- FORM HEAD IMEISHA -->


                <!-- FORM BODY BOX -->
                <form class="body-box" action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "POST" style = "padding: 20px;">
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
                                            border-radius: 10px;" value='<?php echo isset($_GET["name"]) ? htmlspecialchars($_GET["name"]) : ""; ?>' required>
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
                                            border-radius: 10px;" value='<?php echo isset($_GET["email"]) ? htmlspecialchars($_GET["email"]) : ""; ?>' required>
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
                                            border-radius: 10px;" value='<?php echo isset($_GET["contact"]) ? htmlspecialchars($_GET["contact"]) : ""; ?>' required>
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
                                
                                <option value="ReScheduled">ReScheduled</option>
                                
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
                            <input type="submit" name ="submitRebooking" value="Submit-booking" style = "width: 100%;
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
                <a href="../doctor_manage_appointment.php"><span style = "width: 100%;
                                            text-decoration:none;
                                            background-color: red;
                                            border: none;
                                            outline: none;
                                            padding: 10px;
                                            font-family: 'Poppins';
                                            margin-top: 5px;
                                            resize: none;
                                            color: #fff;
                                            border-radius: 10px;
                                            decoration:none;">Close</span></a>
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
    var predefinedText = "Dear " + userInputValue + ", \nNote the rescheduled appointment with " + selectedDr + "\n on " + dateInputValue + " at " + timeInputValue + "\n your service is "+ selectedServices + "\nThank you for choosing Nyalife Clinic.";

    // Add the predefined text to the textarea
    textarea.value = predefinedText;
  }
        </script>
</body>
</html>