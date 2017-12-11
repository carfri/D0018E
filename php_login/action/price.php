<?php
session_start();

require('../connect.php');

$id = trim($_POST['id']);
$price = trim($_POST['price']);

$qry = "UPDATE products set price = '$price' where id='$id'";
$result = mysqli_query($conn,$qry);

header('Location: ../adminWelcome.php');

$conn->close();
exit();
?>