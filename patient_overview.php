<?php
//we need to start the session

include "doctor_header.php";                 
?>
<?php


$id = $_GET["id"];
$firstN = $_GET["firstN"];
$lastN = $_GET["lastN"];
$dob = $_GET["dob"];
$bloodG = $_GET["bloodG"];
$medication = $_GET["medication"];
$gender = $_GET["gender"];
$PhoneNumber = $_GET["phoneN"];
$EmailAddress = $_GET["EmailAddress"];
$NextOfKin = $_GET["NextOfKin"];
$NextOfKinPhoneNumber = $_GET["NextOfKinPhoneNumber"];
$MaritalStatus = $_GET["MaritalStatus"];
$Allergies = $_GET["Allergies"];
$IDNumber = $_GET["IDNumber"];
$Occupation = $_GET["Occupation"];
$addInfo = $_GET["AdditionlInformation"];
// $age = $_GET["age"];

$_SESSION["id"] = $id;
$_SESSION["firstN"] = $firstN;
$_SESSION["lastN"] = $lastN;
$_SESSION["dob"] = $dob;
$_SESSION["bloodG"] = $bloodG;
$_SESSION["medication"] = $medication;
$_SESSION["gender"] = $gender;
$_SESSION["phoneN"] = $PhoneNumber;
$_SESSION["EmailAddress"] = $EmailAddress;
$_SESSION["NextOfKin"] = $NextOfKin;
$_SESSION["NextOfKinPhoneNumber"] = $NextOfKinPhoneNumber;
$_SESSION["MaritalStatus"] = $MaritalStatus;
$_SESSION["IDNumber"] = $IDNumber;
$_SESSION["Allergies"] = $Allergies;
$_SESSION["Occupation"] = $Occupation;
$_SESSION["addInfo"] = $addInfo;
// $_SESSION["age"] = $age;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
        
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Overview</title>
    <style>
        body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    .overview-container {
        display: flex;
        justify-content: space-evenly;
        padding: 15px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        overflow-x: auto;
    }

    .overview-item {
        margin-right: 10px;
        cursor: pointer;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f8f8f8;
        transition: background-color 0.3s ease-in-out;
    }

    .overview-item:hover {
        background-color: #e6e6e6;
    }

    .overview-content {
        display: none;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        margin-top: 20px;
    }

    .overview-content.active {
        display: block;
    }

    </style>
</head>
<body>
    

    <h1>Patient Overview - Samantha Otieno</h1>

    <!-- Add links to each section in the overview container -->
    <div class="overview-container">
        <div class="overview-item" onclick="showContent('dashboard')">Dashboard</div>
        <div class="overview-item" onclick="showContent('triage')">Triage</div>
        <div class="overview-item" onclick="showContent('ptHist')">Patient History</div>
        <div class="overview-item" onclick="showContent('curtHist')">Current History</div>
        <div class="overview-item" onclick="showContent('phExam')">Physical Exam</div>
        <div class="overview-item" onclick="showContent('impression')">Impression</div>
        <div class="overview-item" onclick="showContent('lab')">Lab</div>
        <div class="overview-item" onclick="showContent('imaging')">Imaging</div>
        <div class="overview-item" onclick="showContent('diagnosis')">Diagnosis</div>
        <div class="overview-item" onclick="showContent('prescription')">Prescription</div>
        <div class="overview-item" onclick="showContent('procedure')">Procedure</div>
    </div>

    <!-- Add content containers for each section -->
    <div id="dashboard-content" class="overview-content active">
        <?php include('dashboard.php'); ?>
    </div>

    <div id="triage-content" class="overview-content">
        <?php include('triage.php'); ?>
    </div>

    <div id="ptHist-content" class="overview-content">
        <?php include('past_history.php'); ?>
    </div>

    <div id="curtHist-content" class="overview-content">
        <?php include('current_history.php'); ?>
    </div>

    <div id="phExam-content" class="overview-content">
        <?php include('physical_examination.php'); ?>
    </div>

    <div id="impression-content" class="overview-content">
        <?php include('impression.php'); ?>
    </div>

    <div id="lab-content" class="overview-content">
        <?php include('lab.php'); ?>
    </div>

    <div id="imaging-content" class="overview-content">
        <?php include('imaging.php'); ?>
    </div>

    <div id="diagnosis-content" class="overview-content">
        <?php include('diagnosis.php'); ?>
    </div>

    <div id="prescription-content" class="overview-content">
        <?php include('prescription.php'); ?>
    </div>

    <div id="procedure-content" class="overview-content">
        <?php include('procedure.php'); ?>
    </div>

    <script>
        function showContent(contentId) {
            const contents = document.querySelectorAll('.overview-content');
            contents.forEach(content => {
                content.classList.remove('active');
            });

            const selectedContent = document.getElementById(`${contentId}-content`);
            if (selectedContent) {
                selectedContent.classList.add('active');
            }
        }
    </script>

</body>
</html>


<?php

include "footer.php";                 
?>

