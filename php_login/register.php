
<?php
	require('connect.php');
    require('registerform.php');
    // If the values are posted, insert them into the database.
    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['lastname'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];        
        $lastname = $_POST['lastname'];
 
        $sql = "INSERT INTO customers (email, password, firstname, lastname) VALUES ('$email', '$password', '$firstname', '$lastname')";
        if($conn->query($sql) === TRUE){
            header('Location: index.php');
            echo "User Created Successfully.";
        }else{
            echo "User Registration Failed";
        }
    }
$conn->close();
?>