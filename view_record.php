<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.html");
    exit();
}

$dbConnection=new mysqli('localhost', 'root','','reviews');

if($dbConnection->connect_error){
    die("Connection Error: ".$dbConnection->connect_error);
}

$query="SELECT * FROM Reviews_table";
$result =$dbConnection->query($query);

if($result->num_rows>0){
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nickname</th><th>Description</th><th>Assortment Rating</th><th>Service Rating</th><th>Decor Rating</th></tr>";
    while ($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['nickname']."</td>";
    echo "<td>".$row['description']."</td>";
    echo "<td>".$row['assortment_rating']."</td>";
    echo "<td>".$row['service_rating']."</td>";
    echo "<td>".$row['decor_rating']."</td>";
    echo "</tr>";
    }
    echo "</table>";
}
else{
    echo "No record found.";
}

$dbConnection->close();
?>