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
    </body>
    <script>
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
            console.log(typeof stickersEnabled);
            stickersEnabled.push(stickerId);
            saveStickersEnabled();
        }

        function disableSticker(stickerContainer) {
            const stickerId = stickerContainer.dataset.index;
            const stickersEnabledIndex = stickersEnabled.indexOf(stickerId);
            stickersEnabled.splice(stickersEnabledIndex, 1);
            saveStickersEnabled();
            console.log(stickersEnabled);
        }

        function saveStickersEnabled() {
            Cookies.set('stickersEnabled', JSON.stringify(stickersEnabled), { domain: '<?php echo $environment === 'local' ? 'localhost' : '.virtualdream.live';?>' , path: '/' });
        }

        function loadStickersEnabled() {
            console.log("load")
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