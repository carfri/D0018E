<?php
	session_start();
	$id = trim($_POST['id']);
	require('../connect.php');
    $qry1 = "select productID, ammountOrdered from orders where id = '$id'";
	$result1 = mysqli_query($conn,$qry1);
	$row = mysqli_fetch_assoc($result1);
	$pid = $row['productID'];
	$orderd = $row['ammountOrdered'];
	
	$qry2 = "select ininventory from products where id = '$pid'";
	$result2 = mysqli_query($conn,$qry2);
	$row = mysqli_fetch_assoc($result2);
	$ininventory = $row['ininventory'];
	
	if($orderd>$ininventory)
	{
		echo "Finns ej tilräcklig i lagger";
	}
	else
	{
		$qry3 = "UPDATE orders SET statusATM ='shiped' WHERE id = '$id'";
		$result3 = mysqli_query($conn,$qry3);
		
		$qry4 = "UPDATE products SET ininventory=ininventory-'$orderd' WHERE id = '$pid'";
		$result2 = mysqli_query($conn,$qry4);
		
		header('Location: ../orders.php');
	}

	
	
    mysqli_query($conn, $qry2);
    
?>