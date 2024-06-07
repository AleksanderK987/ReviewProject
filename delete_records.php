<?php
session_start();

$dbConnection = new mysqli('localhost','root','','reviews');

if ($dbConnection->connect_error){
    die("Connection Error: ".$dbConnection->connect_error);
}

if(isset($_GET['id'])){
    $id=intval($_GET['id']);

    $sql="DELETE FROM reviews_table WHERE id = $id";

    if($dbConnection->query($sql)===TRUE){
        echo json_encode(["status" => "success", "message" => "Review deleted successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $dbConnection->error]);
    }
}
else{
    echo json_encode(["status" => "error", "message" => "Missing required GET parameters."]);
}

$dbConnection->close();

?>