<?php
session_start();

$dbConnection = new mysqli('localhost','root','','reviews');

if ($dbConnection->connect_error){
    die("Connection Error: ".$dbConnection->connect_error);
}

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password=password_hash($password,PASSWORD_DEFAULT);

    //hashing passwords could be added
    $query="SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result=$dbConnection->query($query);

    if($result->num_rows==1){
        $_SESSION['username']=$username;
        header("Location: view_records.php");
        exit();
    }
    else{
        echo "Invalid credentials.";
    }
}
else{
    echo "Missing required POST parameters.";
}

$dbConnection->close();

?>