<?php
include('../database/connect.php');
//this is a class used to insert the booking form script in r-index.php

Class Insert{

    //we will require thEsE below values from the $_POST
    public $patientName;
    public $patientEmail;
    public $drSelected;
    public $selectedService;
    public $date;
    public $time;
    public $emailText;
    public $appointmentStatus;
    public $contact;
    
    //this is the constructor used to get the things needed for the update func
    function __construct($patientName, $patientEmail, $drSelected,
                        $selectedService, $date, $time, $emailText,$contact,$appointmentStatus){

        $this->patientName = $patientName;
        $this->patientEmail = $patientEmail;
        $this->drSelected = $drSelected;
        $this->selectedService = $selectedService;
        $this->date = $date;
        $this->time = $time;
        $this->emailText = $emailText;
        $this->contact = $contact;
        $this->appointmentStatus = $appointmentStatus;
        
    }

    function insertBookingDetails($patientName, $patientEmail, $drSelected, $selectedService, $date, $time, $emailText, $contact, $appointmentStatus){
        //we need to get the conn class...$conn
        include("../database/connect.php");

        $sql = "INSERT INTO `nyaAppointments`(name, email, dr, serviceSelected, date, time, emailText, contact, appointmentStatus)
                VALUES ('$patientName','$patientEmail','$drSelected','$selectedService','$date','$time','$emailText','$contact', '$appointmentStatus')";
        $res = mysqli_query($conn, $sql);

        if($res){
            // echo "The details have been sent!";
            header("Location: ../manage_appointments.php");
            exit();
        }else{
            echo "Something is wrong!";
        }
    }
}