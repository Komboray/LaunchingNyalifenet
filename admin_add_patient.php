<?php
//THIS MODIFIED PAGE NOW WORKS
include "admin_header.php";  
include("database/connect.php");               
?>
<head>
   
    <style>
 body {
            font-family: Arial, sans-serif;
        }

        .form-container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        </style>
    
</head>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add New Patient</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["AddPatSub"])){
        // Create connection
    $firstName = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_SPECIAL_CHARS);
    $lastName = filter_input(INPUT_POST, "last_name", FILTER_SANITIZE_SPECIAL_CHARS);
    $phoneNumber = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS);
    $emailAddress = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
    $nextOfKin = filter_input(INPUT_POST, "next_of_kin", FILTER_SANITIZE_SPECIAL_CHARS);
    $nextOfKinPhoneNumber = filter_input(INPUT_POST, "next_of_kin_phone", FILTER_SANITIZE_SPECIAL_CHARS);
    $gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_SPECIAL_CHARS);
    $dob = filter_input(INPUT_POST, "dob", FILTER_SANITIZE_SPECIAL_CHARS);
    $bloodGroup = filter_input(INPUT_POST, "blood_group", FILTER_SANITIZE_SPECIAL_CHARS);
    $maritalStatus = filter_input(INPUT_POST, "marital_status", FILTER_SANITIZE_SPECIAL_CHARS);
    $allergies = filter_input(INPUT_POST, "allergies", FILTER_SANITIZE_SPECIAL_CHARS);
    $idNumber = filter_input(INPUT_POST, "id_number", FILTER_SANITIZE_SPECIAL_CHARS);
    $occupation = filter_input(INPUT_POST, "occupation", FILTER_SANITIZE_SPECIAL_CHARS);
    $medication = filter_input(INPUT_POST, "medication", FILTER_SANITIZE_SPECIAL_CHARS);
    $additionalInformation = filter_input(INPUT_POST, "additional_information", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    $rooms = $_POST["rooms"];
    //  echo "$rooms";
        
            // echo $rooms;
    // SQL query to insert patient information into the "patients" table
    $sql = "INSERT INTO `patients` (FirstName, LastName, PhoneNumber, EmailAddress, NextOfKin, NextOfKinPhoneNumber, 
            Gender, DOB, BloodGroup, MaritalStatus, Allergies, IDNumber, Occupation, Medication, 
            AdditionalInformation, Password, date, statusLine) 
            VALUES ('$firstName', '$lastName', '$phoneNumber', '$emailAddress', '$nextOfKin', '$nextOfKinPhoneNumber', 
            '$gender', '$dob', '$bloodGroup', '$maritalStatus', '$allergies', '$idNumber', '$occupation', 
            '$medication', '$additionalInformation', '$password', CURRENT_DATE, '$statusLine')";

            try{
                $response = mysqli_query($conn, $sql);
                if($response){

                    // echo "Details have been sent to the database!";
                    // header("Location:reception_index.php");
                    echo '<script type="text/javascript">window.location.href="admin_manage_patients.php";</script>';

                    exit();
                    
                }else{
                    mysqli_close($conn);
                    exit();
                }
            }catch(mysqli_sql_exception $e){
                if ($e->getCode() == 1062) { // 1062 is the MySQL error code for duplicate entry
                    // Handle duplicate entry error
                    echo "The name 'peter drury' already exists.";
                } else {
                    // Handle other database errors
                    echo "Database error: " . $e->getMessage();
                }
}
    // Close connection
    $conn->close();
    exit();
    }

    
}
?>

<div class="form-container">
        <form action="add_patient.php" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>

        <label for="phone">Phone:</label>
        <input type="tel" name="phone" placeholder= "Start with +254" required>

        <label for="email">Email:</label>
        <input type="email" name="email">

        <label for="next_of_kin">Next of Kin:</label>
        <input type="text" name="next_of_kin" required>

        <label for="next_of_kin_phone">Next of Kin Phone:</label>
        <input type="tel" name="next_of_kin_phone" required>

        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob">

        <label for="blood_group">Blood Group:</label>
        <select name="blood_group">
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select>

        <label for="marital_status">Marital Status:</label>
        <select name="marital_status">
            <option value="Single">Single</option>
            <option value="Married">Married</option>
            <option value="Divorced">Divorced</option>
            <option value="Widowed">Widowed</option>
        </select>

        <label for="allergies">Allergies:</label>
        <textarea name="allergies"></textarea>

        <label for="id_number">ID Number:</label>
        <input type="text" name="id_number">

        <label for="occupation">Occupation:</label>
        <input type="text" name="occupation">

        <label for="medication">Medication:</label>
        <textarea name="medication"></textarea>

        <label for="additional_information">Additional Information:</label>
        <textarea name="additional_information"></textarea>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        

        <input type="submit" name = "AddPatSub" value="Add Patient">
    </form>
</div>
            </div>

    
        </div>

        
    </div>
    <script>
        // Function to validate Kenyan phone number
function validateKenyanPhoneNumber(phoneNumber) {
    const kenyanPhoneRegex = /^\+254\d{9}$/;
    return kenyanPhoneRegex.test(phoneNumber);
}

// Example usage
const inputPhoneNumber = document.getElementById;
if (validateKenyanPhoneNumber(inputPhoneNumber)) {
    console.log("Valid Kenyan phone number");
} else {
    console.log("Invalid Kenyan phone number");
}

    </script>
</body>

<?php

include "footer.php";                 
?>
