<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTTF-8">
        <meta name="viewport" content="width=device-width, inital-scale=1.0"> 
        <title>Review our Radiowęzeł!</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <img src="pictures/logo.png" alt="Our logo" width="150" height="150">
            <h1>Rate Us!</h1>
            <form id="form">
            <input type="text" id="nick" name="nick" placeholder="Your name"><br></br>
            Our selection of beverages and desserts:
            <input list="assortmentRate" name="assortment" id="assortment">
            <datalist id="assortmentRate">
                <option value=1>
                <option value=2>
                <option value=3>
                <option value=4>
                <option value=5>
            </datalist><br></br>
            Our service:
            <input list="serviceRate" name="service" id="service">
            <datalist id="serviceRate">
                <option value=1>
                <option value=2>
                <option value=3>
                <option value=4>
                <option value=5>
            </datalist><br></br>
            Our decor:
            <input list="decorRate" name="decor" id="decor">
            <datalist id="decorRate">
                <option value=1>
                <option value=2>
                <option value=3>
                <option value=4>
                <option value=5>
            </datalist><br></br>
            <textarea id="review" name="review" placeholder="Say something about us!"></textarea><br></br>
            <button type="button" onClick="sendReview()">Send review</button>
            <button type="button" onclick="window.location.href='login.html'">Log in</button>
            </form>
        </div>

        <div id="response"></div>
        <script src="javascript.js"></script>
    </body>
</html>