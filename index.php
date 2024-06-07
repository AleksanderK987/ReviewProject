<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Review our Radiowęzeł!</title>
        <script src="javascript.js"> </script>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="wrapper">
            <div class="container">
                <img src="pictures/logo.png" alt="Our logo" width="150" height="150">
                <h1>Rate Us!</h1>
                <form id="form">
                    Your name:
                    <input type="text" id="nick" name="nick" placeholder="Type.." required><sup> *</sup><br><br>
                    Our selection of beverages and desserts:
                    <select list="assortmentRate" name="assortment" id="assortment" required><sup> *</sup>
                    <option value="">--SELECT--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    </select><br></br>
                    Our service:
                    <select list="serviceRate" name="service" id="service" required><sup> *</sup>
                    <option value="">--SELECT--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    </select><br></br>
                    Our decor:
                    <select list="decorRate" name="decor" id="decor" required><sup> *</sup>
                    <option value="">--SELECT--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    </select><br></br>
                    We will be delighted if you would like to share more with us:<br></br>
                    <textarea id="review" name="review" placeholder="Type.."></textarea><br></br>
                    <sup>* - required</sup><br></br>
                    <button type="button" onClick="sendReview()">Send review</button>
                    <button type="button" onClick="window.location.href='login.html'">Log In</button>
                </form>
            </div>
            <div class="reviewContainer">
                <?php
                    $dbConnection=new mysqli('localhost', 'root','','reviews');

                    if($dbConnection->connect_error){
                        die("Connection Error: ".$dbConnection->connect_error);
                    }
                    
                    $query="SELECT * FROM Reviews_table ORDER BY date DESC, time DESC";
                    $result =$dbConnection->query($query);

                    if($result->num_rows>0){
                        while ($row = $result->fetch_assoc()){
                            $year=substr($row['date'],2,2);
                            $month=substr($row['date'],5,2);
                            $day=substr($row['date'],8,2);
                            $hour=substr($row['time'],0,5);
                       echo "<div class='reviewView'>";
                       echo "<div class='reviewHeader'>";
                           echo "<div class='reviewNick'>".$row['nickname']." $day/$month/$year $hour</div>";
                           echo "<div class='reviewRates'>Assortment: ".$row['assortment_rating']." Service: ".$row['service_rating']." Decor: ".$row['decor_rating']."</div>";
                        echo "</div>";
                        echo "<p><div class='reviewDesc'>".$row['description'];
                        echo "</div></p>";
                    echo "</div>";
                        }
                    }
                    else{
                        echo "No reviews yet.";
                    }
                    $dbConnection->close();
                ?>
            </div>
        </div>
    </body>
</html>