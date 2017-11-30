<?php
session_start();

require('connect.php');

$name = trim($_POST['name']);
$price = trim($_POST['price']);
$ininventory = trim($_POST['ininventory']);

$qry = "INSERT INTO products (name, price, ininventory) VALUES ('$name', '$price','$ininventory')";
$result = mysqli_query($conn,$qry);

header('Location: ../adminWelcome.php');

$conn->close();
exit();
?>