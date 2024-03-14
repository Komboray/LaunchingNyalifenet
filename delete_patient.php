<?php

include("database/connect.php");

// Get the patient ID from the URL parameter
$patientID = $_GET['id'];

// Create connection

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete patient record from the "patients" table
$sql = "DELETE FROM patients WHERE PatientID = $patientID"; // Using 'PatientID'

if ($conn->query($sql) === TRUE) {
    echo "Patient record deleted successfully!";
    echo '<script>window.location.href = "manage_patients.php"</script>';
    
} else {
    // Handle delete error
    echo "Error deleting patient record " . $conn->error;
}

// Close connection
$conn->close();
?>