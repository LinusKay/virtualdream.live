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
        <title>Virtual Dream - Stickers</title>
        <style> 
        body {
            text-align:center;
            width:800px;
            margin:auto;
            font-family:Arial, Helvetica, sans-serif;
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
        .prevent-select {
            -webkit-user-select: none;
            -ms-user-select: none; 
            user-select: none; 
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

                // load unlocked stickers
                // CURRENT METHOD DOES NOT WORK
                // sticker numbers change when unlocking more, so selections will change or break
                if(isset($_COOKIE['stickerPackMalPals'])) { include('../../src/assets/scripts/stickers/stickerpackmalpals.php'); }
                if(isset($_COOKIE['stickerPackSales'])) { include('../../src/assets/scripts/stickers/stickerpacksales.php'); }
                if(isset($_COOKIE['stickerPack10000000'])) { include('../../src/assets/scripts/stickers/stickerpack10000000.php'); }

                $columns = 5;
                foreach($stickers as $index => $sticker) {
                    if ($index % $columns == 0) {
                        echo "<tr>";
                    }
                    $stickerSrc = $sticker[0];
                    $stickerName = $sticker[1];
                    $stickerPack = $sticker[2];
                    echo "
                    <td class='stickercontainer' data-index=$index>
                        <img class='stickerimage' src='$stickerSrc' onclick='selectRadioImageClick(this)' title='$stickerName&#013;Pack: $stickerPack'>
                        <input type='checkbox' onclick='handleRadioClick(this)' checked>
                    </td>";
                    if ($index % $columns == $columns-1 || $index == count($stickers) - 1) {
                        echo "</tr>";
                    }
                }
            ?>
        </table>
        <button id="clearAll">Clear Stickers</button>
        <br>
        <font face="verdana" size="-2">Copyright © <a href="https://virtualdream.live/">Virtual Dream</a>. All rights reserved.</font>
    </body>
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
            Cookies.set('stickersEnabled', JSON.stringify(stickersEnabled), { domain: '<?php echo $baseDomain?>' , path: '/' });
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