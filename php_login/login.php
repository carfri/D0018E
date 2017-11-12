<?php
$servername = "utbweb.its.ltu.se";
$username = "jacekl-5";
$password = "jacekl-5";
$dbname = "jacekl5db";

session_start();

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$username = trim($_POST['username']);
$password = trim($_POST['password']);

$qry = 'Select id,username from Users where username="'.$username.'" and password="'.$password.'"';
$result = mysqli_query($conn,$qry);
//print_r ($result);
if(!$result || mysqli_num_rows($result) <= 0){
	echo "Hey buddy, I think you've got the wrong door, the leather club's two blocks down.";
}	else 	{
	$row = mysqli_fetch_assoc($result);
	$_SESSION['id'] = $row['id'];
	$_SESSION['username'] = $row['username'];
	header("Location: index.php");
		
}

$conn->close();
exit();
?>