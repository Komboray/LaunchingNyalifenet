<?php
include("connect.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["medsSubmit"])){

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
                $name = $_POST["Name"];
                
                
                $dosage = $_POST["dosage"];
                
                
                $sideEffects = $_POST["sideEffects"];
                $warnings = $_POST["warnings"];
                $cost = $_POST["cost"];
                $expiryDate = $_POST["expiryDate"];
                $quantity = $_POST["quantity"];
                $usage = $_POST["usage"];
                $ingredients = $_POST["ingredients"];
                $indications = $_POST["indications"];
                
                // $imageName = basename($_FILES["image"]["name"]);
                
                
                
                    $sql = "INSERT INTO `medicines` (`Name`,`ingredients`,`dosage`,`indications`,`usage`,`sideEffects`,`warnings`,`cost`,`expiryDate`,`quantity`,`dateOfEntry`,`imagePath`)
                            VALUE('$name', '$ingredients', '$dosage', '$indications', '$usage', '$sideEffects', '$warnings', '$cost', '$expiryDate','$quantity', CURRENT_DATE,'$imagePath')
                            ";
                    $resp = mysqli_query($conn, $sql);
                    if($resp){
                        sleep(3);
                        header("Location: ../doctor_meds.php");
                        mysqli_close($conn);
                        exit();
                        
                    }
                            
                
                            
                        }else{
                            exit();
                            mysqli_close($conn);
                        }

                
                }
            }else{
                exit();
                mysqli_close($conn);
            }
}