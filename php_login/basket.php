<?php
    session_start();
    require('connect.php');
    //$query = "SELECT name FROM products WHERE id IN (SELECT productID FROM orders WHERE customerID =" . $_SESSION['id'] . ")";
    //$query1 = "SELECT ammountOrdered FROM orders WHERE customerID =" . $_SESSION['id'];
    $query2 = "SELECT o.id, p.name, o.ammountOrdered FROM orders o JOIN products p ON p.id = o.productID WHERE o.customerID=" . $_SESSION['id'];
    //$result = mysqli_query($conn, $query);
    //$result1 = mysqli_query($conn, $query1);
    $result2 = mysqli_query($conn, $query2);
    //$a = array();
    //$b = array();
    //while($row = mysqli_fetch_array($result)){
    //    $a[]= $row['name'];
    //}
    //while($row1 = mysqli_fetch_array($result1)){
    //    $b[]= $row1['ammountOrdered'];
    //}
    //$c = array_combine($a, $b);
    echo "<table>
	  <tr>
		<th>name</th>
		<th>number in basket</th>
	  </tr>
	  ";
        while($row = mysqli_fetch_array($result2)){
		    echo "<tr><td>" . $row['name'] . "</td><td>" . $row['ammountOrdered'] . "</td><td><form action=remove_from_cart.php method='post'><input type='hidden' name='b' value=".$row['id']."><br><input type='submit' value='Remove'></form></td></tr>"; //tr = rad; rd = sak
        }
        //foreach($c as $key => $value){
        //    echo "<tr><td> $key </td><td> $value </td><td><button>Remove</button></td></tr>";
        //}

	echo "</tabel>";
?>