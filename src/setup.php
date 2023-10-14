<?php 
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

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

#include('malware.php');
?>