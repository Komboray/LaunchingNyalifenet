<?php
session_start();
$id = $_SESSION["id"];

include('connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["submit-dr"])){
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
    // $dobString = $_POST['dob'];
    $weight = floatval($_POST['weight']);
    $height = floatval($_POST['height']);

    // Parse the date string into a DateTime object
    // $dob = new DateTime($dobString);
    
    // Get the current date
    // $currentDate = new DateTime();

    // Calculate the age
    // $age = $currentDate->diff($dob)->y;

    // Now $age is the calculated age, you can use it as needed.
    // echo "Age: " . $age . " years";
    
          // Get the weight and height from the form submission
          
          // Check if the input values are valid
          if ($weight <= 0 || $height <= 0) {
              echo "Please enter valid values for weight and height.";
              exit;
          }

          // Calculate BMI
          $bmi = $weight / ($height * $height);

          // Display the result
        //   echo "Your BMI is: " . number_format($bmi, 2);
          
    
    
        $sql = "INSERT INTO `triagedetails` (complaint,bp,heartRate,temp,SP02,levelOfConsciousness,painLevel,recentInjury,symptoms,durationSymproms,recentTravel,pregStatus,bmi,patients_id) 
                VALUES('$complaint', '$bp', '$heartRate', '$temp', '$SP02', '$levelOfConsciousness', '$painLevel', '$recentInjury', '$symptoms', '$durationSymproms', '$recentTravel', '$pregStatus','$bmi', '$id')";

        $res = mysqli_query($conn, $sql);

        if($res){
            
            header("../triage.php");
            // mysqli_close($conn);
            // exit();
        }else{
          echo "Something went wrong!";
        //   sleep(2);
        //   header("../triage.php");
        }

        
    }else{
      exit();
      mysqli_close($conn);
    }

}