<?php
session_start();
//we need to borrow data from the previous page
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
// $addInfo = $_GET["AdditionlInformation"];
// $age = $_GET["age"];

$_SESSION["id"] = $_GET["id"];
$_SESSION["firstN"] = $_GET["firstN"];
$_SESSION["lastN"] = $_GET["lastN"];
$_SESSION["dob"] = $_GET["dob"];
$_SESSION["bloodG"] = $_GET["bloodG"];
$_SESSION["medication"] = $_GET["medication"];
$_SESSION["gender"] = $_GET["gender"];
$_SESSION["phoneN"] = $_GET["phoneN"];
$_SESSION["EmailAddress"] = $_GET["EmailAddress"];
$_SESSION["NextOfKin"] = $_GET["NextOfKin"];
$_SESSION["NextOfKinPhoneNumber"] = $_GET["NextOfKinPhoneNumber"];
$_SESSION["MaritalStatus"] = $_GET["MaritalStatus"];
$_SESSION["IDNumber"] = $_GET["IDNumber"];
$_SESSION["Allergies"] = $_GET["Allergies"];
$_SESSION["Occupation"] = $_GET["Occupation"];

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
    </style>
</head>
<body>
 <!-- THIS IS THE LINK THAT WILL DIVERT TO THE ONCLICKED DIVS -->
 <div style = 'padding:20px;'>
         <div class="tab-titles">
                        <p class="tab-links active-link" onclick="opentab('dash')" style="color:red;"> Dashboard</p>
                        <p class="tab-links" onclick="opentab('triage')" style="color:red;">Triage</p>
                        <p class="tab-links" onclick="opentab('past')" style="color:red;">Patient History</p>
                        <p class="tab-links" onclick="opentab('current')" style="color:red;">Current History</p>
                        <p class="tab-links" onclick="opentab('physical')" style="color:red;">Physical Exam</p>
                        <p class="tab-links" onclick="opentab('impression')" style="color:red;">Impression</p>
                        <p class="tab-links" onclick="opentab('lab')" style="color:red;">Lab</p>
                        <a href="past-history-question2.php?id={$id}&firstN={$firstN}&lastN={$lastN}&dob={$dob}&bloodG={$bloodG}&medication={$medication}&gender={$gender}&phoneN={$phoneN}&EmailAddress={$EmailAddress}&NextOfKin={$NextOfKin}&NextOfKinPhoneNumber={$NextOfKinPhoneNumber}&MaritalStatus={$MaritalStatus}&Allergies={$Allergies}&IDNumber={$IDNumber}&Occupation={$Occupation}"><p class="tab-links" onclick="opentab('Final')" style="color:red;">Proceed to Final Stages(Imaging etc)</p></a>
                        
                        
                    </div>

                    <!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts -->                      <!-- //one of the parts -->
                    <div class="tab-contents active-tab" id="dash">
                        <h2>Messages</h2>
                        <?php if(isset($_GET["error"])){
                            echo "<p class ='error'> {$_GET["error"]}; </p>";
                        
                        } ?>
                        <?php if(isset($_GET["success"])){
                            echo "<p class ='success'> {$_GET["success"]}; </p>";
                        
                        } ?>


                        </div>

<!-- BELOW ARE THE SELECTED LINKS THAT ARE USED -->
<div>
                        <div class="tab-contents" id="past">
                        <form action="database/pastHistory.php" method="post" class="body-box" id="invoice">
        <div >
            <h2 class ="head" style="color: blue;">Department</h2>
            <h1 class ="head">PATIENT HISTORY QUESTIONNAIRE</h1>
            <hr>
            <h2>A</h2>
            <ol>
                <li>Marital Status:<br> <input type="radio" name="marital-status" id="" value="single" required><label for="single">single</label> <br><input type="radio" name="marital-status" id="" value="married"><label for="married">married</label><br> <input type="radio" name="marital-status" id="" value="long-term-relationship"> <label for="long-term-relationship">long-term-relationship</label><br><input type="radio" name="marital-status" id="" value="divorced"> <label for="">Divorced</label><br><input type="radio" name="marital-status" id="" value="widowed"><label for="">Widowed</label><br></li>
                <li>Reasons for the visit: <select name="reason-for-visit" id="">
                                                <option name="reason-for-visit" value="Obstetrics">Obstetrics</option>
                                                <option name="reason-for-visit" value="Gynecology">Gynecology</option>
                                                <option name="reason-for-visit" value="Teens Health">Teens Health</option>
                                                <option name="reason-for-visit" value="Surgeries">Surgeries</option>
                                                <option name="reason-for-visit" value="In Office Procedures">In Office Procedures - ksh.10000</option>
                                            </select>
                </li>
                <li>Refering Physician: <select name="ref-physician" id="">
                    <option name="ref-physician" value="Dr.Schola">Dr.Schola</option>
                </select></li>

                <li>Occupation: <select name="occupation" id="">
                                    <option name="occupation" value="civil Worker">Civil worker</option>
                                    <option name="occupation" value="Freelance">Freelancer/Self-Employed</option>
                                    <option name="occupation" value="Legal Professional">Legal Professional</option>
                                    <option name="occupation" value="Emergency Services">Emergency Services</option>
                                    <option name="occupation" value="Education">Education</option>
                                    <option name="occupation" value="Arts and Entertainment">Arts and Entertainment</option>
                                    <option name="occupation" value="Information Technology">Information Technology</option>
                                    <option name="occupation" value="Healthcare Professional">Healthcare Professional</option>
                                    <option name="occupation" value="Unskilled Labor">Unskilled Labor</option>
                                    <option name="occupation" value="Skilled Labor">Skilled Labor</option>
                                    <option name="occupation" value="Industry worker">Industrial worker</option>
                                    <option name="occupation" value="Social and Community Services">Social and Community Services offerer</option>
                                </select></li>
                <li>Preferred phone number: <input type="tel" name="phone-no" id="" pattern="^\+254\d{9}$" placeholder="Enter kenyan(+254)"></li> 
                <li>Partner: <input type="text" name="partner-name" id="partner" placeholder="Enter Partner's Name"><input type="checkbox" name="partner_none" value="no partner" id="partner-none" >  <input type="number" name="age-partner" placeholder="Enter Age of partner"></li>
                <li>Partner's Occupation: <input type="text" name="part-occupation" id=""></li>
            </ol>

            <hr>
            <h2>B</h2><h2>MENSTRUAL HISTORY(complete even if post-menopausal or no longer having periods)</h2>
            <ol>
                <li>Age at first period: <input type="number" name="age-first-period"> years.</li>
                <li> If your menstrual periods are regular; periods start every: <input type="number" name="period-start-days" id="period-days"> days</li>
                <li>lf your menstrual periods are irregular; periods start every: <input type="number" name="irreg-period-strt-dy" id="irreg-period-dy" placeholder="enter in form of 10-20"> days</li>
                <li>Duration of bleeding: <input type="number" name="duration-bleeding" id="duration-bleeding" placeholder="in days"></li>
                <li>Does bleeding or spotting occur between periods? <input type="radio" name="bleedingBtwnPeriods" value="no"> <label for="">No</label> <input type="radio" name="bleeding-btwn-periods" value="yes"> <label for="">Yes</label></li>
                <li>Does bleeding or spotting occur after intercourse? <input type="radio" name="bleedingAfterPeriods" id="" value="no"> <label for="">No</label> <input type="radio" name="bleeding-after-periods" id="" value="yes"> <label for="">Yes</label></li>
                <li>First day of last menstrual period <input type="date" name="last-menstrual-period" id="periodStartDate"></li>
                
                <button type="button" onclick="calculatePeriodDates()">Calculate period details</button>
                <br><br>
                <div id="results" style="color:red;"></div>
                
                <li>Is pain associated with periods? <br><input type="radio" name="pain-period" id="" value="no"> <label for="">No</label> <input type="radio" name="pain-period" id="" value="yes"> <label for="">Yes</label> <input type="radio" name="" id=""> <label for="">Occasionally</label></li>
                <li>If yes to 14, is it: before menses? <br><input type="radio" name="menses" id="" value="before-menses"> during menses? <input type="radio" name="menses" id="" value="during-menses"> both? <input type="radio" name="" id=""></li>
            </ol>

            <hr>
            <h2>C</h2><h2>PREGNANCY HISTORY(All pregnancies)</h2><h2>Have never been pregnant <input type="checkbox" name="never-been-preg" value="never-been-preg" id=""></h2>
            <h3>OBSTETRICAL HISTORY INCLUDING ABORTIONS & ECTOPIC (TUBAL) PREGNANCIES</h3>
            <table border="1" style = "background-color:black">
                <thead>
                    <tr align= "center" style = "background-color:lightblue">
                        <th width="100">Year</td>
                        <th width="100">Place of delivery or abortion</td>
                        <th width="100">Duration Preg</td>
                        <th width="100">Hrs. of Labor</td>
                        <th width="100">Type of Delivery</td>
                        <th width="100">Complications Mother and or infant</td>
                        <th width="100">Sex</td>
                        
                        <th width="100">Birth weight</th>
                            <th width="100">Present Health</th>
                        
                                        
                    </tr>
                </thead>
                <tbody>
                
                        <tr align= 'center' style = 'background-color:aliceblue'>
                                <td width='100'><input type="date" name="1st-ob-hist" id=""></td>
                                <td width='100'><input type="text" name="place-of-del" id=""></td>
                                <td width='100'><input type="text" name="duration-preg" id=""></td>
                                <td width='100'><input type="text" name="hrs-labour" id=""></td>
                                <td width='100'><input type="text" name="type-delivery" id=""></td>
                                <td width='100'><input type="text" name="complications" id=""></td>
                                <td width='100'><input type="text" name="sex" id=""></td>
                                <td width='100'><input type="number" name="birth-weight" id=""></td>
                                <td width='100'><input type="text" name="present-health" id=""></td>
                                
                        </tr>
                        
                    <tr align= 'center' style = 'background-color:aliceblue'>
                        <td width='100'><input type="date" name="2nd-ob-hist" id=""></td>
                        <td width='100'><input type="text" name="place-of-del-2" id=""></td>
                                <td width='100'><input type="text" name="duration-preg-2" id=""></td>
                                <td width='100'><input type="text" name="hrs-labour-2" id=""></td>
                                <td width='100'><input type="text" name="type-delivery-2" id=""></td>
                                <td width='100'><input type="text" name="complications-2" id=""></td>
                                <td width='100'><input type="text" name="sex-2" id=""></td>
                                <td width='100'><input type="number" name="birth-weight-2" id=""></td>
                                <td width='100'><input type="text" name="present-health-2" id=""></td>
                                
                </tr>
                <!--  -->
            <tr align= 'center' style = 'background-color:aliceblue'>
                <td width='100'><input type="date" name="3rd-ob-hist" id=""></td>
                <td width='100'><input type="text" name="place-of-del-3" id=""></td>
                                <td width='100'><input type="text" name="duration-preg-3" id=""></td>
                                <td width='100'><input type="text" name="hrs-labour-3" id=""></td>
                                <td width='100'><input type="text" name="type-delivery-3" id=""></td>
                                <td width='100'><input type="text" name="complications-3" id=""></td>
                                <td width='100'><input type="text" name="sex-3" id=""></td>
                                <td width='100'><input type="number" name="birth-weight-3" id=""></td>
                                <td width='100'><input type="text" name="present-health-3" id=""></td>
                             
        </tr>
        <tr align= 'center' style = 'background-color:aliceblue'>
            <td width='100'><input type="date" name="4-ob-hist" id=""></td>
            <td width='100'><input type="text" name="place-of-del-4" id=""></td>
            <td width='100'><input type="text" name="duration-preg-4" id=""></td>
            <td width='100'><input type="text" name="hrs-labour-4" id=""></td>
            <td width='100'><input type="text" name="type-delivery-4" id=""></td>
            <td width='100'><input type="text" name="complications-4" id=""></td>
            <td width='100'><input type="text" name="sex-4" id=""></td>
            <td width='100'><input type="number" name="birth-weight-4" id=""></td>
            <td width='100'><input type="text" name="present-health-4" id=""></td>
                    </tr>
                        <tr align= 'center' style = 'background-color:aliceblue'>
                            <td width='100'><input type="date" name="5-ob-hist" id=""></td>
                            <td width='100'><input type="text" name="place-of-del-5" id=""></td>
                                <td width='100'><input type="text" name="duration-preg-5" id=""></td>
                                <td width='100'><input type="text" name="hrs-labour-5" id=""></td>
                                <td width='100'><input type="text" name="type-delivery-5" id=""></td>
                                <td width='100'><input type="text" name="complications-5" id=""></td>
                                <td width='100'><input type="text" name="sex-5" id=""></td>
                                <td width='100'><input type="number" name="birth-weight-5" id=""></td>
                                <td width='100'><input type="text" name="present-health-5" id=""></td>
                                              </tr>

                    <!-- <tr align= 'center' style = 'background-color:aliceblue'>
                        <td width='100'><input type="date" name="2nd-ob-hist" id=""></td>
                        <td width='100'><input type="text" name="sex" id=""></td>
                        <td width='100'><input type="text" name="sex" id=""></td>
                        <td width='100'><input type="text" name="sex" id=""></td>
                        <td width='100'><input type="text" name="sex" id=""></td>
                        <td width='100'><input type="text" name="sex" id=""></td>
                        <td width='100'><input type="text" name="sex" id=""></td>
                        <td width='100'><input type="text" name="sex" id=""></td>
                        <td width='100'><input type="text" name="sex" id=""></td>
                </tr> -->
            
              
                
                </tbody>
            
            </table>

            <hr>
            <h2>D</h2> <h2>BIRTH CONTROL HISTORY</h2>
            <p>What birth control method(s) do you currently use? <input type="text" name="birth-control" id="birth-control"></p>
            <hr>
            <h2>E</h2> <h2>SEXUAL HISTORY</h2>
            <p>Do you have a sexual partner? <label for="sex-partner">No</label><input type="radio" name="sex-partner" id="sex-partner-no" value="no"> <label for="sex-partner">Yes</label><input type="radio" name="sex-partner" id="sex-partner-yes" value="yes"></p> <p>(Male <input type="radio" name="sex-partner-male" id="male" value="male"> Female <input type="radio" name="sex-partner-male" id="sex-partner-female" value="female">)</p>
            <p>Are there concerns about your sexual activity which you may want to discuss with your doctor?</p><br>
            <label for="">Yes</label><input type="radio" name="sex-concerns" id="" value="yes"> <label for=""></label>No<input type="radio" name="sex-concerns" id="" value="no">
            <hr>
            <h2>F</h2> <h2>PAST OBSTETRICAL/GYNECOLOGICAL SURGERIES</h2>
            <p>Check any that apply: or <input type="checkbox" name="check-apply" id="check-apply"><label for="check-apply">None</label></p>
            <h2>SURGERY</h2>
               <input type="checkbox" name="D&C" value="D&C" id="D&C"> <label for="D&C">D&C</label> <input type="date" name="D&C-date" id=""><br>
               <input type="checkbox" name="Hysteroscopy" value="Hysteroscopy" id="Hysteroscopy"> <label for="Hysteroscopy">Hysteroscopy</label><input type="date" name="Hysteroscopy-date" id=""><br>
               <input type="checkbox" name="infertility-surgery" value="infertility-surgery" id="infertility-surgery"> <label for="infertility-surgery">infertility surgery</label><input type="date" name="infertility-surgery-date" id=""><br>
               <input type="checkbox" name="tuboplasty" value="tuboplasty" id="tuboplasty"> <label for="tuboplasty">tuboplasty</label><input type="date" name="tuboplasty-date" id=""><br>
               <input type="checkbox" name="tubal-ligation" value="tubal-ligation" id="tubal-ligation"> <label for="tubal-ligation">tubal ligation</label><input type="date" name="tubal-ligation-date" id=""><br>
               <input type="checkbox" name="laparoscopy" value="laparoscopy" id="laparoscopy"> <label for="laparoscopy">laparoscopy</label><input type="date" name="" id=""><br>
               <input type="checkbox" name="hysterectomy-(vaginal)" value="hysterectomy-(vaginal)" id="hysterectomy-(vaginal)"> <label for="hysterectomy-(vaginal)">hysterectomy (vaginal)</label><input type="date" name="hysterectomy-(vaginal)-date" id=""><br>
               <input type="checkbox" name="hysterectomy-(abdominal)" value="hysterectomy-(abdominal)" id="hysterectomy-(abdominal)"> <label for="hysterectomy-(abdominal)">hysterectomy (abdominal)</label><input type="date" name="hysterectomy-(abdominal)-date" id=""><br>
               <input type="checkbox" name="myomectomy" value="myomectomy" id="myomectomy"> <label for="myomectomy">myomectomy</label><input type="date" name="myomectomy-date" id=""><br>
               <input type="checkbox" name="ovarian" value="ovarian" id="ovarian"> <label for="ovarian">ovarian surgery</label><input type="date" name="ovarian-date" id=""><br>
               <input type="checkbox" name="L-cyst(s)" value="L-cyst(s)" id="L-cyst(s)"> <label for="L-cyst(s)">L cyst(s) removed ovarian</label><input type="date" name="L-cyst(s)-date" id=""><br>
               <input type="checkbox" name="R-cyst(s)" value="R-cyst(s)" id="R-cyst(s)"> <label for="R-cyst(s)">R cyst(s) removed ovarian</label><input type="date" name="" id=""><br>
               <input type="checkbox" name="L-ovary" value="L-ovary" id="L-ovary"> <label for="L-ovary">L ovary removed</label><input type="date" name="L-ovary-date" id=""><br>
               <input type="checkbox" name="R-ovary" value="R-ovary" id="R-ovary"> <label for="R-ovary">R ovary removed</label><input type="date" name="R-ovary-date" id=""><br>
               <input type="checkbox" name="vaginal" value="vaginal" id="vaginal-or-bladder-repair"> <label for="vaginal-or-bladder-repair">vaginal or bladder repair for prolapsed or incontinence</label><input type="date" name="vaginal-or-bladder-repair-date" id=""><br>
               <input type="checkbox" name="cesarean" value="cesarean" id="cesarean"> <label for="cesarean">cesarean section</label><input type="date" name="cesarean-date" id=""><br>
                <label for="other-(specify)">other (specify)</label><input type="text" name="other-(specify)" id="other-(specify)"><input type="date" name="other-(specify)-date" id=""><br>
               
            <hr>
            <h2>G</h2> <h2>PAST SURGICAL HISTORY(Not OB/GYN)</h2>
               <p>List all surgeries and their year or 
                <br><input type="checkbox" name="surgeries-no" value="surgeries-no" id="surgeries-no"><label for="surgeries-no">None</label></p>

                <table border="1" style = "background-color:black">
                    <thead>
                        <tr align= "center" style = "background-color:lightblue">
                            
                            <th width="100">Surgeries</td>
                                <th width="100">Year</td>             
                        </tr>
                    </thead>
                    <tbody>
                    
                            <tr align= 'center' style = 'background-color:aliceblue'>
                                    <td width='100'><input type="text" name="surg-1" id=""></td>
                                    <td width='100'><input type="date" name="surg-1-date" id=""></td>
                                    
                            </tr>
                            <tr align= 'center' style = 'background-color:aliceblue'>
                                
                                <td width='100'><input type="text" name="surg-2" id=""></td>
                                <td width='100'><input type="date" name="surg-2-date" id=""></td>
                                
                        </tr>

                        <tr align= 'center' style = 'background-color:aliceblue'>
                            <td width='100'><input type="text" name="surg-3" id=""></td>
                            <td width='100'><input type="date" name="surg-3-date" id=""></td>
                            
                    </tr>
                    <tr align= 'center' style = 'background-color:aliceblue'>
                        
                        <td width='100'><input type="text" name="surg-4" id=""></td>
                        <td width='100'><input type="date" name="surg-4-date" id=""></td>
                        
                </tr>
                    </tbody>
                
                </table>

            <hr>
            <h2>H</h2><h2>PAP SMEAR/MAMMOGRAM HISTORY</h2>
            <input type="checkbox" name="date-of-pap-check" value="date-of-pap-check" id="date-of-pap"><label for="date-of-pap">Date of pap smear</label><input type="date" name="date-of-pap"> <br>
            <input type="checkbox" name="abnormal-pap-smears-check" value="abnormal-pap-smears-check" id="abnormal-pap-smears"><label for="abnormal-pap-smears">Have you had abnormal pap smears?</label><label for="abnormal-pap-smears">No</label><input type="radio" name="abnormal-pap-smears" id="sex-partner-no" value="no"> <label for="sex-partner-yes">Yes</label><input type="radio" name="abnormal-pap-smears" id="sex-partner-yes" value="yes"><br>
            <p>If yes, what type(s) of treatment have you had?</p>
            <ol>
                <li>cryotherapy <input type="date" name="cryotherapy" id=""></li>
                <li> laser <input type="date" name="laser" id=""></li>
                <li>cone biopsy <input type="date" name="cone-biopsy" id=""></li>
                <li>loop excision (LEEP) <input type="date" name="loop-excision" id=""></li>
            </ol>
            <label for="">Date of last mammogram</label><input type="date" name="last-mammogram" id="">
           <p>Have you had an abnormal mammogram?</p><label for="ab-mamo-no">No</label><input type="radio" name="ab-mamo-no" id="" value="no"> <label for="ab-mamo-no">Yes</label><input type="radio" name="ab-mamo-no" id="" value="yes">
            <h2>OTHER PAST GYNECOLOGICAL HISTORY</h2>
            <P>Check any that apply:</P>
            <ol>
                <li><input type="checkbox" name="gyn-hist-None" value="gyn-hist-None" id=""><label for="">None</label></li>
                <li><input type="checkbox" name="gyn-hist-Venereal" value="gyn-hist-Venereal" id=""><label for="">Venereal warts</label></li>
                <li><input type="checkbox" name="gyn-hist-Herpes" value="gyn-hist-Herpes" id=""><label for="">Herpes genital</label></li>
                <li><input type="checkbox" name="gyn-hist-Syphilis" value="gyn-hist-Syphilis" id=""><label for="">Syphilis</label></li>
                <li><input type="checkbox" name="gyn-hist-Pelvic" value="gyn-hist-Pelvic" id=""><label for="">Pelvic inflammatory disease</label></li>
                <li><input type="checkbox" name="gyn-hist-Endometriosis" value="gyn-hist-Endometriosis" id=""><label for="">Endometriosis</label></li>
                <li><input type="checkbox" name="gyn-hist-Chlamydia" value="gyn-hist-Chlamydia" id=""><label for="">Chlamydia</label></li>
                <li><input type="checkbox" name="gyn-hist-Gonorrhea" value="gyn-hist-Gonorrhea" id=""><label for="">Gonorrhea</label></li>
                <li><input type="checkbox" name="gyn-hist-Vaginal" value="gyn-hist-Vaginal" id=""><label for="">Vaginal infections</label></li>
                <li><label for="">Other</label> <input type="text" name="gyn-other" id=""></li>
                               
            </ol>

            <hr>
            <h2>I</h2><h2>PAST MEDICAL HISTORY</h2>
            <p>Check any that apply: or <input type="checkbox" name="past-med-hist" value="past-med-hist" id=""> <label for="past-med-hist">None</label></p><br>
            <input type="checkbox" name="Arthritis" value="Arthritis" id=""><label for="">Arthritis</label><br>
            <input type="checkbox" name="Diabetes0" value="Diabetes0" id=""><label for="">Diabetes</label><br>
            <input type="checkbox" name="Diet" value="Diet" id=""><label for="">Diet controlled</label><br>
            <input type="checkbox" name="Pill" value="Pill" id=""><label for="">Pill controlled</label><br>
            <input type="checkbox" name="Insulin" value="Insulin" id=""><label for="">Insulin controlled </label><br>
            <input type="checkbox" name="hbp" value="hbp" id=""><label for="">High blood pressure</label><br>
            <input type="checkbox" name="heart-disease" value="heart-disease" id=""><label for="">Heart disease</label><br>
            <input type="checkbox" name="Kidney-disease" value="Kidney-disease" id=""><label for="">Kidney Disease</label><br>
            <input type="checkbox" name="Gallstones" value="Gallstones" id=""><label for="">Gallstones</label><br>
            <input type="checkbox" name="Liver" value="Liver" id=""><label for="">Liver Disease (including hepatitis)</label><br>
            <input type="checkbox" name="Epilepsy" value="Epilepsy" id=""><label for="">Epilepsy</label><br>
            <input type="checkbox" name="Blood" value="Blood" id=""><label for="">Blood Transfusions</label><br>
            <input type="checkbox" name="Thyroid" value="Thyroid" id=""><label for="">Thyroid disease</label><br>
            <input type="checkbox" name="Asthma" value="Asthma" id=""><label for="">Asthma</label><br>
            <input type="checkbox" name="Emphysema" value="Emphysema" id=""><label for="">Emphysema</label><br>
            <input type="checkbox" name="Bronchitis" value="Bronchitis" id=""><label for="">Bronchitis</label><br>
            <input type="checkbox" name="HIV+" value="HIV+" id=""><label for="">HIV+</label><br>
            <input type="checkbox" name="Eating-Disorder" value="Eating-Disorder" id=""><label for="">Eating Disorder</label><br>
            <input type="checkbox" name="Other7" value= "Other7" id=""><label for="">Other</label><input type="text" name="Other7-input" id="">

            <hr>
            
            <hr>
            <h2>M</h2><h2>FAMILY HISTORY</h2>
            <input type="checkbox" name="diabetes" value="diabetes" id=""><label for="diabetes">Diabetes</label><br>
            <input type="checkbox" name="heart-dis" value="heart-dis" id=""><label for="heart-dis">Heart Disease</label><br>
            <input type="checkbox" name="breast-canc" value="breast-canc" id=""><label for="breast-canc">Breast Cancer</label><br>
            <input type="checkbox" name="other5" value="other5" id=""><label for="other5">Other</label><br>
            <input type="checkbox" name="ovarian-canc" value="ovarian-canc" id=""><label for="ovarian-canc">Ovarian Cancer</label><br>
            <input type="checkbox" name="endo-canc" value="endo-canc" id=""><label for="endo-canc">Endometrial Cancer</label><br>
            <input type="checkbox" name="colon-canc" value="colon-canc" id=""><label for="colon-canc">Colon Cancer</label><br>
            <p>If yes, to any, please list affected relatives</p>
            <ol>
                <li><input type="text" name="relative" id=""></li>
                <li><input type="text" name="relative1" id=""></li>
                <li><input type="text" name="relative2" id=""></li>
            </ol>

            <input type="checkbox" name="none-of-above" id=""><label for="none-of-above">None of the above</label>

            <hr>
            <h2>N</h2><h2>OTHER SYMPTOMS</h2>
            <h3>Have you had recent?</h3>
            <input type="checkbox" name="weight-loss" value="weight-loss" id=""><label for="weight-loss">weight loss</label><br>
            <input type="checkbox" name="weight-gain" value="weight-gain" id=""><label for="weight-gain">weight gain</label><br>
            <input type="checkbox" name="change-in-energy" value="change-in-energy" id=""><label for="change-in-energy">change in energy</label><br>
            <input type="checkbox" name="change-in-exercise-tolerance" value="change-in-exercise-tolerance" id=""><label for="change-in-exercise-tolerance">change in exercise-tolerance</label><br>
            <input type="checkbox" name="hair-growth" value="hair-growth" id=""><label for="hair-growth">hair growth</label><br>
            <input type="checkbox" name="hair-loss" value="hair-loss" id=""><label for="hair-loss">hair loss</label><br>
            <input type="checkbox" name="change-in-urinary-function" value="change-in-urinary-function" id=""><label for="change-in-urinary-function">change in urinary function</label><br>
            <input type="checkbox" name="hot-flushes" value="hot-flushes" id=""><label for="hot-flushes">hot flushes</label><br>
            <input type="checkbox" name="breast-discharge" value="breast-discharge" id=""><label for="breast-discharge">breast discharge</label><br>
            <input type="checkbox" name="none-of-the-above" value="none-of-the-above" id=""><label for="none-of-the-above">none of the above</label><br>
            <input type="checkbox" name="Other6" value="Other6" id=""><label for="Other6">Other</label><br>
            

           
            <hr>
            <h2>O</h2>
            <h3>Note: Fill out Section "O" only if you are pregnant or planning to be pregnant in the near future.</h3>
            <h3 style="color: red;">Have you or the baby's father or anyone in your families ever had any of the following:</h3>
            <input type="checkbox" name="down-syndro" value="down-syndro" id=""><label for="down-syndro">Down Syndrome (Mongolism)? If yes, who?</label> <input type="text" name="down-syndro-input" id=""><br>
            <input type="checkbox" name="Chromosomal" value="Chromosomal" id=""><label for="Chromosomal">Other Chromosomal abnormality? If yes, specify</label> <input type="text" name="down-syndro-input" id=""><br>
            <input type="checkbox" name="Neural" value="Neural" id=""><label for="Neural">Neural tube defect (spina bifida, anencephaly)? If yes, who?</label> <input type="text" name="down-syndro-input" id=""><br>
            <input type="checkbox" name="Hemophilia" value="Hemophilia" id=""><label for="Hemophilia">Hemophilia or other coagulation abnormality? If yes, who?</label> <input type="text" name="down-syndro-input" id=""><br>
            <input type="checkbox" name="Dystrophy" value="Dystrophy" id=""><label for="Dystrophy">Muscular Dystrophy? If yes, who?</label> <input type="text" name="down-syndro-input" id=""><br>
            <input type="checkbox" name="Cystic" value="Cystic" id=""><label for="Cystic">Cystic Fibrosis? If yes, who?</label> <input type="text" name="down-syndro-input" id=""><br>
            <input type="checkbox" name="Tay-Sachs" value="Tay-Sachs" id=""><label for="down-syndro">If you or the baby's biological father are of Jewish ancestry, have either of you been screened for 
                Tay-Sachs disease? </label> <input type="text" name="Tay-Sachs-input" id=""><br>
            <ol>
                <li><input type="checkbox" name="Other-father" value="Other-father" id=""><label for="Other">Father</label> <input type="text" name="result-father" id="" placeholder="Result"><br></li>
                <li><input type="checkbox" name="Other-mother" value="Other-mother" id=""><label for="Other">Mother</label> <input type="text" name="result-mother" id="" placeholder="Result"><br></li>
            
            </ol>

            <input type="checkbox" name="Tay-Sachs-child" id=""><label for="Tay-Sachs-child">If you or the baby's biological father are of Jewish ancestry, have either of you been screened for 
                Tay-Sachs disease? </label> <input type="text" name="Tay-Sachs-child-input" id=""><br>
            <ol>
                <li><input type="checkbox" name="Other1" id=""><label for="Other-father-child">Father</label> <input type="text" name="result-father" id="" placeholder="Result"><br></li>
                <li><input type="checkbox" name="Other2" id=""><label for="Other-mother-child">Mother</label> <input type="text" name="result-mother" id="" placeholder="Result"><br></li>
            
            </ol>

            <input type="checkbox" name="Sickle-cell" id=""><label for="Sickle-cell">If you or the baby's biological father are of African ancestry, have either of you been 
                screened for Sickle cell trait? </label> <input type="text" name="Sickle-cell-input" id=""><br>
            <ol>
                <li><input type="checkbox" name="Other-Sickle-cell-f" value="Other-Sickle-cell-f" id=""><label for="Other-Sickle cell-f">Father</label> <input type="text" name="Other-Sickle-cell-result-father" id="" placeholder="Result"><br></li>
                <li><input type="checkbox" name="Other-Sickle-cell-m" value="Other-Sickle-cell-m" id=""><label for="Other-Sickle cell-m">Mother</label> <input type="text" name="Other-Sickle-cell-result-mother" id="" placeholder="Result"><br></li>
            
            </ol>

            <!-- <input type="checkbox" name="down-syndro" id=""><label for="down-syndro">If you or the baby's biological father are of Italian, Greek, or Mediterranean background, 
                have either of you been tested for B-thalessemia? </label> <input type="text" name="down-syndro-input" id=""><br>
            <ol>
                <li><input type="checkbox" name="Other" id=""><label for="Other">Father</label> <input type="text" name="result-father" id="" placeholder="Result"><br></li>
                <li><input type="checkbox" name="Other" id=""><label for="Other">Mother</label> <input type="text" name="result-mother" id="" placeholder="Result"><br></li>
            
            </ol> -->

            <!-- <input type="checkbox" name="down-syndro" id=""><label for="down-syndro">If you or the baby's biological father are of Philippine or Southeast Asian ancestry, have 
                either of you been tested for A-thalessemia? </label> <input type="text" name="down-syndro-input" id=""><br>
            <ol>
                <li><input type="checkbox" name="Other" id=""><label for="Other">Father</label> <input type="text" name="result-father" id="" placeholder="Result"><br></li>
                <li><input type="checkbox" name="Other" id=""><label for="Other">Mother</label> <input type="text" name="result-mother" id="" placeholder="Result"><br></li>
            
            </ol> -->

            
           <input type="submit" name="pastHistoryBtn" value="Subit this form of past history" style="background-color: red;"><br>
           
           <!-- <button type="button" onclick="generatePDF()">Download a pdf</button> -->

            
        </div>
    </form>
                        </div>


<!-- BELOW IS THE TRIAGE PART -->
<!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts -->                        <!-- //one of the parts -->
                        <div class="tab-contents" id="triage">
                        <h2>You are analyzing <h2 style = 'color:red;'><?php echo $firstN .''. $lastN ;   ?></h2></h2>

    <?php
    include("database/connect.php");
    
    $sqlTriage = "SELECT * FROM `triagedetails`
                    WHERE `patients_id` = '$id'";

    $respondFromTriage = mysqli_query($conn, $sqlTriage);
    // Display existing triage data
    if ($respondFromTriage) {
        $num = mysqli_num_rows($respondFromTriage);
        if($num>0){
            while($row = mysqli_fetch_assoc($respondFromTriage)) {
                echo '<div class="triage-entry">
                <p><strong>Complaint:</strong> ' . $row['complaint'] . '</p>
                <p><strong>Temperature:</strong> ' . $row['temp'] . '</p>
                <p><strong>Blood Pressure:</strong> ' . $row['bp'] . '</p>
                <p><strong>Heart Rate:</strong> ' . $row['heartRate'] . '</p>
                <p><strong>Symptoms:</strong> ' . $row['symptoms'] . '</p>
                <p><strong>Age:</strong> ' . $row['age'] . '</p>
                 </div>';
            }
        }else {
            echo '<h1 style = "color:red;">No triage data available.</h1>';
            
        }
        
    } else {
        echo '<h1 style = "color:red;">No triage data available send the patient back to the triage stage below.</h1>';
        
    }
    ?>


          <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <label for="rooms">Where do you want to send the patient to?</label>
          <div class="data">
                    <select name= "rooms" id="rooms">
                        
                        <option value="imaging">Imaging</option>
                        <option value="Lab">Lab for tests</option>
                        <option value="receptionist">Reception billing</option>
                        <!-- Add more options as needed -->
                    </select>
              </div>

              <br>
              <button type="submit"  name = "roomDetails" style="background-color: #FF00FF;
        border: 2px solid #8e44ad;
        border-radius: 4px;
        color: #fff;
        display: block;
        
        font-size: 16px;
        padding: 10px;
        margin-top: 20px;
        
        width: 100%;">Send patient to the selected room</button>
              
          </form>
    </div>

                        </div>
<!-- CURRENT HISTORY CURRENT HISTORY CURRENT HISTORY CURRENT HISTORY CURRENT HISTORY CURRENT HISTORY CURRENT HISTORY CURRENT HISTORY -->
    <!-- ONE OF THE PARTS  --><!-- ONE OF THE PARTS  --><!-- ONE OF THE PARTS  --><!-- ONE OF THE PARTS  --><!-- ONE OF THE PARTS  --><!-- ONE OF THE PARTS  --> 
                        <div class="tab-contents" id="current">
                        <h2>Current History</h2>


                        <form action="database/currentHisto.php" method="post">
                        <h2>J</h2><h2>CURRENT MEDICATIONS (Include dose (amount)per day)</h2>

                                    <table width="60%" border="0" align="center" cellspacing="10" cellpadding="4">
                                        <tr><th><table border="1" style = "background-color:black">
                                        <thead>
                                            <tr align= "center" style = "background-color:lightblue">
                                                <th width="100">Medication</td>
                                                <th width="100">Dose</td>
                                                <th width="100">Frequency</td>
                                                
                                                
                                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                                <tr align= 'center' style = 'background-color:aliceblue'>
                                                        <td width='100'><input type="text" name="Medication" id=""></td>
                                                        <td width='100'><input type="text" name="Dose" id=""></td>
                                                        <td width='100'><input type="text" name="Frequency" id=""></td>
                                                </tr>
                                                <tr align= 'center' style = 'background-color:aliceblue'>
                                                    <td width='100'><input type="text" name="Medication1" id=""></td>
                                                    <td width='100'><input type="text" name="Dose1" id=""></td>
                                                    <td width='100'><input type="text" name="Frequency1" id=""></td>
                                                </tr>
                                            <tr align= 'center' style = 'background-color:aliceblue'>
                                                <td width='100'><input type="text" name="Medication2" id=""></td>
                                                <td width='100'><input type="text" name="Dose2" id=""></td>
                                                <td width='100'><input type="text" name="Frequency2" id=""></td>
                                            </tr>
                                        <tr align= 'center' style = 'background-color:aliceblue'>
                                            <td width='100'><input type="text" name="Medication3" id=""></td>
                                            <td width='100'><input type="text" name="Dose3" id=""></td>
                                            <td width='100'><input type="text" name="Frequency3" id=""></td>
                                        </tr>
                                    <tr align= 'center' style = 'background-color:aliceblue'>
                                        <td width='100'><input type="text" name="Medication4" id=""></td>
                                        <td width='100'><input type="text" name="Dose4" id=""></td>
                                        <td width='100'><input type="text" name="Frequency4" id=""></td>
                                    </tr>

                                        
                                        </tbody>

                                    </table>
                                    <hr>
                                    <h2>K</h2><h2>DO YOU CURRENTLY?</h2>
                                    <p>Smoke</p> <label for="smoke-no">No</label><input type="radio" name="smoke" value="no"> <label for="smoke">Yes</label><input type="radio" name="smoke" id="" value="yes"> <input type="number" name="smoke-packs" id="" placeholder="packs per day">
                                    <p>Use alcohol</p> <label for="alcohol-yes">Yes</label><input type="radio" name="alcohol" id="" value="yes"><label for="alcohol-yes">No</label><input type="radio" name="alcohol" id="" value="no">
                                    <ol>
                                        <p>If yes: </p>
                                            <input type="number" name="wine-glass" id="" placeholder="Glasses of wine" required>
                                            <input type="number" name="beer-bot" id="" placeholder=" beer :bottles/day" required>
                                            <input type="number" name="hard-liq" id="" placeholder="hard liquid (oz./day)">
                                    </ol>
                                    <br>
                                    <p>Use illicit drugs </p>
                                    <label for="">No</label><input type="radio" name="ill-drugs" id="" value="no"> <label for="">Yes</label><input type="radio" name="ill-drugs" value="yes" id="">
                                    <input type="text" name="type-illicit" id="" placeholder="type"> <input type="number" name="amount-illicit" placeholder="amount" id="">
                                    <br>
                                    <p>Exercise:</p>
                                    <ol>
                                        <li><input type="text" name="exercise-type" id="" placeholder="Type"></li>
                                        <li><input type="text" name="exercise-often" id="" placeholder="How often"></li>
                                    </ol>
                                    <hr>
                                    <h2>L</h2><h2>DRUG ALLERGIES</h2>
                                    <label for="">No</label><input type="radio" name="DRUG-ALLERGIES" id="" value="no">
                                    <label for="">Yes</label><input type="radio" name="DRUG-ALLERGIES" id="" value="yes">
                                    <br>
                                    <p>List:</p>
                                    <ol>
                                        <li><input type="text" name="DRUG-ALLERGIES-list" id=""></li>
                                        <li><input type="text" name="DRUG-ALLERGIES-list1" id=""></li>
                                        <li><input type="text" name="DRUG-ALLERGIES-list2" id=""></li>
                                        <li><input type="text" name="DRUG-ALLERGIES-list3" id=""></li>
                                        <li><input type="text" name="DRUG-ALLERGIES-list4" id=""></li>
                                    </ol>
                                    <hr>
                                    <h2>L</h2><h2>DRUG ALLERGIES</h2>
                                    <label for="">No</label><input type="radio" name="DRUG-ALLERGIES" id="" value="no">
                                    <label for="">Yes</label><input type="radio" name="DRUG-ALLERGIES" id="" value="yes">
                                    <br>
                                    <p>List:</p>
                                    <ol>
                                        <li><input type="text" name="DRUG-ALLERGIES-list" id=""></li>
                                        <li><input type="text" name="DRUG-ALLERGIES-list1" id=""></li>
                                        <li><input type="text" name="DRUG-ALLERGIES-list2" id=""></li>
                                        <li><input type="text" name="DRUG-ALLERGIES-list3" id=""></li>
                                        <li><input type="text" name="DRUG-ALLERGIES-list4" id=""></li>
                                    </ol>

                                    <!-- //THIS IS THE TAKE NOTES SECTION -->
                                   
                                    <button type="submit" name = "currentHistory" style = " background-color: #FF00FF;
        border: 2px solid #8e44ad;
        border-radius: 4px;
        color: #fff;
        display: block;
        
        font-size: 16px;
        padding: 10px;
        margin-top: 20px;
        
        width: 100%;">Submit Current History Details</button>

                                                            </th><th>
                                                            
                                
                                <h1 style='color:red;text-align:center;'>Take Notes</h1>
                                <textarea name='drnotes' id='notes' rows='10' cols='50' placeholder='Enter your notes' required></textarea><br>
                                <button type='button' onclick='addBullet()'>Add Bullet</button>
                                <button type='button' onclick='removeBullet()'>Remove Bullet</button>
                                
                                

                                                            </form>
                                                            </th></tr>
                                    </table>
                                                            
                        </div>

                         <!-- THIS IS THE FORM THAT EDITS USER DETAILS -->

    <div id="popupFormEdit" class="popup-form-container">
       <h3 style = "color:red">Are you sure you want to remove the patient from the Line</h3>
        <form action = "database/edit-from.php" method = "POST">
            <label for="name">Enter the email you want to update:</label>
            <input type="email" id="email-compared" name="email-compared" placeholder = "Confrim from recent patients" required><br>

            <label for="name">Name:</label>
            <input type="text" id="name-edit" name="name-edit" placeholder = "Enter new name" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email-edit" name="email-edit" placeholder = "Enter new email" required><br>
            <br>
            <button type="submit" name="Send-update">Yes</button>
        </form>
        <br>
        <span onclick="closePopupForm()"> <p style = 'color:red;'>Close</p></span>
    </div>

    <!-- THIS IS THE END OF THE FORM THAT EDITS USER DETAILS -->


<!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts -->                      <!-- //one of the parts -->
                        <div class="tab-contents" id="physical">
                        <h2>Physical Examination</h2>

    <!-- Form for adding new data -->
    
        <a href="database/patientMedHistory.php"><input type="button"  value="View Patients's Medical history before testing" style = ' background-color: #FF00FF;
                                        border: 2px solid #8e44ad;
                                        border-radius: 4px;
                                        color: #fff;
                                        display: block;
                                        
                                        font-size: 16px;
                                        padding: 10px;
                                        margin-top: 20px;
                                        
                                        width: 100%;'></a>
    </form>
    
<form action="database/examinations.php" method="post">


            <ol>
            <li><input type='checkbox' name='general'  value='General physical'> General Physical Examination</li>
            <li><input type='checkbox' name='speculum'  value='Speculum'> Speculum Examination</li>
            <li><input type='checkbox' name='pap'  value='Pap Smear'> Pap Smear</li>
            
            <li><input type='checkbox' name='Bimanual'  value='Bimanual'> Bimanual  Examination</li>
            <li><input type='checkbox' name='breast'  value='Breast'> Breast Examination</li>
            <li><input type='checkbox' name='pelvic'  value='Pelvic'> Pelvic Floor Assessment</li>
            
        </ol>
           
    



<input type="submit" name = "physciStatusBar" value="Move to set an impression of the test performed" style = ' background-color: #FF00FF;
                                        border: 2px solid #8e44ad;
                                        border-radius: 4px;
                                        color: #fff;
                                        display: block;
                                        
                                        font-size: 16px;
                                        padding: 10px;
                                        margin-top: 20px;
                                        
                                        width: 100%;'>
</form>

                        </div>

<!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts -->                       <!-- //one of the parts -->
                        <div class="tab-contents" id="impression">
                        <h2>Gynecological Impressions</h2>


                        <table width="100%" border="0" cellspacing="200" cellpadding="40">
    <tr style ="background-color:lightblue; text-align=center;"><th colspan="3">Add an impression below</th></tr>
    <tr><th><form action="database/process_impression.php" method="post">
        <label for="typedImpression">What impression type have you noted:</label><br>
        <input type="text" name="typedImpression" id="" required><br>
        <label for="impressionType">Select Impression:</label>
        <select id="impressionType" name="impressionType" >
            <option name="impressionType" value="endometriosis">Endometriosis</option>
            <option name="impressionType" value="pcos">Polycystic Ovary Syndrome (PCOS)</option>
            <option name="impressionType" value="fibroids">Uterine Fibroids</option>
            <option name="impressionType" value="cervical-cancer">Cervical Cancer</option>
            <option name="impressionType" value="none">None</option>
            <!-- Add more options with real gynecological impression names -->
        </select>

        <br>

        <label for="impressionDescription">Description:</label>
        <textarea id="impressionDescription" name="impressionDescription" rows="4" cols="50" required></textarea>

        <br>

        <button type="submit" name="impressionSub" style = ' background-color: #FF00FF;
                                        border: 2px solid #8e44ad;
                                        border-radius: 4px;
                                        color: #fff;
                                        display: block;
                                        
                                        font-size: 16px;
                                        padding: 10px;
                                        margin-top: 20px;
                                        
                                        width: 100%;'>Add Impression</button>
    </form></th>
    <th><?php 

// Get the current week number
$currentWeek = date("W");
//we are selecing data from the table
include("database/connect.php");
$sql = "SELECT * FROM `impressions`
        ";
$impressionResult = mysqli_query($conn, $sql);
if($impressionResult){
    $num = mysqli_num_rows($impressionResult);
    if($num>0){
        while($row = mysqli_fetch_assoc($impressionResult)){
            echo "
            <h2>Previously Performed Impressions</h2>
            <table>
            <tr>
                <th>Impression Type</th>
                <th>Impression as described by Dr</th>
                <th>Description</th>
            </tr>
            <tr>
                
                <td>{$row["impressionType"]}</td>
                <td>{$row["typedImpression"]}</td>
                <td>{$row["impressionDescription"]}</td>
            </tr>
            
        </table>
            ";
        }
    }else{
        echo "<h2 style='color:red;'>There are no Previous Impressions during the week</h2>";
    }
}
?></th></tr>
    
    <hr>

</table>

    
    <!-- Table displaying dummy data of previously performed impressions -->
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <label for="rooms">Where do you want to send the patient to?</label>
          <div class="data">
                    <select name= "rooms" id="rooms">
                        
                        <option name= "rooms" value="imaging">Imaging</option>
                        <option name= "rooms" value="Lab">Lab for tests</option>
                        <option name= "rooms" value="receptionist">Reception billing</option>
                        <!-- Add more options as needed -->
                    </select>
              </div>

              <br>
              <button type="submit"  name = "roomDetails" style="background-color: #FF00FF;
        border: 2px solid #8e44ad;
        border-radius: 4px;
        color: #fff;
        display: block;
        
        font-size: 16px;
        padding: 10px;
        margin-top: 20px;
        
        width: 100%;">Send patient to the selected room</button>
              
          </form>
    
                        </div>

<!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts --><!-- //one of the parts -->
                        <div class="tab-contents" id="lab">
                        <div>
        <h2>Laboratory Tests</h2>

        <table width="90%" border="0"  cellspacing="160" cellpadding="260">
    
    <tr><th><!-- Form for requesting lab tests -->
        <form action="database/process_lab.php" method="post">
            
                Select Tests:
                <select id="labTests" name="labTests" multiple="multiple">
                <option name="labTests" value="Pap_Smear" data-price="3000">Pap Smear</option>
                <option name="labTests" value="Cytology" data-price="3000">Cytology Testing</option>
                <option name="labTests" value="Cultures" data-price="3000">Cultures</option>
                <option name="labTests" value="STI" data-price="3000">STI Testing</option>
                <option name="labTests" value="HPV" data-price="3000">HPV Testing</option>
                <option name="labTests" value="endometrialB" data-price="3000">Endometrial Biopsy</option>
                <option name="labTests" value="Hormone" data-price="3000">Hormone Testing</option>
                <option name="labTests" value="Genetic" data-price="3000">Genetic Testing</option>
                <option name="labTests" value="Ultrasound" data-price="3000">Ultrasound</option>
                <option name="labTests" value="Blood" data-price="3000">Blood Testing</option>
                    <option name="labTests" value="HSV_MCS" data-price="3000">HSV MCS</option>
                    <option name="labTests" value="Urine_MCS" data-price="3000">Urine MCS</option>
                    <option name="labTests" value="Chlamydia_Antibodies" data-price="4550">Chlamydia Antibodies</option>
                    <option name="labTests" value="Insulin" data-price="3500">Insulin</option>
                    <option name="labTests" value="Topical Acetic Acid (HPV)" data-price="2500">Topical Acetic Acid (HPV)</option>
                    <option name="labTests" value="Malaria_Test" data-price="300">Malaria Test</option>
                    <option name="labTests" value="N-GONORRHEA_NAA" data-price="8000">N.GONORRHEA NAA</option>
                    <option name="labTests" value="RPR" data-price="550">RPR</option>
                </select>
      

            <!-- Selected Items Table -->
            <h2>Selected Items</h2>
            <table id="selectedItemsTable" cellspacing="160" cellpadding="160">
                <tr>
                    <th style='color:green;'>Test</th>
                    <th style='color:green;'>Price (Ksh)</th>
                    <th style='color:green;'>Action</th>
                </tr>
            </table>
            <button type="button" onclick="addTestsToTable()" style = ' background-color: #FF00FF;
                                        border: 2px solid #8e44ad;
                                        border-radius: 4px;
                                        color: #fff;
                                        display: block;
                                        
                                        font-size: 16px;
                                        padding: 10px;
                                        margin-top: 20px;
                                        
                                        width: 100%;'>Add Tests to Table</button>
            <div class="price"><p style='color:green;'>Total Price: Ksh</p> <span id="totalPrice">0</span></div>

            <label>
                GYN Lab Notification:
                <textarea name="labNotification"></textarea required>
            </label>

            <button name="labTestSub" type="submit" style = ' background-color: #FF00FF;
                                        border: 2px solid #8e44ad;
                                        border-radius: 4px;
                                        color: #fff;
                                        display: block;
                                        
                                        font-size: 16px;
                                        padding: 10px;
                                        margin-top: 20px;
                                        
                                        width: 100%;'>Submit Request</button>
        </form>
    </div>

</th>
<th><div class="lab-results">
        <h2>Lab Results</h2>
        <?php
        include("database/connect.php");
        $sqlLabRes = "SELECT * FROM `labnotifications`
                        WHERE `patientS_Lid` = '$id' ";
        $ResultRes = mysqli_query($conn, $sql);

        if($ResultRes){
            $num = mysqli_num_rows($ResultRes);
            if($num>0){
                while($row = mysqli_fetch_assoc($ResultRes)){
                    $current_date = date('Y-m-d');
                    echo "
                    <p><strong>Patient Name:</strong> {$firstN} {$lastN}</p>
                    <p><strong>Date:</strong> {$current_date}</p>
                   
                    <p><strong>Test Results:</strong></p>
                    <table>
                        <tr>
                            <th>Test</th>
                            <th>Result</th>
                        </tr>
                        <tr>
                            
                           
                        </tr>
                        
                    </table>
                </div>
                                    </div></tr>
                
            
            
                
                <hr>
            
             </table>    
                    ";
                }
            }else{
                echo "<h3 style = 'color:red;'>Patient has no submitted results!</h3>";

            }
        }
        ?>
       
         </div>

         <script>


        function addBullet() {
            var textarea = document.getElementById("notes");
            var cursorPosition = textarea.selectionStart;
            var text = textarea.value;
            var newText = text.slice(0, cursorPosition) + "• " + text.slice(cursorPosition);
            textarea.value = newText;
        }

        function removeBullet() {
            var textarea = document.getElementById("notes");
            var cursorPosition = textarea.selectionStart;
            var text = textarea.value;
            var newText = text.slice(0, cursorPosition - 2) + text.slice(cursorPosition);
            textarea.value = newText;
        }

        function saveNotes() {
            var notes = document.getElementById("notes").value;
            // Code to save notes goes here
            alert("Notes saved successfully!");
        }
 
            
        function calculatePeriodDates() {
            // Get the start date of the period from the input field
            var periodStartDate = document.getElementById('periodStartDate').value;
            
            // Convert the input string to a Date object
            periodStartDate = new Date(periodStartDate);
            
            // Calculate the expected period date (28 days after the start of the period)
            var expectedPeriodDate = new Date(periodStartDate);
            expectedPeriodDate.setDate(expectedPeriodDate.getDate() + 28);
            
            // Calculate the ovulation date (14 days after the start of the period)
            var ovulationDate = new Date(periodStartDate);
            ovulationDate.setDate(ovulationDate.getDate() + 14);
            
            // Calculate the period end date (5 days after the ovulation date)
            var periodEndDate = new Date(ovulationDate);
            periodEndDate.setDate(periodEndDate.getDate() + 5);
            
            // Display the calculated dates
            document.getElementById('results').innerHTML = 'Expected Period Date: ' + expectedPeriodDate.toDateString() + '<br>' +
                                                             'Ovulation Date: ' + ovulationDate.toDateString() + '<br>' +
                                                             'Period End Date: ' + periodEndDate.toDateString();
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