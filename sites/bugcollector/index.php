<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bug Collector</title>
    <?php 
        # PAGE SETUP
        include('../../src/setup.php');
        # /PAGE SETUP
    ?>
    <style>
        @font-face {
            font-family: 'bugCollector';
            src: url('bloodcrow.ttf')
        }
        body {
            background:black;
            text-align:center;
        }
        .dialogue {
            margin:10px auto;
            background:wheat;
            width:450px;
            min-height:105px;
            position:relative;
            overflow:visible;
            display:block;
            padding:10px;
            border-radius:6px;
            border:solid 1px #333;
            font-family: 'bugCollector';
            font-size:21px;
        }
        .dialogue .name {
            font-weight:bold;
            opacity:0.6;
        }
        .dialogue .subtitle {
            opacity:0.4;
        }
        .dialogue .avatar {
            width:75px;
            float:left;
            border: outset 3px black;
            box-sizing: border-box;
        }
        .dialogue p {
            float:left;
            margin:0 5px;
            width:350px;
            position:relative;
            display:block;
        }
        .bugcollector {
            height:200px;
            margin:10px;
        }
        .burg {
            width:100px;
            margin:auto;
            display:block;
        }
        .placeholdersource {
            color:gray;
        }
    </style>
    <script>
        window.addEventListener("load", () => {
            updateCounterFromCookie();
            setupButton();
            console.log("A");
        });
        function updateCounterFromCookie() {
            const bugCountCookie = Cookies.get('bugCount');
            let bugCount = bugCountCookie ? JSON.parse(bugCountCookie) : 0;
            const bugCounter = document.getElementById("bugcount");
            bugCounter.innerText = bugCount;
        }
        function updateCookieFromCounter() {
            const bugCounter = document.getElementById("bugcount");
            const bugCount = bugCounter.innerText;
            Cookies.set('bugCount', JSON.stringify(bugCount), { domain: '<?php echo $baseDomain?>' , path: '/' });
        }
        function setupButton() {
            const button = document.getElementById("stopstart");
            if(window.infectionExists("bugcollector")) {
                button.innerText = "stop hunting";
                button.onclick = function() { stopHunting(); }
            }
            else {
                button.innerText = "start hunting";
                button.onclick = function() { startHunting(); }
            }
        }
        function startHunting() {
            addInfection("bugcollector");
            setupButton();
        }
        function stopHunting() {
            removeInfection("bugcollector");
            setupButton();
        }
    </script>
</head>
<body>
    <p class="placeholdersource">placeholder image by plastiboo: https://www.instagram.com/p/C4bVgonqWGm/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==</p>
    <img src="bugcollector2.png" class="bugcollector">

    <div class="dialogue">
        <img class="avatar" src="bugcollector2.png">
        <p>
            <span class="name">BUG COLLECTOR</span><br>
            <span class="subtitle">Crooked Keeper of Crawlers</span><br>
            yerp. i could sure use some burgs right about now.
        </p>
    </div>
    <div class="dialogue">
        <img class="avatar" src="bugcollector2.png">
        <p>
            <span class="name">BUG COLLECTOR</span><br>
            <span class="subtitle">Crooked Keeper of Crawlers</span><br>
            fetch me some bergs?
        </p>
    </div>
    <div class="dialogue">
        <img class="avatar" src="bugcollector2.png">
        <p>
            <span class="name">BUG COLLECTOR</span><br>
            <span class="subtitle">Crooked Keeper of Crawlers</span><br>
            bargs look like this, yerp.
        </p>
    </div>
    <p class="dialogue">
        bugs collected: <span id="bugcount"></span>
        <img class="burg" src="burg.gif" title="burg.">
    </p>
    <button id="stopstart" onclick="stopHunting();"></button>
</body>
</html>