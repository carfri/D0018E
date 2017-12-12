<?php
	session_start();

	require('../connect.php');

	$qry1 = "select sum(o.ammountOrdered*p.price) as total from orders o join  products p on o.productID = p.id where o.customerID = 3 and o.statusATM = 'cart'";
	r1 = mysqli_query($conn, $qry1);
	$row = mysqli_fetch_array($r1);
	$one = row['total'];

	$qry2 = "select sum(o.ammountOrdered*p.price) as total from orders o join  products p on o.productID = p.id where o.customerID = 3 and o.statusATM = 'cart'";
	r2 = mysqli_query($conn, $qry2);
	$row = mysqli_fetch_array($r2);
	$two = row['total'];

	if($one == $tow)
	{
		$qry3 = "UPDATE orders SET statusATM ='bought' WHERE customerID=" . $_SESSION['id']. " and statusATM = 'cart'";
		mysqli_query($conn, $qry3);
		header('Location: ../userWelcome.php');
	}
	else
	{
		echo "price has changed";
	}
    
?>