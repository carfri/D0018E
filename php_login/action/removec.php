<?php
	session_start();

	require('../connect.php');

	$email = trim($_POST['name']);
	$id = trim($_POST['id']);


	$qry = "DELETE FROM comments where customerID = (select id from customers where email = '$email') and productID = '$id'";
	mysqli_query($conn, $qry);
	

	echo $qry;

	header('Location: ../adminWelcome.php');

	$conn->close();
	exit();
?>