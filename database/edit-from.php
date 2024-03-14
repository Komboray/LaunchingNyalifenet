<?php
include("Location:reception_index.php");
session_start();
// THIS IS THE PHP FOR EDITTING TODAYS PATIENT
if(isset($_POST["Send-update"])){
    $_SESSION["email-compared"] = $_POST["email-compared"];
    
    $_SESSION["name-edit"] = $_POST["name-edit"];
    $_SESSION["email-edit"] = $_POST["email-edit"];
    
    header("Location:enquiry.php");
}
    
    

?>