<?php
include("connect.php");
session_start();
$personID = $_SESSION["id"];
//meds from the hospital database
$medID = $_SESSION["medID"];
// echo $medID;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["prescriptionBtn"])){
        $medHosiId = $_SESSION["medID"];
        //we are getting the medicine data from the table 
        $sql = "SELECT `quantity` FROM `medicines` WHERE `id` = '$medHosiId' AND `quantity` >= 1 LIMIT 1";
        $res = mysqli_query($conn,$sql);
        if($res){
            $num = mysqli_num_rows($res);
            if($num>0){
                $row = mysqli_fetch_assoc($res);
                $newQuantity = $row["quantity"] - 1;
                $_SESSION["newQuantity"] = $newQuantity;

            }else{
                //the num rows error handling  
                echo "Something went wrong while trying to access quantities";
                // header("Location:past-history-question2.php#dash?error=Something went wrong whle trying to access quantities, contact I.T");
                exit();

            }
        }else{
            //for the res error handling
            echo "There was an error in the sending the response data";

        }
        //now we update the medicine's table quantity section
        $newQuantityUpdate = $_SESSION["newQuantity"];
        $sql2 = "UPDATE `medicines`
                 SET `quantity` = '$newQuantityUpdate'";

        $resUpdate = mysqli_query($conn, $sql2);
        if($resUpdate){
                echo "Details have been updated";
                // header("Location:past-history-question2.php#dash?error=Details have been updated");

                // exit();

        }else{
                // header("Location:doc_finalTotalServices.php");
                echo "the details have not been updated";
                // exit();
        }

        //we are going to add data to the prescription database
        //from the hospital database
        $medicationData = filter_input(INPUT_POST, "medicationData", FILTER_SANITIZE_SPECIAL_CHARS);
        $medication = filter_input(INPUT_POST, "medication", FILTER_SANITIZE_SPECIAL_CHARS);
        $dosageInstructions = filter_input(INPUT_POST, "dosageInstructions", FILTER_SANITIZE_SPECIAL_CHARS);
        $modifiedPrescription = filter_input(INPUT_POST, "modifiedPrescription", FILTER_SANITIZE_SPECIAL_CHARS);
        $currentDate = date('Y-m-d');
        
        $sql = "INSERT INTO `prescriptions`(nyalifeMedId,nyalifeMedName,medication,dosageInstructions,modifiedPrescription,patient_PrescID, dateEvaluate)
                VALUES('$medID', '$medicationData', '$medication', '$dosageInstructions', '$modifiedPrescription' ,'$personID', '$currentDate')";
                
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location:doc_finalTotalServices.php");
            exit();
        }else{
            echo "An error occurred while entering data to teh database";
        }


        //i think this will work







        //the outside brackets are below from the issetBtn
    }
}



















?>