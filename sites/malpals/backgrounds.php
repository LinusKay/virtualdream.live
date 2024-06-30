<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    # PAGE SETUP
    include('../../src/setup.php');
    # /PAGE SETUP
    ?>
    <title>MalPals! - Free Backgrounds</title>
    <script>
        window.addEventListener("load", function() {
            window.addInfection("malPalPyramid");
            window.unlockSticker("malPals");
        });
    </script>
    <style>
        * {
            margin:0;
            padding:0;  
        }
        body {
            font-size:11px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin:auto;
            width:800px;
        }
        #table-main {
            margin:0;
            width:800px; 
            border-spacing: 0;
        }
        #row-main {
            width:800px;
            margin:auto;
        }
        #col-left {
            width:100px;
            height:800px;
            vertical-align: top;
        }
        #bar-left {
            background:gold;
            height:700px;
            width:100px;
            border: solid 2px black;
            border-radius: 0 25px 25px 0;
            overflow: hidden;
        }
        #bar-left #blacktop {
            background:black;
            height:20px;
            width:100px;
            font-weight:bold;
            color:white;
            text-align: center;
            padding-top:5px;
            font-size:10px;
        }
        #col-middle {
            width:550px;
            vertical-align: top;
        }
        #col-right {
            vertical-align: top;
        }
        #bar-right {
            background:#dddd77;
            width:150px;
            border: solid 2px black;
            border-radius: 0 25px 25px 0;
            overflow: hidden;
        }
        #row-footer p {
            font-size:12px;
            color:gray;
            text-align:center;
        }
        #col-footer {
            height:100px;
            width:550px;
        }
        #content-table {
            width:550px;
            margin:0;
            border-spacing: 0;
        }
        #content-table td{
            margin:0;
            vertical-align: top;
            /* border:solid 1px black; */
            width:275px;
            height:300px;
        }
        #feature-bar {
            background: lightyellow;
            width:220px;
            margin:auto;
            padding:10px;
        }
        #feature-heading {
            text-align: center;
        }
        #feature-img {
            width:175px;
            display: block;
            margin:auto;
        }
        a {
            text-decoration:none;
            font-weight:bold;
            color:blue;
        }
        hr {
            width:150px;
            margin:10px auto;
        }
        #activity-bar #activity-title {
            font-weight:bold;
        }
        #introduction {
            font-size:15px;
            padding:10px 30px;
        }
        #site-logo {
            width:300px;
            margin-left:10px;
        }
        #extra-goodies-table td {
            height:50px;
            border-bottom: dashed 1px gray;
        }
        #extra-goodies-table img {
            width:40px;
        }
        #poll {
            width:200px;
            margin:auto;
            padding:10px;
        }
        #poll #poll-title {
            font-weight: bold;
        }
        #poll input[type=radio] {
            margin: 5px 0;
        }
        #poll input[type=submit] {
            padding: 2px 5px;
            border-radius:0;
        }
        #spacer-top {
            height:25px;
            width:100%;
        }
        #col-middle #spacer-top {
            border-bottom:solid 1px black;
        }
        #news-heading {
            padding:5px;
        }
        #news-title {
            font-weight: bold;
            padding:0 5px;
        }
        #news-text {
            padding:0 5px;
        }
        #feature-wall {
            padding:10px;
        }
        #feature-wall #featured-paller-title {
            font-weight:bold;
        }
        #mailbox {
            display:block;
        }
        #mailbox img {
            display:block;
            margin:auto;
        }
        #nav-item {
            height:30px;
            width:100%;
            text-align:center;
            line-height:30px;
        }
        #disclaimer {
            padding:40px;
        }
    </style>
</head>
<body>
    <div id="spacer-top"></div>
    <table id="table-main">
        <tr id="row-main">
            <td id="col-left">
                <div id="bar-left">
                    <marquee id="blacktop">malpals.virtualdream.live</marquee>
                    <div id="nav-item">
                        <a href="https://malpals.virtualdream.live/"><p>Home</p></a>
                    </div>
                    <div id="nav-item">
                        <a href="backgrounds.php"><p>Backgrounds</p></a>
                    </div>
                    <div id="nav-item">
                        <a href="mailto:malpals@virtualdream.live"><p>Mail Us!</p></a>
                    </div>
                </div>
            </td>
            <td id="col-middle">
                <div id="spacer-top"></div>
                <img id="site-logo" src="src/img//malpals-logo.png">
                <p id="introduction">Check out some of the cool and fun backgrounds we've got for you to decorate your PC <b>your</b> way!</p>
                <hr>
                
            </td>
            <td id="col-right">
                <div id="spacer-top"></div>
                <div id="bar-right">
                    <h2 id="news-heading">MalPals News!</h2>
                    <p id="news-title">MalPals unblocked in Europe!</p>
                    <p id="news-text">After a long deliberation with a very cool legal team MalPals has been unblocked within the EU. <i>Welcome! Wilkommen! Bienvenue! Bine ati venit!</i></p>
                    <br>
                    <p id="news-title">MalPal Stickers on Virtual Dream!</p>
                    <p id="news-text">Virtual Dream have created a new sticker featuring our very own Tubular Triangle! You can use it anywhere on ANY Virtual Dream website! Head to the <a href="https://stickers.virtualdream.live/">Virtual Dream stickers page</a> to pick it up</p>
                    <br>
                    <p id="news-title">Get in Touch!</p>
                    <p id="news-text">Hey pallers! We would just <b>love</b> to hear from you all. Got some questions to ask the pals? Want to show off your MalPal fan art? <a href="mailto:malpals@virtualdream.live">Send us some mail</a>, and we might just feature you on the website!</p>
                    <br>
                </div>
            </td>
        </tr>
        <tr id="row-footer">
            <td></td>
            <td id="col-footer">
                <p>© 1999-2024 MalPals - All Rights Reserved</p>
                <p>Hosted by Virtual Dream</p>
            </td>
            </td></td>
        </tr>
    </table>
</body>
</html>