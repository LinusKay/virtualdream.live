//STICKER MANAGEMENT 
window.onload = function() {
    let stickerBin = document.createElement('img');
    stickerBin.src = "../../src/assets/bin.png";
    stickerBin.id = "sticker-bin";
    document.body.appendChild(stickerBin);
    loadStickers();
}

// dec2hex :: Integer -> String
// i.e. 0-255 -> '00'-'ff'
function dec2hex (dec) {
    return dec.toString(16).padStart(2, "0")
  }
  
// generateId :: Integer -> String
function generateId (len) {
var arr = new Uint8Array((len || 40) / 2)
window.crypto.getRandomValues(arr)
return Array.from(arr, dec2hex).join('')
}

// generate random sticker 
// used for testing
let stickerImages = [
        "../../src/assets/scripts/stickers/img/polyfox2-transparent-150x.gif",
        "../../src/assets/scripts/stickers/img/skull-spin.gif",
    ];
document.addEventListener("keydown", function(e) {
    if(e.key == "q") generateSticker();
} );
function generateSticker() {
    let stickerImage = stickerImages[Math.floor(Math.random()*stickerImages.length)];
    let stickerX = Math.floor(Math.random()*100);
    let stickerY = Math.floor(Math.random()*100);
    let stickerZ = getTopStickerZIndex() + 1;
    let stickerId = generateId(16);
    createSticker(stickerImage, stickerX, stickerY, stickerZ, stickerId);
    saveStickers();
}

// load stickers from local storage
function loadStickers() {
    let stickers = []
    if(localStorage.getItem('stickers') != null) {
        stickers = JSON.parse(localStorage.getItem('stickers'));
    } 
    for(let i = 0; stickers[i]; i++) {
        let stickerImage = stickers[i][0];
        let stickerX = stickers[i][1];
        let stickerY = stickers[i][2];
        let stickerZ = stickers[i][3];
        let stickerId = stickers[i][4];
        createSticker(stickerImage, stickerX, stickerY, stickerZ, stickerId);
    }
}

// create and display elements for stickers
function createSticker(stickerImage, stickerX, stickerY, stickerZ, stickerId) {
    let stickerDivElement = document.createElement('div');
    stickerDivElement.classList.add('sticker');
    stickerDivElement.style.position = "fixed";
    stickerDivElement.style.left = stickerX;
    stickerDivElement.style.top = stickerY;
    stickerDivElement.style.zIndex = stickerZ;
    stickerDivElement.ondblclick = function() { deleteSticker(this) };
    let stickerDiv = document.body.appendChild(stickerDivElement);
    let stickerElement = document.createElement('img');
    stickerElement.classList.add('sticker-img');
    stickerElement.src = stickerImage;
    // stickerElement.ondblclick = function() { deleteSticker(this) }
    stickerElement.dataset.stickerId = stickerId;
    let sticker = stickerDiv.appendChild(stickerElement);
    dragElement(stickerDiv);
}

// calculate the highest Z index for all current stickers
function getTopStickerZIndex() {
    let zTop = 0;
    let stickerElements = document.getElementsByClassName('sticker');
    for(let i = 0; stickerElements[i]; i++) {
        stickerZ = parseInt(stickerElements[i].style.zIndex);
        if(stickerZ > zTop) zTop = stickerZ;
    }
    return zTop + 1;
}

// calculate distance between two points
function pointDistance(x1, y1, x2, y2) {
    let a = x1 - x2;
    let b = y1 - y2;
    let c = Math.sqrt(a*a + b*b);
    return c;
}

// save stickers to local storage
function saveStickers() {
    let stickers = [];
    let stickerElements = document.getElementsByClassName('sticker');
    for(let i = 0; stickerElements[i]; i++) {
        let stickerElement = stickerElements[i].getElementsByTagName('img')[0];
        let stickerImage = stickerElement.src;
        let stickerX = stickerElements[i].style.left;
        let stickerY = stickerElements[i].style.top;
        let stickerZ = stickerElements[i].style.zIndex;
        let stickerId = stickerElement.dataset.stickerId;
        let sticker = [stickerImage, stickerX, stickerY, stickerZ, stickerId];
        stickers.push(sticker);
    }
    localStorage.setItem("stickers", JSON.stringify(stickers))
}

// remove sticker from screen
function deleteSticker(sticker) {
    if(confirm("Delete sticker?") == true){ 

        try {
            if(sticker.tagName == "DIV") {
                sticker.remove();
            }
            else {
                sticker.parentElement.remove();
            }
            saveStickers();
        }
        catch(err) {}
        
    }
}

// STICKER DRAG 
function dragElement(element) {
    var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
    element.onmousedown = dragMouseDown;

    function dragMouseDown(e) {
        e = e || window.event;
        e.preventDefault();
        pos3 = e.clientX;
        pos4 = e.clientY;
        let stickerBin = document.getElementById('sticker-bin');
        stickerBin.style.display = "block";
        let stickerBinX = stickerBin.offsetLeft;
        let stickerBinY = stickerBin.offsetTop;
        stickerBinDistance = pointDistance(e.clientX, e.clientY, stickerBinX, stickerBinY);
        if(stickerBinDistance < 50) { stickerBin.style.opacity = "100%"; } else { stickerBin.style.opacity = "50%"; }
        element.style.zIndex = getTopStickerZIndex();
        document.onmouseup = closeDragElement;
        document.onmousemove = elementDrag;
    }

    function elementDrag(e) {
        e = e || window.event;

        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;
        element.style.top = (element.offsetTop - pos2) + "px";
        element.style.left = (element.offsetLeft - pos1) + "px";
    }

    function closeDragElement(e) {
        e = e || window.event;

        document.onmouseup = null;
        document.onmousemove = null;
        let stickerBin = document.getElementById('sticker-bin');
        let stickerBinX = stickerBin.offsetLeft;
        let stickerBinY = stickerBin.offsetTop;
        stickerBin.style.display = "none";
        stickerBinDistance = pointDistance(e.clientX, e.clientY, stickerBinX, stickerBinY);
        if(stickerBinDistance < 100) { deleteSticker(e.target); }
        saveStickers();
    }

}