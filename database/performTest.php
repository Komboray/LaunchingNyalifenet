<?php
include("connect.php");
$id = $_GET["id"];
$test = $_GET["test"];
$date = $_GET["date"];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["labTestSubR"])){
        $testPerform = $_POST["testPerform"];
        $statusLab = $_POST["status"];
        $results = $_POST["results"];
        $sql = "UPDATE `labnotifications` 
                SET `status` = '$statusLab', `results` = '$results'
                WHERE `testToDone` = '$test' AND `patients_Lid` = '$id'";
        $ruL = mysqli_query($conn, $sql);
        if($ruL){
            header("Location:../pathologist_test.php?success=test was performed");
        }else{
            
            header("Location:../pathologist_test.php?error=an error occurred while doing the test");
        }

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perform Test on Patient</title>
    <link rel="icon" type="image/x-icon" href="../nya-logo.jpg">
    <style>
        .container {
            max-width: 1200px;
            height:500px;
            margin: 60px auto;
            padding: 60px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Enable horizontal scroll on small screens */
        }
        select, input, textarea{
                width: 90%;
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
        
    </style>
</head>
<body>
<div class="container2">
            <h2>Tests</h2>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" class='form' id = 'form' method = 'POST'>
     <div class='form-control'>
        <label for="name"></label>
         <input type="text" name="id" id="" value="<?php echo htmlspecialchars($_GET['id'] ?? ''); ?>"><br>
          
          
         <label for="testPerform">Choose the test being performed</label>
         <input type="text" name="testPerform" id="testPerform" value="<?php echo htmlspecialchars($_GET['test'] ?? ''); ?>">
              <!-- <select name="testPerform" id="">
                <option name="testPerform" value="Blood Tests">Blood Tests</option>
                <option name="testPerform" value="Urinalysis">Urinalysis</option>
                <option name="testPerform" value="Urinalysis">Urinalysis</option>
                <option name="testPerform" value="Imaging Tests">Imaging Tests</option>
                <option name="testPerform" value="Microbiological ">Microbiological </option>
                <option name="testPerform" value="Pathology ">Pathology</option>
                <option name="testPerform" value="Genetic ">Genetic</option>
                <option name="testPerform" value="Cardiac ">Cardiac</option>
                <option name="testPerform" value="Immunological  ">Immunological</option>
                <option name="testPerform" value="Respiratory">Respiratory</option>
                <option name="testPerform" value="Gastrointestinal  ">Gastrointestinal  </option>
                <option name="testPerform" value="HPV">HPV  </option>
              </select> -->
              <br>
              <br>
              <label for="status">Choose the status</label>
              <select name="status" id="">
                <option name="status" value="done">Done</option>
                <option name="status" value="cancelled">Cancelled</option>
              </select>
              <br>
              <br>
              <label for="results"></label>
              <textarea name="results" id="results" cols="30" rows="10" placeholder="Add results" required></textarea>
         
          
          
         <input type ='submit' name= 'labTestSubR'> 
         <br>
         <!-- <button style = "background-color:red;">Close/ Go back</button> -->
         
          </form>
    </div>

    
</body>
</html>