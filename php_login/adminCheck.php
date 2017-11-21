session_start();

<?php
	require('connect.php');
    
    //chek if user is admin status
    $result = $conn->query("SELECT id FROM customers WHERE isAdmin = '1'");
    if($result->num_rows == 0){
        header('Location: userWelcome.php');
    }else {
        header('location: adminWelcome.php');
    }
$conn->close();
?>