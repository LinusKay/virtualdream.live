function idleScreensaver() {

    function startScreensaver() {
        console.log("start screensaver");
        const availableScreensaversKeys = Object.keys(availableScreensavers);
        const chosenScreensaverKey = availableScreensaversKeys[Math.floor(Math.random() * availableScreensaversKeys.length)];
        availableScreensavers[chosenScreensaverKey]();
    }

    function stopScreensaver() {
        console.log("stop screensaver");
        clearScreensaver();
    }

    function clearScreensaver() {
        const screensaverElements = document.querySelectorAll('[data-screen-saver]');
        screensaverElements.forEach(element => {
            element.remove();
        })
    }

    let time;
    function resetTimer() {
        stopScreensaver();
        clearTimeout(time);
        time = setTimeout(startScreensaver, 30000); 
    }

    window.addEventListener('load', resetTimer, true);
    window.addEventListener('mousemove', resetTimer, true);
    window.addEventListener('mousedown', resetTimer, true);
    window.addEventListener('touchstart', resetTimer, true);
    window.addEventListener('touchmove', resetTimer, true);
    window.addEventListener('click', resetTimer, true);
    window.addEventListener('keydown', resetTimer, true);
    window.addEventListener('scroll', resetTimer, true);
}
idleScreensaver();
console.log("loaded screensaver");

const availableScreensavers = {
    "test": screensaverBounceRandom
};

function screensaverBounceRandom() {
    console.log("running screensaverBounceRandom screensaver");
    const blackScreen = document.createElement('div');
    blackScreen.style.backgroundColor = "black";
    blackScreen.style.position = "fixed";
    blackScreen.style.width = "100vw";
    blackScreen.style.height = "100vh";
    blackScreen.style.top = "0";
    blackScreen.style.left = "0";
    blackScreen.dataset.screenSaver = true;
    document.body.appendChild(blackScreen);

    const images = [
        "ASSET_DIRECTORY/img/mascots/mascot-pyramid.gif",
        "ASSET_DIRECTORY/img/dollar.png",
        "ASSET_DIRECTORY/img/heart2.gif",
    ]
    const chosenImage = images[Math.floor(Math.random() * images.length)];

    const bouncingElement = document.createElement('img');
    bouncingElement.src = chosenImage;
    bouncingElement.style.height = "200px";
    bouncingElement.style.position = "fixed";
    bouncingElement.dataset.screenSaver = true;
    document.body.appendChild(bouncingElement);
    animationBounce(bouncingElement);
}

/**
 * Animates the movement of an element.
 * 
 * @param {HTMLElement} element - The element to animate.
 * @returns {void}
 */
function animationBounce(element) {
    let x = Math.random() * window.innerWidth;
    let y = Math.random() * window.innerHeight;
    let dirX = (Math.random() < 0.5) ? 1 : -1; // Random initial direction
    let dirY = (Math.random() < 0.5) ? 1 : -1;
    const speed = 2;

    const elementWidth = element.clientWidth;
    const elementHeight = element.clientHeight;

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