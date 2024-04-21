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
        <title>Stickers</title>
        <link rel="stylesheet" href="style.css">
        <style> 
        body {
            text-align:center;
            width:800px;
            margin:auto;
        }
        .stickercontainer {
            width:150px;
            height:150px;
            border:solid 1px black;
            position:relative;
        }
        .stickercontainer img {
            max-width:100px;
        }
        .stickercontainer img:hover {
            border: dashed 1px gray;
            box-sizing: border-box;
            cursor:pointer;
        }
        .stickercontainer input {
            display:block;
            width:100%;
            position:absolute;
            bottom:10px;
            margin:0;
        }

        </style>
    </head>
    <body>
        <h1>Select stickers</h1>
        <p>Create random stickers on any Virtual Dream page by pressing the <b>s</b> key on your keyboard!</p>
        <p>Enable/disable any stickers below!</p>
        <table>
            <?php
                include('../../src/assets/scripts/stickers/configurestickers.php');
                $columns = 5;
                foreach($stickers as $index => $sticker) {
                    if ($index % $columns == 0) {
                        echo "<tr>";
                    }
                    echo "
                    <td class='stickercontainer' data-index=$index>
                        <img class='stickerimage' src='$sticker' onclick='selectRadioImageClick(this)'>
                        <input type='checkbox' onclick='handleRadioClick(this)' checked>
                    </td>";
                    if ($index % $columns == $columns-1 || $index == count($stickers) - 1) {
                        echo "</tr>";
                    }
                }
            ?>
        </table>
        <button id="clearAll">Clear Stickers</button>
    </body>
    <script>
        let cursorHealth = 100;
        let cursorMoveSpeedLeft = 1;
        let cursorMoveSpeedTop = 1;
        let cursorTargetElement = null;
        let cursorTargetFound = false;
        let allElements = null;
        let newLeft = 0;
        let newTop = 0;

        const cursorHealthPara = document.createElement("p");
        cursorHealthPara.innerText = `Cursor Health: ${cursorHealth}`;
        Object.assign(cursorHealthPara.style, {
            position: "fixed",
            textAlign: "center",
            top: "10px",
            left: "0px",
            backgroundColor: "gray",
            width: "100%"
        });
        document.body.appendChild(cursorHealthPara);
        const cursor = document.createElement("img");
        cursor.src = "../../src/assets/img/cursor.png";
        cursor.ondragstart = function() { return false; };
        Object.assign(cursor.style, {
            position:"absolute",
            top:"100px",
            left: "100px",
            cursor: "grabbing",
            padding: "20px",
            border: "solid 1px black"
        });
        cursor.addEventListener("click", function() {
            lowerCursorHealth(25);
        });
        document.body.appendChild(cursor);
        moveCursor(cursorMoveSpeedLeft, cursorMoveSpeedTop);

        function lowerCursorHealth(amount) {
            cursorHealth -= amount;
            cursorHealthPara.innerText = `Cursor Health: ${cursorHealth}`;
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
            cursor.src = "../../src/assets/img/explosion.gif";
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
            console.log(cursorTargetFound)
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
                    console.log("bingo")
                    cursorTargetFound = true;
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
                setTimeout(function() { 
                    cursorNewTarget();
                }, 1000);
            }
        }

        function cursorNewTarget() {
            if(allElements == null) {
                allElements = document.body.querySelectorAll("*");
            }
            cursorTargetElement = allElements[Math.floor(Math.random()*allElements.length)];
            console.log("new target")
            console.log(cursorTargetElement)
            cursorTargetFound = false;
            if(cursorHealth > 0) {
                moveCursor(cursorMoveSpeedLeft, cursorMoveSpeedTop);
            }
        }
    </script>
    <script>

        document.querySelector("#clearAll").addEventListener("click", function() {
            window.deleteAllStickers();
        })

        window.addEventListener("load", function() {
            loadStickersEnabled();
        });

        let stickersEnabled = [];

        function selectRadioImageClick(imageElement) {
            const parentDiv = imageElement.parentNode;
            const radioInput = parentDiv.querySelector('input[type="checkbox"]');
            if(radioInput.checked) {
                radioInput.checked = false;
                disableSticker(parentDiv);
            }
            else {
                radioInput.checked  = true;
                enableSticker(parentDiv);
            }
        }

        function handleRadioClick(inputElement) {
            const parentDiv = inputElement.parentNode;
            inputElement.checked ? enableSticker(parentDiv) : disableSticker(parentDiv);
        }

        function enableSticker(stickerContainer) {
            const stickerId = stickerContainer.dataset.index;
            stickersEnabled.push(stickerId);
            saveStickersEnabled();
        }

        function disableSticker(stickerContainer) {
            const stickerId = stickerContainer.dataset.index;
            const stickersEnabledIndex = stickersEnabled.indexOf(stickerId);
            stickersEnabled.splice(stickersEnabledIndex, 1);
            saveStickersEnabled();
        }

        function saveStickersEnabled() {
            Cookies.set('stickersEnabled', JSON.stringify(stickersEnabled), { domain: '<?php echo $environment === 'local' ? 'localhost' : '.virtualdream.live';?>' , path: '/' });
        }

        function loadStickersEnabled() {
            const stickersEnabledCookie = Cookies.get('stickersEnabled');
            stickersEnabled = stickersEnabledCookie ? JSON.parse(stickersEnabledCookie) : ["0", "1", "2", "3", "4", "5", "6", "7"];
            const radioElements = document.body.querySelectorAll('input[type="checkbox"]');
            radioElements.forEach(radioElement => {
                const stickerId = radioElement.parentNode.dataset.index;
                if(stickersEnabled.indexOf(stickerId) == -1) {
                    radioElement.checked = false;
                }
                else {
                    radioElement.checked = true;
                }
            })
        }
    </script>
</html>