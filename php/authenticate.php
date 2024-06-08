<?php
session_start();

$dbConnection = new mysqli('localhost','root','','reviews');

if ($dbConnection->connect_error){
    die("Connection Error: ".$dbConnection->connect_error);
}

if(isset($_POST['username']) && isset($_POST['password'])){

    //adding admin profile with hashed password
    $adminPassword=password_hash("Admin",PASSWORD_DEFAULT);
    $dbConnection->query("REPLACE INTO users (user_id, username, password) VALUES (1, 'Admin', '$adminPassword');");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $dbConnection->prepare("SELECT * FROM users WHERE username = ?");
    $query->bind_param("s", $username);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: view_records.php");
            exit();
        }
    else{
        echo "Invalid credentials.";
    }
    }
    else{ "Invalid credentials.";
    }

    $query->close();
}
else{
    echo "Missing required POST parameters.";
}
// Close the database connection
$dbConnection->close();
?>