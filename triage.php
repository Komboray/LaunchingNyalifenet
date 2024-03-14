<?php

include("database/connect.php");
// Function to format date
function formatDate($date)
{
    return date('F j, Y', strtotime($date));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Triage</title>
    <style>
        /* Your styles for the triage page go here */
        .triage-entry {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .add-triage-form {
            margin-top: 20px;
        }

        .add-triage-form label {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

    

    <?php
    //we borrow the data from the previous page
    $id =  $_SESSION["id"];

    //we are going to get the patient's triage data from the table in the database
    $sql = "SELECT * 
            FROM `triagedetails`
            WHERE `patients_id` = '$id' "; 
    $res = mysqli_query($conn, $sql);
    // Sample triage data for Samantha Otieno

    // Display existing triage data
    if ($res) {
        $num = mysqli_num_rows($res);

        if($num>0)
        {
            while($row = mysqli_fetch_assoc($res)){

                echo '<div class="triage-entry">
                
                <p><strong>Temperature:</strong> ' . $row['temp'] . '</p>
                <p><strong>Blood Pressure:</strong> ' . $row['bp'] . '</p>
                <p><strong>Heart Rate:</strong> ' . $row['heartRate'] . '</p>
                <p><strong>Symptoms:</strong> ' . $row['symptoms'] . '</p>
                <p><strong>Symptoms:</strong> ' . $row['complaint'] . '</p>
                <p><strong>Symptoms:</strong> ' . $row['recentInjury'] . '</p>
                <p><strong>Symptoms:</strong> ' . $row['pregStatus'] . '</p>
                <p><strong>Symptoms:</strong> ' . $row['bmi'] . '</p>
                
                </div>';
            }
            
        }
            else {
                echo '<p style="color:red;">No triage data available for this patient.</p>
               
                <div class="add-triage-form">
                    <h3>Add New Triage Details</h3>
                    <form action="database/process_triage.php" method="post">
                        
                        <label for="temperature">Temperature:</label>
                        <input type="number" id="temperature" name="temp" required>

                        <label for="complaint">Complaint</label>
                        <input type="text" id="complaint" name="complaint" required>
            
                        <label for="bloodPressure">Blood Pressure:</label>
                        <input type="text" id="bloodPressure" name="bp" required>

                        <label for="recentTravel">Recent Travel:</label>
                        <input type="text" id="recentTravel" name="recentTravel" required>
            
                        <label for="heartRate">Heart Rate:</label>
                        <input type="number" id="heartRate" name="heartRate" required>

                        <label for="spo2"> SPO2:</label>
                        <input type="text" id="heartRate" name="SPO2" required>

                        <br>
                        <label>Level of conciousness</label>
                        <select name="levelOfConsciousness">
                        <option value="low">low</option>
                        <option value="medium">medium</option>
                        <option value="extreme">extreme</option>
                        
                        </select>
                
                        <br>
                        
                        <label for="name" >Level of pain</label>
                
                        <select name="painLevel">
                        <option value="low">low</option>
                        <option value="medium">medium</option>
                        <option value="extreme">extreme</option>
                        
                        </select>
                        <br>
                        <br>

                        <label for="recentInjury">Recent Injury:</label>
                        <input type="text" id="heartRate" name="recentInjury" required>

                        <p>Pregnancy Status</p>
                        <li style = "display:flex;">
                        <ol><label for="">Yes</label><input type="radio" name="pregStatus" value = "yes"></ol>
                        <ol><label for="">No</label><input type="radio" name="pregStatus" id="" value = "no"></ol>
                        </li>

                        <label for="height" >height</label>
                        <input type="number" step="0.01" name="height" placeholder = "Height in metres 1.0 etc" min="0">
                        <label for="weight" >weight</label>
                        <input type="number" name="weight" placeholder = "Weight in kgs"required>
                        <div class="result" id = "result"></div>
            
                        <label for="symptoms">Symptoms:</label>
                        <textarea id="symptoms" name="symptoms" rows="4" required></textarea>
            
                        <button type="submit-dr">Add Entry</button>
                    </form>
                </div>
                ';
            
        }
    } else {
        echo '<h1>Something is wrong with the database! Contact I.T SUPPORT</h1>';
       
    
    }
    ?>

   

</body>
</html>
