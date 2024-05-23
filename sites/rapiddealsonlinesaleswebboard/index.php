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
	<script>
		window.addEventListener('load', function() { 
			var shopperNames = [
				"BigShopper53",
				"ShopManiac",
				"DealsDynamo",
				"SaleSeeker99",
				"BargainHunter24",
				"FashionFrenzy",
				"BudgetBuyer",
				"StyleSavvy",
				"DiscountDivine",
				"ThriftyTrendsetter",
				"LuxuryLooter",
				"SavingsSleuth",
				"FashionistaFinder",
				"BoutiqueBargainer",
				"MarketMaven",
				"ValueVoyager",
				"RetailRover",
				"DealDiva",
				"PriceHunter",
				"SaleSniper"
			];
			let shoppersMin = 1;
			let shoppersMax = 20;
			let shopperCartValueMin = 1.50;
			let shopperCartValueMax = 1000;
			let shoppers = Math.floor(Math.random() * (shoppersMax - shoppersMin + 1) + shoppersMin);
			document.getElementById("shopperCount").innerHTML = shoppers;
			for (let i = 0; i < shoppers; i++) {
				let shopperNameIndex = Math.floor(Math.random() * shopperNames.length);
				let shopperName = shopperNames[shopperNameIndex];
				let shopperCartValue = "Cart: $" + Math.floor(Math.random() * (shopperCartValueMax - shopperCartValueMin + 1) + shopperCartValueMin);
				window.createRogueCursor(shopperName, false, shopperCartValue); 
			}
		});
	</script>
	<title>$ $ $ RAPID SALES $ $ $</title>
	<style>
		
	*{
		margin:0;
	}
	html {
		background:lightblue;
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
		text-align: center;
	}
	</style>
	</head>
	<?php
	// Function to round up to the nearest multiple of 4
	function roundUpToAny($n) {
		return round(($n * 2) / 10) * 4;
	}

	// Load taglines from file and split into array
	$taglines = explode(",", file_get_contents('src/taglines.txt'));

	// Load products from file and split into array
	$products = explode(",", file_get_contents('src/products.txt'));

	// Define arrays for ad styles
	$colours = ['lightcyan', 'beige'];
	$borders = ['dotted', 'dashed', 'solid', 'double'];
	$fontstyles = ['normal', 'italic'];
	$fontweights = ['normal', 'bold'];
	?>

	<body>
		<div id="header">
			<h1>Rapid Deals Online Sales Web Board</h1>
			<h3>Best deals from across the web net</h3>
			<h3><strong>For purhcases, EMAIL joesales@virtualdream.live</strong></h3>
			<p>Shoppers online: <span id="shopperCount"></span></p>
		</div>
		<hr>
		<br>
		<div id="adarea">
		<?php
		// Loop to generate ads
		for ($x = 0; $x < 3; $x++) {
			// Loop to generate multiple ads
			for ($i = 0; $i < 40; $i++) {
				// Randomly select product and tagline
				$product = $products[rand(0, count($products) - 1)];
				$adtext = str_replace('product', $product, $taglines[rand(0, count($taglines) - 1)]);

				// Randomly select styles for ad
				$bgcol = $colours[rand(0, count($colours) - 1)];
				$border = $borders[rand(0, count($borders) - 1)];
				$fstyle = $fontstyles[rand(0, count($fontstyles) - 1)];
				$fweight = $fontweights[rand(0, count($fontweights) - 1)];
				$price = rand(10, 1000);

				// Output ad HTML
				echo "<div id='ad' style='width: 300px; background: $bgcol; overflow: hidden; float: left; border: $border black 2px; font-style: $fstyle; font-weight: $fweight; white-space: nowrap; box-sizing: border-box; display: inline-block; position: relative;'>
					<img src='src/img/$product.png' style='width: 50px; float: left'>
					$adtext
					<p class='price'>$ $price</p>
					</div>\n";
			}

			// Output advertisement banner or card
			echo '<div id="adspace">';
			if (rand(0, 1) == 0) {
				echo "<div class='advertisement-banner'></div>";
			} else {
				echo "<div class='advertisement-card'></div>";
			}
			echo '</div>';
		}
		?>
		</div>
	</body>
</html>