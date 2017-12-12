<?php
	session_start();

	require('../connect.php');
    
	$item = trim($_POST['b']);
    $price = trim($_POST['price']);
	$amount = trim($_POST['amount']);

	$oriprice = $price*$amount;


    $qry1 = "SELECT id FROM orders WHERE productID =" . $item . " AND customerID=" . $_SESSION['id'] . " AND statusATM = 'cart'";
    $result = mysqli_query($conn,$qry1);

    if(!$result || mysqli_num_rows($result) <= 0){
	    $qry = 'INSERT INTO orders (customerID, productID,ammountOrdered, price, statusATM)
	    VALUES ("'.$_SESSION['id'].'","'.$item.'","'.$amount.'","'.$oriprice.'","cart")';
	    mysqli_query($conn,$qry);
    }
    else{
        $qry2 = "UPDATE orders SET ammountOrdered = ammountOrdered + ".$amount.", price = ammountOrdered *" . $price . " WHERE productID =" . $item . " AND customerID=" . $_SESSION['id'];
        mysqli_query($conn, $qry2);
    }
    header('Location: ../userWelcome.php');
	$conn->close();
	exit();
?>