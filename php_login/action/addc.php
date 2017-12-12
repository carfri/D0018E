<?php
	session_start();

	require('../connect.php');

	$id = trim($_POST['id']);
	$comment = trim($_POST['comment']);
	$rating = trim($_POST['rating']);
    $qry1 = "SELECT customerID FROM comments WHERE productID = $id AND customerID =" . $_SESSION['id'];
    $result1 = mysqli_query($conn, $qry1);
    if(!$result1 || mysqli_num_rows($result1) >= 1){
        echo "You can only leave 1 comment on this product.";
        echo '<a href=../product.php?id=' . $id . '>Back to product</a>';
    }else{
	    $qry = "INSERT INTO comments (comment, customerID, productID, rating) VALUES ('$comment', '" . $_SESSION['id'] . "', '$id', '$rating')";
	    $result = mysqli_query($conn,$qry);
	    header('Location: ../product.php?id='.$id);
    }
	$conn->close();
	exit();
?>