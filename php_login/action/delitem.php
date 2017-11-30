<?php
session_start();

require('connect.php');

$id = trim($_POST['id']);
$qry = "DELETE FROM products WHERE id='$id'";
$result = mysqli_query($conn,$qry);

header('Location: ../adminWelcome.php');

$conn->close();
exit();
?>