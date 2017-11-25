<?php
$servername = "utbweb.its.ltu.se";
$username = "carfri-5";
$password = "carfri-5";
$dbname = "carfri5db";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo "Connected successfully";
     }
?>