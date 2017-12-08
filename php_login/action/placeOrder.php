<?php
	session_start();

	require('../connect.php');
    $qry2 = "UPDATE orders SET statusATM ='bought' WHERE customerID=" . $_SESSION['id']. " and statusATM = 'cart'";
    mysqli_query($conn, $qry2);
    
?>