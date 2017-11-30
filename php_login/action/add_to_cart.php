<?php
	session_start();

	require('connect.php');
    
	$item = trim($_POST['b']);
    $qry1 = "SELECT id FROM orders WHERE productID =" . $item . " AND customerID=" . $_SESSION['id'];
    $result = mysqli_query($conn,$qry1);

    if(!$result || mysqli_num_rows($result) <= 0){
	    $qry = 'INSERT INTO orders (customerID, productID,ammountOrdered)
	    VALUES ("'.$_SESSION['id'].'","'.$item.'","1")';
	    mysqli_query($conn,$qry);
    }
    else{
        $qry2 = "UPDATE orders SET ammountOrdered = ammountOrdered + 1 WHERE productID =" . $item . " AND customerID=" . $_SESSION['id'];
        mysqli_query($conn, $qry2);
    }
    header('Location: ../userWelcome.php');
	$conn->close();
	exit();
?>