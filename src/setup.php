<?php 
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

# WEBRINGS
# name, image, link
$webRingPresets = [
    [
        "test", "../../src/assets/img/webrings/webring-web-bin.png", "https://virtualdream.live/webrings/test", "placeholder webring!"
    ],
    [
        "darknet", "../../src/assets/img/webrings/webring-darknet.png", "https://virtualdream.live/webrings/darknet", "all things dark and creepy&#013;come forth, all creatures of the night!"
    ],
    [
        "joesales", "../../src/assets/img/webrings/webring-joesales.png", "https://virtualdream.live/webrings/joesales", "$$$$$$$$$$$$$$$$$$$"
    ],
    [
        "techring", "../../src/assets/img/webrings/webring-tech.png", "https://virtualdream.live/webrings/tech", "BEEP BEEP BEEP"
    ]
];

# VARIABLES
# backgroundImage
# backgroundColour
# cursorCustom
# cursorFollow
# webRings

 if(!isset($disableStickers)) {
    echo "
    <script src='../../src/assets/scripts/stickers/stickers.js' defer></script>
    <link rel='stylesheet' href='../../src/assets/scripts/stickers/stickers.css'>"
    ;
 }
 if(!isset($disableMalware)) {
    echo "
    <script src='../../src/assets/scripts/malware/malware.js' defer></script>
    <link rel='stylesheet' href='../../src/assets/scripts/malware/malware.css'>"
    ;
 }
 
# STYLESHEETS
echo "
    <style>
        html {
            ";
                if(isset($backgroundImage)) { echo "background: url('$backgroundImage');\n"; }
                if(isset($backgroundColour)) { echo "background: $backgroundColour;\n"; }
                if(isset($cursorCustom)) { echo "cursor: url('$cursorCustom'), auto;"; }
        echo "
        }
    </style>";

#CONTENT
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
if(isset($webRings)) {
    $webRingInput = $webRings;
    # convert single string input to array
    if(!is_array($webRingInput)) {
        $webRingInput = [$webRingInput];
    }
    $webRingData = [];
    # loop through input webrings
    # if webring exists in existing webrings, add to final array
    # if webring doesn't exist, ignore
    foreach($webRingInput as $webRingInputItem) {
        # allow input of custom web rings not already in preset list
        if(is_array($webRingInputItem)) {
            array_push($webRingData, $webRingInputItem);
        }
        else {
            $webRingFound = false;
            foreach($webRingPresets as $ring) {
                if($ring[0] == $webRingInputItem) {
                    $webRingFound = true;
                    array_push($webRingData, $ring);
                }
            }
        }
    }

    # display webring unless empty
    if(count($webRingData) > 0) {
        echo "
        <!-- web ring -->
        <div id='webring-container' style='position:fixed;bottom:25px;right:25px;margin:0;'>
            <span style='color:lightgray;font-size:10px;margin:0;text-align:left;'>Web Rings<br></span>";
        foreach($webRingData as $webRing) {
            $webRingName = $webRing[0];
            $webRingImage = $webRing[1];
            $webRingLink = $webRing[2];
            if(count($webRing) > 3) {$webRingTagline = $webRing[3];} else {$webRingTagline = "";}
            
            echo "
            <a href='$webRingLink' title='$webRingName Web Ring&#013;$webRingTagline'>
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