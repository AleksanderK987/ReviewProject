<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <script src="javascript.js"></script>
    <link rel="stylesheet" href="css/viewRecords.css">
</head>
<body>
<div class="container">
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

$query="SELECT * FROM reviews_table";
$result =$dbConnection->query($query);

if($result->num_rows>0){
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nickname</th><th>Description</th><th>Assortment Rating</th><th>Service Rating</th><th>Decor Rating</th><th>Date</th><th>Time</th></tr>";
    while ($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['nickname']."</td>";
        echo "<td>".$row['description']."</td>";
        echo "<td>".$row['assortment_rating']."</td>";
        echo "<td>".$row['service_rating']."</td>";
        echo "<td>".$row['decor_rating']."</td>";
        echo "<td>".$row['date']."</td>";
        echo "<td>".$row['time']."</td>";
        echo "<td><button onClick='deleteReview(".$row['id'].")'>Delete</button></td>";
        echo "</tr>";
    }
    echo "</table>";
}
else{
    echo "No record found.";
}

$dbConnection->close();
?>
</div>
</body>
</html>