<?php
include "database/connect.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$service = $_POST['service'];
$doctor = $_POST['doctor'];
$date = $_POST['date'];
$time = $_POST['time'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

// Insert new appointment into the "appointments" table
$sql = "INSERT INTO appointments (PatientName, Email, Contact, Gender, AppointmentDate, AppointmentTime, Service, ConsultantDoctor, AppointmentStatus)
        VALUES ('$name', '$email', '$phone', 'Unknown', '$date', '$time', '$service', '$doctor', 'Scheduled')";

// Compose the email message
$subject = "Appointment Confirmation";
$message = "Dear $name,\n\nYour appointment for $service with $doctor on $date at $time has been confirmed.\n\nThank you for choosing our clinic!\n";

// Send the confirmation email
if ($conn->query($sql) === TRUE) {
    // Retrieve recipient email from the database
    $recipientSql = "SELECT Email FROM appointments WHERE PatientName = '$name' AND AppointmentDate = '$date' AND AppointmentTime = '$time'";
    $result = $conn->query($recipientSql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $recipientEmail = $row['Email'];

        $headers = "From:  	info@nyalifewomensclinic.net"; // replace with your email
        mail($recipientEmail, $subject, $message, $headers);

        // Set a session variable for success message
        session_start();
        $_SESSION['success_message'] = "Appointment booked successfully. You will receive an email for confirmation. Check on spam incase you don't receive in your inbox!";
        header("Location: booking_index.php"); // Redirect to booking_index.php
        exit();
    } else {
        echo "Error retrieving recipient email from the database.";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
