<?php
    session_start();
    require('connect.php');
    $query = "SELECT name FROM products WHERE id IN (SELECT productID FROM orders WHERE customerID =" . $_SESSION['id'] . ")";
    $query1 = "SELECT ammountOrdered FROM orders WHERE customerID =" . $_SESSION['id'];
    $result = mysqli_query($conn, $query);
    $result1 = mysqli_query($conn, $query1);
    $a = array();
    $b = array();
    while($row = mysqli_fetch_array($result)){
        $a[]= $row['name'];
    }
    while($row1 = mysqli_fetch_array($result1)){
        $b[]= $row1['ammountOrdered'];
    }
    $c = array_combine($a, $b);
    echo "<table>
	  <tr>
		<th>name</th>
		<th>number in basket</th>
	  </tr>
	  ";
        foreach($c as $key => $value){
            echo "<tr><td> $key </td><td> $value </td><td><button>Remove</button></td></tr>";
        }

	echo "</tabel>";
?>