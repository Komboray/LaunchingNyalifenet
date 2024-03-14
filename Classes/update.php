<?php
include("../database/connect.php");
//this is a function used to update the script from sql
Class Update{
    //we will require thEsE below values from the $_POST
    public $username;
    public $email;
    
    //this is the constructor used to get the things needed for the update func
    function __construct($username, $email, $emailCompared){
        $this->username = $username;
        $this->email = $email;
        $this->emailCompared = $emailCompared;
    }

    function updateDetails($username, $email, $emailCompared){
        //we need to get the conn class...$conn
        include("database/connect.php");

        $sql = "UPDATE `patients`
                SET `email` = '$email', `username` = '$username'
                WHERE `email` = '$emailCompared'";
        $res = mysqli_query($conn, $sql);

        if($res){
            echo "The details have been sent!";
        }else{
            echo "You bozo, something is wrong!";
        }
    }
    
    

}
