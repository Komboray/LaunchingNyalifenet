<?php
include("connect.php");
session_start();
//we are going to be processing the data from the impression of the patient
$sessionID =$_SESSION["id"];

if(isset($_POST["impressionSub"])){
    
    $typedImpression = $_POST["typedImpression"];
    $impressionType = $_POST["impressionType"];
    $impressionDescription = $_POST["impressionDescription"];

    $sql = "INSERT INTO `impressions`(typedImpression,impressionType,impressionDescription,date,Patient_Iid)
             VALUES('$typedImpression', '$impressionType', '$impressionDescription', NOW(), '$sessionID')";

    $result = mysqli_query($conn, $sql);

    if($result){
        
        header("Location:../past-history-question.php?id={$_SESSION["id"]}&firstN={$_SESSION["firstN"]}&lastN={$_SESSION["lastN"]}&dob={$_SESSION["dob"]}&bloodG={$_SESSION["bloodG"]}&medication={$_SESSION["medication"]}&gender={$_SESSION["gender"]}&phoneN={$_SESSION["phoneN"]}&EmailAddress={$_SESSION["EmailAddress"]}&NextOfKin={$_SESSION["NextOfKin"]}&NextOfKinPhoneNumber={$_SESSION["NextOfKinPhoneNumber"]}&MaritalStatus={$_SESSION["MaritalStatus"]}&Allergies={$_SESSION["IDNumber"]}&IDNumber={$_SESSION["Allergies"]}&Occupation={$_SESSION["Occupation"]}");
    }

}