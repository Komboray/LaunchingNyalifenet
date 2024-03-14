<?php
session_start();
include("connect.php");
$id=$_SESSION["id"];

//we are now going to be posting details to the drnotes table
$notes = filter_input(INPUT_POST, "drnotes", FILTER_SANITIZE_SPECIAL_CHARS);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["drnotesSubmit"])){
        $sql = "INSERT INTO `drnotes`(patient_id, patientnotes)
                VALUES('$id', '$notes')
                ";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location:../past-history-question.php?id={$_SESSION["id"]}&firstN={$_SESSION["firstN"]}&lastN={$_SESSION["lastN"]}&dob={$_SESSION["dob"]}&bloodG={$_SESSION["bloodG"]}&medication={$_SESSION["medication"]}&gender={$_SESSION["gender"]}&phoneN={$_SESSION["phoneN"]}&EmailAddress={$_SESSION["EmailAddress"]}&NextOfKin={$_SESSION["NextOfKin"]}&NextOfKinPhoneNumber={$_SESSION["NextOfKinPhoneNumber"]}&MaritalStatus={$_SESSION["MaritalStatus"]}&Allergies={$_SESSION["IDNumber"]}&IDNumber={$_SESSION["Allergies"]}&Occupation={$_SESSION["Occupation"]}");
        }
    }
}