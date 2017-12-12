<?php
	require('connect.php');
    echo "<a href='userWelcome.php'>Store front</a>";
	$product = $_GET['id'];
	$query = "SELECT name, price, ininventory FROM products WHERE id = '" . $product . "'" ;
	$query1 = "SELECT cus.email, c.comment, c.rating FROM comments c JOIN customers cus ON cus.id = c.customerID WHERE c.productID = " . $product;
	$query2 = "select avg(rating) as avg from comments where productid = '$product'";
    $result = mysqli_query($conn, $query);
	$result1 = mysqli_query($conn, $query1);	
	$result2 = mysqli_query($conn, $query2);

	$row = mysqli_fetch_array($result);
	echo "<h1>" . $row['name'] ."</h1><br>| Price: " . $row['price'] . " | Inventory: " . $row['ininventory'] . " |" ; 

	$row = mysqli_fetch_array($result2);
	echo "avg rating : ";
	echo $row['avg'];
	
	echo "<br>Add comment<br>";
				echo "<form action=action/addc.php method='post'>
				<input type='hidden' name='id'value=" . $product . ">
				comment: <input type='text' name='comment'><br>
				rating: <input type='text' name='rating'><br>
				<input type='submit' value='change'>
				</form>
				";
	
    echo "<table>
	  <tr>
		<th>| User |</th>
		<th>| comment |</th>
		<th>| rating |</th>
	  </tr>
	  ";
        while($row = mysqli_fetch_array($result1)){
		    echo "<tr><td>" . $row['email'] . "</td><td>" . $row['comment'] . " </td><td> " . $row['rating'] . "</td></tr>"; //tr = rad; rd = sak
        }

	echo "</tabel>";
?>