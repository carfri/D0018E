<?php
$servername = "utbweb.its.ltu.se";
$username = "jacekl-5";
$password = "jacekl-5";
$dbname = "jacekl5db";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>