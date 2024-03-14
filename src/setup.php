<?php 
// Error reporting
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

// Development mode flag
$dev = true;
$assetLocation = $dev ? "../../src/assets" : "https://assets.virtualdream.live";

// Web Rings data
$webRingPresets = [
    ["test", "$assetLocation/img/webrings/webring-web-bin.png", "https://virtualdream.live/webrings/test", "placeholder webring!"],
    ["darknet", "$assetLocation/img/webrings/webring-darknet.png", "https://virtualdream.live/webrings/darknet", "all things dark and creepy&#013;come forth, all creatures of the night!"],
    ["joesales", "$assetLocation/img/webrings/webring-joesales.png", "https://virtualdream.live/webrings/joesales", "$$$$$$$$$$$$$$$$$$$"],
    ["techring", "$assetLocation/img/webrings/webring-tech.png", "https://virtualdream.live/webrings/tech", "BEEP BEEP BEEP"]
];

// Include stickers and malware scripts if not disabled
if(!isset($disableStickers)) {
    echo "<script src='$assetLocation/scripts/stickers/stickers.js'></script>
    <link rel='stylesheet' href='$assetLocation/scripts/stickers/stickers.css'>";
}

if(!isset($disableMalware)) {
    echo "<script src='$assetLocation/scripts/malware/malware.js'></script>
    <link rel='stylesheet' href='$assetLocation/scripts/malware/malware.css'>";
}

// Inline styles
echo "<style>
    html {
        ";
if(isset($backgroundImage)) { echo "background: url('$backgroundImage');\n"; }
if(isset($backgroundColour)) { echo "background: $backgroundColour;\n"; }
if(isset($cursorCustom)) { echo "cursor: url('$cursorCustom'), auto;"; }
echo "
    }
</style>";

// Cursor Follow feature
if(isset($cursorFollow)) {
    echo "
    <!-- Cursor Follow -->
    <img id='cursor-follow' src='$cursorFollow' style='position:absolute; z-index:99;'>
    <script>
        onmousemove = function(e){
            var cursorFollow = document.getElementById('cursor-follow');
            let offset = 10;
            let left = e.pageX + offset;
            let top = e.pageY + offset;
            cursorFollow.style.left = left + 'px';
            cursorFollow.style.top = top + 'px';
        }
    </script>
    <!-- /Cursor Follow -->
    ";
}

// Display Web Rings
if(isset($webRings)) {
    $webRingInput = is_array($webRings) ? $webRings : [$webRings];
    $webRingData = [];

    foreach($webRingInput as $webRingInputItem) {
        if(is_array($webRingInputItem)) {
            array_push($webRingData, $webRingInputItem);
        }
        else {
            foreach($webRingPresets as $ring) {
                if($ring[0] == $webRingInputItem) {
                    array_push($webRingData, $ring);
                }
            }
        }
    }

    if(count($webRingData) > 0) {
        echo "
        <!-- web ring -->
        <div id='webring-container' style='position:fixed;bottom:25px;right:25px;margin:0;'>
            <span style='color:lightgray;font-size:10px;margin:0;text-align:left;'>Web Rings<br></span>";
        foreach($webRingData as $webRing) {
            [$webRingName, $webRingImage, $webRingLink, $webRingTagline] = $webRing;
            echo "
            <a href='$webRingLink' title='$webRingName Web Ring&#013;$webRingTagline' style='text-decoration:none;'>
                <img src='$webRingImage' style='margin:0;'>
            </a>";
        }
            
        echo "
        </div>
        <!-- /web ring -->
        ";
    }
}
?>
