<?php 
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

# WEBRINGS
# name, image, link
$webRings = [
    [
        "test", "../../src/assets/img/webrings/webring-web-bin.png", "https://virtualdream.live/test"
    ],
    [
        "darknet", "../../src/assets/img/webrings/webring-darknet.png", "https://virtualdream.live/darknet"
    ]
];

# VARIABLES
# backgroundImage
# backgroundColour
# cursorCustom
# cursorFollow
# webRing

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
if(isset($webRingInput)) {
    # convert single string input to array
    if(!is_array($webRingInput)) {
        $webRingInput = [$webRingInput];
    }
    $webRingData = [];
    # loop through input webrings
    # if webring exists in existing webrings, add to final array
    # if webring doesn't exist, ignore
    foreach($webRingInput as $webRingInputItem) {
        $webRingFound = false;
        foreach($webRings as $ring) {
            if($ring[0] == $webRingInputItem) {
                $webRingFound = true;
                array_push($webRingData, $ring);
            }
        }
    }
    // echo "webRingData";
    // print_r($webRingData);

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
            echo "<a href='$webRingLink'>
                <img src='$webRingImage' style='margin:0;'>
            </a>
            ";
        }
            
        echo "
        </div>
        ";
    }
}
?>