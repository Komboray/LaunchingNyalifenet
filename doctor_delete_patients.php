<?php

include("database/connect.php");

// Get the patient ID from the URL parameter
$patientID = $_GET['id'];

// Create connection
try{
    
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete patient record from the "patients" table
$sql = "DELETE FROM patients WHERE PatientID = $patientID"; // Using 'PatientID'

if ($conn->query($sql) === TRUE) {
    
    echo '<script>window.location.href = "doctor_manage_patients.php?success=Patient record deleted successfully!";</script>';
    
} else {
    // Handle delete error
    echo '<script>window.location.href = "doctor_manage_patients.php?error=Error deleting patient record";</script>';

   
}
}catch (mysqli_sql_exception $e){
    // Handle the exception
    // echo "Error: " . $e->getMessage();
    echo '<script>window.location.href = "doctor_manage_patients.php?error=Error deleting patient record";</script>';

}

// Close connection
$conn->close();
?>