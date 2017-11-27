<?php
	session_start();

	require('connect.php');

	$item = trim($_POST['b']);

	$qry = "INSERT INTO orders (customerID, productID, ammountOrdered) VALUES ('".$_SESSION['id']."', '".$item."',1)";
	$result = mysqli_query($conn,$qry);

	header('Location: index.php');

	$conn->close();
	exit();
?>