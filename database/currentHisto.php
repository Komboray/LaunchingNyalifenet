<?php
include("connect.php");
session_start();
$sessionId = $_SESSION["id"];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["currentHistory"])){
        //J/////////////////////////////////////////////////////// J
        $Medication = isset($_POST["Medication"]) ? $_POST["Medication"] : null;
        $Dose = isset($_POST["Dose"]) ? $_POST["Dose"] : null;
        $Frequency = isset($_POST["Frequency"]) ? $_POST["Frequency"] : null;
        $Medication1 = isset($_POST["Medication1"]) ? $_POST["Medication1"] : null;
        $Dose1 = isset($_POST["Dose1"]) ? $_POST["Dose1"] : null;
        $Frequency1 = isset($_POST["Frequency1"]) ? $_POST["Frequency1"] : null;
        $Medication2 = isset($_POST["Medication2"]) ? $_POST["Medication2"] : null;
        $Dose2 = isset($_POST["Dose2"]) ? $_POST["Dose2"] : null;
        $Frequency2 = isset($_POST["Frequency2"]) ? $_POST["Frequency2"] : null;
        $Medication3 = isset($_POST["Medication3"]) ? $_POST["Medication3"] : null;
        $Dose3 = isset($_POST["Dose3"]) ? $_POST["Dose3"] : null;
        $Frequency3 = isset($_POST["Frequency3"]) ? $_POST["Frequency3"] : null;
        $Medication4 = isset($_POST["Medication4"]) ? $_POST["Medication4"] : null;
        $Dose4 = isset($_POST["Dose4"]) ? $_POST["Dose4"] : null;
        $Frequency4 = isset($_POST["Frequency4"]) ? $_POST["Frequency4"] : null;
        ////////////////////////////////////////////////////////k
        $smoke = isset($_POST["smoke"]) ? $_POST["smoke"] : null;
        $smokePacks = isset($_POST["smoke-packs"]) ? $_POST["smoke-packs"] : null;
        $alcohol = isset($_POST["alcohol"]) ? $_POST["alcohol"] : null;
        //if yes
        $wineGlass = isset($_POST["wine-glass"]) ? $_POST["wine-glass"] : null;
        $beerBot = isset($_POST["beer-bot"]) ? $_POST["beer-bot"] : null;
        $hardLiq = isset($_POST["hard-liq"]) ? $_POST["hard-liq"] : null;
        //use illicit
        $illDrugs = isset($_POST["ill-drugs"]) ? $_POST["ill-drugs"] : null;
        $typeIllicit = isset($_POST["type-illicit"]) ? $_POST["type-illicit"] : null;
        $amountIllicit = isset($_POST["amount-illicit"]) ? $_POST["amount-illicit"] : null;
        //exercise
        $exerciseType = isset($_POST["exercise-type"]) ? $_POST["exercise-type"] : null;
        $exerciseOften = isset($_POST["exercise-often"]) ? $_POST["exercise-often"] : null;
        //L //////////////////////////////L//////////////////////L//////L//L
        $drugALLERGIES = isset($_POST["DRUG-ALLERGIES"]) ? $_POST["DRUG-ALLERGIES"] : null;
        //list
        $drugALLERGIESList = isset($_POST["DRUG-ALLERGIES-list"]) ? $_POST["DRUG-ALLERGIES-list"] : null;
        $drugALLERGIESList1 = isset($_POST["DRUG-ALLERGIES-list1"]) ? $_POST["DRUG-ALLERGIES-list1"] : null;
        $drugALLERGIESList2 = isset($_POST["DRUG-ALLERGIES-list2"]) ? $_POST["DRUG-ALLERGIES-list2"] : null;
        $drugALLERGIESList3 = isset($_POST["DRUG-ALLERGIES-list3"]) ? $_POST["DRUG-ALLERGIES-list3"] : null;
        $drugALLERGIESList4 = isset($_POST["DRUG-ALLERGIES-list4"]) ? $_POST["DRUG-ALLERGIES-list4"] : null;

        $notes = $_POST["drnotes"];

        $sql = "INSERT INTO `currenthistory`(Medication,Dose,Frequency,Medication1, Dose1, Frequency1, Medication2, Dose2, Frequency2, Medication3, Dose3, Frequency3, Medication4, Dose4, Frequency4, smoke, smokePacks, alcohol, wineGlass, beerBot, hardLiq, illDrugs, typeIllicit, amountIllicit, exerciseType, exerciseOften, drugALLERGIES, drugALLERGIESList, drugALLERGIESList1, drugALLERGIESList2, drugALLERGIESList3, drugALLERGIESList4, patient_Cid,notes)
                VALUES('$Medication', '$Dose', '$Frequency', '$Medication1', '$Dose1', '$Frequency1', '$Medication2', '$Dose2', '$Frequency2', '$Medication3', 
                        '$Dose3', '$Frequency3', '$Medication4', '$Dose4', '$Frequency4', '$smoke', '$smokePacks', '$alcohol', '$wineGlass', '$beerBot',   
                        '$hardLiq', '$illDrugs', '$typeIllicit', '$amountIllicit', '$exerciseType', '$exerciseOften', '$drugALLERGIES', '$drugALLERGIESList', 
                        '$drugALLERGIESList1', '$drugALLERGIESList2', '$drugALLERGIESList3', '$drugALLERGIESList4','$sessionId', '$notes')";

        $respo =  mysqli_query($conn, $sql);

        if($respo){
            
            header("Location:../past-history-question.php?id={$_SESSION["id"]}&firstN={$_SESSION["firstN"]}&lastN={$_SESSION["lastN"]}&dob={$_SESSION["dob"]}&bloodG={$_SESSION["bloodG"]}&medication={$_SESSION["medication"]}&gender={$_SESSION["gender"]}&phoneN={$_SESSION["phoneN"]}&EmailAddress={$_SESSION["EmailAddress"]}&NextOfKin={$_SESSION["NextOfKin"]}&NextOfKinPhoneNumber={$_SESSION["NextOfKinPhoneNumber"]}&MaritalStatus={$_SESSION["MaritalStatus"]}&Allergies={$_SESSION["IDNumber"]}&IDNumber={$_SESSION["Allergies"]}&Occupation={$_SESSION["Occupation"]}");
        }
    }
}


?>