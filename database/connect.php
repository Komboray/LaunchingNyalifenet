<?php

$localhost = 'localhost';
$username = 'root';
$pass = '';
$db_name = 'nyalife(3)';

$conn = '';
$conn = mysqli_connect($localhost, $username,$pass, $db_name);

if($conn){
    // echo "You are connected!";
}