<?php
session_start();
include("connect.php");
$imageSessionId = $_SESSION["id"];
$firstN = $_SESSION["firstN"];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["imagingTestsSub"])){
        $imagingTests = $_POST["imagingTests"];
        $additionalInfo = $_POST["additionalInfo"];
        $requested = 'requested';
        $sql = "INSERT INTO `imagingrequests`(test,status,patient_Imageid,addInfo) VALUES ('$imagingTests','$requested','$imageSessionId', '$additionalInfo')";
        $resl = mysqli_query($conn, $sql);

        if($resl){
            header("Location:../past-history-question2.php?id={$_SESSION["id"]}&firstN={$_SESSION["firstN"]}&lastN={$_SESSION["lastN"]}&dob={$_SESSION["dob"]}&bloodG={$_SESSION["bloodG"]}&medication={$_SESSION["medication"]}&gender={$_SESSION["gender"]}&phoneN={$_SESSION["phoneN"]}&EmailAddress={$_SESSION["EmailAddress"]}&NextOfKin={$_SESSION["NextOfKin"]}&NextOfKinPhoneNumber={$_SESSION["NextOfKinPhoneNumber"]}&MaritalStatus={$_SESSION["MaritalStatus"]}&Allergies={$_SESSION["IDNumber"]}&IDNumber={$_SESSION["Allergies"]}&Occupation={$_SESSION["Occupation"]}");

        }else{
            header("Location:../doctor_index.php?error=failed to send imaging request of the patient {$firstN}");
        }
    }
}
?>