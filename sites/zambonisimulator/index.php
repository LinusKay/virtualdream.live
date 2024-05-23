<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <title>Zamboni Simulator — Unleash the Freeze</title>

    <?php 
    # PAGE SETUP
    $screensaverOptOut = true;
    include('../../src/setup.php');
    # /PAGE SETUP
    ?>
    <meta name="title" content="Zamboni Simulator — Unleash the Freeze" />
    <meta name="description" content="Step into the rawest ice rink experience online. No bloat. No microtransactions. No special features. Just pure ice polishing experience. Game on!" />

    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://virtualdream.live/sites/zambonisimulator/" />
    <meta property="og:title" content="Zamboni Simulator — Unleash the Freeze" />
    <meta property="og:description" content="Step into the rawest ice rink experience online. No bloat. No microtransactions. No special features. Just pure ice polishing experience. Game on!" />
    <meta property="og:image" content="https://virtualdream.live/sites/zambonisimulator/zambonisimulator/zambonisimulator/splash.png" />

    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://virtualdream.live/sites/zambonisimulator/" />
    <meta property="twitter:title" content="Zamboni Simulator — Unleash the Freeze" />
    <meta property="twitter:description" content="Step into the rawest ice rink experience online. No bloat. No microtransactions. No special features. Just pure ice polishing experience. Game on!" />
    <meta property="twitter:image" content="https://virtualdream.live/sites/zambonisimulator/zambonisimulator/zambonisimulator/splash.png" />
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