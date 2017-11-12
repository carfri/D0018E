<?php session_start(); ?>
<html>
<head>
<title>Dank website</title>
</head>
<body>

<?php

include_once("connect.php");
if (!isset($_SESSION['id']))
{
	echo "<form action=login.php method='post'>
	Username: <input type='text' name='username'><br>
	Password: <input type='password' name='password'><br>
	<input type='submit' value='login'>
	</form>
	";
}
else	
{
	echo "Hello " . $_SESSION['username'] . ".";
	echo "<a href='logout.php'>Logout</a>";
}

$query = "SELECT * FROM products"; //You don't need a ; like you do in SQL
$result = mysqli_query($conn,$query);

echo "<table>
  <tr>
    <th>Namn</th>
    <th>Pris</th> 
    <th>Lager</th>
  </tr>
  ";
  
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['product_name'] . "</td><td>" . $row['product_price'] . "</td><td>"  .$row['product_ininventory']."</td></tr>"; //tr = rad; rd = sak 
}

echo "</table>"; //Close the table in HTML


mysqli_close($conn); 
?>

</body>
</html>
