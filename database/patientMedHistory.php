<?php
session_start();
$sessionId = $_SESSION["id"];
// echo $sessionId;


$sessionPatient_N = $_SESSION["firstN"];
// echo $sessionPatient_N;
// $id = $_SESSION["id"];
//this is the medical history of the patient, both current and past including the notes of the doctor that have been taken
include("connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the button was clicked
    if (isset($_POST["back_button"])) {
        // Redirect to the previous page
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Past/Current History</title>
    
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/x-icon" href="../nya-logo.jpg">
    <style>
        .container {
            
            max-width: 1200px;
            height:400px;
            margin: 60px auto;
            padding: 60px;
            
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Enable horizontal scroll on small screens */
        }
    </style>
</head>
<body>
    

<div class="container">
    
<h1 align="center" style="color:red;">Past History</h1>

<?php
include("connect.php");
//instead, i borrowed the data through php
// Get the patient ID from the URL parameter
// $patientID = $_GET['id'];
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch patient information based on the provided ID
$sql = "SELECT * FROM  
        `pasthistory` 
        WHERE `patinet_Pid` = '$sessionId' LIMIT 1";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        echo "
        <div class='info-container'>
   
    <label>marital Status</label>
    <p> {$row["maritalStatus"]}</p>

    <label>reasonVisit	:</label>
    <p>{$row["reasonVisit"]}) </p>

    <label>referring Phycisian</label>
    <p>{$row["refPhy"]}</p>

    <label>Occupation:</label>
    <p>{$row["occupation"]}</p>

    <label>phone</label>
    <p>{$row["phone"]}</p>

    <label>partnerName:</label>
    <p>{$row["partnerName"]}</p>

    <label>partnerNone:</label>
    <p>{$row["partnerNone"]}</p>

    <label>age of Partner:</label>
    <p>{$row["agePartner"]}</p>

    <label>partner Occupation</label>
    <p>{$row["partOccup"]}</p>

    <label>Age of 1st period</label>
    <p>{$row["age1Period"]}</p>

    <label>Date period starts:</label>
    <p>{$row["perStartdy"]}</p>

    <label>irregular Period start day:</label>
    <p>{$row["irrPerStrtDy"]}</p>

    <label>durationBps:</label>
    <p>{$row["durationBps"]}</p>

    <label>bleedingBps:</label>
    <p>{$row["bleedingBps"]}</p>

    <label>last Month of period :</label>
    <p>{$row["lastMp"]}</p>

    <label>pain during Periods :</label>
    <p>{$row["painPs"]}</p>
    <label>menses :</label>
    <p>{$row["menses"]}</p>
    <label>never Pregnant :</label>
    <p>{$row["neverPreg"]}</p>
    <label>st Obstetric History:</label>
    <p>{$row["stObHist"]}</p>
    <label>duration of Pregnancy :</label>
    <p>{$row["durationPreg"]}</p>
    <label>place Of Delivery :</label>
    <p>{$row["placeOfDel"]}</p>
    <label>hours of Labour :</label>
    <p>{$row["hrsLabour"]}</p>
    <label>typeDelivery :</label>
    <p>{$row["typeDelivery"]}</p>
    <label>complications :</label>
    <p>{$row["complications"]}</p>
    <label>sex :</label>
    <p>{$row["sex"]}</p>
    <label>Birth Weight :</label>
    <p>{$row["birthWeight"]}</p>
    <label>present Health :</label>
    <p>{$row["presentHealth"]}</p>
    <label>Second Birth History :</label>
    <p>{$row["twoBHist"]}</p>
    <label>placeDel2 :</label>
    <p>{$row["placeDel2"]}</p>
    <label>hrsLabour2 :</label>
    <p>{$row["hrsLabour2"]}</p>
    <label>typeDelivery2 :</label>
    <p>{$row["typeDelivery2"]}</p>
    <label>birthControl :</label>
    <p>{$row["birthControl"]}</p>
    <label>sexPartner :</label>
    <p>{$row["sexPartner"]}</p>
    <label>sexConcerns :</label>
    <p>{$row["sexConcerns"]}</p>
    <label>dC :</label>
    <p>{$row["dC"]}</p>
    <label>dCDate :</label>
    <p>{$row["dCDate"]}</p>
    <label>hysteroscopy Date :</label>
    <p>{$row["hysteroscopyDate"]}</p>
    <label>infertility Surgery :</label>
    <p>{$row["infertilitySurgery"]}</p>
    <label>infertility Surgery Date :</label>
    <p>{$row["infertilitySurgeryDate"]}</p>
    <label>tuboplasty :</label>
    <p>{$row["tuboplasty"]}</p>
    <label>tuboplasty Date :</label>
    <p>{$row["tuboplastyDate"]}</p>
    <label>tubalLigation :</label>
    <p>{$row["tubalLigation"]}</p>
    <label>tubalLigationDate :</label>
    <p>{$row["tubalLigationDate"]}</p>
    <label>hysterectomyV :</label>
    <p>{$row["hysterectomyV"]}</p>
    <label>hysterectomyVDate :</label>
    <p>{$row["hysterectomyVDate"]}</p>
    <label>hysterectomy :</label>
    <p>{$row["hysterectomy"]}</p>
    <label>hysterectomyDate :</label>
    <p>{$row["hysterectomyDate"]}</p>
    <label>myomectomy :</label>
    <p>{$row["myomectomy"]}</p>
    <label>myomectomDate :</label>
    <p>{$row["myomectomDate"]}</p>
    <label>ovarian :</label>
    <p>{$row["ovarian"]}</p>
    <label>ovariandate :</label>
    <p>{$row["ovariandate"]}</p>
    <label>L :</label>
    <p>{$row["L"]}</p>
    <label>LDate :</label>
    <p>{$row["LDate"]}</p>
    <label>R :</label>
    <p>{$row["R"]}</p>
    <label>RDate :</label>
    <p>{$row["RDate"]}</p>
    <label>LOvary :</label>
    <p>{$row["LOvary"]}</p>
    <label>LOvaryDate :</label>
    <p>{$row["LOvaryDate"]}</p>
    <label>vaginalRepair :</label>
    <p>{$row["vaginalRepair"]}</p>
    <label>vaginalRepairDate :</label>
    <p>{$row["vaginalRepairDate"]}</p>
    <label>cesarean :</label>
    <p>{$row["cesarean"]}</p>
    <label>cesarean Date :</label>
    <p>{$row["cesareanDate"]}</p>
    <label>other Specifications :</label>
    <p>{$row["otherSpec"]}</p>
    <label>otherSpecDate :</label>
    <p>{$row["otherSpecDate"]}</p>
    <label>Number of surgeries :</label>
    <p>{$row["surgeriesNo"]}</p>
    <label>Surgery one :</label>
    <p>{$row["surg1"]}</p>
    <label>surgery number 1 Date :</label>
    <p>{$row["surg1Date"]}</p>
    <label>surgery number 2 :</label>
    <p>{$row["surg2"]}</p>
    <label>surg2Date :</label>
    <p>{$row["surg2Date"]}</p>
    <label>date of the Papsmear Check :</label>
    <p>{$row["datePapCheck"]}</p>
    <label>datePap :</label>
    <p>{$row["datePap"]}</p>
    <label>abnormal Check :</label>
    <p>{$row["abnormalCheck"]}</p>
    <label>abnormal Smears :</label>
    <p>{$row["abnormalSmears"]}</p>
    <label>cryotherapy:</label>
    <p>{$row["cryotherapy"]}</p>
    <label>laser:</label>
    <p>{$row["laser"]}</p>
    <label>coneBiopsy:</label>
    <p>{$row["coneBiopsy"]}</p>
    <label>loop Excision:</label>
    <p>{$row["loopExcision"]}</p>
    <label>lastMammogram:</label>
    <p>{$row["lastMammogram"]}</p>
    <label>abnormal Mammogram:</label>
    <p>{$row["abMamo"]}</p>
    <label>gynocology None:</label>
    <p>{$row["gynNone"]}</p>
    <label>gynocological Venereal:</label>
    <p>{$row["gynVenereal"]}</p>
    <label>Herpes:</label>
    <p>{$row["gynHerpes"]}</p>
    <label>Syphilis:</label>
    <p>{$row["gynSyphilis"]}</p>
    <label>Pelvic:</label>
    <p>{$row["gynPelvic"]}</p>
    <label>Endometriosis:</label>
    <p>{$row["gynEndometriosis"]}</p>
    <label>Chlamydia:</label>
    <p>{$row["gynChlamydia"]}</p>
    <label>Gonorrhea:</label>
    <p>{$row["gynGonorrhea"]}</p>
    <label>Vaginal:</label>
    <p>{$row["gynVaginal"]}</p>
    <label>Other Gynocolicals:</label>
    <p>{$row["gynOther"]}</p>
    <label>pastMedHist:</label>
    <p>{$row["pastMedHist"]}</p>
    <label>arthritis:</label>
    <p>{$row["arthritis"]}</p>
    <label>Diabetes:</label>
    <p>{$row["Diabetes0"]}</p>
    <label>Diet:</label>
    <p>{$row["Diet"]}</p>
    <label>Pill:</label>
    <p>{$row["Pill"]}</p>
    <label>Insulin:</label>
    <p>{$row["Insulin"]}</p>
    <label>hbp:</label>
    <p>{$row["hbp"]}</p>
    <label>Heart Disease:</label>
    <p>{$row["heartDisease"]}</p>
    <label>Kidney Disease:</label>
    <p>{$row["KidneyDisease"]}</p>
    <label>gallstones:</label>
    <p>{$row["gallstones"]}</p>
    <label>liver:</label>
    <p>{$row["liver"]}</p>
    <label>epilepsy:</label>
    <p>{$row["epilepsy"]}</p>
    <label>blood:</label>
    <p>{$row["blood"]}</p>
    <label>thyroid:</label>
    <p>{$row["thyroid"]}</p>
    <label>asthma:</label>
    <p>{$row["asthma"]}</p>
    <label>emphysema:</label>
    <p>{$row["emphysema"]}</p>
    <label>bronchitis:</label>
    <p>{$row["bronchitis"]}</p>
    <label>hIV:</label>
    <p>{$row["hIV"]}</p>
    <label>eating Disorder:</label>
    <p>{$row["eatingDisorder"]}</p>
    <label>Other problem:</label>
    <p>{$row["Other7"]}</p>
    <label>OtherInput:</label>
    <p>{$row["OtherInput"]}</p>
    <label>diabetes:</label>
    <p>{$row["diabetes"]}</p>
    <label>heart Disease:</label>
    <p>{$row["heartDis"]}</p>
    <label>breast Cancer:</label>
    <p>{$row["breastCanc"]}</p>
    <label>ovarian Cancer:</label>
    <p>{$row["ovarianCanc"]}</p>
    <label>Endo cancer:</label>
    <p>{$row["endoCanc"]}</p>
    <label>colon Canc:</label>
    <p>{$row["colonCanc"]}</p>
    <label>relative:</label>
    <p>{$row["relative"]}</p>
    <label>weightLoss:</label>
    <p>{$row["weightLoss"]}</p>
    <label>weightGain:</label>
    <p>{$row["weightGain"]}</p>
    <label>changeEnergy:</label>
    <p>{$row["changeEnergy"]}</p>
    <label>Hair Growth:</label>
    <p>{$row["hairGrowth"]}</p>
    <label>Hair Loss:</label>
    <p>{$row["hairLoss"]}</p>
    <label>change in Urinary function:</label>
    <p>{$row["changeUrinaryfunction"]}</p>
    <label>hot Flushes:</label>
    <p>{$row["hotFlushes"]}</p>
    <label>Breast Discharge:</label>
    <p>{$row["breastDischarge"]}</p>
    <label>none of the above:</label>
    <p>{$row["noneAbove1"]}</p>
    <label>Any experience of down Syndrom:</label>
    <p>{$row["downSyndro"]}</p>
    <label>Any experience of any chromosomal:</label>
    <p>{$row["chromosomal"]}</p>
    <a href='../past-history-question.php?id={$_SESSION["id"]}&firstN={$_SESSION["firstN"]}&lastN={$_SESSION["lastN"]}&dob={$_SESSION["dob"]}&bloodG={$_SESSION["bloodG"]}&medication={$_SESSION["medication"]}&gender={$_SESSION["gender"]}&phoneN={$_SESSION["phoneN"]}&EmailAddress={$_SESSION["EmailAddress"]}&NextOfKin={$_SESSION["NextOfKin"]}&NextOfKinPhoneNumber={$_SESSION["NextOfKinPhoneNumber"]}&MaritalStatus={$_SESSION["MaritalStatus"]}&Allergies={$_SESSION["IDNumber"]}&IDNumber={$_SESSION["Allergies"]}&Occupation={$_SESSION["Occupation"]}'><button type='button' class='hero-btn' style='color:red;'>Go back to previous page</button></a>
    


    
</div>

        ";
    }

} else {
    echo "<h2>Patient has no past history data</h2>
    <img src='../no data.jpg' alt='' srcset='' align='center' height='200' width='300' style='justify-content:center; align-items:center;'><br>
    
    ";
    
    exit();
}

// // Close connection
// $conn->close();
?>

<h1>The patients Current History</h1>
<?php
include("connect.php");
//instead, i borrowed the data through php
// Get the patient ID from the URL parameter
// $patientID = $_GET['id'];
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch patient information based on the provided ID
$sql = "SELECT * FROM currenthistory WHERE patient_Cid = $sessionId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        echo "
        <div class='info-container'>
   
    <label>Medication:</label>
    <p>{$row["Medication"]}</p>

    <label>Dose:</label>
    <p>{$row["Dose"]}</p>

    <label>Frequency:</label>
    <p>{$row["Frequency"]}</p>

    <label>Email:</label>
    <p>{$row["Medication1"]}</p>

    <label>Dose:</label>
    <p>{$row["Dose1"]}</p>

    <label>Frequency:</label>
    <p>{$row["Frequency1"]}</p>

    <label>If the patient smokes:</label>
    <p>{$row["smoke"]}</p>

    <label>Number of packs smoked:</label>
    <p>{$row["smokePacks"]}</p>

    <label>Whether patient drinks alcohol:</label>
    <p>{$row["alcohol"]}</p>

    <label>Whether patient drinks wine Glass:</label>
    <p>{$row["wineGlass"]}</p>

    <label>Number of beer bottles in a day:</label>
    <p>{$row["beerBot"]}</p>

    <label>The patient uses hard liquor:</label>
    <p>{$row["hardLiq"]}</p>

    <label>Use of illicit drugs:</label>
    <p>{$row["illDrugs"]}</p>

    <label>The type of illicit drug:</label>
    <p>{$row["typeIllicit"]}</p>

    <label> the patient work out:</label>
    <p>{$row["exercise"]}</p>

    <label>exerciseOften:</label>
    <p>{$row["exerciseOften"]}</p>
    <label> Drug ALLERGIES:</label>
    <p>{$row["drugALLERGIES"]}</p>
    <ol>
            <li>{$row["drugALLERGIESList"]}</li>
            <li>{$row["drugALLERGIESList1"]}</li>
            <li>{$row["drugALLERGIESList2"]}</li>
            <li>{$row["drugALLERGIESList3"]}</li>
            <li>{$row["drugALLERGIESList4"]}</li>
            <li></li>
    </ol>
    <label> the patient work out:</label>
    <p>{$row["exercise"]}</p>
    <label> the patient work out:</label>
    <p>{$row["exercise"]}</p>
    <label> the patient work out:</label>
    <p>{$row["exercise"]}</p>
    
</div>

        ";
    }

} else {
    echo "Patient has no Current history data";
    exit();
}


?>

<h1>Doctor's notes of the patient</h1>
<?php
include("connect.php");
//instead, i borrowed the data through php
// Get the patient ID from the URL parameter
// $patientID = $_GET['id'];
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch patient information based on the provided ID
$sql = "SELECT `notes` FROM currenthistory WHERE patient_Cid = $sessionId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        echo "
        <div class='info-container'>
   
    <label>First Name:</label>
    <p>{$row['notes']}</p>

    <a href='../past-history-question.php?id={$_SESSION["id"]}&firstN={$_SESSION["firstN"]}&lastN={$_SESSION["lastN"]}&dob={$_SESSION["dob"]}&bloodG={$_SESSION["bloodG"]}&medication={$_SESSION["medication"]}&gender={$_SESSION["gender"]}&phoneN={$_SESSION["phoneN"]}&EmailAddress={$_SESSION["EmailAddress"]}&NextOfKin={$_SESSION["NextOfKin"]}&NextOfKinPhoneNumber={$_SESSION["NextOfKinPhoneNumber"]}&MaritalStatus={$_SESSION["MaritalStatus"]}&Allergies={$_SESSION["IDNumber"]}&IDNumber={$_SESSION["Allergies"]}&Occupation={$_SESSION["Occupation"]}'><button type='button' class='hero-btn' style='color:red;'>Go back to previous page</button></a>
    
</div>

        ";
    }

} else {
    echo "Patient has no Current history data";
    exit();

}
// Close connection
$conn->close();


?>



</div>
</body>
</html>




