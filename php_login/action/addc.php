<?php
	session_start();

	require('../connect.php');

	$id = trim($_POST['id']);
	$comment = trim($_POST['comment']);
	$rating = trim($_POST['rating']);

	$qry = "INSERT INTO comments (comment, customerID, productID, rating) VALUES ('$comment', '" . $_SESSION['id'] . "', '$id', '$rating')";
	$result = mysqli_query($conn,$qry);

	header('Location: ../product.php?id='.$id);

	$conn->close();
	exit();
?>