<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <?php 
    # PAGE SETUP
    $screensaverOptOut = true;
    include('../../src/setup.php');
    # /PAGE SETUP
    ?>
    <title>Zamboni Simulator</title>
    <style>
        body {
            background-image: url('bg_ice.png');
            background-repeat: repeat;
            background-size:100px;
        }
        iframe {
            border:solid 1px white;
            box-sizing: border-box;
            display:block;
            position:relative;
            overflow:hidden;
        }
        #gamezone {
            width:960px;
            position:relative;
            margin:auto;
        }
    </style>
</head>
<body>
    <div id="gamezone">
        <iframe src="zambonisimulator/index.html" width="965px" height="845px" frameBorder="0"></iframe>
    </div>
</body>
</html>