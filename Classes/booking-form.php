<?php
require_once('insert.php');
include("../database/connect.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["Submit-booking"])){
    //this below was to test if the details are coming to this page, they are so we will remove them
        // echo $_POST["fname"];
        // echo $_POST["email"];
        // echo $_POST["dr"];
        // echo $_POST["services"];
        // echo $_POST["date"];
        // echo $_POST["time-select"];
        // echo $_POST["messages"];
        
            $selectedDate = $_POST["date"];
            // $sql = "SELECT `` FROM `nyaappointments`"

            // Validate if the selected date is not earlier than the current date
            if (strtotime($selectedDate) < strtotime(date('Y-m-d'))) {
                echo "alert(You cannot choose that date)";

            } 
            else {
                $subject = "Appointment Confirmation";                   
                $fname = $_POST["fname"];
                $email = $_POST["email"];
                $dr = $_POST["dr"];
                $services = $_POST["services"];
                $date = $_POST["date"];
                $timeSelect = $_POST["time-select"];
                $messages = $_POST["messages"];
                $appointmentStatus = $_POST["appointmentStatus"];
                $contact = $_POST["contact"];

                $headers = "From:  	info@nyalifewomensclinic.net"; // replace with your email
                mail($email, $subject, $messages, $headers);

        
                //we are going to create the logic for adding the details to the database
                $insert = new Insert($fname, $email, $dr, $services,
                                    $date, $timeSelect, $messages,$contact, $appointmentStatus);
                
                $insert->insertBookingDetails($fname, $email, $dr, $services,
                                                $date, $timeSelect, $messages,$contact,$appointmentStatus);
        
            }
        
        

    
    
    }
}
