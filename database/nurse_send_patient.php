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
    if(isset($_POST["roomDetails"])){
        include("connect.php");
        //the update of the rooms 
        $rooms = $_POST["rooms"];
        
        $sql1 ="UPDATE `patients`
                SET `rooms` = '$rooms'
                WHERE `PatientID` = '$sessionId'";
        $res1 = mysqli_query($conn, $sql1);
    
        if($res1){
            header("Location:../nurse_index.php");
            exit();
            mysqli_close($conn);
                
            }
    }else{
        echo "<h1 style= 'color:red;'>The oom details were not updated, Please contact I.T support for assistance(+254727238639)</h1>";
    }
    
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Patient to the next room</title>
    
    
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
        
    </style>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    

<div class="container">
    
<h1 align="center" style="color:red;">Send <?= $sessionName ?> to the next room</h1>

                            <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='post'>
                            <label for='rooms'>Where do you want to send the patient to?</label>
                            <div class='data'>
                                        <select name= 'rooms' id='rooms'>
                                            
                                            <option value='Dr'>Doctor's office</option>
                                            <option value='Lab'>Lab for tests</option>
                                            <option value='receptionist'>Reception billing</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                </div>

                                <br>
                                <button type='submit' name = 'roomDetails' style='background-color: #FF00FF;
                            border: 2px solid #8e44ad;
                            border-radius: 4px;
                            color: #fff;
                            display: block;
                            
                            font-size: 16px;
                            padding: 10px;
                            margin-top: 20px;
                            
                            width: 100%;'>Send patient to the selected room</button>
                                
                            </form>

</div>
</body>
</html>




