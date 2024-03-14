<?php
session_start();
$sessionId = $_SESSION["id"];
// echo $sessionId;
$sessionName = $_SESSION["name"];
// echo $sessionPatient_N;
// $id = $_SESSION["id"];
//this is the medical history of the patient, both current and past including the notes of the doctor that have been taken
 //below is the php code that updates the rooms in the patient part

 if($_SERVER["REQUEST_METHOD"] == "POST"){
    $complaint = filter_input(INPUT_POST, "complaint", FILTER_SANITIZE_SPECIAL_CHARS);
    $bp = filter_input(INPUT_POST, "bp", FILTER_SANITIZE_SPECIAL_CHARS);
    $heartRate = filter_input(INPUT_POST, "heartRate", FILTER_SANITIZE_SPECIAL_CHARS);
    $temp = filter_input(INPUT_POST, "temp", FILTER_SANITIZE_SPECIAL_CHARS);
    $SP02 = filter_input(INPUT_POST, "SP02", FILTER_SANITIZE_SPECIAL_CHARS);
    $levelOfConsciousness = filter_input(INPUT_POST, "levelOfConsciousness", FILTER_SANITIZE_SPECIAL_CHARS);
    $painLevel = filter_input(INPUT_POST, "painLevel", FILTER_SANITIZE_SPECIAL_CHARS);
    $recentInjury = filter_input(INPUT_POST, "recentInjury", FILTER_SANITIZE_SPECIAL_CHARS);
    $symptoms = filter_input(INPUT_POST, "symptoms", FILTER_SANITIZE_SPECIAL_CHARS);
    $durationSymproms = filter_input(INPUT_POST, "durationSymproms", FILTER_SANITIZE_SPECIAL_CHARS);
    $recentTravel = filter_input(INPUT_POST, "recentTravel", FILTER_SANITIZE_SPECIAL_CHARS);
    $pregStatus = filter_input(INPUT_POST, "pregStatus", FILTER_SANITIZE_SPECIAL_CHARS);
    // $complaint = filter_input(INPUT_POST, "", FILTER_SANITIZE_SPECIAL_CHARS);
    // $complaint = filter_input(INPUT_POST, "", FILTER_SANITIZE_SPECIAL_CHARS);
    // $complaint = filter_input(INPUT_POST, "", FILTER_SANITIZE_SPECIAL_CHARS);
    // Get the date of birth from the form submission
    $dobString = $_POST['dob'];
    $weight = floatval($_POST['weight']);
    $height = floatval($_POST['height']);

    // Parse the date string into a DateTime object
    $dob = new DateTime($dobString);
    
    // Get the current date
    $currentDate = new DateTime();

    // Calculate the age
    $age = $currentDate->diff($dob)->y;

    // Now $age is the calculated age, you can use it as needed.
    echo "Age: " . $age . " years";
    
          // Get the weight and height from the form submission
          
          // Check if the input values are valid
          if ($weight <= 0 || $height <= 0) {
              echo "Please enter valid values for weight and height.";
              exit;
          }

          // Calculate BMI
          $bmi = $weight / ($height * $height);

          // Display the result
          echo "Your BMI is: " . number_format($bmi, 2);
          
    
    if(isset($_POST["update"])){
        include("connect.php");
        //the update of the details
        
        echo '<script>if(confirm("Are you sure you want to update?")) { alert("Update successful!"); } else { alert("Update cancelled!"); }</script>';
  
        $sql1 ="UPDATE `triagedetails`
                SET `complaint` = '$complaint',`bp` = '$bp', `heartRate` = '$heartRate', `temp` = '$temp', `SP02` = '$SP02', `levelOfConsciousness` = '$levelOfConsciousness', `painLevel` = '$painLevel', `recentInjury` = '$recentInjury', `symptoms` = '$symptoms', `durationSymproms` = '$durationSymproms', `recentTravel` = '$recentTravel', `pregStatus` = '$pregStatus', `age` = '$age', `bmi` = '$bmi'
                WHERE `patients_id` = '$sessionId'";
        $res1 = mysqli_query($conn, $sql1);
    
        if($res1){
            header("Location:../nurse_index.php");
            exit();
            mysqli_close($conn);
                
            }
    }else{
        echo "<h1 style= 'color:red;'>The details were not updated, Please contact I.T support for assistance(+254727238639)</h1>";
    }
    
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update the Patient's details</title>
    
    
    <link rel="icon" type="image/x-icon" href="nya-logo.jpg">
    <style>
        .container {
            
            max-width: 1300px;
            height:1200px;
            margin: 60px auto;
            padding: 60px;
            
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Enable horizontal scroll on small screens */

        }
        .contact-col input, .contact-col textarea{
    width: 100%;
    padding: 15px;
    margin-bottom: 17px;
    outline: none;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
    </style>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    

<div class="container">
    
<h1 align="center" style="color:red;">Send <?= $sessionName ?> to the next room</h1>

<form action='<?php htmlspecialchars($_SERVER["PHP_SELF"])?>' class='form' id = 'form' method = 'POST'>
     <div class='form-control'>
        <label for='name' >Name Of patient</label>
         <input type='text' name='name' id='email'  value='<?php echo isset($_SESSION["name"]) ? htmlspecialchars($_SESSION["name"]) : ""; ?>' required>
        <label for='complaint' >complaint</label>
         <input type='text' name='complaint' id='complaint'>
         <label for='name' >Blood pressure</label>
            <select name='bp' id='bp'>
                <option value='119'>Systolic: Less than 120 mmHg</option>
                <option value='80'>Diastolic: Less than 80 mmHg</option>
                <option value='121'>Systolic: 120-129 mmHg</option>
                <option value='79'>Diastolic: Less than 80 mmHg</option>
                <option value='130'>Systolic: 130-139 mmHg</option>
                <option value='8089'>Diastolic: 80-89 mmHg</option>
                <option value='140'>Systolic: 140 mmHg or higher</option>
                <option value='90'>Diastolic: 90 mmHg or higher</option>
                <option value='180'>Systolic: Higher than 180 mmHg</option>
                <option value='120'>Diastolic: Higher than 120 mmHg</option>
            </select>
            <br>
            <div class="resultBp" id = "resBp"></div>
            <br>
         <label for='name' >Heart Rate</label>
         
         <select name="heartRate">
                <option value='60 to 100 beats per minute'>Normal for adult(18 years and older): 60 to 100 beats per minute</option>
                <option value='70 to 100 beats per minute'>Normal for children(ages 6-15): 70 to 100 beats per minute</option>
                <option value='100 to 150 beats per minute'>Normal for infants(0-5 months): 100 to 150 beats per minute</option>
                <option value='below 60 above 100'>Not normal for adults below 60 above 100</option>
                <option value='below 70 above 100'>Not normal for children below 70 above 100</option>
                <option value='below 100  above 150'>Not normal for infants below 100  above 150</option>
            </select>
            <br>
            <br>
         <label for='name' >Temperature</label>
         
            <select name='temp'>
                <option value='Oral 36.5 to 37.3'>Normal Oral Temperature</option>
                
                <option value='30 to 34'>30 to 34</option>
                <option value='35 to 39'>35 to 39</option>
                <option value='40 to 45'>40 to 45</option>
            </select>
            <br>
            <br>
         <label for='name' >SP02</label>
         <input type='text' name='SP02' id='SP02'>
         <label for='name'>level Of Consciousness</label>
         <select name='levelOfConsciousness'>
                <option value='low'>low</option>
                <option value='medium'>medium</option>
                <option value='extreme'>extreme</option>
                
            </select>
         
         <br>
         <label for='name' >Level of pain</label>
         
            <select name='painLevel'>
                <option value='low'>low</option>
                <option value='medium'>medium</option>
                <option value='extreme'>extreme</option>
                
            </select>
            <br>
            <br>
         <label for='name' >Recent Injury</label>
         <input type='text' name='recentInjury' id='recentInjury' required>
         <label for='name' >symptoms</label>
         <input type='text' name='symptoms' id='symptoms' required>
         <br>
         <label for='name' >Duration of the Symptoms</label>
         
            <select name='painLevel'>
                <option value='day'>day</option>
                <option value='days'>days</option>
                <option value='week'>week</option>
                <option value='weeks'>weeks</option>
                <option value='month'>month</option>
                <option value='months'>months</option>
            </select>
            <br>
            <br>
         <label for='name' >Recent Travel</label>
         <input type='text' name='recentTravel' id='recentTravel' required>
         <p>Pregnancy Status</p>
         <li style = "display:flex;">
          <ol><label>Yes</label><input type='radio' name='pregStatus' id='pregStatus' value = 'yes'></ol>
          <ol><label>No</label><input type='radio' name='pregStatus' value = 'no'></ol>
         </li>
         <label for="dob">DOB</label>
         <input type="date" name="dob" id="dob" value='<?php echo isset($_GET["dob"]) ? htmlspecialchars($_GET["dob"]) : ""; ?>'>
         <div class="resultAge" id = "resultAge"></div>
         <!-- <button onclick="calculateAge()">Calculate Age</button> -->
          
         <label for='height' >height</label>
         <input type='number' step="0.01" name='height' id='height' placeholder = "Height in metres 1.0 etc" min="0">
         <label for='weight' >weight</label>
         <input type='number' name='weight' id='weight' placeholder = "Weight in kgs"required>
         <div class="result" id = "result"></div>
         <!-- <button onclick="calculateBMI()">Calculate BMI</button> -->
         <!-- <label for='name' >cost</label>
         <input type='text' name='cost' id='cost' required>
         <label for='name' >warningPrecautions</label>
         <input type='text' name='warningPrecautions' id='warningPrecautions' required>
         <label for='name' >interactions</label>
         <input type='text' name='interactions' id='interactions' required>
          -->
         
          </div>
          <button type="button" onclick="getSelectedValue(); calculateBMI(); calculateAge();">Evaluate blood pressure and all the values</button>
          <br>
          <br>
          <button type="submit" name ="update">Update details</button>
          
          

              <br>
         
         <br>
         <!-- <button style = "background-color:red;">Close/ Go back</button> -->
         <a href="../nurse_handlePatient.php" style = "text-decoration:none;"><input type="button" value="Close/ Go back" style = "background-color:red; display: inline;
    text-decoration: none;
    color: #fff;
    border: 1px solid #fff;
    padding: 12px 34px;
    font-size: 13px;
    
    position: relative;
    cursor: pointer;"></a>
          </form>


</div>
<script>
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
  </script>
</body>
</html>




