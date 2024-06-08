<?php
    // Database connection
    $dbConnection = new mysqli('localhost','root','','reviews');
    
    // Check connection
    if($dbConnection->connect_error){
        die("Connection Error: ".$dbConnection->connect_error);
    }

    // Check if all required POST parameters are set
    if(isset($_POST['nick']) && isset($_POST['review']) && isset($_POST['assortment']) && isset($_POST['service']) && isset($_POST['decor'])){
        
        // Check if required fields are not empty
        if($_POST['nick']!=NULL && $_POST['assortment']!=NULL && $_POST['service']!=NULL && $_POST['decor']!=NULL){

        $nickname = $_POST['nick'];
        $assortment_rating = $_POST['assortment'];
        $service_rating = $_POST['service'];
        $decor_rating = $_POST['decor'];

        $date=date("y-m-d");
        $time=date("H:i:s");
        
        $description = $_POST['review'];
        if($_POST['review']==NULL) $description='No description was given.';
        
         // Use prepared statements to avoid SQL injection
         $query = $dbConnection->prepare("INSERT INTO reviews_table (nickname, description, assortment_rating, service_rating, decor_rating, date, time) VALUES (?, ?, ?, ?, ?, ?, ?)");
         $query->bind_param("ssiiiss", $nickname, $description, $assortment_rating, $service_rating, $decor_rating, $date, $time);

         if ($query->execute()) {
             $response = array('status' => 'success', 'message' => 'New record has been added.');
             echo json_encode($response);
         } else {
             $response = array('status' => 'error', 'message' => 'Database query failed: ' . $query->error);
             echo json_encode($response);
         }

         // Close the prepared statement
         $query->close();
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

    // Close the database connection
    $dbConnection->close();
?>