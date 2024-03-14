<?php
session_start();
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

//BELOW IS THE TRIAGE PHP FOR SENDING DATA TO THE DATABASE
// $id = $_GET["id"];
// $name = $_GET["name"];
// $dob = $_GET["dob"];
include('database/connect.php');

//below is the php code that updates the rooms in the patient part
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["roomDetails"])){
        //the update of the rooms 
        $rooms = $_POST["rooms"];
        
        $sql1 ="UPDATE `patients`
                SET `rooms` = '$rooms'
                WHERE `PatientID` = '$id'";
        $res1 = mysqli_query($conn, $sql1);

        if($res1){
            mysqli_close($conn);
            exit();
            header("doctor_index.php");
                
            }
    }else{
        echo "<h1 style= 'color:red;'>Please contact I.T support for assistance</h1>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past History Questionnaire</title>
    <link rel="icon" type="image/x-icon" href="nya-logo.jpg">
    
    <link rel="stylesheet" href="css/past.css">
    <link rel="icon" type="image/x-icon" href="nya-logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js">
    <script src="script.js"></script>
    

    <style>
        /* THIS IS THE CSS FOR THE FORM USED TO EDIT USER DETAILS ON THE SPAN*/
      /* Style for the popup form container */
      .popup-form-container {
      height: 550px;
      width: 500px; 
      display: none;
      position: fixed;
      top: 70%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #f1f1f1;
      padding: 20px;
      border: 1px solid #ccc;
      z-index: 1;
    }
    

    /* Style for the span element */
    .popup-trigger {
      cursor: pointer;
      text-decoration: underline;
      color: blue;
    }
    /* //the css for the container for booking form */
    .popup-form-container1 {
      
      height: 1000;
      width: 500px; 
      
      display: none;
      position: absolute;
      
      top: 100%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #f1f1f1;
      padding: 10px;
      border: 1px solid #ccc;
      z-index: 1;
    }
        /* //////////////////////////////////THIS IS THE CSS FOR THE MOVEABLE DIVS IN LAB RESULTS */
 .subtitle{
    font-size: 60px;
    font-weight: 600;
    color: black;
  }
  
  .tab-titles{
    display: flex;
    margin: 20px 0 40px;
    font-weight: 300;
  }
  
  .tab-links{
    margin-right: 50px;
    font-size: 18px;
    font-weight: 500;
    cursor: pointer;
    position: relative;
    color: #111;
  }
  
  .tab-links::after{
    content: '';
    width: 0;
    height: 3px;
    background: #ff004f;
    position: absolute;
    left: 0;
    bottom: -8px;
    transition: 0.5s;
  }
  
  .tab-links.active-link::after{
    width: 50%;
  }
  
  .tab-contents ul li{
    list-style: none;
    margin: 10px 0;
  }
  
  .tab-contents ul li span{
    color: #b54769;
    font-size: 14px;
  }
  .tab-contents{
    display: none;
    font-weight: 300;
    color: #111;
  }
  
  .tab-contents.active-tab{
    display: block;
  
  }
  
  .textt{
    font-weight: 300;
    color: #111;
  }
  .texttt{
    font-weight: 300;
    color: #111;
  }
  select{
                width: 100%;
                background-color: #141824;
                border: none;
                outline: none;
                padding: 10px;
                font-family: 'Poppins';
                margin-top: 5px;
                resize: none;
                color: #fff;
                border-radius: 10px;
            }

             /* Your styles for the dashboard go here */
        .patient-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .patient-info img {
            max-height: 200px;
            max-width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .patient-details {
            flex: 1;
            margin-left: 20px;
        }
          /* transactions page */
    .form{
        padding: 30px 40px;
      }
      
      .form-control{
        margin-bottom: 10px;
        padding-bottom: 20px;
        position: relative;
        display: inline;
      }
      
      .form-control label{
        display: inline-block;
        margin-bottom: 5px;
        color:blue;
      }
      .form-control input{
        border: 2px solid #f0f0f0;
        border-radius: 4px;
        display: block;
        
        font-size: 14px;
        padding: 10px;
        width: 100%;
      }
      
      .form-control input:focus{
        outline: 0;
        border-color: #777;
      }
      
      
      .form button{
        background-color: #FF00FF;
        border: 2px solid #8e44ad;
        border-radius: 4px;
        color: #fff;
        display: block;
        
        font-size: 16px;
        padding: 10px;
        margin-top: 20px;
        
        width: 100%;
      } 
      .error{
          background: #F2DEDE;
          color:#A94442;
          padding:10px;
          width:95%;
          border-radius:5px;
          margin:20px auto;
        }
        .success{
          background: #fff;
          color:#FF00FF;
          padding:10px;
          width:95%;
          border-radius:5px;
          margin:20px auto;
        }  
        img{
          height:200px;
          width:200px;
        }
    </style>
</head>
<body>
 <!-- THIS IS THE LINK THAT WILL DIVERT TO THE ONCLICKED DIVS -->
 <div style = 'padding:20px;'>
         <div class="tab-titles">
                        <p class="tab-links" onclick="opentab('labResults')" style="color:red;">Lab Results</p>
                        <p class="tab-links" onclick="opentab('imaging')" style="color:red;">Imaging</p>
                        
                        <p class="tab-links" onclick="opentab('diagnosis')" style="color:red;">Diagnosis</p>
                        <p class="tab-links" onclick="opentab('prescription')" style="color:red;">Prescription</p>
                        <p class="tab-links" onclick="opentab('procedure')" style="color:red;">Procedure</p>

                    </div>


<!-- BELOW ARE THE SELECTED LINKS THAT ARE USED -->
<div>

<!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts -->                      <!-- //one of the parts -->
<div class="tab-contents active-tab" id="labResults">
<?php
include("database/connect.php");
$status = 'done';
$sql = "SELECT * FROM `labnotifications`
        WHERE `patients_Lid` = '$id' AND `status` = '$status'";
$res = mysqli_query($conn,$sql);

if($res){
  $num = mysqli_num_rows($res);
  if($num>0){
    while($row = mysqli_fetch_assoc($res)){
      echo "<h1>The patient Test done was {$row["testToDone"]}</h1><br>
            <p style='color:red;'>The result is {$row["results"]}</p>";
    }
  }
}

?>
</div>

<!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts -->                      <!-- //one of the parts -->
                        <div class="tab-contents " id="imaging">
                            
                        <!-- Form for requesting imaging tests -->
       

        <?php
        $statusI = 'done';
        $sql = "SELECT * FROM `imagingrequests`
                WHERE `patient_Imageid` = '$id' AND `status` = '$statusI'";
        $rel = mysqli_query($conn, $sql);
        if($rel){
          $num = mysqli_num_rows($rel);
          if($num>0){
            $row = mysqli_fetch_assoc($rel);
            $imagePath = isset($row["imageUpload"]) ? $row["imageUpload"] : null;
          
            $imageUrl =  $imagePath; // Adjust this to your base URL
            $imageUrl = str_replace('../', '', $imagePath); // Remove ../ from the image path
            
          echo "<h1>This is the imaging result</h1><br><img src='{$imageUrl}'>";
          }else{
            echo "<h2>The patient has no imaging data</h2>

            
            <form action='database/process_imaging.php' method='post'>
                <label for='imagingTests'>
                    Select Imaging Tests to be performed for the patient <?php echo $firstN; ?>:</label>
                    <select id='imagingTests' name='imagingTests' multiple='multiple'>
                        <option name='imagingTests' value='Ultrasound' data-price='5000'>Ultrasound</option>
                        <option name='imagingTests' value='X-Ray' data-price='3000'>X-Ray</option>
                        <option name='imagingTests' value='MRI' data-price='8000'>MRI</option>
                        <option name='imagingTests' value='CT Scan' data-price='7000'>CT Scan</option>
                        <option name='imagingTests' value='Mammogram' data-price='4500'>Mammogram</option>
                        <option name='imagingTests' value='Transvaginal Ultrasound' data-price='3500'>Transvaginal Ultrasound</option>
                        <option name='imagingTests' value='HSG' data-price='3500'>Hysterosalpingography</option>
                        <option name='imagingTests' value='Sonohysterography' data-price='3500'>Sonohysterography</option>
                        <option name='imagingTests' value='PET' data-price='3500'>Positron Emission Tomography</option>
                        <option name='imagingTests' value='DEXA' data-price='3500'>Bone Density Scan</option>
                        
                    </select>
                
    
                
                
                <label>
                    Additional Information:
                    
                </label>
                <textarea name='additionalInfo' required></textarea>
    
                <button type='submit' name='imagingTestsSub' style = ' background-color: #FF00FF;
                                            border: 2px solid #8e44ad;
                                            border-radius: 4px;
                                            color: #fff;
                                            display: block;
                                            
                                            font-size: 16px;
                                            padding: 10px;
                                            margin-top: 20px;
                                            
                                            width: 100%;'>Submit Request</button>
            </form>

            ";
          
        }
      }
        
        ?>
    </div>

    
<!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts -->
                        <div class="tab-contents" id="diagnosis">
                        <form action="database/process_diagnosis.php" method="post">
        <label>
            Select Diagnosis for <?php echo $firstN; ?>:</label>
            <select name="selectedDiagnosis" required>
            <option name="selectedDiagnosis" value="Vaginitis">Vaginitis</option>
<option name="selectedDiagnosis" value="Cervicitis">Cervicitis</option>
<option name="selectedDiagnosis" value="Pelvic Inflammatory Disease (PID)">Pelvic Inflammatory Disease (PID)</option>
<option name="selectedDiagnosis" value="Endometriosis">Endometriosis</option>
<option name="selectedDiagnosis" value="Polycystic Ovary Syndrome (PCOS)">Polycystic Ovary Syndrome (PCOS)</option>
<option name="selectedDiagnosis" value="Uterine Fibroids">Uterine Fibroids</option>
<option name="selectedDiagnosis" value="Ovarian Cysts">Ovarian Cysts</option>
<option name="selectedDiagnosis" value="Menorrhagia">Menorrhagia</option>
<option name="selectedDiagnosis" value="Dysmenorrhea">Dysmenorrhea</option>
<option name="selectedDiagnosis" value="Premenstrual Syndrome (PMS)">Premenstrual Syndrome (PMS)</option>
<option name="selectedDiagnosis" value="Amenorrhea">Amenorrhea</option>
<option name="selectedDiagnosis" value="Irregular Menstrual Cycles">Irregular Menstrual Cycles</option>
<option name="selectedDiagnosis" value="Dyspareunia">Dyspareunia</option>
<option name="selectedDiagnosis" value="Vulvodynia">Vulvodynia</option>
<option name="selectedDiagnosis" value="Pelvic Organ Prolapse">Pelvic Organ Prolapse</option>
<option name="selectedDiagnosis" value="Gynecological Cancer">Gynecological Cancer</option>
<option name="selectedDiagnosis" value="Menopause">Menopause</option>
<option name="selectedDiagnosis" value="Osteoporosis">Osteoporosis</option>
<option name="selectedDiagnosis" value="Infertility">Infertility</option>
<option name="selectedDiagnosis" value="Ectopic Pregnancy">Ectopic Pregnancy</option>
<option name="selectedDiagnosis" value="Gestational Trophoblastic Disease (GTD)">Gestational Trophoblastic Disease (GTD)</option>
<option name="selectedDiagnosis" value="Recurrent Pregnancy Loss">Recurrent Pregnancy Loss</option>
<option name="selectedDiagnosis" value="Preeclampsia">Preeclampsia</option>
<option name="selectedDiagnosis" value="Placenta Previa">Placenta Previa</option>
<option name="selectedDiagnosis" value="Placental Abruption">Placental Abruption</option>
<option name="selectedDiagnosis" value="Gestational Diabetes">Gestational Diabetes</option>
<option name="selectedDiagnosis" value="Preterm Labor">Preterm Labor</option>
<option name="selectedDiagnosis" value="Postpartum Depression">Postpartum Depression</option>
<option name="selectedDiagnosis" value="Bacterial Vaginosis">Bacterial Vaginosis</option>
<option name="selectedDiagnosis" value="Yeast Infection (Candidiasis)">Yeast Infection (Candidiasis)</option>
<option name="selectedDiagnosis" value="Trichomoniasis">Trichomoniasis</option>
<option name="selectedDiagnosis" value="Genital Herpes">Genital Herpes</option>
<option name="selectedDiagnosis" value="Human Papillomavirus (HPV) Infection">Human Papillomavirus (HPV) Infection</option>
<option name="selectedDiagnosis" value="Syphilis">Syphilis</option>
<option name="selectedDiagnosis" value="Chlamydia">Chlamydia</option>
<option name="selectedDiagnosis" value="Gonorrhea">Gonorrhea</option>
<option name="selectedDiagnosis" value="HIV/AIDS">HIV/AIDS</option>
<option name="selectedDiagnosis" value="Cervical Dysplasia">Cervical Dysplasia</option>
<option name="selectedDiagnosis" value="Uterine Cancer">Uterine Cancer</option>
<option name="selectedDiagnosis" value="Ovarian Cancer">Ovarian Cancer</option>
<option name="selectedDiagnosis" value="Breast Cancer">Breast Cancer</option>
<option name="selectedDiagnosis" value="Pelvic Pain">Pelvic Pain</option>
<option name="selectedDiagnosis" value="Sexual Dysfunction">Sexual Dysfunction</option>
<option name="selectedDiagnosis" value="Hormone Imbalance">Hormone Imbalance</option>
<option name="selectedDiagnosis" value="Interstitial Cystitis">Interstitial Cystitis</option>
<option name="selectedDiagnosis" value="Female Sexual Arousal Disorder (FSAD)">Female Sexual Arousal Disorder (FSAD)</option>

            </select>
        

        <label>
            Or Enter a Custom Diagnosis:
            <textarea name="customDiagnosis" ></textarea>
        </label>

        <button type="submit" name ="selectedDiagnosisBtn" style = ' background-color: #FF00FF;
                                        border: 2px solid #8e44ad;
                                        border-radius: 4px;
                                        color: #fff;
                                        display: block;
                                        
                                        font-size: 16px;
                                        padding: 10px;
                                        margin-top: 20px;
                                        
                                        width: 100%;'>Submit Diagnosis</button>
    </form>

    <!-- /////NEED TO ADD A TABLE -->
    <?php
    $sql = "SELECT * FROM `diagnosis`
            WHERE `patient_Did` = '$id' ";
    $diaRes = mysqli_query($conn, $sql);
    if($diaRes){
      $num = mysqli_num_rows($diaRes);
      if($num>0){
        while($row = mysqli_fetch_assoc($diaRes)){
          if(isset($row["selectedDiagnosis"])){echo "<h1>The diagnosis is {$row["selectedDiagnosis"]}</h1>"; }else{
            echo "<h2 style='color:red;'>No diagnosis</h2><br>";
          }if(isset($row["customDiagnosis"])){echo "<h1>The diagnosis is {$row["customDiagnosis"]}</h1>"; }else{
            echo "<h2 style='color:red;'>No Custom diagnosis</h2>";
          }
        }
        
        
                
      }else{
        echo "<h1>There is no data diagnosis for the patient</h1>";
      }
    }
    ?>
                        </div>

 <!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts -->
                        <div class="tab-contents" id="prescription">
                        <!-- Prescription form -->
    <form action="database/process_prescription.php" method="post">
        <label>
            Patient Name:</label>
            <input type="text" name="patientName" value='<?php echo $_SESSION["firstN"] ? htmlspecialchars($_SESSION["firstN"]) : ""; ?>' required>
        <br>

        
        <br>

        <label style="color:red;">
            Select Medication from your medicines:</label>
            <select name="medicationData" required>
            <?php
            include("database/connect.php");
            $sql = "SELECT * FROM `medicines`
                    WHERE `quantity` >= 1 AND `expiryDate` >= CURDATE()";
            $result1 = mysqli_query($conn, $sql);
            if($result1){
                $num = mysqli_num_rows($result1);
                if($num>0){
                    while($row = mysqli_fetch_assoc($result1)){
                      $_SESSION["medID"] = $row["id"];
                        echo"
                        <option name='medicationData' value='{$row["Name"]}'>{$row["Name"]}</option>
                
                ";
                    }
                    
                }
                
            }
            ?>
            </select>
            <label>
            Select Medication that you do not have:</label>
            <select name="medication">
                <option name="medication" value="Paracetamol 500mg">Paracetamol 500mg</option>
                <option name="medication" value="Amoxicillin 500mg">Amoxicillin 500mg</option>
                <option name="medication" value="Ibuprofen 200mg">Ibuprofen 200mg</option>
                <option name="medication" value="Aspirin 325mg">Aspirin 325mg</option>
                <option name="medication" value="Ciprofloxacin 250mg">Ciprofloxacin 250mg</option>
                <option name="medication" value="Diazepam 5mg">Diazepam 5mg</option>
                <option name="medication" value="Loratadine 10mg">Loratadine 10mg</option>
                <option name="medication" value="Omeprazole 20mg">Omeprazole 20mg</option>
                <option name="medication" value="Hydrochlorothiazide 12.5mg">Hydrochlorothiazide 12.5mg</option>
                <option name="medication" value="Metformin 500mg">Metformin 500mg</option>
                <option name="medication" value="none">None</option>
            </select>
        

        <label>
            Select Dosage Instructions:</label>
            <select name="dosageInstructions">
                <option name="dosageInstructions" value="Take one tablet by mouth daily">Take one tablet by mouth daily</option>
                <option name="dosageInstructions" value="Take two tablets by mouth twice a day">Take two tablets by mouth twice a day</option>
                <option name="dosageInstructions" value="Take one capsule with food every eight hours">Take one capsule with food every eight hours</option>
                <option name="dosageInstructions" value="Apply a thin layer to the affected area once a day">Apply a thin layer to the affected area once a day</option>
                <option name="dosageInstructions" value="Inhale two puffs every four hours as needed">Inhale two puffs every four hours as needed</option>
                <option name="dosageInstructions" value="Take one tablet on an empty stomach in the morning">Take one tablet on an empty stomach in the morning</option>
                <option name="dosageInstructions" value="Take three tablets by mouth before bedtime">Take three tablets by mouth before bedtime</option>
                <option name="dosageInstructions" value="Inject one milliliter subcutaneously once a week">Inject one milliliter subcutaneously once a week</option>
                <option name="dosageInstructions" value="Dissolve one packet in water and drink daily">Dissolve one packet in water and drink daily</option>
                <option name="dosageInstructions" value="Chew two gummies daily with or without food">Chew two gummies daily with or without food</option>
            </select>

            <label for="modifiedPrescription">Enter your own modified presciption</label><br>
            <input type="text" name="modifiedPrescription" id="" placeholder = "i.e 3*2 swallow">
        

        <button type="submit" name="prescriptionBtn" style = ' background-color: #FF00FF;
                                        border: 2px solid #8e44ad;
                                        border-radius: 4px;
                                        color: #fff;
                                        display: block;
                                        
                                        font-size: 16px;
                                        padding: 10px;
                                        margin-top: 20px;
                                        
                                        width: 100%;'>Generate Prescription</button>
    </form>
                        </div>

    <!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts -->
                        <div class="tab-contents" id="procedure">
                        <form action="database/process_procedures.php" method="post">
        <label for="procedures">Select procedures for the patient:</label>

        <!-- List of gynecology procedures with checkboxes -->
        <ul>
            <li><label><input type="checkbox" name="Pap" value="Pap Smear"> Pap Smear</label></li>
            <li><label><input type="checkbox" name="Colposcopy" value="Colposcopy"> Colposcopy</label></li>
            <li><label><input type="checkbox" name="Hysteroscopy" value="Hysteroscopy"> Hysteroscopy</label></li>
            <li><label><input type="checkbox" name="Endometrial" value="Endometrial Biopsy"> Endometrial Biopsy</label></li>
            <li><label><input type="checkbox" name="Pelvic" value="Pelvic Ultrasound"> Pelvic Ultrasound</label></li>
            <li><label><input type="checkbox" name="Mammogram" value="Mammogram"> Mammogram</label></li>
            <li><label><input type="checkbox" name="Ovarian" value="Ovarian Cystectomy"> Ovarian Cystectomy</label></li>
            <li><label><input type="checkbox" name="Cervical" value="Cervical Cerclage"> Cervical Cerclage</label></li>
            <li><label><input type="checkbox" name="Tubal" value="Tubal Ligation"> Tubal Ligation</label></li>
            <li><label><input type="checkbox" name="LEEP" value="LEEP Procedure"> LEEP Procedure</label></li>
            <li><label><input type="checkbox" name="Myomectomy" value="Myomectomy"> Myomectomy</label></li>
            <li><label><input type="checkbox" name="Hysterectomy" value="Hysterectomy"> Hysterectomy</label></li>
            <li><label><input type="checkbox" name="Vaginal" value="Vaginal Rejuvenation"> Vaginal Rejuvenation</label></li>
            <li><label><input type="checkbox" name="Dilation" value="Dilation and Curettage (D&C)"> Dilation and Curettage (D&C)</label></li>
            <li><label><input type="checkbox" name="Uterine" value="Uterine Artery Embolization"> Uterine Artery Embolization</label></li>
            <li><label><input type="checkbox" name="Cystoscopy" value="Cystoscopy"> Cystoscopy</label></li>
            <li><label><input type="checkbox" name="Intrauterine" value="Intrauterine Device (IUD) Placement"> Intrauterine Device (IUD) Placement</label></li>
            <li><label><input type="checkbox" name="Amniocentesis" value="Amniocentesis"> Amniocentesis</label></li>
            <li><label><input type="checkbox" name="Fetal" value="Fetal Monitoring"> Fetal Monitoring</label></li>
            <li><label><input type="checkbox" name="Cesarean" value="Cesarean Section"> Cesarean Section</label></li>
            <!-- Add more procedures as needed -->
        </ul>

        <input type="submit" name="proceduresMain" value="Submit Procedures/Complete session with patient" style = 'background-color: green;
                                        border: 2px solid red;
                                        border-radius: 4px;
                                        color: #fff;
                                        display: block;
                                        
                                        font-size: 16px;
                                        padding: 10px;
                                        margin-top: 20px;
                                        
                                        width: 100%;'>
    </form>
         <a href="database/doc_finalTotalServices.php"><input type="button" value="Complete the session with the patient" style = 'background-color: green;
                                        border: 2px solid red;
                                        border-radius: 4px;
                                        color: #fff;
                                        display: block;
                                        
                                        font-size: 16px;
                                        padding: 10px;
                                        margin-top: 20px;
                                        
                                        width: 100%;'></a>
                        </div>
         </div>

         <script>
            function addTestsToTable() {
            var selectedTests = document.getElementById('labTests').selectedOptions;
            var selectedItemsTable = document.getElementById('selectedItemsTable');
            var totalPriceSpan = document.getElementById('totalPrice');
            
            var totalPrice = parseFloat(totalPriceSpan.textContent) || 0;

            for (var i = 0; i < selectedTests.length; i++) {
                var test = selectedTests[i].text;
                var price = parseFloat(selectedTests[i].getAttribute('data-price'));

                var row = selectedItemsTable.insertRow(-1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);

                cell1.innerHTML = test;
                cell2.innerHTML = price.toLocaleString('en-US');
                cell3.innerHTML = '<button onclick="deleteTest(this)">Delete</button>';
                
                totalPrice += price;
            }

            totalPriceSpan.textContent = totalPrice.toLocaleString('en-US');
        }

        function deleteTest(button) {
            var row = button.parentNode.parentNode;
            var price = parseFloat(row.cells[1].textContent.replace(/\D/g, ''));

            row.parentNode.removeChild(row);

            var totalPriceSpan = document.getElementById('totalPrice');
            var totalPrice = parseFloat(totalPriceSpan.textContent) || 0;
            totalPrice -= price;

            totalPriceSpan.textContent = totalPrice.toLocaleString('en-US');
        }
    
            
            // Function to open the popup form for editing user details
              function openPopupForm() {
                  var popupForm = document.getElementById('popupFormEdit');
                  popupForm.style.display = 'block';
                }

                // Function to close the popup form for editing user details
                function closePopupForm() {
                  var popupForm = document.getElementById('popupFormEdit');
                  popupForm.style.display = 'none';
                }
          
            
        function addTestsToTable() {
            var selectedTests = document.getElementById('labTests').selectedOptions;
            var selectedItemsTable = document.getElementById('selectedItemsTable');
            var totalPriceSpan = document.getElementById('totalPrice');
            
            var totalPrice = parseFloat(totalPriceSpan.textContent) || 0;

            for (var i = 0; i < selectedTests.length; i++) {
                var test = selectedTests[i].text;
                var price = parseFloat(selectedTests[i].getAttribute('data-price'));

                var row = selectedItemsTable.insertRow(-1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);

                cell1.innerHTML = test;
                cell2.innerHTML = price.toLocaleString('en-US');
                cell3.innerHTML = '<button onclick="deleteTest(this)">Delete</button>';
                
                totalPrice += price;
            }

            totalPriceSpan.textContent = totalPrice.toLocaleString('en-US');
        }

        function deleteTest(button) {
            var row = button.parentNode.parentNode;
            var price = parseFloat(row.cells[1].textContent.replace(/\D/g, ''));

            row.parentNode.removeChild(row);

            var totalPriceSpan = document.getElementById('totalPrice');
            var totalPrice = parseFloat(totalPriceSpan.textContent) || 0;
            totalPrice -= price;

            totalPriceSpan.textContent = totalPrice.toLocaleString('en-US');
        }
    
            //   SCRIPT START FOR TRIAGE PART
      function getSelectedValue() {
      // Get the select element
      var selectElement = document.getElementById('bp');

      // Get the selected value
      var selectedValue = selectElement.value.toString();
      var resultElementBp = document.getElementById('resBp');
      console.log(selectedValue);

      // Display the selected value (you can modify this part based on your needs)
      // alert('Selected Blood Pressure: ' + selectedValue);
      if(selectedValue == 180){
        alert('The patient is in Hypertensive Crisis');
        resultElementBp.innerHTML = '<h4>This is a Hypertensive Crisis patient!</h4>';
        
      }else if(selectedValue == 120){
        alert('The patient is in Hypertensive Crisis');
        resultElementBp.innerHTML = '<h4>This is a Hypertensive Crisis patient!</h4>';
        
      }else if(selectedValue == 140){
        alert('The patient is in Hypertension Stage 2');
        resultElementBp.innerHTML = '<h4>This is a Hypertension Stage 2 patient!</h4>';
        
      }else if(selectedValue == 90){
        alert('The patient is in Hypertension Stage 2');
        resultElementBp.innerHTML = '<h4>This is a Hypertension Stage 2 patient!</h4>';
        
      }
      else if(selectedValue == 130){
        
        resultElementBp.innerHTML = '<h4>This is a Hypertension Stage 1 patient!</h4>';
        
      }
      else if(selectedValue == 8089){
        
        resultElementBp.innerHTML = '<h4>This is a Hypertension Stage 1 patient!</h4>';
        
      }else if(selectedValue == 121){
        
        resultElementBp.innerHTML = '<h4>This is an elevated stage patient!</h4>';
        
      }else if(selectedValue == 79){
        
        resultElementBp.innerHTML = '<h4>This is an elevated stage patient!</h4>';
        
      }
      else{
        resultElementBp.innerHTML = '<h4>This is a normal patient!</h4>';
        
      }
      
      
    }
      
    function calculateBMI() {
      // Get values from input fields
      var weight = parseFloat(document.getElementById('weight').value);
      var height = parseFloat(document.getElementById('height').value);

      // Check if the input values are valid
      if (isNaN(weight) || isNaN(height) || weight <= 0 || height <= 0) {
        alert("Please enter valid values for weight and height.");
        return;
      }

      // Calculate BMI
      var bmi = weight / (height * height);

      // Display the result
      var resultElement = document.getElementById('result');
      resultElement.innerHTML = 'The patient has a BMI of: ' + bmi.toFixed(2);
    }

    function calculateAge() {
      // Get the date of birth from the input field
      var dobString = document.getElementById('dob').value;

      // Check if a date is selected
      if (!dobString) {
        alert("Please select a date of birth.");
        return;
      }

      // Parse the date string into a Date object
      var dob = new Date(dobString);

      // Check if the date is valid
      if (isNaN(dob.getTime())) {
        alert("Invalid date. Please enter a valid date of birth.");
        return;
      }

      // Get the current date
      var currentDate = new Date();

      // Calculate the age
      var age = currentDate.getFullYear() - dob.getFullYear();

      // Check if the birthday has occurred this year
      if (currentDate.getMonth() < dob.getMonth() ||
          (currentDate.getMonth() === dob.getMonth() && currentDate.getDate() < dob.getDate())) {
        age--;
      }

      // Display the result
      var resultElement = document.getElementById('resultAge');
      resultElement.innerHTML = 'Your age is: ' + age + ' years';

    }
//   SCRIPT END FOR TRIAGE PART

                        //  THE EXTRACTED PART THAT I NEED 
  
var tablinks =document.getElementsByClassName("tab-links");
var tabcontents =document.getElementsByClassName("tab-contents")


var navLinks = document.getElementById("navLinks");
function showMenu(){
    navLinks.style.right = "0";
}

function hideMenu(){
    navLinks.style.right = "-200px";
 }

function opentab(tabname){
    for(tablink of tablinks){
        tablink.classList.remove("active-link");
    }
    for(tabcontent of tabcontents){
        tabcontent.classList.remove("active-tab");
    }
    event.currentTarget.classList.add("active-link");
    document.getElementById(tabname).classList.add("active-tab");
}

   </script>
</body>
</html>