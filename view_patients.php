<?php

include "admin_header.php";                 
?>


<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .info-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h2 {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        p {
            margin-bottom: 10px;
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
            <h1 class="m-0">Patient Information</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<?php
include("database/connect.php");
// Get the patient ID from the URL parameter
$patientID = $_GET['id'];
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch patient information based on the provided ID
$sql = "SELECT * FROM patients WHERE PatientID = $patientID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Patient not found.";
    exit();
}

// Close connection
$conn->close();
?>

<div class="info-container">
   
    <label>First Name:</label>
    <p><?= htmlspecialchars($row['FirstName']) ?></p>

    <label>Last Name:</label>
    <p><?= htmlspecialchars($row['LastName']) ?></p>

    <label>Phone:</label>
    <p><?= htmlspecialchars($row['PhoneNumber']) ?></p>

    <label>Email:</label>
    <p><?= htmlspecialchars($row['EmailAddress']) ?></p>

    <label>Next of Kin:</label>
    <p><?= htmlspecialchars($row['NextOfKin']) ?></p>

    <label>Next of Kin Phone:</label>
    <p><?= htmlspecialchars($row['NextOfKinPhoneNumber']) ?></p>

    <label>Gender:</label>
    <p><?= htmlspecialchars($row['Gender']) ?></p>

    <label>Date of Birth:</label>
    <p><?= htmlspecialchars($row['DOB']) ?></p>

    <label>Blood Group:</label>
    <p><?= htmlspecialchars($row['BloodGroup']) ?></p>

    <label>Marital Status:</label>
    <p><?= htmlspecialchars($row['MaritalStatus']) ?></p>

    <label>Allergies:</label>
    <p><?= htmlspecialchars($row['Allergies']) ?></p>

    <label>ID Number:</label>
    <p><?= htmlspecialchars($row['IDNumber']) ?></p>

    <label>Occupation:</label>
    <p><?= htmlspecialchars($row['Occupation']) ?></p>

    <label>Medication:</label>
    <p><?= htmlspecialchars($row['Medication']) ?></p>

    <label>Additional Information:</label>
    <p><?= htmlspecialchars($row['AdditionalInformation']) ?></p>
    <a href="admin_manage_patients.php">Go back to the previous</a>
</div>



<?php

include "footer.php";                 
?>
