<?php
    session_start();
    require('connect.php');
    $query2 = "SELECT o.id, p.name, o.ammountOrdered FROM orders o JOIN products p ON p.id = o.productID WHERE o.customerID=" . $_SESSION['id'];

    $result2 = mysqli_query($conn, $query2);
    echo "<a href='userWelcome.php'>Back to store</a>";

    echo "<table>
	  <tr>
		<th>name</th>
		<th>number in basket</th>
	  </tr>
	  ";
        while($row = mysqli_fetch_array($result2)){
		    echo "<tr><td>" . $row['name'] . "</td><td>" . $row['ammountOrdered'] . "</td><td><form action=action/remove_from_cart.php method='post'><input type='hidden' name='b' value=".$row['id']."><br><input type='submit' value='Remove'></form></td></tr>"; //tr = rad; rd = sak
        }
        //foreach($c as $key => $value){
        //    echo "<tr><td> $key </td><td> $value </td><td><button>Remove</button></td></tr>";
        //}

	echo "</tabel>";
?>