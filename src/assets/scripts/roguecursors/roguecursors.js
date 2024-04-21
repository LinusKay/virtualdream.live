function createRogueCursor(nameArray, defeatable = false) {
    let cursorHealth = 100;
    let cursorMoveSpeedLeft = 1;
    let cursorMoveSpeedTop = 1;
    let cursorTargetElement = null;
    let cursorTargetFound = false;
    let allElements = null;
    let newLeft = 0;
    let newTop = 0;
    let pauseMin = 200;
    let pauseMax = 2000;

    if(!nameArray.constructor === Array) nameArray = [nameArray];

    let hackerName = nameArray[Math.floor(Math.random()*nameArray.length)];

    const cursor = document.createElement("div");
    Object.assign(cursor.style, {
        position:"absolute",
        top:"100px",
        left: "100px",
        cursor: "grabbing",
        textAlign: "left",
        fontFamily: "consolas",
        fontSize: "11px"
    });
    cursor.addEventListener("click", function() {
        lowerCursorHealth(25);
    });
    cursor.classList.add("prevent-select");
    document.body.appendChild(cursor);

    const cursorImg = document.createElement("img");
    cursorImg.src = "ASSET_DIRECTORY/img/cursor.png";
    cursorImg.ondragstart = function() { return false; };
    cursor.appendChild(cursorImg);

    const cursorNamePara = document.createElement("p");
    cursorNamePara.innerText = `${hackerName}`;
    cursorNamePara.style.margin = 0;
    cursor.appendChild(cursorNamePara);

    const cursorHealthPara = document.createElement("p");
    cursorHealthPara.innerText = `Health: ${cursorHealth}`;
    cursorHealthPara.style.margin = 0;
    if(defeatable) { cursor.appendChild(cursorHealthPara); }

    moveCursor(cursorMoveSpeedLeft, cursorMoveSpeedTop);

    function lowerCursorHealth(amount) {
        cursorHealth -= amount;
        cursorHealthPara.innerText = `Health: ${cursorHealth}`;
        if(cursorHealth <= 0) {
            cursorDefeated();
        }
    }

    function cursorDefeated() {
        cursorHealthPara.innerText = "You win!";
        Object.assign(cursor.style, {
            left: cursor.style.left.slice(0, -2) - 30 + "px",
            top: cursor.style.left.slice(0, -2) - 30 + "px",
        });
        cursor.src = "ASSET_DIRECTORY/img/explosion.gif";
        setTimeout(function() { 
            cursorEventClear();
        }, 800);
    }

    function cursorEventClear() {
        cursor.remove();
        cursorHealthPara.remove();
    }

    function moveCursor(leftDistance, topDistance) {
        if(cursorTargetElement == null) {
            cursorNewTarget();
        }
        let targetBoundingLeft = cursorTargetElement.getBoundingClientRect().left;
        let targetBoundingRight = cursorTargetElement.getBoundingClientRect().right;
        let targetLeft = Math.round(targetBoundingLeft + ((targetBoundingRight - targetBoundingLeft) / 2));

        let targetBoundingTop = cursorTargetElement.getBoundingClientRect().top;
        let targetBoundingBottom = cursorTargetElement.getBoundingClientRect().bottom;
        let targetTop = Math.round(targetBoundingTop + ((targetBoundingBottom - targetBoundingTop) / 2));
        
        newLeft = Number(cursor.style.left.slice(0, -2))
        newTop = Number(cursor.style.top.slice(0, -2)) 
        if(!cursorTargetFound) {
            if(newLeft < targetLeft) {
                newLeft = newLeft + leftDistance;
            }
            if(newLeft > targetLeft) {
                newLeft = newLeft - leftDistance;
            }
            if(newTop < targetTop) {
                newTop = newTop + topDistance;
            }
            if(newTop > targetTop) {
                newTop = newTop - topDistance;
            }
            if(newLeft == targetLeft && newTop == targetTop) {
                cursorTargetFound = true;
                // cursorTargetElement.click();
            }
            Object.assign(cursor.style, {
                left: newLeft + "px",
                top: newTop + "px",
            });
            if(cursorHealth > 0) {
                setTimeout(function() { 
                    moveCursor(cursorMoveSpeedLeft, cursorMoveSpeedTop);
                }, 1);
            }
        }
        else {
            let pauseTimer = Math.floor(Math.random() * (pauseMax - pauseMin + 1) + pauseMin);
            setTimeout(function() { 
                cursorNewTarget();
            }, pauseTimer);
        }
    }

    function cursorNewTarget() {
        if(allElements == null) {
            allElements = document.body.querySelectorAll("*");
        }
        var filteredElements = Array.from(allElements).filter(function(element) {
            return element !== cursor && element !== cursorImg && element !== cursorHealthPara && element !== cursorNamePara;
        });
        cursorTargetElement = filteredElements[Math.floor(Math.random()*filteredElements.length)];
        cursorTargetFound = false;
        if(cursorHealth > 0) {
            moveCursor(cursorMoveSpeedLeft, cursorMoveSpeedTop);
        }
    }
}
window.createRogueCursor = createRogueCursor;