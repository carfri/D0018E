<html>
	<head>
		<title>ADMIN</title>
	</head>
	<body>
		<?php
			require('connect.php');
			session_start();
			if(isset($_SESSION['isAdmin']) AND $_SESSION['isAdmin'] = 1)
			{
				echo "<h1>admin</h1><br>";
				echo "<form action=additem.php method='post'>
				name: <input type='text' name='name'><br>
				price: <input type='text' name='price'><br>
				ininventory: <input type='text' name='ininventory'><br>
				<input type='submit' value='add'>
				</form>
				";
				echo "<br><br>";
				echo "<form action=delitem.php method='post'>
				id: <input type='text' name='id'><br>
				<input type='submit' value='remove'>
				</form>
				";
				
				$query = "SELECT * FROM products";
				$result = mysqli_query($conn,$query);
				
				echo "<table>
			  <tr>
				<th>id</th>
				<th>name</th>
				<th>price</th>
				<th>ininventory</th>
			  </tr>
			  ";
				while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
				echo "<tr><td>   " . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['price'] . "</td><td>"  .$row['ininventory']."</td></tr>"; //tr = rad; rd = sak
				}
				echo "</tabel>";
				
			}
			else
			{
				echo "Only for admins";
			}

		?>
	</body>
</html>