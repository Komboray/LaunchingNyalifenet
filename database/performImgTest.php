<?php
include("connect.php");
$id = $_GET["id"];
$test = $_GET["test"];
$addInfo = $_GET["addInfo"];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["imaging"])){

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
                $testPerform = $_POST["test"];
                $statusLab = $_POST["status"];
                $results = $_POST["results"];
                $sql = "UPDATE `imagingrequests` 
                        SET `status` = '$statusLab', `results` = '$results', `imageUpload` = '$imagePath'
                        WHERE `test` = '$testPerform' AND `patient_Imageid` = '$id'";
                $ruL = mysqli_query($conn, $sql);
                // $imageName = basename($_FILES["image"]["name"]);
                if($resp){

                        
                    header("Location:../pathologist_test.php?error=an error occurred while doing the test");
                    exit(); // Exit after redirect
                        
                }else{
                    header("Location:../pathologist_test.php?success=test was performed");
                    exit(); // Exit after redirect
                
                }
}}}
                
}

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imaging</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="../nya-logo.jpg">
    <style>
        .container {
            max-width: 900px;
            height:500px;
            margin: 60px auto;
            padding: 60px;
            
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Enable horizontal scroll on small screens */
        }
        select, input, textarea{
                width: 90%;
                background-color: #141824;
                border: none;
                outline: none;
                padding: 10px;
                font-family: 'Poppins';
                margin-top: 5px;
                resize: none;
                color: #fff;
                border-radius: 10px;
            }
    </style>
</head>
<body>
<section class="content" id="notif">
        <div class="container">
            <h1>Imaging</h1>

            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" class='form' id = 'form' method = 'POST' enctype="multipart/form-data">
     <div class='form-control'>
        <label for="name"></label>
         <input type="text" name="id" id="" value="<?php echo htmlspecialchars($_GET['id'] ?? ''); ?>"><br><br>
          
         <label for='image'>Choose the image from the test performed:</label>
         <input type='file' name='image' id='image' accept='image/*'><br><br>

         <label for='image'>The test being performed</label>
         <input type="text" name="test" id="" value="<?php echo htmlspecialchars($_GET['test'] ?? ''); ?>"><br><br>
         
          
        
              <br>
              <br>
              <label for="status">Choose the status</label>
              <select name="status" id="">
                <option name="status" value="done">Done</option>
                <option name="status" value="cancelled">Cancelled</option>
              </select>
              <br>
              <br>
              <label for="results"></label>
              <textarea name="results" id="results" cols="30" rows="10" placeholder="Add results" required></textarea>
         
          
          
         <input type ='submit' name= 'imaging'> 
         <br>
         <!-- <button style = "background-color:red;">Close/ Go back</button> -->
         
          </form>
        </div>
    
    </section>

</body>
</html>