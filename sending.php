<?php
    $dbConnection = new mysqli('localhost','root','','reviews');

    if($dbConnection->connect_error){
        die("Connection Error: ".$dbConnection->connect_error);
    }

    if(isset($_POST['nick']) && isset($_POST['review']) && isset($_POST['assortment']) && isset($_POST['service']) && isset($_POST['decor'])){
        
        if($_POST['nick']!=NULL && $_POST['assortment']!=NULL && $_POST['service']!=NULL && $_POST['decor']!=NULL){

        $nickname = $_POST['nick'];
        $assortment_rating = $_POST['assortment'];
        $service_rating = $_POST['service'];
        $decor_rating = $_POST['decor'];

        $date=date("y-m-d");
        $time=date("H:i:s");
        
        $description = $_POST['review'];
        if($_POST['review']==NULL) $description='No description was given.';
        $query = "INSERT INTO reviews_table (nickname, description, assortment_rating, service_rating, decor_rating, date, time) VALUES ('$nickname','$description','$assortment_rating','$service_rating','$decor_rating','$date','$time');";

        if($dbConnection->query($query)===TRUE){
            $response =array ('status' => 'success','message'=> 'New record has been added.');
            echo json_encode($response);
        }
        else{
            $response = array('status' => 'error', 'message' => 'Database query failed.');
            echo json_encode($response);
        }
        }
        else{
            $response=array('status'=> 'error','message'=>'Your name and number for each category has to be fullfiled to send a review!');
            echo json_encode($response);
        }
    }
    else {
        $response =array ('status' => 'error','message'=> 'Missing required POST parameters.');
        echo json_encode($response);
    }


    $dbConnection->close();
?>