<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    # PAGE SETUP
    $cursorFollow = "src/img/pixlator.gif";
    $cursorCustom = "src/img/toctrophy.gif";
    include('../../src/setup.php');
    # /PAGE SETUP
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/cursor-effects@latest/dist/browser.js"></script>
    <script>
        window.addEventListener("load", (event) => {
        new cursoreffects.bubbleCursor();
        });
    </script>
    <title>YOU'VE WON!</title>
    <style> 
        body {
            text-align:center;
            margin:auto;
            background:url("src/img/cloudbg.png");
            font-family: Georgia;
        }
        #bignumber * {
            display:inline;
            max-width:200px;
        }
        #poem {
            padding:10px;
        }
        .decor {
            max-height:100px;
        }
    </style>
</head>
<body>
    <audio autoplay loop><source src="src/audio/10000000angels.ogg"></audio>
    <img class="decor" src="src/img/sign_congratulations_lg_nwm.gif">
<h1>Congratulation!</h1>
<p>For being our 10000000th visitor!</p>
<p>We've waited so long for you!</p>
<p style="position:absolute; top:150px; left:230px;">You're finally here!</p>
<img class="decor" src="src/img/angel4r.gif" style="position:absolute; top:200px; left:250px; cursor:help;" title="a messenger from God">
<p style="position:absolute; bottom:150px; right:200px;">Blessings upon you, chosen one</p>
<img class="decor" src="src/img/angelCLR.gif" style="position:absolute; bottom:200px; right:230px; cursor:help;" title="blub blub blub">
<div id="bignumber">
    <img class="decor" src="src/img/Angels_Angel_flies_1prv.gif">
    <img class="decor" src="src/img/1.gif">
    <img class="decor" src="src/img/0.gif">
    <img class="decor" src="src/img/0.gif">
    <img class="decor" src="src/img/0.gif">
    <img class="decor" src="src/img/0.gif">
    <img class="decor" src="src/img/0.gif">
    <img class="decor" src="src/img/0.gif">
    <img class="decor" src="src/img/0.gif">
    <img class="decor" src="src/img/Angels_Angel_flies_2_prv.gif">
</div>
<div id="poem">
    <p>A poem, just for you</p>
    <p>Lorem ipsum dolor sit amet,<br>
    consectetur adipiscing elit, <br>
    sed do eiusmod tempor incididunt <br>
    ut labore et dolore magna aliqua.</p>
    <img class="decor" src="src/img/vineflowers.gif" style="width:300px;">
</div>
    <img class="decor" src="src/img/congratulationsCLR.gif" style="cursor:help;" title="drink it up! today is your day!">
<img class="decor" src="src/img/angel_blowingkisses.gif" style="position:absolute; top:650px; left:430px; width:150px; cursor:help;" title="we write your story to eternity">
<img class="decor" src="src/img/gbook.gif" style="position:absolute; top:715px; left:500px; width:75px; cursor:help;" title="the book of love">
<p>All this, and just for you!</p>
<img class="decor" src="src/img/i_love_you.gif" style="cursor:help;" title="its never been more true"><br>
<img class="decor" src="src/img/heartspin.gif">
<img class="decor" src="src/img/dovec.gif" style="position:absolute; top:515px; left:150px; cursor:help;" title="Two doves in love. With You!">
<img class="decor" src="src/img/doverigth.gif" style="position:absolute; top:515px; left:200px; cursor:help;" title="Two doves in love. With You!">
<script>
    // alert("YOU'VE DONE IT!! Congratulations!\n\n~~~~~~~~\n\nYou are our 10000000th Visitor!")
</script>
</body>
</html>