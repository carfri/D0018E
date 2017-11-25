<?php
session_start();

require('connect.php');

$username = trim($_POST['username']);
$password = trim($_POST['password']);

$qry = "SELECT email, password, isAdmin FROM customers WHERE email='$username' and password='$password'";
$result = mysqli_query($conn,$qry);
//print_r ($result);
if(!$result || mysqli_num_rows($result) <= 0){
	echo "Hey buddy, I think you've got the wrong door, the leather club's two blocks down.";
}else{
	$row = mysqli_fetch_assoc($result);
	$_SESSION['email'] = $row['email'];
    $_SESSION['isAdmin'] = $row['isAdmin'];
    if($_SESSION['isAdmin'] == '1'){
        header('Location: adminWelcome.php');
	}else {
        header('Location: userWelcome.php');
    }
}

$conn->close();
exit();
?>