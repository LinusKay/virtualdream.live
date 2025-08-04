<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bugs Is Not Real</title>
    <?php 
        include('../../src/setup.php');
        echo "<script src='$assetBaseUrl/scripts/audioplayer/audioplayer.php' type='module'></script>\n";
    ?>
    <style>
        body {
            background: black;
            text-align:center;
            color:white;
        }
        h1 {
            
        }
        ul {
            width:200px;
            margin:auto;
            text-align: justify;
        }
        #bottom {
            width:100%;
            height:40px;
            background: url('src/img/flameanimated-good.gif');
            position: fixed;
            bottom:0;
        }
        #bugtagram {
            position:relative;
            height:220px;
            width:200px;
            margin:auto;
        }
        #bugtagram .pentagram {
            position:absolute;
            top:0;
            width:200px;
            margin:auto;
            left:0;
        }
        #bugtagram .bug {
            position:absolute;
            top:10px;
            left:25px;
        }

        .notes {
            color:red;
        }
    </style>
</head>
<body>

    <ul>
        <li>Why were the bugs killed?</li>
        <li>Why were the bugs replaced?</li>
        <li>Who is responsible?</li>
        <li>How far up does this go?</li>
        <li>What should be done?</li>
        <li>How do you know the bug is fake?</li>
        <li>What are their end goals?</li>
    </ul>

    what does the page cover?
    <ul>
        <li>phonecall transcripts and recordings with officials, reporters, people in the street.</li>
        <li>study of bug images</li>
        <li>study clips of interviews from officials</li>
        <li>A breakdown of one man's investigation into a wide conspiracy</p>
    </ul>

    <p>My name is Randy Higgins. I would say this is my story, but its yours too. Its all of ours.</p>

    <h2>Phonecall</h2>
    <p>

    </p>

    <audio autoplay loop><source src="src/audio/thebugs.wav"/></audio> 
    <h1>Bugs is not real</h1>
    <p>When was the last time you saw a bug?</p>
    <p>They ain't been real for years.</p>
    <p>Don't let them brainwash you.</p>
    <p>Timeline of events</p>
    <div id="bugtagram">
        <img class="pentagram" src="src/img/pentagram3.gif">
        <img class="bug" src="src/img/bug.gif">
    </div>
    <p>When the bugs died out they replaced them all with their own.</p>
    <p>President Schmonger and his evil cabal think we are stupid.</p>
    <p>They think YOU are stupid</p>
    <p>But no, we are awake.</p>
    <ul>
        <li>1992 - Bug plague - many bugs die</li>
        <li>1993 - Bugs replaced</p>
        <li>2000 - Mass surveillance state</li>
    </ul>
    <!-- <div id="bottom"></div> -->
</body>
</html>