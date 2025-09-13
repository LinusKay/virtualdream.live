<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>the font gets bigger every time someone loads the page</title>
	<?php 
		$metaTitle = "bigger";
		$metaDescription = "the font gets bigger every time someone loads the page";
		include('../../src/setup.php');
	?>
	<style>
		body {
			font-family: system-ui, sans-serif;
			text-align: center;
			background-color: #650e72ff;
			color: #EEEEEE;
		}
		a {
			color: inherit;
		}
		p {
			margin-block: 1rem;
			word-break: break-all;
		}
	</style>
</head>
<body>
	<h1>the font gets bigger every time someone loads the page</h1>
	<?php
		$counter = file_get_contents('./fontsize.txt') + 1;
		file_put_contents('./fontsize.txt', $counter);
	?>
	<p style="font-size:<?php echo $counter ?>px">the font size is <?php echo $counter ?>px</p>
	<a href="/">back</a>
</body>
</html>
