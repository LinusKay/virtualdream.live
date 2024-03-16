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
    <title>Wizard Realm</title>
    <style>
        html {
            background:black;
        }
        img {
            border-radius:10px;
        }
        #content {
            width:800px;
            height:600px;
            margin:auto;
            position:relative;
        }
        .link {
            display:block;
            position:absolute;
            opacity:1;
            border-radius:50%;
            text-align:center;
            line-height:7;
            width:120px;
            height:120px;
            text-decoration:none;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            color:white;
        }
        .link:hover {
            background:red;
        }
        #link1 {
            width:125px;
            height:125px;
            left:378px;
            bottom:88px;
        }
        #link2 {
            left:502px;
            bottom:87px;
        }
        #link3 {
            left:622px;
            bottom:90px;
        }
        </style>
</head>
<body>
    <div id="content">
        <audio src="src/audio/theme.mp3" autoplay loop volume=0.2></audio>
        <a id="link1" class="link" href="">HOME</a>
        <a id="link2" class="link" href="">FORUM</a>
        <a id="link3" class="link" href="">DUNGEON</a>
        <img src="src/img/bg.png">
    </div>
</body>
</html>