<?php
session_start();
include("connect.php");
$sessionId = $_SESSION["id"];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["labTestSub"])){
        $labTests = $_POST["labTests"];
        $labNotification = filter_input(INPUT_POST, "labNotification", FILTER_SANITIZE_SPECIAL_CHARS);
        $status = 'requested';
        $sql = "INSERT INTO `labnotifications`(notification,testToDone,patients_Lid,status,date,time)
                VALUES('$labNotification', '$labTests', '$sessionId', '$status', CURRENT_DATE, NOW())";

        $res = mysqli_query($conn, $sql);
        if($res){
            header("Location:../past-history-question2.php?id={$_SESSION["id"]}&firstN={$_SESSION["firstN"]}&lastN={$_SESSION["lastN"]}&dob={$_SESSION["dob"]}&bloodG={$_SESSION["bloodG"]}&medication={$_SESSION["medication"]}&gender={$_SESSION["gender"]}&phoneN={$_SESSION["phoneN"]}&EmailAddress={$_SESSION["EmailAddress"]}&NextOfKin={$_SESSION["NextOfKin"]}&NextOfKinPhoneNumber={$_SESSION["NextOfKinPhoneNumber"]}&MaritalStatus={$_SESSION["MaritalStatus"]}&Allergies={$_SESSION["IDNumber"]}&IDNumber={$_SESSION["Allergies"]}&Occupation={$_SESSION["Occupation"]}");
        }else{
            header("Location:../doctor_index.php?error=There was an error in sending a notification to the lab");
        }
        

    }
}
