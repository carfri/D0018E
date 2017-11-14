<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Dank website</title>
</head>

<body>
<?php
if (!isset($_SESSION['id']))
{
	echo "<form action=login.php method='post'>
	Username: <input type='text' name='username'><br>
	Password: <input type='password' name='password'><br>
	<input type='submit' value='login'>
	</form>
	";
	echo "<a href='registerform.php'>Register</a>";
}
else	
{
	echo "Hello " . $_SESSION['username'] . ".";
	echo "<a href='logout.php'>Logout</a>";

}
?>

</body>
</html>
