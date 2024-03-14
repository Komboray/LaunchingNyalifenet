<?php
//THIS IS THE CLASS THAT IS RESPOSIBLE FOR INSERTING VALUES INTO THE DATABASE
include('../database/connect.php');

Class Select{
    //we need to create the variables needed in the class
    public $id;
    public $name;
    public $generic;
    public $brand;
    public $dosage;
    public $strength;
    public $routeofAdmin;
    public $prescriptionStatus;
    public $indications;
    public $contraindications;
    public $sideEffects;
    public $storageConditions;
    public $expiryDate;
    public $manufInfo;
    public $batch;
    public $natDrugCode;
    public $cost;
    public $warningPrec;
    public $interactions;
    
    function selectMedDetails($id, $name, $generic, $brand, $dosage, $strength,
                                $routeofAdmin,
                                $prescriptionStatus,
                                $indications,
                                $contraindications,
                                $sideEffects,
                                $storageConditions,
                                $expiryDate,
                                $manufInfo,
                                $batch,
                                $natDrugCode,
                                $cost,
                                $warningPrec,
                                $interactions){
        //we need to get the conn class...$conn
        include("../database/connect.php");

        $sql = "SELECT *  FROM `medicines` ";
        $res = mysqli_query($conn, $sql);

        if($res){
            // echo "The details have been sent!";
            header("Location: ../r-index.php");
            exit();
        }else{
            echo "You bozo, something is wrong!";
        }
    }

}
