<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the file was uploaded without errors
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetDirectory = "../uploads/"; // Directory where images will be stored
        $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // File was uploaded successfully
            echo "<h1 style = 'align-items:center;'>The file ". basename($_FILES["image"]["name"]). " has been uploaded.</h1>";

            // Save the file path to the database (Replace with your database code)
            $imagePath = $targetFile;
            // ... (Add your database connection and insert query here)
            
            sleep(3);
            echo '<script>window.location.href = "../doctor_meds.php";</script>';
            
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Error: Please choose a valid image file.";
    }
}
?>
