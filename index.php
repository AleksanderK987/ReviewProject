<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTTF-8">
        <meta name="viewport" content="width=device-width, inital-scale=1.0"> 
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
                    <input type="text" id="nick" name="nick" placeholder="Type.." required><sup> *</sup><br></br>
                    Our selection of beverages and desserts:
                    <input list="assortmentRate" name="assortment" id="assortment" required><sup> *</sup>
                    <datalist id="assortmentRate">
                        <option value=1>
                        <option value=2>
                        <option value=3>
                        <option value=4>
                        <option value=5>
                    </datalist><br></br>
                    Our service:
                    <input list="serviceRate" name="service" id="service" required><sup> *</sup>
                    <datalist id="serviceRate">
                        <option value=1>
                        <option value=2>
                        <option value=3>
                        <option value=4>
                        <option value=5>
                    </datalist><br></br>
                    Our decor:
                    <input list="decorRate" name="decor" id="decor" required><sup> *</sup>
                    <datalist id="decorRate">
                        <option value=1>
                        <option value=2>
                        <option value=3>
                        <option value=4>
                        <option value=5>
                    </datalist><br></br>
                    We will be delighted if you would like to share more with us:<br></br>
                    <textarea id="review" name="review" placeholder="Type.."></textarea><br></br>
                    <sup>* - required</sup><br></br>
                    <button type="button" onClick="sendReview()">Send review</button>
                    <button type="button" onClick="window.location.href='login.html'">Log In</button>
                </form>
            </div>
            <div id="response"></div>
            <div class="reviewContainer">
                <!-- PLACEHOLDER!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

                <?php
                    $dbConnection=new mysqli('localhost', 'root','','reviews');

                    if($dbConnection->connect_error){
                        die("Connection Error: ".$dbConnection->connect_error);
                    }
                    
                    $query="SELECT * FROM Reviews_table";
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
                           echo "<div class='reviewRates'>Asortyment: ".$row['assortment_rating']." Serwis: ".$row['service_rating']." Wsytroj: ".$row['decor_rating']."</div>";
                        echo "</div>";
                        echo "<p><div class='reviewDesc'>Opis: ".$row['description'];
                        echo "</div></p>";
                    echo "</div>";
                        }
                    }
                    else{
                        echo "No reviews yet.";
                    }
                    $dbConnection->close();
                ?>


                    <!-- <div class="reviewView">
                        <div class="reviewHeader">
                            <div class="reviewNick">Imie</div> 
                            <div class="reviewRates">Asortyment: $ocena Serwis: $ocena Wystroj: $ocena</div>
                        </div>
                        <p><div class="reviewDesc">Opis: Imma git init JAKIES RANDOMOWE SLOWA ZEBYS ZOABCZYL ZE SCROLL DZIALA AEAEAEAEAEAEOOEOEOEOEOEOAOEOAEOAOEOAEOAOEAOEOAEOAEOE JSHDJSDHJSHDJSHDJSDHJS SJHDJSDHJSHDSJHDJSHDJSHDJSHDJSHD
                        </div></p>
                    </div>

                    <div class="reviewView">
                        <div class="reviewHeader">
                            <div class="reviewNick">Ragro</div> 
                            <div class="reviewRates">Asortyment: 3 Serwis: 2 Wystroj: 1</div>
                        </div>
                        <p><div class="reviewDesc">Opis: Moim zdaniem to nie ma tak, że dobrze albo że nie dobrze. Gdybym miał powiedzieć, co cenię w życiu najbardziej, powiedziałbym, że ludzi. Ekhm… Ludzi, którzy podali mi pomocną dłoń, kiedy sobie nie radziłem, kiedy byłem sam. I co ciekawe, to właśnie przypadkowe spotkania wpływają na nasze życie. Chodzi o to, że kiedy wyznaje się pewne wartości, nawet pozornie uniwersalne, bywa, że nie znajduje się zrozumienia, które by tak rzec, które pomaga się nam rozwijać. Ja miałem szczęście, by tak rzec, ponieważ je znalazłem. I dziękuję życiu. Dziękuję mu, życie to śpiew, życie to taniec, życie to miłość. Wielu ludzi pyta mnie o to samo, ale jak ty to robisz? Skąd czerpiesz tę radość? A ja odpowiadam, że to proste, to umiłowanie życia, to właśnie ono sprawia, że dzisiaj na przykład buduję maszyny, a jutro… kto wie, dlaczego by nie, oddam się pracy społecznej i będę ot, choćby sadzić… znaczy… marchew.
                        </div></p>
                    </div>

                    <div class="reviewView">
                        <div class="reviewHeader">
                            <div class="reviewNick">Gaja</div> 
                            <div class="reviewRates">Asortyment: 2 Serwis: 1 Wystroj: 37</div>
                        </div>
                        <p><div class="reviewDesc"> Litwo, Ojczyzno moja! ty jesteś jak zdrowie;
                                                    Ile cię trzeba cenić, ten tylko się dowie,
                                                    Kto cię stracił. Dziś piękność twą w całej ozdobie
                                                    Widzę i opisuję, bo tęsknię po tobie.

                                                    Panno święta, co Jasnej bronisz Częstochowy
                                                    I w Ostrej świecisz Bramie! Ty, co gród zamkowy
                                                    Nowogródzki ochraniasz z jego wiernym ludem!
                                                    Jak mnie dziecko do zdrowia powróciłaś cudem
                                                    (— Gdy od płaczącej matki, pod Twoją opiekę
                                                    Ofiarowany martwą podniosłem powiekę;
                                                    I zaraz mogłem pieszo, do Twych świątyń progu
                                                    Iść za wrócone życie podziękować Bogu —)
                                                    Tak nas powrócisz cudem na Ojczyzny łono!...
                                                    Tymczasem, przenoś moją duszę utęsknioną
                                                    Do tych pagórków leśnych, do tych łąk zielonych,
                                                    Szeroko nad błękitnym Niemnem rozciągnionych;
                                                    Do tych pól malowanych zbożem rozmaitem,
                                                    Wyzłacanych pszenicą, posrebrzanych żytem;
                                                    Gdzie bursztynowy świerzop, gryka jak śnieg biała,
                                                    Gdzie panieńskim rumieńcem dzięcielina pała,
                                                    A wszystko przepasane jakby wstęgą, miedzą
                                                    Zieloną, na niej zrzadka ciche grusze siedzą
                        </div></p>
                    </div> -->
            </div>
        </div>
    </body>
</html>