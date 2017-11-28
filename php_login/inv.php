<?php
session_start();

require('connect.php');

$id = trim($_POST['id']);
$inv = trim($_POST['inv']);

$qry = "UPDATE products set ininventory = '$inv' where id='$id'";
$result = mysqli_query($conn,$qry);

header('Location: adminWelcome.php');

$conn->close();
exit();
?>