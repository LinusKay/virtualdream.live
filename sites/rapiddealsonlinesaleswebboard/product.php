
<?php
$product 	= $_GET['p'];
$tagline 	= $_GET['t'];
$price 		= $_GET['pr'];
$bgcol 		= $_GET['bg'];
?>
<style>
*{
	margin:0;
}
body{
	background: <?php echo $bgcol; ?>;
	text-align:center;
}
img{
	width:400px;
	display:inline;
}
</style>
<body>
<?php

$names = ['avid', 'ichael', 'even', 'adam', 'ames', 'obert', 'illiam', 'ichard', 'arles', 'aniel', 'atthew', 'onald', 'oshua', 'evin', 'edward', 'ason', 'acob', 'ary', 'icholas', 'onathon', 'ank', 'amuel', 'imothy', 'aymond', 'alexander', 'athan', 'ethan', 'achary', 'arl', 'eremy', 'ristian', 'ordan', 'ylan', 'abriel', 'ogan', 'incent', 'adley'];
$letters = ['B', 'D', 'Gr', 'J', 'Kl', 'McD', 'R', 'Sl', 'S', 'Tr', 'M', 'McM'];

$name = "";

$name = $name . $letters[rand(0,count($letters)-1)] . $names[rand(0,count($letters)-1)] . ' ' . $letters[rand(0,count($letters)-1)] . $names[rand(0,count($letters)-1)] . '<br>';

echo "
<h1>".ucwords($tagline)."</h1>
<img src='img/".$product.".jpg'>
<p>".$tagline."</p>
<p>Price: $".$price."</p>
<p>Posted by: ".$name."</p>";
?>
</body>