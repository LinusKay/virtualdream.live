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
    <title>SquelchTV - Share What You Love</title>
    <style>
        * {
            margin:0;
            padding:0;
        }
        .logo {
            width:200px;
        }
        .logotext {
            width:750px;
        }
        body {
            background: #111111;
            color:white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size:15px;
            background: url('src/img/squelchtexture.jpg');
            background-size: 200px;
        }
        table {
            background-color: rgba(171, 56, 255, 0.5);
            padding-top:5px;
            border-radius:5px;
        }
        .vid-container {
            height:200px;
            vertical-align: top;
        }
        .vid-thumb {
            width: 230px;
            height: 130px;
            border-radius:5px;
            overflow:hidden;
            margin: 5px 10px;
            position:relative;
            cursor:pointer;
            border: solid 1px lime;
        }
        .vid-thumb img {
            width:230px;
            height:130px;
        }
        .vid-thumb img:hover {
            opacity:0.7;
        }
        .vid-time {
            position:absolute;
            bottom: 5px;
            right: 5px;
            opacity:0.4;
            font-size:13px;
            font-weight:bold;
            pointer-events:none;
            transition: opacity 0.1s;
        }
        .vid-thumb:hover .vid-time {
            opacity:0.7;
        }
        .vid-title {
            font-weight:bold;
            margin: 0 10px;
            font-size:14px;
            cursor:pointer;
        }
        .vid-title:hover{
            text-decoration: underline;
        }
        .vid-uploader {
            margin: 0 10px;
            opacity:0.8;
            font-size:13px;
            cursor:pointer;
        }
        .vid-uploader:hover {
            opacity:1;
        }
        .vid-stats {
            margin: 0 10px 5px 10px;
            color:white; 
            font-size:13px;
            opacity:0.6;
        }
        .footer {
            width: 750px;
            height:15px;
            background:gray;
            margin-top: 10px;
            line-height:15px;
            font-size:12px;
            color:white;
            background-color: rgba(171, 56, 255, 0.5);
        }
        .watch-container {
            width:750px;
            height:422px;
            background:red;
            border-radius: 10px;
            overflow:hidden;
            border: solid 2px lime;
            /* filter: drop-shadow(0px 5px 15px lime) */
        }
        .watch-container video {
            width:750px;
            height:422px;
        }
        .watch-title {
            text-align:left;
            padding:0 5px;
        }
        .watch-uploader {
            text-align:left;
            padding:0 5px;
        }
        .watch-stats {
            text-align:right;
            padding:0 5px;
        }
        .details-container {
            width:750px;
        }
        .advertisement-banner {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <center>
        <img class="logo" src="src/img/squelchtv.png">
        <img class="logotext" src="src/img/squelchtvtext_green.png">
        <div class="watch-container">
            <video width="320" height="240" controls>
                <source src="src/vid/nessie spectates.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video> 
        </div>
        <div class="advertisement-banner"></div>
        <table class="details-container" width="750">
            <tbody>
                <tr>
                    <td colspan="2"><h1 class="watch-title">Video Title</h1></td>
                </tr>
                <tr>
                    <td><p class="watch-uploader">Video Uploader</p></td>
                    <td><p class="watch-stats">1,000,000 Views</p></td>
                </tr>
            </tbody>
        </table>
            
        <div class="footer">
            <p>c 2024 SquelchTV. All rights reserved. All uploaded videos property of SquelchTV Inc.</p>
        </div>
    </center>
</body>
</html>