<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    # PAGE SETUP
    $metaTitle = "MalPals! - Cool Online Friends!";
    $metaDescription = "Introducing MalPals!® The fun interactive friends that totally chill out on your browser! Coming all the way from planet Maltron, these Pals do whatever they can to have fun and be safe.";
    include('../../src/setup.php');
    # /PAGE SETUP
    ?>
    <title>MalPals!</title>
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
            vertical-align: middle;
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
                <p id="introduction">Introducing <b>MalPals!</b>® The fun interactive friends that totally chill out on your browser! Coming all the way from planet Maltron, these Pals do whatever they can to have fun and be safe. The MalPals site has everything you need to become a true Paller, including cool backgrounds, epic games and art from fans! Are you ready???</p>
                <hr>
                <table id="content-table">
                    <tr>
                        <td>
                            <div id="feature-bar">
                                <h2>What's New!</h2>
                                <img id="feature-img" src="src/img/malpal-tubulartriangle.png">
                                <p id="feature-title"><b>Try our newest MalPal FREE!</b></p>
                                <p id="feature-text">Meet Tubular Triangle, your new best bud that lives right on your browser! Escaping into our world through a crazy cosmic wormhole, Tubular Triangle is here to surf along with you. <a href="success.php">Click here</a> to try!</p>
                                <br>
                                <img id="feature-img" src="src/img/WilliamArtwork.jpg">
                                <p id="feature-title"><b>Art Wall Feature!</b></p>
                                <p id="feature-text">This art wall feature is from William P! Thanks Will, we really love your work!</p>
                            </div>
                        </td>
                        <td id="activity-bar">
                            <div id="feature-wall">
                                <h3>Feature Wall!</h3>
                                <p id="featured-paller-title">Today's featured Pallers</p>
                                <p id="featured-paller-text">Sarah W says <i>"i love love love LOVE my pals so so much thank you so much malpals :~) ribbit ~sarah <3"</i></p>
                                <p id="featured-paller-text">Andrew M says <i>"MalPals are the best. All my friends think they're awsome at school."</i></p>
                                <p id="featured-paller-response">Wow! Thanks guys. Send us some email by clicking the mailbox below to be featured!</p>
                                <a id="mailbox" href="mailto:malpals@virtualdream.live"><img src="src/img/mailbx14.gif"></a>
                            </div>
                            <h3>Check out some cool activities!</h3>
                            <table id="extra-goodies-table">
                                <tr>
                                    <td style="width:50px">
                                        <img src="src/img/ball.gif">
                                    </td>
                                    <td style="width:221px">
                                        <p id="activity-title">Games!</p>
                                        <p>Coming Soon!</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:50px">
                                        <img src="src/img/computer.gif">
                                    </td>
                                    <td style="width:221px">
                                        <p id="activity-title">Extra goodies</p>
                                        <p>Download some awesome <a href="backgrounds.php">MalPals Backgrounds</a></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:50px">
                                        <img src="src/img/Earth_Globe.gif">
                                    </td>
                                    <td style="width:221px">
                                        <p id="activity-title">Total Cool Visitors</p>
                                        <p>100893</p>
                                    </td>
                                </tr>
                            </table>
                            <div id="poll">
                                <form>
                                    <p id="poll-title">MalPoll!</p>
                                    <p id="poll-text">Would you be more inclined to purchase a product if it featured MalPal characters on it?</p>
                                    <input type="radio" id="poll-yes" name="poll-response" value="yes">
                                    <label for="poll-yes">Yes</label><br>
                                    <input type="radio" id="poll-no" name="poll-response" value="no">
                                    <label for="poll-no">No</label><br>
                                    <input type="submit" value="Vote">
                                </form>
                            </div>
                        </td>
                    </tr>
                </table>
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