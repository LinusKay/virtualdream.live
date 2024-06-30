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
        <title>Contemplation Rock</title>
        <link rel="stylesheet" href="style.css">
        <style> 
        body {
            text-align:center;
            width:800px;
            margin:auto;
            background:white;
            color:black;
            transition: all 2s;
        }
        #rock {
            margin-top:250px
        }
        #motivation {
            font-family:Arial, Helvetica, sans-serif;
            font-weight:bolder;
            opacity:0.1;
        }
        </style>
    </head>
    <body>
        <audio autoplay loop id="soundOfContemplation"><source src="src/music/contemplation.mp3"></audio>
        <img id="rock" src="src/img/rock.png" title="I'm always here for you.">
        <p id="motivation">Go ahead. Contemplate.</p>
        <button id="contemplationButton">Begin Contemplation</button>
    </body> 
        <script>
            const contemplationButton = document.getElementById("contemplationButton");
            const motivation = document.getElementById("motivation");
            const soundOfContemplation = document.getElementById("soundOfContemplation");
            soundOfContemplation.volume = 0;
            let contemplating = false;
            contemplationButton.addEventListener("click" , function() {
                if(!contemplating) {
                    document.body.style.background = "black";
                    document.body.style.color = "white";
                    contemplationButton.innerHTML = "Cease Contemplation";
                    motivation.innerHTML = "I'm here for you."
                    fadeIn(soundOfContemplation);
                    contemplating = true;
                }
                else {
                    document.body.style.background = "white";
                    document.body.style.color = "black";
                    contemplationButton.innerHTML = "Begin Contemplation";
                    motivation.innerHTML = "Go ahead. Contemplate."
                    fadeOut(soundOfContemplation);
                    contemplating = false;
                }
            });

            function fadeOut(audioElement) {
                const fadeInterval = setInterval(() => {
                    if (audioElement.volume > 0) {
                        audioElement.volume = Math.max(0, audioElement.volume - 0.1);
                    } else {
                        clearInterval(fadeInterval);
                    }
                }, 100);
            }

            function fadeIn(audioElement) {
                const fadeInterval = setInterval(() => {
                    if (audioElement.volume < 1) {
                        audioElement.volume = Math.min(1, audioElement.volume + 0.1);
                    } else {
                        clearInterval(fadeInterval);
                    }
                }, 100);
            }
        </script>
</html>