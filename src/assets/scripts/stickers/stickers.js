// Event Listeners 

/**
 * Event listener triggers when the window finishes loading.
 * Creates sticker bin element, appends to the document body, loads stickers.
 */
window.addEventListener("load", function onLoad() {
    const stickerBin = createStickerBin();
    document.body.appendChild(stickerBin);
    loadStickers();
});

/**
 * Event listener that triggers when a key is pressed.
 * If the pressed key is 'q', generates a random sticker.
 * 
 * @param {KeyboardEvent} e - The keyboard event object.
 */
document.addEventListener("keydown", function(e) {
    if(e.key == "q") generateRandomSticker();
} );


// Helper Functions

/**
 * Converts a decimal number to a two-digit hexadecimal string.
 * 
 * @param {number} dec - The decimal number to convert.
 * @returns {string} The hexadecimal representation of the input number.
 * @throws {Error} If the input is not a number.
 */
function dec2hex(dec) {
    if (isNaN(dec)) {
        throw new Error("Input is not a number");
    }
    return dec.toString(16).padStart(2, "0");
}
  
/**
 * Generates a random hexadecimal ID of the specified length.
 * 
 * @param {number} len - The length of the ID to generate.
 * @returns {string} A random hexadecimal ID.
 */
function generateId(len) {
    if (typeof len !== 'number' || len <= 0) {
        len = 40; // Default length
    }
    const arr = new Uint8Array(len / 2);
    window.crypto.getRandomValues(arr);
    return Array.from(arr, dec2hex).join('');
}

/**
 * Finds the highest z-index among all elements in the document.
 * 
 * @returns {number} The highest z-index value found.
 */
function getHighestZIndex() {
    let highestZIndex = 0;
    const allElements = document.querySelectorAll('*');
    allElements.forEach(element => {
        const zIndex = parseInt(window.getComputedStyle(element).zIndex);
        if (!isNaN(zIndex) && zIndex > highestZIndex) {
            highestZIndex = zIndex;
        }
    });
    return highestZIndex;
}

/**
 * Calculates the Euclidean distance between two points.
 * 
 * @param {number} x1 - The x-coordinate of the first point.
 * @param {number} y1 - The y-coordinate of the first point.
 * @param {number} x2 - The x-coordinate of the second point.
 * @param {number} y2 - The y-coordinate of the second point.
 * @returns {number} The distance between the two points.
 */
function pointDistance(x1, y1, x2, y2) {
    const deltaX = x1 - x2;
    const deltaY = y1 - y2;
    const distance = Math.sqrt(deltaX * deltaX + deltaY * deltaY);
    return distance;
}


// Sticker Management Functions

/**
 * Creates and returns an image element representing a sticker bin.
 * 
 * @returns {HTMLImageElement} The sticker bin image element.
 */
function createStickerBin() {
    const stickerBin = document.createElement('img');
    
    stickerBin.src = "ASSET_DIRECTORY/bin.png";
    stickerBin.id = "sticker-bin";
    
    return stickerBin;
}

/**
 * Loads sticker data from a cookie and creates sticker elements.
 * 
 * @returns {void}
 */
function loadStickers() {
    const stickersCookie = Cookies.get('stickers');
    const stickers = stickersCookie ? JSON.parse(stickersCookie) : [];

    stickers.forEach(stickerData => {
        const [stickerImage, stickerX, stickerY, stickerZ, stickerId] = stickerData;
        createSticker(stickerImage, stickerX, stickerY, stickerZ, stickerId);
    });
}

/**
 * Saves all existing sticker data to a cookie.
 * 
 * @returns {void}
 */
function saveStickers() {
    const stickers = [];
    const stickerElements = document.getElementsByClassName('sticker');
    
    for (const stickerElement of stickerElements) {
        const stickerImage = stickerElement.querySelector('img').src;
        const stickerX = stickerElement.style.left;
        const stickerY = stickerElement.style.top;
        const stickerZ = stickerElement.style.zIndex;
        const stickerId = stickerElement.querySelector('img').dataset.stickerId;
    
        const sticker = [stickerImage, stickerX, stickerY, stickerZ, stickerId];
        stickers.push(sticker);
    }
    
    Cookies.set('stickers', JSON.stringify(stickers), { domain: 'DOMAIN', path: '/' });
}

/**
 * Generates a sticker with random image and position and saves it to local storage.
 * 
 * @returns {void}
 */
function generateRandomSticker() {
    const stickerImages = [
        "ASSET_DIRECTORY/img/stickers/polyfox2-transparent.gif",
        "ASSET_DIRECTORY/img/stickers/skull-spin.gif",
        "ASSET_DIRECTORY/img/stickers/mascot-pyramid.png",
        "ASSET_DIRECTORY/img/stickers/yippee200x.png",
        "ASSET_DIRECTORY/img/stickers/catfish.png",
    ];
    const stickerImage = stickerImages[Math.floor(Math.random() * stickerImages.length)];
    const stickerX = Math.floor(Math.random() * 100);
    const stickerY = Math.floor(Math.random() * 100);
    const stickerZ = getHighestZIndex() + 1;
    const stickerId = generateId(16);
    
    createSticker(stickerImage, stickerX, stickerY, stickerZ, stickerId);
    saveStickers();
}

/**
 * Creates and displays a sticker on the webpage.
 * 
 * @param {string} stickerImage - The URL of the sticker image.
 * @param {number} stickerX - The horizontal position of the sticker.
 * @param {number} stickerY - The vertical position of the sticker.
 * @param {number} stickerZ - The z-index of the sticker.
 * @param {string} stickerId - The unique ID of the sticker.
 */
function createSticker(stickerImage, stickerX, stickerY, stickerZ, stickerId) {
    const stickerDivElement = document.createElement('div');
    stickerDivElement.classList.add('sticker');
    stickerDivElement.style.position = "fixed";
    stickerDivElement.style.left = stickerX;
    stickerDivElement.style.top = stickerY;
    stickerDivElement.style.zIndex = stickerZ;
    stickerDivElement.ondblclick = function() { deleteSticker(this) };
    
    const stickerDiv = document.body.appendChild(stickerDivElement);
    
    const stickerElement = document.createElement('img');
    stickerElement.classList.add('sticker-img');
    stickerElement.src = stickerImage;
    stickerElement.dataset.stickerId = stickerId;
    
    stickerDiv.appendChild(stickerElement);
    
    dragElement(stickerDiv);
}

/**
 * Deletes the specified sticker element from the document.
 * If confirmed by the user, removes the sticker element and saves the updated stickers to local storage.
 * 
 * @param {HTMLElement} sticker - The sticker element to delete.
 */
function deleteSticker(sticker) {
    if (confirm("Delete sticker?")) {
        try {
            if (sticker.tagName === "DIV") {
                sticker.remove();
            }
            else {
                sticker.parentElement.remove();
            }
            saveStickers();
        } catch (err) {
            console.error("Error deleting sticker:", err);
        }
    }
}

/**
 * Clears all stickers from the local storage.
 * @returns {void}
 */
function deleteAllStickers() {
    Cookies.remove('stickers', { domain: 'DOMAIN', path: '/' });
    location.reload();
}


// Dragging Functions

/**
 * Enables dragging functionality for the specified element.
 * 
 * @param {HTMLElement} element - The element to enable dragging for.
 */
function dragElement(element) {
    let pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
    const actionDistance = 125;

    // Function triggered when the mouse is pressed down on the element
    element.onmousedown = dragMouseDown;

    function dragMouseDown(e) {
        e = e || window.event;
        e.preventDefault();
        pos3 = e.clientX;
        pos4 = e.clientY;

        // Set the zIndex of the dragged element and attach event listeners for mouse movements
        element.style.zIndex = getHighestZIndex();
        document.onmouseup = closeDragElement;
        document.onmousemove = elementDrag;
    }

    // Function triggered when the mouse is moved while the element is being dragged
    function elementDrag(e) {
        e = e || window.event;
        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;
    
        // Adjust the position of the element based on the mouse movement
        element.style.top = (element.offsetTop - pos2) + "px";
        element.style.left = (element.offsetLeft - pos1) + "px";
    
        // Get the bounding rectangles of the sticker and sticker bin
        const stickerRect = element.getBoundingClientRect();
        const stickerBin = document.getElementById('sticker-bin');
        const stickerBinRect = stickerBin.getBoundingClientRect();
    
        // Calculate the center points of the sticker and sticker bin
        const stickerCenterX = stickerRect.left + stickerRect.width / 2;
        const stickerCenterY = stickerRect.top + stickerRect.height / 2;
        const stickerBinCenterX = stickerBinRect.left + stickerBinRect.width / 2;
        const stickerBinCenterY = stickerBinRect.top + stickerBinRect.height / 2;
    
        // Calculate the distance between the centers of the sticker and sticker bin
        const stickerBinDistance = pointDistance(stickerCenterX, stickerCenterY, stickerBinCenterX, stickerBinCenterY);
    
        // Display the sticker bin and adjust its opacity based on the distance from the element
        stickerBin.style.display = "block";
        stickerBin.style.zIndex = e.target.parentElement.style.zIndex - 1;
        stickerBin.style.opacity = (stickerBinDistance < actionDistance) ? "100%" : "50%";
        stickerBin.src = (stickerBinDistance < actionDistance / 2) ? "ASSET_DIRECTORY/bin-open-full2.png" : (stickerBinDistance < actionDistance) ? "ASSET_DIRECTORY/bin-open.png" : "ASSET_DIRECTORY/bin.png";
    }
    

    // Function triggered when the mouse button is released, ending the drag operation
    function closeDragElement(e) {
        e = e || window.event;
        document.onmouseup = null;
        document.onmousemove = null;

        // Hide the sticker bin and determine if the element should be deleted
        let stickerBin = document.getElementById('sticker-bin');
        let stickerBinX = stickerBin.offsetLeft;
        let stickerBinY = stickerBin.offsetTop;
        let stickerBinDistance = pointDistance(e.clientX, e.clientY, stickerBinX, stickerBinY);
        if (stickerBinDistance < actionDistance) { deleteSticker(e.target); }
        saveStickers();
        stickerBin.style.display = "none";
    }
}
