// Software Management Functions

/**
 * Loads and runs software on page load.
 * @returns {void}
 */
window.addEventListener("load", function() {
    runAllSoftware();
});

// add software for testing
// document.addEventListener("keydown", function(e) {
//     if(document.activeElement.tagName != "INPUT" && document.activeElement.tagName != "TEXTAREA") {
//         if(e.key == "i") addRandomSoftware();
//     }
// } );

// remove all software for testing
// document.addEventListener("keydown", function(e) {
//     if(document.activeElement.tagName != "INPUT" && document.activeElement.tagName != "TEXTAREA") {
//         if(e.key == "c") removeAllSoftware();
//     }
// } );

/**
 * Saves the software to a cookie.
 * @param {Array<string>} software - An array containing the software to be saved.
 * @returns {void}
 */
function saveSoftwareStorage(software) {
    Cookies.set('software', JSON.stringify(software), { domain: 'DOMAIN', path: '/' });
}

/**
 * Retrieves the software from a cookie.
 * @returns {Array<string>} An array containing the stored software.
 */
function loadSoftwareStorage() {
    const softwareCookie = Cookies.get('software', { domain: 'DOMAIN', path: '/' });
    if (softwareCookie) {
        return JSON.parse(softwareCookie);
    } else {
        return [];
    }
}

/**
 * Checks if the specified software exists in the list of software stored in the cookie.
 * 
 * @param {string} softwareName - The name of the software to check.
 * @returns {boolean} - True if the software installed, otherwise false.
 */
function softwareInstalled(softwareName) {
    const software = loadSoftwareStorage();
    return software.includes(softwareName);
}
window.softwareInstalled = softwareInstalled;

/**
 * Adds an software name to the list of software and saves it to a cookie if it doesn't already exist.
 * 
 * @param {string} softwareName - The name of the software to add.
 * @returns {void}
 */
function addSoftware(softwareName) {
    const software = loadSoftwareStorage();
    
    if (!softwareInstalled(softwareName)) {
        if (availableSoftware.hasOwnProperty(softwareName)) {
            software.push(softwareName);
            saveSoftwareStorage(software);
            runSoftware(softwareName);
        } else {
            console.error("Unknown software:", softwareName);
        }
    } else {
        console.error("Software already installed:", softwareName);
    }
}
window.addSoftware = addSoftware;

/**
 * Adds an random software 
 * 
 * @returns {void}
 */
function addRandomSoftware() {
    const software = loadSoftwareStorage();
    const availableSoftwareKeys = Object.keys(availableSoftware);

    let randomSoftware;
    let softwareInstalledFlag = false;

    if (software.length === availableSoftwareKeys.length) {
        console.error("All available software already exist.");
        return;
    }

    do {
        randomSoftware = availableSoftwareKeys[Math.floor(Math.random() * availableSoftwareKeys.length)];
        softwareInstalledFlag = softwareInstalled(randomSoftware);
    } while (softwareInstalledFlag);

    software.push(randomSoftware);
    saveSoftwareStorage(software);
    runSoftware(randomSoftware);
}
window.addRandomSoftware = addRandomSoftware;

/**
 * Adds all available software to the list of software and saves them to a cookie.
 * If an software already exists, it will not be added again.
 * 
 * @returns {void}
 */
function addAllSoftware() {
    const software = loadSoftwareStorage();
    
    // Iterate through each available software
    for (const softwareName in availableSoftware) {
        if (availableSoftware.hasOwnProperty(softwareName)) {
            // Check if the software already exists in the software array
            if (!softwareInstalled(softwareName)) {
                software.push(softwareName);
                saveSoftwareStorage(software);
                runSoftware(softwareName);
            } else {
                console.error("Software already installed:", softwareName);
            }
        }
    }
}
window.addAllSoftware = addAllSoftware;

/**
 * Removes the specified software from the stored software in the cookie.
 * If the software is not found, an error message is logged.
 * 
 * @param {string} softwareName - The name of the software to be removed.
 * @returns {void}
 */
function removeSoftware(softwareName, quiet=false) {
    const software = loadSoftwareStorage();
    const index = software.indexOf(softwareName);
    if (index !== -1) {
        software.splice(index, 1);
        saveSoftwareStorage(software);
        if(!quiet) {
            location.reload();
        }
    } else {
        console.error("Software not found:", softwareName);
    }
}
window.removeSoftware = removeSoftware;

/**
 * Clears all software from the cookie.
 * @returns {void}
 */
function removeAllSoftware() {
    Cookies.remove('software', { domain: 'DOMAIN', path: '/' });
    location.reload();
}
// make accessible outside in window
window.removeAllSoftware = removeAllSoftware;


/**
 * Runs all stored software.
 * 
 * @returns {void}
 */
function runAllSoftware() {
    const software = loadSoftwareStorage() || [];

    // Iterate through each software and execute corresponding functions
    software.forEach(software => {
        // Check if the specified software exists in the array
        if (availableSoftware.hasOwnProperty(software)) {
            // Execute the corresponding function for the software
            availableSoftware[software]();
        } else {
            console.error("Unknown software:", software);
        }
    });
}

/**
 * Runs a specific software by its name.
 * 
 * @param {string} softwareName - The name of the software to run.
 * @returns {void}
 */
function runSoftware(softwareName) {

    // Check if the specified software exists in the array
    if (availableSoftware.hasOwnProperty(softwareName)) {
        // Execute the corresponding function for the software
        availableSoftware[softwareName]();
    } else {
        console.error("Unknown software:", softwareName);
    }
}


// Software Functionality
// Array containing all available software
const availableSoftware = {
    "bugcollector": softwareBugCollector
};

function softwareBugCollector() {
    if(!window.location.href.toLowerCase().includes("bugcollector")){
        let bugChance = Math.random();
        // let bugChance = 1;
        if(bugChance > 0.6) {
            createBug();
        }

        function createBug() {
            let bugTargetX = 0;
            let bugTargetY = 0;
            let bugTargetFound = true;
            let bugNewLeft = 0;
            let bugNewTop = 0;
            const bugTopMin = 0;
            const bugTopMax = window.screen.height - 150;
            const bugLeftMin = 0;
            const bugLeftMax = window.screen.width - 150;
            const bugSizeMin = 75;
            const bugSizeMax = 175;
            const pauseMin = 200;
            const pauseMax = 6000;
            let pauseTimer = 1;

            const bug = document.createElement("img");
            bug.src = "ASSET_DIRECTORY/img/bug.gif";
            bug.classList.add("malware-bug");
            const bugTop = Math.floor(Math.random() * bugTopMax) + bugTopMin;
            const bugLeft = Math.floor(Math.random() * bugLeftMax) + bugLeftMin;
            const bugSize = Math.floor(Math.random() * bugSizeMax) + bugSizeMin;

            const bugMoveSpeedMax = bugSizeMax / bugSize /4; // speed inverse to size
            const bugMoveSpeedAcceleration = 0.0005;
            let bugMoveSpeedCurrent = 0;
            
            bug.style = `
                top:${bugTop}px;
                left:${bugLeft}px;
                width:${bugSize}px;
            `;
            bug.title = "burg.";
            bug.onclick = function() { bugCatch() };
            document.body.appendChild(bug);
            moveBug(bug);

            function moveBug(bug) {
                if(bugMoveSpeedCurrent < bugMoveSpeedMax) bugMoveSpeedCurrent += bugMoveSpeedAcceleration;
                console.log(bugMoveSpeedMax + ": " + bugMoveSpeedCurrent)
                if(bugTargetFound) newBugTarget();
                bugNewLeft = Number(bug.style.left.slice(0, -2))
                bugNewTop = Number(bug.style.top.slice(0, -2))
                if(!bugTargetFound) {
                    if(bugNewLeft < bugTargetX) {
                        bugNewLeft = bugNewLeft + bugMoveSpeedCurrent;
                    }
                    if(bugNewLeft > bugTargetX) {
                        bugNewLeft = bugNewLeft - bugMoveSpeedCurrent;
                    }
                    if(bugNewTop < bugTargetY) {
                        bugNewTop = bugNewTop + bugMoveSpeedCurrent;
                    }
                    if(bugNewTop > bugTargetY) {
                        bugNewTop = bugNewTop - bugMoveSpeedCurrent;
                    }
                    if(approximatelyEqual(bugNewLeft, bugTargetX, 4) && approximatelyEqual(bugNewTop, bugTargetY, 4)){
                        bugTargetFound = true;
                        pauseTimer = Math.floor(Math.random() * (pauseMax - pauseMin + 1) + pauseMin);
                    }
                    Object.assign(bug.style, {
                        left: bugNewLeft + "px",
                        top: bugNewTop + "px",
                    });
                    setTimeout(function() { 
                        moveBug(bug);
                    }, pauseTimer);
                }
            }

            function newBugTarget() {
                bugTargetX = Math.floor(Math.random() * bugLeftMax) + bugLeftMin;
                bugTargetY = Math.floor(Math.random() * bugTopMax) + bugTopMin;
                console.log(calculateAngle(Number(bug.style.left.slice(0, -2)), Number(bug.style.top.slice(0, -2)), bugTargetX, bugTargetY))
                bug.style.rotate = -calculateAngle(Number(bug.style.left.slice(0, -2)), Number(bug.style.top.slice(0, -2)), bugTargetX, bugTargetY) + "deg";
                bugMoveSpeedCurrent = 0;
                bugTargetFound = false;
                pauseTimer = 1;
            }

            function bugCatch() {
                bug.src="ASSET_DIRECTORY/img/bug-halo.gif";
                if(bug.style.opacity == '') bug.style.opacity = 1;
                if(bug.style.opacity > 0) {
                    bug.style.opacity -= 0.05;
                    setTimeout(bugCatch, 50)
                }
                else {
                    const bugCountCookie = Cookies.get('bugCount');
                    let bugCount = bugCountCookie ? Number(JSON.parse(bugCountCookie)) : 0;
                    bugCount += 1;
                    console.log(JSON.stringify(bugCount));
                    Cookies.set('bugCount', JSON.stringify(bugCount), { domain: 'DOMAIN' , path: '/' });
                    bug.remove();
                }
            }

            function approximatelyEqual (num1, num2, tolerance) {
                return Math.abs(num1 - num2) < tolerance;
            }

            function calculateAngle(x1, y1, x2, y2) {
                // Calculate the differences in the coordinates
                const deltaY = y2 - y1;
                const deltaX = x2 - x1;
            
                // Calculate the angle in radians and convert to degrees
                const radians = Math.atan2(deltaY, deltaX);
                const degrees = radians * (180 / Math.PI);
            
                // Normalize the angle to the range [0, 360)
                return (degrees + 360) % 360;
            }
        }
    }
}