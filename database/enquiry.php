<?php
//the session will allow us to get the values from the prev page
session_start();

// Check if a form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data
    if (isset($_POST["user_response"])) {
        $userResponse = $_POST["user_response"];
        if ($userResponse == "yes") {
            echo "<script>alert('You selected YES.');</script>";
            $emailCompared = $_SESSION["email-compared"];
            $username = $_SESSION["name-edit"];
            $email = $_SESSION["email-edit"];

            echo $emailCompared;
            echo $username;
            echo $email;
            //we are going to add the class from the update.php
            require_once 'Classes/update.php';
            $update = new Update($username, $email, $emailCompared);
            
            $update->updateDetails($username, $email, $emailCompared);
            header("Location:r-handle-patient.php");
            exit();

        } else {
            echo "<script>alert('You selected NO.');</script>";
            header("Location:r-handle-patient.php");
            exit();
        }
    }
}
?>

<!-- Form with a Yes/No prompt -->
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
  <p>Do you want to proceed?</p>
  <input type="submit" name="user_response" value="yes">
  <input type="submit" name="user_response" value="no">
</form>
