<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Tyg</title>
	</head>
	<body>
	<?php
	require('connect.php');

	if (!isset($_SESSION['email']))
	{
		echo "<form action=action/login.php method='post'>
		Username: <input type='text' name='username'><br>
		Password: <input type='password' name='password'><br>
		<input type='submit' value='login'>
		</form>
		";
		echo "<a href='registerform.php'>Register</a>";
	}
	else	
	{
		echo "Hello " . $_SESSION['email'] . ".";
		echo "<a href='logout.php'>Logout</a>";

	}

	?>

	</body>
</html>
