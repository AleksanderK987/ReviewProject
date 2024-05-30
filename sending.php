<?php
    $dbConnection = new mysqli('localhost','root','','reviews');

    if($dbConnection->connect_error){
        die("Connection Error: ".$dbConnection->connect_error);
    }

    if(isset($_POST['nick']) && isset($_POST['review']) && isset($_POST['assortment']) && isset($_POST['service']) && isset($_POST['decor'])){
        $nickname = $_POST['nick'];
        $description = $_POST['review'];
        $assortment_rating = $_POST['assortment'];
        $service_rating = $_POST['service'];
        $decor_rating = $_POST['decor'];

        $query = "INSERT INTO reviews_table (nickname, description, assortment_rating, service_rating, decor_rating) VALUES ('$nickname','$description','$assortment_rating','$service_rating','$decor_rating');";

        if($dbConnection->query($query)===TRUE){
            $response =array ('status' => 'success','message'=> 'New record has been added.');
            echo json_encode($response);
        }
        else{
            $response = array('status' => 'error', 'message' => 'Database query failed.');
            echo json_encode($response);
        }
    }
        else {
            $response =array ('status' => 'error','message'=> 'Missing required POST parameters.');
            echo json_encode($response);
        }


    $dbConnection->close();
?>