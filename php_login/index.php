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
require('connect.php');
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
	
$query = "SELECT u.username, g.vikt, g.tid FROM Users u JOIN gym g ON u.id = g.$
$result = mysqli_query($conn,$query);

echo "<table>
  <tr>
    <th>name</th>
    <th>price</th>
    <th>ininventory</th>
  </tr>
  ";
  while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['name'] . "</td><td>" . $row['price'] . "</td><td>"  .$row['ininventory']."</td></tr>"; //tr = rad; rd = sak
echo "</tabel>";

?>

</body>
</html>
