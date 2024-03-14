<?php

include('connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST["medsAdminSubmit"])){
        $patientAdmin = filter_input(INPUT_POST, "patientAdmin", FILTER_SANITIZE_SPECIAL_CHARS);
    $adminMeds = filter_input(INPUT_POST, "adminMeds", FILTER_SANITIZE_SPECIAL_CHARS);
    $adminStatus = filter_input(INPUT_POST, "adminStatus", FILTER_SANITIZE_SPECIAL_CHARS);

    $sql = "INSERT INTO `adminMeds`(`adminStatus`, `meds_id`, `patient_id`)
            VALUES('$adminStatus', '$adminMeds', '$patientAdmin')";

    $respo = mysqli_query($conn, $sql);

    if($respo){
        header("Location:../doctor_meds.php");

    }

   
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administer medicines</title>
    <link rel="icon" type="image/x-icon" href="nya-logo.jpg">
    <script>
      var bp =  getElemetById('bp');
      console.log(bp.innerText);
    </script>
    <link rel="icon" type="image/x-icon" href="../nya-logo.jpg">
    <style>
          /* transactions page */
    .form{
        padding: 30px 40px;
      }
      
      .form-control{
        margin-bottom: 10px;
        padding-bottom: 20px;
        position: relative;
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
        background-color: #8e44ad;
        border: 2px solid #8e44ad;
        border-radius: 4px;
        color: #fff;
        display: block;
        
        font-size: 16px;
        padding: 10px;
        margin-top: 20px;
        
        width: 100%;
      }   
    </style>
</head>
<body>
<div >
    <div class='head'>
    <h2 style='color:blue;text-align:center;'> Administer medicine to a patient</h2>
    </div>
   <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" class='form' id = 'form' method = 'POST'>
     <div class='form-control'>
        
         <label for='patientAdmin' >Choose patient</label>
         <select name='patientAdmin' id=''>
           <?php 
           include("connect.php"); 
           $sql = "SELECT * FROM `patients`";
           $response = mysqli_query($conn, $sql);
           if($response){
            $num = mysqli_num_rows($response);

            if($num>0){
                while($row = mysqli_fetch_assoc($response)){
                    
                    echo "
                    
                    <option value='{$row["PatientID"]}'>{$row["FirstName"]}</option>
                    
                
                    ";
                }
            }

           }
           
           ?>
            </select>
            <br>
            
            <br>
         
            <label for='name' >Choose Medicine to be administered</label>
         <select name='adminMeds' id='' required>
           <?php 
           include("connect.php"); 
           $sql = "SELECT * FROM `medicines`";
           $response = mysqli_query($conn, $sql);
           if($response){
            $num = mysqli_num_rows($response);

            if($num>0){
                while($row = mysqli_fetch_assoc($response)){
                    
                    echo "
                    
                    <option value='{$row["id"]}'>{$row["Name"]}</option>
                    
                
                    ";
                }
            }

           }
           
           ?>
            </select>
            <br>
            <br>
            <label for="adminStatus">Administration Status</label>
            <select name="adminStatus" id="">
                <option value="administered">administered</option>
                
            </select>
         <!-- <label for='name' >cost</label>
         <input type='text' name='cost' id='cost' required>
         <label for='name' >warningPrecautions</label>
         <input type='text' name='warningPrecautions' id='warningPrecautions' required>
         <label for='name' >interactions</label>
         <input type='text' name='interactions' id='interactions' required>
          -->
         
          </div>
          

         <button type ='submit' name= 'medsAdminSubmit'> Administer</button>
         <br>
         <!-- <button style = "background-color:red;">Close/ Go back</button> -->
         <a href="../doctor_meds.php" style = "text-decoration:none;"><input type="button" value="Close/ Go back" style = "background-color:red; display: inline;
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
        resultElementBp.innerHTML = 'This is a Hypertensive Crisis patient!';
        
      }else if(selectedValue == 120){
        alert('The patient is in Hypertensive Crisis');
        resultElementBp.innerHTML = 'This is a Hypertensive Crisis patient!';
        
      }else if(selectedValue == 140){
        alert('The patient is in Hypertension Stage 2');
        resultElementBp.innerHTML = 'This is a Hypertension Stage 2 patient!';
        
      }else if(selectedValue == 90){
        alert('The patient is in Hypertension Stage 2');
        resultElementBp.innerHTML = 'This is a Hypertension Stage 2 patient!';
        
      }
      else if(selectedValue == 130){
        
        resultElementBp.innerHTML = 'This is a Hypertension Stage 1 patient!';
        
      }
      else if(selectedValue == 8089){
        
        resultElementBp.innerHTML = 'This is a Hypertension Stage 1 patient!';
        
      }else if(selectedValue == 121){
        
        resultElementBp.innerHTML = 'This is an elevated stage patient!';
        
      }else if(selectedValue == 79){
        
        resultElementBp.innerHTML = 'This is an elevated stage patient!';
        
      }
      else{
        resultElementBp.innerHTML = 'This is a normal patient!';
        
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
      resultElement.innerHTML = 'Your BMI is: ' + bmi.toFixed(2);
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