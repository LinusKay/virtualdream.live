<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    # PAGE SETUP
    $screensaverOptOut = true;
    include('../../src/setup.php');
    # /PAGE SETUP
    ?>
    <title>Virtual Dream Status</title>
    <style> 
        * {
            margin:0;
            padding:0;
        }
        body {
            width:900px;
            margin:auto;
        }
        h1 {
            text-align: center;
        }
        .key {
            text-align: center;
        }
        .node {
            display:inline-block;
            width: 60px;
            position:relative;
            /* float:left; */
            border: outset 3px gray;
            box-sizing: border-box;
            margin:10px;
            background:lightgray;
        }
        .node-wide {
            width: 120px;
        }
        .node .node-name {
            font-family:'Courier New', Courier, monospace;
            font-size:10px;
            text-align:center;
            width:100%;
        }
        .node .node-status {
            font-family:'Courier New', Courier, monospace;
            font-size:10px;
            text-align:center;
            width:100%;
        }
        .node .node-image {
            display:block;
            max-width:50%;
            margin: 10% auto;
        }
        .node-wide .node-image {
            max-width:75%;
        }
        .node-farm .node-farm-wrap {
            max-width:92px;
            margin:auto;
        }
        .node-farm .node-image {
            display:block;
            margin:5px;
            float:left;
        }
        .node .node-status-image {
            display:block;
            max-width:50%;
            margin: 10% auto;
        }
        .node-group {
            position:relative;
            display:inline-block;
            margin:10px;
            max-width:250px;
            border: solid 1px black;
            box-sizing: border-box;
            background:lightyellow;
        }
        .node-group-wide {
            max-width:286px;
        }
    </style>
</head>
<body>
    <h1>Virtual Dream Status Directory</h1>
    <div class="key">
        <p><img src="src/img/status/online.gif" title="Online">Online</p>
        <p><img src="src/img/status/warning.gif" title="Warning">Warning</p>
        <p><img src="src/img/status/offline.gif" title="Offline">Offline</p>
    </div>
    <br>
    <hr>
    <div class="node">
        <img class="node-image" src="src/img/Earth_Globe.gif">
        <p class="node-name">GLOBULAR LINK</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    <div class="node-group">
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">EU-WEST01</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">EU-WEST02</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
    </div>
    <div class="node-group">
        <div class="node">
            <img class="node-image" src="src/img/computernode.gif">
            <p class="node-name">NODE1_1</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/computernode.gif">
            <p class="node-name">NODE1_2</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/computernode.gif">
            <p class="node-name">NODE1_3</p>
            <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/computernode.gif">
            <p class="node-name">NODE1_4</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/computernode.gif">
            <p class="node-name">NODE1_5</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
    </div>
    <div class="node-group">
        <div class="node">
            <img class="node-image" src="src/img/computernode.gif">
            <p class="node-name">NODE2_1</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/computernode.gif">
            <p class="node-name">NODE2_2</p>
            <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/computernode.gif">
            <p class="node-name">NODE2_3</p>
            <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
        </div>
    </div>
    <div class="node">
        <img class="node-image" src="src/img/Earth_Globe.gif">
        <p class="node-name">EXTRA-GLOBULAR LINK</p>
        <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
    </div>
    <div class="node">
        <img class="node-image" src="src/img/network.gif">
        <p class="node-name">LAN_INT</p>
        <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
    </div>
    <div class="node">
        <img class="node-image" src="src/img/underconst.gif">
        <p class="node-name">⚠️</p>
        <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
    </div>
    <div class="node node-wide">
        <img class="node-image" src="src/img/computeremail.gif">
        <p class="node-name">SMTP-EAST</p>
        <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
    </div>
    <div class="node-group">
        <div class="node">
            <img class="node-image" src="src/img/Flop.gif">
            <p class="node-name">STORAGE-01_01</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Flop.gif">
            <p class="node-name">STORAGE-01_02</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Flop.gif">
            <p class="node-name">STORAGE-01_03</p>
            <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
        </div>
    </div>
    <div class="node node-wide">
        <img class="node-image" src="src/img/computeremail.gif">
        <p class="node-name">SMTP-WEST-01</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    <div class="node node-wide">
        <img class="node-image" src="src/img/computeremail.gif">
        <p class="node-name">SMTP-WEST-02</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    
    <div class="node node-wide node-farm">
        <div class="node-farm-wrap">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
        </div>
        <p class="node-name">STICKERS-01</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    <div class="node">
        <img class="node-image" src="src/img/computercode.gif">
        <p class="node-name">CODEBANK-DEV-v1</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    <div class="node">
        <img class="node-image" src="src/img/switch.png">
        <p class="node-name">SW-EAST-01</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    <div class="node">
        <img class="node-image" src="src/img/switch.png">
        <p class="node-name">SW-EAST-02</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    <div class="node">
        <img class="node-image" src="src/img/computercode.gif">
        <p class="node-name">CODEBANK-DEV-v1.1</p>
        <img class="node-status-image" src="src/img/status/warning.gif" title="Unstable">
    </div>
    <div class="node">
        <img class="node-image" src="src/img/Computer_2.gif">
        <p class="node-name">EU-EAST01</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    
    <div class="node node-wide">
        <img class="node-image" src="src/img/computerconnect.gif">
        <p class="node-name">API-V1</p>
        <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
    </div>
    <!-- NA -->
    <div class="node-group">
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">NA-WEST-01</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">NA-WEST-02</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">NA-WEST-03</p>
            <img class="node-status-image" src="src/img/status/warning.gif" title="Unstable">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">NA-WEST-04</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">NA-WEST-05</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">NA-WEST-06</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
    </div>
    <div class="node-group">
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">NA-EAST-01</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">NA-EAST-02</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">NA-EAST-03</p>
            <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">NA-EAST-04</p>
            <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">NA-EAST-05</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">NA-EAST-06</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
    </div>
    <div class="node-group">
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">AU-01</p>
            <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
        </div>
    </div>
    <div class="node node-wide node-farm">
        <div class="node-farm-wrap">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
        </div>
        <p class="node-name">NA-FARM-01</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    <div class="node node-wide node-farm">
        <div class="node-farm-wrap">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
        </div>
        <p class="node-name">NA-FARM-02</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    <div class="node node-wide">
        <img class="node-image" src="src/img/computerconnect.gif">
        <p class="node-name">API-V3</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    <div class="node">
        <img class="node-image" src="src/img/underconst.gif">
        <p class="node-name">⚠️</p>
        <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
    </div>
    <div class="node-group">
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">ASIA-EAST-01</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">ASIA-EAST-02</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
    </div>
    <div class="node node-wide node-farm">
        <div class="node-farm-wrap">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
        </div>
        <p class="node-name">EU-FARM-01</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    <div class="node">
        <img class="node-image" src="src/img/sunglass.gif">
        <p class="node-name"></p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    <div class="node-group">
        <div class="node">
            <img class="node-image" src="src/img/switch.png">
            <p class="node-name">SW-SOUST-01</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/switch.png">
            <p class="node-name">SW-WEAST-01</p>
            <img class="node-status-image" src="src/img/status/warning.gif" title="Warning">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/stack.png">
            <p class="node-name">STACK-01</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/stack.png">
            <p class="node-name">STACK-02</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
    </div>
    <div class="node-group">
        <div class="node">
            <img class="node-image" src="src/img/light.png">
            <p class="node-name">LIGHTS-FRONT</p>
            <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/light.png">
            <p class="node-name">LIGHTS-BACK</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/light.png">
            <p class="node-name">LIGHTS-LOUNGE</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
    </div>
    <div class="node">
        <img class="node-image" src="src/img/computercode.gif">
        <p class="node-name">CODEBANK-PROD</p>
        <img class="node-status-image" src="src/img/status/warning.gif" title="Unstable">
    </div>
    <div class="node-group">
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">ASIA-NORTH-01</p>
            <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">ASIA-NORTH-02</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
    </div>
    <div class="node">
        <img class="node-image" src="src/img/frank.gif">
        <p class="node-name">Frank</p>
        <img class="node-status-image" src="src/img/status/warning.gif" title="Unstable">
    </div>
    <div class="node node-wide node-farm">
        <div class="node-farm-wrap">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
            <img class="node-image" src="src/img/computernode.gif">
        </div>
        <p class="node-name">STICKERS-02</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    <div class="node">
        <img class="node-image" src="src/img/RainbowBallT.gif">
        <p class="node-name">Disco</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Yeah, baby">
    </div>
    <div class="node-group">
        <div class="node">
            <img class="node-image" src="src/img/computernode.gif">
            <p class="node-name">NODE3_1</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/computernode.gif">
            <p class="node-name">NODE3_2</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/computernode.gif">
            <p class="node-name">NODE3_3</p>
            <img class="node-status-image" src="src/img/status/warning.gif" title="Warning">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/computernode.gif">
            <p class="node-name">NODE3_3</p>
            <img class="node-status-image" src="src/img/status/warning.gif" title="Warning">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/computernode.gif">
            <p class="node-name">NODE3_3</p>
            <img class="node-status-image" src="src/img/status/warning.gif" title="Warning">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/computernode.gif">
            <p class="node-name">NODE3_3</p>
            <img class="node-status-image" src="src/img/status/warning.gif" title="Warning">
        </div>
    </div>
    <div class="node node-wide">
        <img class="node-image" src="src/img/computeremail.gif">
        <p class="node-name">SMTP-BACKUP</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    <div class="node-group">
        <div class="node">
            <img class="node-image" src="src/img/Flop.gif">
            <p class="node-name">STORAGE-02_01</p>
            <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Flop.gif">
            <p class="node-name">STORAGE-02_02</p>
            <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Flop.gif">
            <p class="node-name">STORAGE-02_03</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
    </div>
    <div class="node">
        <img class="node-image" src="src/img/galaxy.png">
        <p class="node-name">Rift</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    <div class="node">
        <img class="node-image" src="src/img/Computer_2.gif">
        <p class="node-name">WEB-01</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    <div class="node">
        <img class="node-image" src="src/img/Computer_2.gif">
        <p class="node-name">DESKTOP-1YTAB2X</p>
        <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
    </div>
    <div class="node">
        <img class="node-image" src="src/img/radio.gif">
        <p class="node-name">STEREO-SYSTEM</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    <div class="node">
        <img class="node-image" src="src/img/radio.gif">
        <p class="node-name">STEREO-SYSTEM</p>
        <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
    </div>
    <div class="node">
        <img class="node-image" src="src/img/radio.gif">
        <p class="node-name">STEREO-SYSTEM</p>
        <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
    </div>
    <div class="node">
        <img class="node-image" src="src/img/radio.gif">
        <p class="node-name">STEREO-SYSTEM</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    <div class="node-group">
        <div class="node">
            <img class="node-image" src="src/img/computernode.gif">
            <p class="node-name">NODE4_1</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/computernode.gif">
            <p class="node-name">NODE4_2</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/computernode.gif">
            <p class="node-name">NODE4_3</p>
            <img class="node-status-image" src="src/img/status/warning.gif" title="Warning">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/computernode.gif">
            <p class="node-name">NODE4_3</p>
            <img class="node-status-image" src="src/img/status/warning.gif" title="Warning">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/computernode.gif">
            <p class="node-name">NODE4_3</p>
            <img class="node-status-image" src="src/img/status/warning.gif" title="Warning">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/computernode.gif">
            <p class="node-name">NODE4_3</p>
            <img class="node-status-image" src="src/img/status/warning.gif" title="Warning">
        </div>
    </div>
    <div class="node">
        <img class="node-image" src="src/img/gnome.gif">
        <p class="node-name">GNOME</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    <div class="node">
        <img class="node-image" src="src/img/Computer_2.gif">
        <p class="node-name">LAPTOP-TONY</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    <div class="node">
        <img class="node-image" src="src/img/Computer_2.gif">
        <p class="node-name">DESKTOP-TONY</p>
        <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
    </div>
    <div class="node">
        <img class="node-image" src="src/img/Computer_2.gif">
        <p class="node-name">DESKTOP-LISA</p>
        <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
    </div>
    <div class="node">
        <img class="node-image" src="src/img/Computer_2.gif">
        <p class="node-name">DESKTOP-LISA</p>
        <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
    </div>
    <div class="node-group node-group-wide">
        <div class="node node-wide">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">RENT-JOESALES-DONOTTOUCH-01</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node node-wide">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">RENT-JOESALES-DONOTTOUCH-02</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
    </div>
    <div class="node">
        <img class="node-image" src="src/img/toaster.gif">
        <p class="node-name">TOASTER</p>
        <img class="node-status-image" src="src/img/status/online.gif" title="Online">
    </div>
    <div class="node-group">
        <div class="node">
            <img class="node-image" src="src/img/keypad.png">
            <p class="node-name">LOCK-FOYER</p>
            <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/keypad.png">
            <p class="node-name">LOCK-GARAGE</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/keypad.png">
            <p class="node-name">LOCK-PANIC</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/keypad.png">
            <p class="node-name">LOCK-WINDOW</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
    </div>
    <div class="node">
        <img class="node-image" src="src/img/underconst.gif">
        <p class="node-name">⚠️</p>
        <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
    </div>
    <div class="node">
        <img class="node-image" src="src/img/rocket.gif">
        <p class="node-name">DEFENSE</p>
        <img class="node-status-image" src="src/img/status/warning.gif" title="Warning">
    </div>
    <div class="node-group">
        <div class="node">
            <img class="node-image" src="src/img/Flop.gif">
            <p class="node-name">STORAGE-03_01</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Flop.gif">
            <p class="node-name">STORAGE-03_02</p>
            <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Flop.gif">
            <p class="node-name">STORAGE-03_03</p>
            <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
        </div>
    </div>
    <div class="node-group">
        <div class="node">
            <img class="node-image" src="src/img/Flop.gif">
            <p class="node-name">STORAGE-04_01</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Offline">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Flop.gif">
            <p class="node-name">STORAGE-04_02</p>
            <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
        </div>
    </div>
    <div class="node-group">
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">ARCTIC-01</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">ARCTIC-02</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">ARCTIC-03</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">ARCTIC-04</p>
            <img class="node-status-image" src="src/img/status/offline.gif" title="Offline">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">ARCTIC-05</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
        <div class="node">
            <img class="node-image" src="src/img/Computer_2.gif">
            <p class="node-name">ARCTIC-06</p>
            <img class="node-status-image" src="src/img/status/online.gif" title="Online">
        </div>
    </div>
</body>
</html>