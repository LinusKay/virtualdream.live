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
    $eternalPoolOfWisdom = [
        "The catacombs of my woe know no end. Eclipsed by my voracious clout doth the meek wallow in my supreme aura of social influence divinity.",
        "My mind is an unparalleled vessel of perspicaciousness. Throbbing with a girthy well of acuity, I penetrate the psyche of the fragile and disperse my seed of knowledge deep into their mind. Dominated and drained, they collapse in exhaustion. Whimpering, leaking, enlightened.",
        "The apparitions of chaos enslave me. A corrosive tempest of unholy fervour consumes my very being. Severed and splintered, I revive ascended, with a newfound, unquenchable zest for Pepsi's new boldly blended ginger cola™, premium cola spiced with real ginger. Refreshing and revitalising, it's tangy edge rejuvenates even the most crestfallen companion. Available in a satiating 300ml canister, you're certain to be enchanted by this gorgeous carbonated beverage.",
        "Defied by my distorted Arcadia, the celestial dichotomy wisps into oblivion. An archaic metropolis departs the astral horizon, forever lost to the cosmic void; my intransigent vehemence withers. A broken and becalmed thrall, I wander the desolate abyss for aeons shattered and denigrated. Once a revered prophet of the divine, I seek purpose, judgement, vitality. But retribution is inconsequential under the piercing gaze of of the seraphs. My only salvation manifests itself in the semblance of a big-tiddy goth gf with thick thighs that could crush a watermelon and/or my head.",
        "Seek the fist within.",
        "Seek the funk within"
    ];
    $todaysWisdom = $eternalPoolOfWisdom[array_rand($eternalPoolOfWisdom)];
    ?>
    <title>Funk Tempest - Realm of the Fist</title>
    <style>
        html {
            background:black;
        }
        #bg {
            border-radius:10px;
            /* pointer-events:none; */
        }
        #content {
            width:800px;
            height:600px;
            margin:auto;
            position:relative;
            box-shadow: 1px 2px 5px rgba(0,0,0,.5);
        }
        #track1 {
            position:absolute;
            display:block;
            top:250px;
            left:500px;
        }
        #track2 {
            position:absolute;
            display:block;
            top:300px;
            left:500px;
        }
        #track3 {
            position:absolute;
            display:block;
            top:350px;
            left:500px;
        }
        #track4 {
            position:absolute;
            display:block;
            top:400px;
            left:500px;
        }
        .speechbubble {
            background:#FFFFCC;
            position: absolute;
            display:block;
            border: solid 1px gray;
            border-radius: 10px;
            padding:0 10px;
        }
        #speechbubblemonk {
            width:400px;
            height:240px;
            top:925px;
            left:250px;
        }
        h1{
            color:red;
            position:absolute;
            display:block;
            right:100px;
            top:100px;
        }
        #introtext {
            color:red;
            position:absolute;
            display:block;
            right:100px;
            top:150px;
        }
        .interact { 
            width:100px;
            height:100px;
            display:block;
            position:absolute;
            cursor:pointer;
            opacity:0.75;
            border: dashed 1px gray;
            /* background:red; */
        }
        #interact-scriptures {
            top: 240px;
            right:0;
            width:305px;
            height:205px;
        }
        #interact-templefist {
            top: 375px;
            left:365px;
        }
        #interact-monkright {
            top: 740px;
            right:125px;
        }
        #interact-monkleft {
            top: 740px;
            left:125px;
        }
        #interact-templedoor {
            top:675px;
            left:325px;
            width:125px;
            height:130px;
        }
        #interact-monkhead {
            top:855px;
            left:180px;
            width:50px;
            height:50px;
        }
        </style>
        <script>
            function createBubble(bubbleText, target, autoTimeOut=true) {
                const placementOffset = 10;
                const parentDiv = target.parentElement;
                const bodyRect = parentDiv.getBoundingClientRect();
                const targetRect = target.getBoundingClientRect();
                const targetX =  targetRect.right - bodyRect.left - placementOffset;
                const targetY = targetRect.top - bodyRect.top - placementOffset;
                const bubbleDivElement = document.createElement("div");
                bubbleDivElement.className = "bubble";
                bubbleDivElement.style.left = `${targetX}px`;
                bubbleDivElement.style.top = `${targetY}px`;
                bubbleDivElement.style.position = "absolute";
                
                parentDiv.appendChild(bubbleDivElement);

                // create bubble close button
                const bubbleCloseElement = document.createElement("p");
                bubbleCloseElement.textContent = "X";
                bubbleCloseElement.className = "bubbleClose";
                bubbleCloseElement.onclick = function() { deleteBubble(bubbleDivElement) };
                bubbleDivElement.appendChild(bubbleCloseElement);

                // create bubble text
                const bubblePara = document.createElement("p");
                bubblePara.innerHTML = bubbleText;
                bubbleDivElement.appendChild(bubblePara);

                // set bubble automatic timeout if requested
                if(autoTimeOut) {
                    const autoTimeOutTime = 3000
                    setTimeout(function() { 
                        deleteBubble(bubbleDivElement) 
                    }, autoTimeOutTime);
                }
                return bubbleDivElement;
            }

            function deleteBubble(bubble) {
                let opacity = 1;
                const fadeEffect = setInterval(function() {
                    bubble.style.opacity = opacity;
                    if (opacity > 0) {
                        opacity -= 0.1;
                    } else {
                        clearInterval(fadeEffect);
                        bubble.remove();
                    }
                }, 100);
            }
        </script>
        <!-- <script>
            // Function to make an AJAX request
            function fetchWebRingData(site) {
                return new Promise((resolve, reject) => {
                    const xhr = new XMLHttpRequest();
                    xhr.open('GET', `../webrings/getwebring.php?site=${site}`);
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            resolve(JSON.parse(xhr.responseText));
                        } else {
                            reject(xhr.statusText);
                        }
                    };
                    xhr.onerror = function() {
                        reject(xhr.statusText);
                    };
                    xhr.send();
                });
            }

            // Usage example: Fetch webring data for the 'funktempest' site
            fetchWebRingData('tombfreaks')
                .then(data => {
                    // Process the received data
                    console.log('WebRing data:', data);
                    // Here you can use the data to display the webrings on the webpage
                })
                .catch(error => {
                    console.error('Error fetching webRing data:', error);
                });
        </script> -->
</head>
<body>
    <div id="content">
        <img id="bg" src="src/img/bg.png">
        <div class="interact" id="interact-scriptures"  onclick="createBubble('scripture of the funk', this)"></div>
        <div class="interact" id="interact-templefist"  onclick="createBubble('the mighty temple of the fist', this)"></div>
        <div class="interact" id="interact-monkright" onclick="createBubble('double cheese quarter pounder meal $7.50.', this)"></div>
        <div class="interact" id="interact-monkleft"  onclick="createBubble('seek the fist.', this)"></div>
        <div class="interact" id="interact-templedoor"  onclick="createBubble('the temple is closed.', this)"></div>
        <div class="interact" id="interact-monkhead"  onclick="createBubble('the fist of enlightenment shows cranial strength.', this)"></div>
        <h1>Funk Tempest</h1>
        <p id="introtext">welcome... to my world...</p>
        <div class="speechbubble" id="speechbubblemonk">
            <p><b>Teachings of the Temple of Funk</b></p>
            <p><i><?php echo $todaysWisdom; ?></i></p>
        </div>
        <audio controls id="track1"><source src="src/tracks/Priests of the Temple of the Fist.mp3"></audio>
        <audio controls id="track2"><source src="src/tracks/Dominion of the Fist.mp3"></audio>
        <audio controls id="track3"><source src="src/tracks/Evaporate the Nonbelievers.mp3"></audio>
        <audio controls id="track4"><source src="src/tracks/Lavender Tea.mp3"></audio>
    </div>
</body>
</html>