<html>
	<head>
		<title>ADMIN</title>
	</head>
	<body>
		<a href="index.php"> Take me back </a>
		<?php
			require('connect.php');
			session_start();
			if(isset($_SESSION['isAdmin']) AND $_SESSION['isAdmin'] == 1)
			{
				echo "<br>Ship<br>";
				echo "<form action=action/ship.php method='post'>
				id: <input type='text' name='id'><br>
				<input type='submit' value='ship'>
				</form>
				";
				
				
				$query = "SELECT o.id, o.ammountOrdered, p.name, c.email, c.firstname, c.lastname, c.shipment_address, shipment_city FROM orders o  join customers c  on o.customerID = c.id join products p on p.id = o.productID WHERE statusATM = 'bought'";
				$result = mysqli_query($conn,$query);
				
				echo "<table>
				<tr>
				<th>id</th>
				<th>name</th>
				<th>email</th>
				<th>ammountOrdered</th>
				<th>firstname</th>
				<th>lastname</th>
				<th>shipment_address</th>
				<th>shipment_city</th>
					</tr>
				  ";
				while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
					echo "<tr><td>   " . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td> <td>"  .$row['ammountOrdered']."</td> <td>"  .$row['firstname']."</td> <td>"  .$row['lastname']."</td><td>"  .$row['shipment_address']."</td><td>"  .$row['shipment_city']."</td></tr>"; //tr = rad; rd = sak
				}
				echo "</tabel>";
			}
			else
			{
				echo "Only Admins";
			}
		?>
	</body>

</html>