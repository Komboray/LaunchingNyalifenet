<?php
//we are going to start the session so that we can get the details from the prev page
session_start();
$id = $_SESSION["id"];
$firstN =  $_SESSION["firstN"];
$lastN = $_SESSION["lastN"];
$dob = $_SESSION["dob"];
$bloodG = $_SESSION["bloodG"];
$medication = $_SESSION["medication"];
$gender = $_SESSION["gender"];
$phoneN = $_SESSION["phoneN"];
$EmailAddress = $_SESSION["EmailAddress"];
$NextOfKin = $_SESSION["NextOfKin"];
$NextOfKinPhoneNumber = $_SESSION["NextOfKinPhoneNumber"];
$MaritalStatus = $_SESSION["MaritalStatus"];
$IDNumber = $_SESSION["IDNumber"];
$Allergies = $_SESSION["Allergies"];
$Occupation = $_SESSION["Occupation"];

//we are going to inlcude the database details
include("connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["selectedDiagnosisBtn"])){
        $selectedDiagnosis = $_POST["selectedDiagnosis"];
        $customDiagnosis = filter_input(INPUT_POST, "customDiagnosis", FILTER_SANITIZE_SPECIAL_CHARS);
        
        $sql = "INSERT INTO `diagnosis`(patient_Did,selectedDiagnosis,customDiagnosis) VALUES ('$id','$selectedDiagnosis', '$customDiagnosis')";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location:../past-history-question2.php?id={$_SESSION["id"]}&firstN={$_SESSION["firstN"]}&lastN={$_SESSION["lastN"]}&dob={$_SESSION["dob"]}&bloodG={$_SESSION["bloodG"]}&medication={$_SESSION["medication"]}&gender={$_SESSION["gender"]}&phoneN={$_SESSION["phoneN"]}&EmailAddress={$_SESSION["EmailAddress"]}&NextOfKin={$_SESSION["NextOfKin"]}&NextOfKinPhoneNumber={$_SESSION["NextOfKinPhoneNumber"]}&MaritalStatus={$_SESSION["MaritalStatus"]}&Allergies={$_SESSION["IDNumber"]}&IDNumber={$_SESSION["Allergies"]}&Occupation={$_SESSION["Occupation"]}");

        }else{
            header("Location:../doctor_index.php?error=failed to send imaging request of the patient {$firstN}");
        }

    }
}

?>