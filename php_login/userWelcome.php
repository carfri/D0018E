<?php
	session_start();
	echo "Hello " . $_SESSION['email'] . ".";
	require('connect.php');
	$query = "SELECT * FROM products";
	$result = mysqli_query($conn,$query);

	echo "<table>
	  <tr>
		<th>name</th>
		<th>price</th>
		<th>ininventory</th>
	  </tr>
	  ";
		while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
		echo "<tr><td>" . $row['name'] . "</td><td>" . $row['price'] . "</td><td>"  .$row['ininventory']."</td><td><form action=action/add_to_cart.php method='post'><input type='hidden' name='b' value=".$row['id']."><br><input type='submit' value='Buy'></form></td></tr>"; //tr = rad; rd = sak
	}
	echo "</tabel>";
    
	echo "<a href='basket.php'>Basket</a>";    

?>