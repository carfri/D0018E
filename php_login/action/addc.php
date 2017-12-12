<?php
	session_start();

	require('../connect.php');

	$id = trim($_POST['id']);
	$comment = trim($_POST['comment']);
	$rating = trim($_POST['rating']);
    $qry1 = "SELECT customerID FROM comments WHERE productID = $id AND customerID =" . $_SESSION['id'];
    $result1 = mysqli_query($conn, $qry1);
    if(!$result1 || mysqli_num_rows($result1) >= 1){
        $qry1 = "UPDATE comments SET comment= '$comment', rating= '$rating' WHERE productID = $id AND customerID=" . $_SESSION['id'];
        mysqli_query($conn, $qry1);
        header('Location: ../product.php?id='.$id);
    }else{
	    $qry = "INSERT INTO comments (comment, customerID, productID, rating) VALUES ('$comment', '" . $_SESSION['id'] . "', '$id', '$rating')";
	    $result = mysqli_query($conn,$qry);
	    header('Location: ../product.php?id='.$id);
    }
	$conn->close();
	exit();
?>