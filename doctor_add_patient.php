<?php

include "doctor_header.php";                 
?>
<head>
   
    <style>


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
            <h1 class="m-0">Add Patient</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace these values with your actual database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nyalife(3)";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $phoneNumber = $_POST['phone'];
    $emailAddress = $_POST['email'];
    $nextOfKin = $_POST['next_of_kin'];
    $nextOfKinPhoneNumber = $_POST['next_of_kin_phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $bloodGroup = $_POST['blood_group'];
    $maritalStatus = $_POST['marital_status'];
    $allergies = $_POST['allergies'];
    $idNumber = $_POST['id_number'];
    $occupation = $_POST['occupation'];
    $medication = $_POST['medication'];
    $additionalInformation = $_POST['additional_information'];
    $password = $_POST['password'];

    // SQL query to insert patient information into the "patients" table
    $sql = "INSERT INTO patients (FirstName, LastName, PhoneNumber, EmailAddress, NextOfKin, NextOfKinPhoneNumber, 
            Gender, DOB, BloodGroup, MaritalStatus, Allergies, IDNumber, Occupation, Medication, 
            AdditionalInformation, Password) 
            VALUES ('$firstName', '$lastName', '$phoneNumber', '$emailAddress', '$nextOfKin', '$nextOfKinPhoneNumber', 
            '$gender', '$dob', '$bloodGroup', '$maritalStatus', '$allergies', '$idNumber', '$occupation', 
            '$medication', '$additionalInformation', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Patient information added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

<div class="form-container">
   
    <form action="add_patient.php" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>

        <label for="phone">Phone:</label>
        <input type="tel" name="phone" required>

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

        <input type="submit" value="Add Patient">
    </form>
</div>
            </div>

    
        </div>

        
    </div>
</body>

<?php

include "footer.php";                 
?>
