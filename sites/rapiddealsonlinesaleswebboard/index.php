<!DOCTYPE html>
<html>
<head>
<?php 
    # PAGE SETUP
    $cursorFollow = "src/img/cursor/hand-point-62x62.png";
    include('../../src/setup.php');
    # /PAGE SETUP
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/cursor-effects@latest/dist/browser.js"></script>
<script>
	window.addEventListener("load", (event) => {
	new cursoreffects.textFlag({text: "BUY! BUY! BUY!",color:["#FF6800"]});
	});
</script>
<style>
	
*{
	margin:0;
}
html {
	background:palegreen;
}
body{
	overflow-x:hidden;
	background-image: url("src/img/dollar.png");
  	background-repeat: repeat;
	margin:auto;
	font-family: 'Arial', monospace;
}
#adspace {
	margin:25px;
	width:100%;
	float:left;
	text-align:center;
}
.advertisement {
	border:none;
	display:block;
	margin:auto;
}
#adarea {
	max-width:1200px;
	margin:auto;
	height:100%;
	position:relative;
	display:block;
	overflow: hidden;
}
marquee{
	position:absolute;
	display:block;
	width:100%;
	z-index:3;
	font-size:2em;
}
a{
	z-index:5;
}
h1, h3{
	text-align:center;
}
@keyframes blink{
	50%{
		opacity:0;
	}
}
.blink {
	animation: blink 1s step-start infinite;
}
#header {
	background:palegreen;
	padding:10px;
}
</style>
</head>
<?php

function roundUpToAny($n) {
    return round(($n*2)/10)*4;
}

$readtag = file_get_contents('src/taglines.txt'); 			//Load taglines
$taglines = explode(",", $readtag);						//Split taglines into array

$readprod = file_get_contents('src/products.txt');			//Load products
$products = explode(",", $readprod);					//Split products into array

$colours = ['lightcyan', 'beige'];			//Colours for ad background

$borders = ['dotted', 'dashed', 'solid', 'double'];		//Styles for ad border

$fontstyle = ['normal', 'italic'];						//Styles for ad fontstyle

$fontweight = ['normal', 'bold'];						//Styles for ad fontweight
?>

<body>
	<div id="header">
		<h1>Rapid Deals Online Sales Web Board</h1>
		<h3>Best deals from across the web net</h3>
		<h3><strong>For purhcases, EMAIL joesales@virtualdream.live</strong></h3>
	</div>
	<hr>
	<br>
	<div id="adarea">
		<?php
		for($x=0;$x<3;$x++){
			for($i=0;$i<40;$i++){
				$product = $products[rand(0,count($products)-1)]; //Select a product
				$adtext = str_replace('product', $product, $taglines[rand(0,count($taglines)-1)]); //Select an ad template
				$bgcol = $colours[rand(0,count($colours)-1)]; //Select a background colour 
				$border = $borders[rand(0,count($borders)-1)]; //Select a border style 
				$fstyle = $fontstyle[rand(0,count($fontstyle)-1)]; //select font style 
				$fweight = $fontweight[rand(0,count($fontweight)-1)]; //select font weight
				$price = rand(10,1000);
				echo "<div id='ad' 					
						style='								
							width:300px; 					
							background:".$bgcol."; 			
							overflow:hidden; 				
							float:left; 					
							border:".$border." black 2px; 	
							font-style:".$fstyle."; 		
							font-weight:".$fweight."; 		
							white-space:nowrap;
							box-sizing:border-box;
							display:inline-block;
							position:relative;'>			
						<img 								
							src='src/img/".$product.".png' 			
							style='							
							width:50px;						
							float:left'>					
						$adtext
						<p class='price'>$".$price."
					</div>									
					<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->\n";
			}
			echo '<div id="adspace">';
			if(rand(0,1) == 0) {
				include("../advertising/getbanner.php");
			}
			else {
				include("../advertising/getcard.php");
			}
			
			echo '</div>';
		}

		/*
		for($m=0;$m<20;$m++){
			$blinktrue = rand(0,1);
			if($blinktrue) {
				echo "\n".'<marquee class="blink" style="top:'.rand(0,4500).'px;'. //Calculate how far the marquee should be from the top of the page
				'	width:'.rand(1200,2500).'px;'.					//Calculate how wide the marquee should be. This affects how long before it shows on screen.
				'	color:#'.str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT).';">'. //Calculate a text colour for the marquee
				'<b>'.str_replace('product', $products[rand(0,count($products)-1)], $taglines[rand(0,count($taglines)-1)]).'</b></marquee>'; //Set the line and product for the marquee
			}
			else {
				echo "\n".'<marquee style="top:'.rand(0,4500).'px;'. //Calculate how far the marquee should be from the top of the page
				'	width:'.rand(1200,2500).'px;'.					//Calculate how wide the marquee should be. This affects how long before it shows on screen.
				'	color:#'.str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT).';">'. //Calculate a text colour for the marquee
				'<b>'.str_replace('product', $products[rand(0,count($products)-1)], $taglines[rand(0,count($taglines)-1)]).'</b></marquee>'; //Set the line and product for the marquee
			}
			
		}
		*/
		?>
	</div>
</body>
</html>