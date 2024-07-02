// set up event listeners for screensaver end
window.addEventListener('load', resetTimer, true);
window.addEventListener('mousemove', resetTimer, true);
window.addEventListener('mousedown', resetTimer, true);
window.addEventListener('touchstart', resetTimer, true);
window.addEventListener('touchmove', resetTimer, true);
window.addEventListener('click', resetTimer, true);
window.addEventListener('keydown', resetTimer, true);
window.addEventListener('scroll', resetTimer, true);

/**
 * Resets the screensaver idle timer
 * 
 * @returns {void}
 */
let timer;
const idleTime = 1000;
function resetTimer() {
    stopScreensaver();
    clearTimeout(timer);
    timer = setTimeout(startScreensaver, idleTime); 
}

/**
 * Picks a random screensaver and runs it
 * 
 * @returns {void}
 */
function startScreensaver() {
    const availableScreensaversKeys = Object.keys(availableScreensavers);
    const chosenScreensaverKey = availableScreensaversKeys[Math.floor(Math.random() * availableScreensaversKeys.length)];
    availableScreensavers[chosenScreensaverKey]();
}

/**
 * Stops any running screensaver
 * 
 * @returns {void}
 */
function stopScreensaver() {
    clearScreensaver();
}

/**
 * Clears any screensaver elements
 * 
 * @returns {void}
 */
function clearScreensaver() {
    const screensaverElements = document.querySelectorAll('[data-screen-saver]');
    screensaverElements.forEach(element => {
        element.remove();
    })
}

// 
const availableScreensavers = {
    "bounceRandom": screensaverBounceRandom,
    "bounceRandomMultiple": screensaverBounceRandomMultiple,
    "bounceBubbles": screensaverBounceBubbles
};

/**
 * Bounces a random image around the screen, DVD style.
 * 
 * @returns {void}
 */
function screensaverBounceRandom() {
    const blackScreen = document.createElement('div');
    Object.assign(blackScreen.style, {
        backgroundColor: "black",
        position: "fixed",
        width: "100vw",
        height: "100vh",
        top: "0",
        left: "0",
        zIndex: 99,
        opacity:0
    });
    blackScreen.dataset.screenSaver = true;
    document.body.appendChild(blackScreen);

    const images = [
        "ASSET_DIRECTORY/img/mascots/mascot-pyramid.gif",
        "ASSET_DIRECTORY/img/heart2.gif",
        "ASSET_DIRECTORY/img/gitara.gif",
        "ASSET_DIRECTORY/img/stickers/polyfox2-transparent.gif",
        "ASSET_DIRECTORY/img/stickers/dragon.gif",
        "ASSET_DIRECTORY/img/audioplayer/skins/yellinghead.png",
    ]
    const chosenImage = images[Math.floor(Math.random() * images.length)];

    const bouncingElement = document.createElement('img');
    bouncingElement.src = chosenImage;
    Object.assign(bouncingElement.style, {
        height: "150px",
        position: "fixed",
        zIndex: 100,
        opacity:0
    });
    bouncingElement.dataset.screenSaver = true;
    document.body.appendChild(bouncingElement);
    animationBounce(bouncingElement);

    fadeIn(blackScreen, 1000);
    fadeIn(bouncingElement, 1000);
}

/**
 * Bounces a random image around the screen, DVD style.
 * 
 * @returns {void}
 */
function screensaverBounceRandomMultiple() {
    const blackScreen = document.createElement('div');
    Object.assign(blackScreen.style, {
        backgroundColor: "black",
        position: "fixed",
        width: "100vw",
        height: "100vh",
        top: "0",
        left: "0",
        zIndex: 99,
        opacity:0
    });
    blackScreen.dataset.screenSaver = true;
    document.body.appendChild(blackScreen);

    const images = [
        "ASSET_DIRECTORY/img/mascots/mascot-pyramid.gif",
        "ASSET_DIRECTORY/img/heart2.gif",
        "ASSET_DIRECTORY/img/gitara.gif",
        "ASSET_DIRECTORY/img/stickers/polyfox2-transparent.gif",
        "ASSET_DIRECTORY/img/stickers/dragon.gif",
        "ASSET_DIRECTORY/img/audioplayer/skins/yellinghead.png",
    ]
    const chosenImage = images[Math.floor(Math.random() * images.length)];

    for(let i=0; i < 5; i++){
        let bouncingElement = document.createElement('img');
        bouncingElement.src = chosenImage;
        Object.assign(bouncingElement.style, {
            height: "150px",
            position: "fixed",
            zIndex: 100,
            opacity:0
        });
        bouncingElement.dataset.screenSaver = true;
        document.body.appendChild(bouncingElement);
        animationBounce(bouncingElement);
        fadeIn(bouncingElement, 1000);
    }

    fadeIn(blackScreen, 1000);
}

/**
 * Bounces a bubble image around the screen, DVD style.
 * 
 * @returns {void}
 */
function screensaverBounceBubbles() {
    const blackScreen = document.createElement('div');
    Object.assign(blackScreen.style, {
        backgroundColor: "black",
        position: "fixed",
        width: "100vw",
        height: "100vh",
        top: "0",
        left: "0",
        zIndex: 99,
        opacity:0
    });
    blackScreen.dataset.screenSaver = true;
    document.body.appendChild(blackScreen);

    const chosenImage =  "ASSET_DIRECTORY/img/screensaver/soap-bubble-817421_1280.png"

    const bubbleCountMin = 3;
    const bubbleCountMax = 8;
    const bubbleCount = Math.floor(Math.random() * (bubbleCountMax - bubbleCountMin + 1)) + bubbleCountMin;

    const bubbleTTLMin = 2000; // Minimum TTL in milliseconds
    const bubbleTTLMax = 10000; // Maximum TTL in milliseconds
    const newBubbleDelayMin = 100;
    const newBubbleDelayMax = 5000;
    const newBubbleDelay = Math.floor(Math.random() * (newBubbleDelayMax - newBubbleDelayMin + 1)) + newBubbleDelayMin;

    function spawnBubble() {
        console.log('spawnbubble');
        let bouncingElement = document.createElement('img');
        bouncingElement.src = chosenImage;
        Object.assign(bouncingElement.style, {
            height: "200px",
            position: "fixed",
            zIndex: 100,
            opacity: 0,
            transition: "opacity 1s"
        });
        bouncingElement.dataset.screenSaver = true;
        document.body.appendChild(bouncingElement);
        animationBounce(bouncingElement);
        fadeIn(bouncingElement, 1000);

        // Set a random time-to-live (TTL) for the bubble
        const bubbleTTL = Math.floor(Math.random() * (bubbleTTLMax - bubbleTTLMin + 1)) + bubbleTTLMin;
        setTimeout(() => {
            fadeOutAndRemove(bouncingElement, 1000);
            setTimeout(spawnBubble, newBubbleDelay);
        }, bubbleTTL);
    }

    for (let i = 0; i < bubbleCount; i++) {
        spawnBubble();
    }
    fadeIn(blackScreen, 1000);
}

/**
 * Animates the movement of an element.
 * 
 * @param {HTMLElement} element - The element to animate.
 * @returns {void}
 */
function animationBounce(element) {
    const elementWidth = element.clientWidth;
    const elementHeight = element.clientHeight;

    let x = Math.random() * (window.innerWidth - elementWidth);
    let y = Math.random() * (window.innerHeight - elementHeight);
    let dirX = (Math.random() < 0.5) ? 1 : -1; // Random initial direction
    let dirY = (Math.random() < 0.5) ? 1 : -1;
    const speed = 1;


    function move() {
        const screenHeight = window.innerHeight;
        const screenWidth = window.innerWidth;

        if (y + elementHeight >= screenHeight || y < 0) {
            dirY *= -1;
        }
        if (x + elementWidth >= screenWidth || x < 0) {
            dirX *= -1;
        }
        x += dirX * speed;
        y += dirY * speed;
        element.style.left = x + "px";
        element.style.top = y + "px";
        window.requestAnimationFrame(move);
    }

    window.requestAnimationFrame(move);
}

 /**
 * Fades in an element by gradually increasing its opacity.
 *
 * @param {HTMLElement} element - The element to fade in.
 * @param {number} duration - The duration of the fade-in effect in milliseconds.
 */
function fadeIn(element, duration) {
    let opacity = 0;
    const interval = 50; 
    const increment = interval / duration;

    const fade = setInterval(() => {
        opacity += increment;
        if (opacity >= 1) {
            opacity = 1;
            clearInterval(fade);
        }
        element.style.opacity = opacity;
    }, interval);
}

 /**
 * Fades in an element by gradually increasing its opacity.
 *
 * @param {HTMLElement} element - The element to fade in.
 * @param {number} duration - The duration of the fade-in effect in milliseconds.
 */
 function fadeOutAndRemove(element, duration) {
    console.log('fadeoutandremove');
    let opacity = 1;
    const interval = 50; 
    const increment = interval / duration;

    const fade = setInterval(() => {
        opacity -= increment;
        if (opacity <= 0) {
            opacity = 0;
            clearInterval(fade);
            element.remove();
        }
        element.style.opacity = opacity;
    }, interval);
}