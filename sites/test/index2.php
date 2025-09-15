<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>███ █████</title>
    <?php 
        include('../../src/setup.php');
    ?>
    <style>
        @font-face {
            font-family: fredoka-semi-bold;
            src: url("fredoka-semi-bold.ttf");
        }
        body {
            background: #648fc6;
            width:600px;
            margin:auto;
        }
        #header {
            width:600px;
            height:450px;
            position:relative;
        }
        #header img {
            width:600px;
        }
        #header .navlink {
            width:80px;
            height: 35px;
            display: block;
            position:absolute;
            opacity:1;
            /* background:red; */
            /* border: dashed 1px white; */
        }
        #header .navlink:active {
            border: dashed 1px darkgray;
        }
        #body {
            color:white;
            text-align: justify;
        }
        .titlebar {
            background: linear-gradient(0deg, #AEFFBC 1%, #63FF80 49%, #76FF1A 51%, #BCFBCF 90%);
            border: 1px solid #1AFF66;
            height:30px;
        }
        .titlebar h1 {
            font-family: fredoka-semi-bold;
            font-size: 15px;
            text-shadow: -1px -1px 0 #1AFF66, 1px -1px 0 #1AFF66, -1px 1px 0 #1AFF66, 1px 1px 0 #1AFF66
        }
    </style>
</head>
<body bgcolor="#ffffff">
    <center>
        <div id="header">
            <img src="metalheart01_02_ui.png">
            <a class="navlink" href="" style="top:170px;left:49px;"></a>
            <a class="navlink" href="" style="top:213px;left:1px;"></a>
            <a class="navlink" href="" style="top:237px;left:67px;"></a>
            <a class="navlink" href="" style="top:277px;left:143px;"></a>
        </div>
        <div id="body">
            <div class="titlebar">
                <h1>Title Box</h1>
            </div>
        </div>
    </center>
</body>
</html>