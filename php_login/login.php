<?php
session_start();

require('connect.php');

$username = trim($_POST['username']);
$password = trim($_POST['password']);

$qry = "SELECT id,email, password, isAdmin FROM customers WHERE email='$username' and password='$password'";
$result = mysqli_query($conn,$qry);
//print_r ($result);
if(!$result || mysqli_num_rows($result) <= 0){
	echo "Fel";
}else{
	$row = mysqli_fetch_assoc($result);
	$_SESSION['email'] = $row['email'];
    $_SESSION['isAdmin'] = $row['isAdmin'];
	$_SESSION['id'] = $row['id'];
    if($_SESSION['isAdmin'] == '1'){
        header('Location: adminWelcome.php');
	}else {
        header('Location: userWelcome.php');
    }
}

$conn->close();
exit();
?>