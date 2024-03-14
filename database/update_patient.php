<?php
include("connect.php");
session_start();
$patientID = $_SESSION["patientID"];



if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["drUpdatePatient"])){
        $name = filter_input(INPUT_POST, "first_name" , FILTER_SANITIZE_SPECIAL_CHARS);
        $last_name = filter_input(INPUT_POST, "last_name" , FILTER_SANITIZE_SPECIAL_CHARS);
        $phone = filter_input(INPUT_POST, "phone" , FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email" , FILTER_SANITIZE_SPECIAL_CHARS);
        $next_of_kin = filter_input(INPUT_POST, "next_of_kin" , FILTER_SANITIZE_SPECIAL_CHARS);
        $next_of_kin_phone = filter_input(INPUT_POST, "next_of_kin_phone" , FILTER_SANITIZE_SPECIAL_CHARS);
        $gender = filter_input(INPUT_POST, "gender" , FILTER_SANITIZE_SPECIAL_CHARS);
        $dob = filter_input(INPUT_POST, "dob" , FILTER_SANITIZE_SPECIAL_CHARS);
        $blood_group = filter_input(INPUT_POST, "blood_group" , FILTER_SANITIZE_SPECIAL_CHARS);
        $marital_status = filter_input(INPUT_POST, "marital_status" , FILTER_SANITIZE_SPECIAL_CHARS);
        $allergies = filter_input(INPUT_POST, "allergies" , FILTER_SANITIZE_SPECIAL_CHARS);
        $id_number = filter_input(INPUT_POST, "id_number" , FILTER_SANITIZE_SPECIAL_CHARS);
        $occupation = filter_input(INPUT_POST, "occupation" , FILTER_SANITIZE_SPECIAL_CHARS);
        $medication = filter_input(INPUT_POST, "medication" , FILTER_SANITIZE_SPECIAL_CHARS);
        $additional_information = filter_input(INPUT_POST, "additional_information" , FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password" , FILTER_SANITIZE_SPECIAL_CHARS);
        
        $updateSql = "UPDATE patients SET 
        FirstName='$name', LastName='$last_name', PhoneNumber='$phone', EmailAddress='$email', 
        NextOfKin='$next_of_kin', NextOfKinPhoneNumber='$next_of_kin_phone', Gender='$gender', DOB='$dob', 
        BloodGroup='$blood_group', MaritalStatus='$marital_status', Allergies='$allergies', IDNumber='$id_number', 
        Occupation='$occupation', Medication='$medication', AdditionalInformation='$additional_information', 
        Password='$password' WHERE PatientID=$patientID";

        $res = mysqli_query($conn, $updateSql);
        if($res){
            header("Location:../doctor_manage_patients.php?success=Details updated");
        }else{
            header("Location:../doctor_manage_patients.php?error=details have not been updated");
        }
    }
}


?>