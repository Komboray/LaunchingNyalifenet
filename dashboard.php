<?php

//WE ARE GOING TO START A SESSION


$id =  $_SESSION["id"];
$firstN =  $_SESSION["firstN"];
$lastN = $_SESSION["lastN"];
$dob =  $_SESSION["dob"];
$bloodG =  $_SESSION["bloodG"];
$medication =  $_SESSION["medication"];
$gender =  $_SESSION["gender"];
$phoneN =  $_SESSION["phoneN"];
$EmailAddress = $_SESSION["EmailAddress"];
$NextOfKin = $_SESSION["NextOfKin"];
$NextOfKinPhoneNumber  =  $_SESSION["NextOfKinPhoneNumber"];
$MaritalStatus = $_SESSION["MaritalStatus"];
$IDNumber =$_SESSION["IDNumber"];
$Allergies = $_SESSION["Allergies"];
$Occupation =$_SESSION["Occupation"];
$addInfo = $_SESSION["addInfo"];
// $age = $_SESSION["age"];
// Sample data for Samantha Otieno
// $patientInfo = array(
//     'FirstName' => 'Samantha',
//     'LastName' => 'Otieno',
//     'PhoneNumber' => '123-456-7890',
//     'EmailAddress' => 'samantha@example.com',
//     'NextOfKin' => 'John Otieno',
//     'NextOfKinPhoneNumber' => '987-654-3210',
//     'Gender' => 'Female',
//     'DOB' => '1990-05-15',
//     'BloodGroup' => 'O+',
//     'MaritalStatus' => 'Single',
//     'Allergies' => 'None',
//     'IDNumber' => 'ID123456',
//     'Occupation' => 'Software Developer',
//     'Medication' => 'Painkiller, Vitamin C',
// );

// Sample image URL (replace with the actual image URL)
$imageURL = 'dist/img/height.jpg'; // Placeholder image URL

// Function to format date of birth
function formatDateOfBirth($dob)
{
    return date('F j, Y', strtotime($dob));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <style>
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
    </style>
</head>
<body>

    <h2>Patient Dashboard - <?php echo $firstN . ' ' . $lastN; ?></h2>

    <div class="patient-info">
        <img src="<?php echo $imageURL; ?>" alt="Patient Height Image">
        <div class="patient-details">
            <p><strong>Full Name:</strong> <?php echo $firstN . ' ' . $lastN; ?></p>
            <p><strong>Phone Number:</strong> <?php echo $phoneN; ?></p>
            <p><strong>Email Address:</strong> <?php echo $EmailAddress; ?></p>
            <p><strong>Next of Kin:</strong> <?php echo $NextOfKin; ?></p>
            <p><strong>Next of Kin Phone Number:</strong> <?php echo $NextOfKinPhoneNumber; ?></p>
            <p><strong>Gender:</strong> <?php echo $gender; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo formatDateOfBirth($dob); ?></p>
            <!-- <p><strong>Age:</strong> <?php echo $age; ?></p> -->
            <p><strong>Blood Group:</strong> <?php echo $bloodG; ?></p>
            <p><strong>Marital Status:</strong> <?php echo $MaritalStatus; ?></p>
            <p><strong>Allergies:</strong> <?php echo $Allergies; ?></p>
            <p><strong>ID Number:</strong> <?php echo $IDNumber; ?></p>
            <p><strong>Occupation:</strong> <?php echo $Occupation; ?></p>
            <p><strong>Medication:</strong> <?php echo $medication; ?></p>
        </div>
    </div>

    <!-- Add more sections as needed for additional patient information -->

</body>
</html>

