<?php
include("connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["Submit-service"])){
        $price= filter_input(INPUT_POST, "price", FILTER_SANITIZE_SPECIAL_CHARS);
        $tat= filter_input(INPUT_POST, "tat", FILTER_SANITIZE_SPECIAL_CHARS);
        $serviceName= filter_input(INPUT_POST, "serviceName", FILTER_SANITIZE_SPECIAL_CHARS);

        $sql = "INSERT INTO `services`(nameOfService, tat, price)
                VALUES('$serviceName', '$tat', '$price')";

        $response = mysqli_query($conn, $sql);

        if($response){
           echo "Details sent Successfully";
           header("Location:../manage_services.php");
        }else{
            echo "Something is wrong you!";
            sleep(3);
            header("Location:../manage_services.php");
        }


    }else{
        echo "Something is wrong!";
        sleep(3);
        
        mysqli_close($conn);
        header("Location:../manage_services.php");
        exit();
    }
}