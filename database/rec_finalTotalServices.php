<?php
session_start();
//the below values have been tried tested and approved!
$sessionId = $_SESSION["id"];

$sessionName = $_SESSION["name"];

$EmailAddress = $_SESSION["EmailAddress"];

$phoneN = $_SESSION["phoneN"];

// echo $sessionPatient_N;
// $id = $_SESSION["id"];
//this is the medical history of the patient, both current and past including the notes of the doctor that have been taken
 //below is the php code that updates the rooms in the patient part

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OVERALL PATIENT REVIEW</title>
    
    
    <link rel="icon" type="image/x-icon" href="../nya-logo.jpg">
    <style>
        .container {
            
            max-width: 1200px;
            height:2400px;
            margin: 60px auto;
            padding: 60px;
            
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Enable horizontal scroll on small screens */

        }
        input,select{  
            width: 100%;
                background-color: #141824;
                border: none;
                outline: none;
                padding: 10px;
                font-family: 'Poppins';
                margin-top: 5px;
                resize: none;
                color: #fff;
                border-radius: 10px;}

                
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.view-container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

.staff-info {
    margin-top: 20px;
}

label {
    display: block;
    margin: 10px 0 5px;
    font-weight: bold;
}

span {
    display: inline-block;
    margin-bottom: 10px;
}

img {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
}

.back-button {
    display: block;
    background-color: #3498db;
    color: #fff;
    padding: 8px 12px;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
    margin-top: 20px;
}

.back-button:hover {
    background-color: #2980b9;
}

        
    </style>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>  
    
<div class="view-container">
    <h1 style='color:red;'>View <?php echo $sessionName ."'s" ?> Services and the prescribed medicines</h1>

    <div class="staff-info">
        <h2>Services:</h2>
        <label>Lab Services</label>
        <ol>
        <?php
        include("connect.php");
        //i need to select everything with this id from the services performed
        //first i will select from the lab
        $LabStatus = 'done';
        $sqlLabRes = "SELECT * FROM `labnotifications`
                      WHERE `patients_Lid` = '$sessionId' AND `status` = '$LabStatus'";
        $resultL = mysqli_query($conn, $sqlLabRes);

        if($resultL){
            $num = mysqli_num_rows($resultL);
            $current_date = date('Y-m-d');
            $tracking_no = $sessionId . '_' . $current_date;

            if($num>0){
                while($row = mysqli_fetch_assoc($resultL)){
                    echo "<li></li>";
                }
            }else{
                echo "<p style='color:green;'>The patient has not passed by the lab!</p>";
            }
        }
        ?> 
        </ol>


        <label>Imaging Services:</label>
        
        <ol>
        <?php
        //i need to select everything with this id from the services performed
        //first i will select from the lab
        $imageStatus = 'done';
        $sqlImgRes = "SELECT * FROM `imagingrequests`
                      WHERE `patient_Imageid` = '$sessionId' AND `status` = '$imageStatus'";
        $resultI = mysqli_query($conn, $sqlImgRes);

        if($resultI){
            $num = mysqli_num_rows($resultI);
            $current_date = date('Y-m-d');
            $tracking_no = $sessionId . '_' . $current_date;

            if($num>0){
                while($row = mysqli_fetch_assoc($resultI)){
                    echo "<li></li>";
                }
            }else{
                echo "<p style='color:green;'>The patient has not undergone any imaging</p>";
            }
        }
        ?> 
        </ol>

        
        <label>Procedure Services:</label>
        
        <ol>
        <?php
        //i need to select everything with this id from the services performed
        //first i will select from the lab
        $LabStatus = 'done';
        $sqlLabRes = "SELECT * FROM `procedures`
                      WHERE `patProcedID` = '$sessionId'";
        $resultPro = mysqli_query($conn, $sqlLabRes);

        if($resultPro){
            $num = mysqli_num_rows($resultPro);
            $current_date = date('Y-m-d');
            $tracking_no = $sessionId . '_' . $current_date;

            if($num>0){
                while($row = mysqli_fetch_assoc($resultPro)){
                    echo "<li></li>";
                }
            }else{
                echo "<p style='color:green;'>The patient has not undergone any procedures</p>";
            }
        }
        ?> 
        </ol>
        <br>

        <h2>Medicines:</h2>
        <label>Prescription Services:</label>
        
        <ol>
        <?php
        //i need to select everything with this id from the services performed
        //first i will select from the lab
        $PrescStatus = 'done';
        $sqlPrescRes = "SELECT * FROM `prescriptions`
                      WHERE `patient_PrescID`";
        $resultP = mysqli_query($conn, $sqlPrescRes);

        if($resultP){
            $num = mysqli_num_rows($resultP);
            $current_date = date('Y-m-d');
            $tracking_no = $sessionId . '_' . $current_date;

            if($num>0){
                while($row = mysqli_fetch_assoc($resultP)){
                    echo "<li></li>";
                }
            }else{
                echo "<p style='color:green;'>The patient has no prescription assigned to them</p>";
            }
        }
        ?> 
        </ol>
        <br>


        <h2>Consultancy:</h2>
        <label for="">Charge:</label><p style='color:#FF00FF'>Ksh 3000</p>
        <br>
        <br>
        <h1 style='color:red;'>Totals</h1>
        <br>
        <br>
        <p style='color:#FF00FF'>The tracking number is <?= $tracking_no; ?></p>
        
    
        
    </div>


    <a href=".php" class="back-button">Back</a>
    <a href="rec_printInvoice.php?id=<?php echo $sessionId; ?>&track=<?php echo $tracking_no; ?>&name=<?php echo $sessionName; ?>&email=<?php echo $EmailAddress; ?>&phone=<?php echo $phoneN; ?>" class="back-button">Print</a>

<script src="js/main.js"></script>

 

</div>
</body>
</html>




