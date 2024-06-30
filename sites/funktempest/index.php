<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    # PAGE SETUP
    $cursorCustom = "src/img/hand-point-export.png";
    $cursorFollow = "src/img/3dfunk.gif";
    include('../../src/setup.php');
    # /PAGE SETUP
    ?>

    <title>Funk Tempest</title>
    <style>
        * {
            text-align:center;
            margin:auto;
        }
        html {
            background: url('src/img/starstwinkle.gif');
            background-repeat: repeat;
            color:red;
        }
        body {
            width:900px;
        }
        #spacer {
            height:30vh;
        }
        #enterbutton{
            border: solid 5px red;
            padding:15px;
            width:100px;
        }
        a{
            height:100%;
            width:100%;
            position:relative;
            color:white;
            text-decoration:none;
        }
    </style>
</head>
<body>
    <div id="spacer"></div>
    <img src="src/img/avatar.jpg">
    <h1>FUNK TEMPEST</h1>
    <p>ENTER MY REALM...</p>
    <p>EMBRACE THE FUNK</p> <br>
    <a href="home.php"><div id="enterbutton">ENTER</div></a>
</body>
</html>