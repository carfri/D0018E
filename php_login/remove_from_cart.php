<?php
    session_start();
    require('connect.php');

    $id = trim($_POST['b']);
    $qry = "DELETE FROM orders WHERE id = '$id'";
    mysqli_query($conn,$qry);

    header('Location: basket.php');

    $conn->close();
    exit();
?>