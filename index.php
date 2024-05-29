<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTTF-8">
        <title>Review our Radiowęzeł!</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="content">
            <h1>Rate Us!</h1>
            <form id="form">
            <input type="text" id="nick" placeholder="Nickname"><br></br>
            Rate our selection of beverages and desserts:
            <input list="assortmentRate" name="assortment" id="assortment">
            <datalist id="assortmentRate">
                <option value="1">
                <option value="2">
                <option value="3">
                <option value="4">
                <option value="5">
            </datalist><br></br>
            Rate our service:
            <input list="serviceRate" name="service" id="service">
            <datalist id="serviceRate">
                <option value="1">
                <option value="2">
                <option value="3">
                <option value="4">
                <option value="5">
            </datalist><br></br>
            Rate our decor:
            <input list="decorRate" name="decor" id="decor">
            <datalist id="decorRate">
                <option value="1">
                <option value="2">
                <option value="3">
                <option value="4">
                <option value="5">
            </datalist><br></br>
            <textarea id="review" placeholder="Say something about us.."></textarea><br></br>
            <button type="submit" id="submit">Send review</button>
            </form>
        </div>
    </body>
</html>