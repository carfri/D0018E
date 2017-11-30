
<?php
    require('connect.php');
    require('registerform.php');
    // If the values are posted, insert them into the database.
    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['city']) && isset($_POST['address'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];        
        $lastname = $_POST['lastname'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        echo 'got this far';
 
        $sql = "INSERT INTO customers (email, password, firstname, lastname,shipment_address, shipment_city, isAdmin) VALUES ('$email', '$password', '$firstname', '$lastname','$address', '$city', '0')";
        if($conn->query($sql) === TRUE){
            header('Location: index.php');
            echo "User Created Successfully.";
        }else{
            echo "User Registration Failed";
        }
    }
$conn->close();
?>