<?php
session_start();

require('connect.php');

$email = trim($_POST['name']);


$qry = "UPDATE customers set isAdmin = '1' where email='$email'";
$result = mysqli_query($conn,$qry);

header('Location: adminWelcome.php');

$conn->close();
exit();
?>