<?php
srand(floor(time() / (60*60*24)));
$name_end = ['avid', 'ichael', 'even', 'adam', 'ames', 'obert', 'illiam', 'ichard', 'arles', 'aniel', 'atthew', 'onald', 'oshua', 'evin', 'edward', 'ason', 'acob', 'ary', 'icholas', 'onathon', 'ank', 'amuel', 'imothy', 'aymond', 'alexander', 'athan', 'ethan', 'achary', 'arl', 'eremy', 'ristian', 'ordan', 'ylan', 'abriel', 'ogan', 'incent', 'adley'];
$name_start = ['B', 'D', 'Gr', 'J', 'Kl', 'McD', 'R', 'Sl', 'S', 'Tr', 'M', 'McM'];

$face_directory = "faces";
$face_size = 20;
$faces = glob($face_directory . "/" . $face_size . "/*.jpg");

$username_array = file('data/usernames.txt', FILE_IGNORE_NEW_LINES);

$bio_array = file('data/bios.txt', FILE_IGNORE_NEW_LINES);
$object_array = file('data/objects.txt', FILE_IGNORE_NEW_LINES);
$gender_array = ["male", "female", "man", "woman"];
$adjective_array = file('data/adjectives.txt', FILE_IGNORE_NEW_LINES);
$user_likes_array = file('data/likes.txt', FILE_IGNORE_NEW_LINES);
$place_array = file('data/places.txt', FILE_IGNORE_NEW_LINES);
$job_array = file('data/jobs.txt', FILE_IGNORE_NEW_LINES);
$colour_array = ["#fdebd0", "#fadbd8", "#a2d9ce", "#fcf3cf", "#aed6f1", "#aed6f1"];
$country_array = file('data/countries.txt', FILE_IGNORE_NEW_LINES);
$food_array = file('data/foods.txt', FILE_IGNORE_NEW_LINES);
$animal_array = file('data/foods.txt', FILE_IGNORE_NEW_LINES);

$ad_image_array = glob('ad-img/*.jpg');
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
<title>Meet Friend Online</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/cursor-effects@latest/dist/browser.js"></script>
<script>
	window.addEventListener("load", (event) => {
	new cursoreffects.trailingCursor({
		particles: 15,
		rate: 0.8,
		baseImageSrc: "VNjvXAM.gif",
	});
});
</script>
<?php 
# PAGE SETUP
$webRings = ["joesales"];
$cursorCustom = "229598.png";
$cursorFollow = "VNjvXAM.gif";
// $cursorFollowOffset = [25, 25];
include('../../src/setup.php');
# /PAGE SETUP
?>
<style>
* {
	margin:0;
	box-sizing: border-box;
}
@font-face {
	font-family: A-SpaceBoldDemo;
	src: url("A-Space Bold Demo.otf")
}
body {
	background: lightblue;
	background: url("https://frutigeraeroarchive.org/images/wallpapers/materialdictionary186/materialdictionary186_107.jpg");
	background-size: cover;
	font-family: Arial, Helvetica, sans-serif;
	background-attachment: fixed;
	background-position: center;
}
h1, h3{
	text-align:center;
	width:1200px;
	margin:auto;
	font-family: A-SpaceBoldDemo;
}
h1 {
	font-size:45px;
	color: white;
	text-shadow: 0 0 5px white;
}
p{
	line-height:20px;
	font-size:15px;
}
a {
	font-weight:bold;
	text-decoration: none;
	color: #0066ff;
}
#body-wrap{
	width:1200px;
	height:auto;
	/* border: solid 5px rgba(17, 74, 180, 0.2); */
	margin:auto;
	border-radius:5px;
	/* outline: solid 1px white; */
}
#profile-area{
	height:auto;
	width:1190px;
	position:relative;
	overflow:auto;
	margin:auto;
	/* border: solid 1px white; */
	border-radius:5px;
	/* background: rgba(255,255,255,0.3); */
	/* background: linear-gradient(to bottom, rgba(226, 243, 255, 0.5) 1%,rgba(165, 213, 255, 0.5) 79%, rgba(133, 180, 255, 0.5) 81%,rgba(235, 240, 244, 0.5) 100%); */
	/* box-shadow: 0 4px 8px 0 #a5d5ff, 0 6px 10px 0 #3f3f3f; */
}
.profile-box{
	border:solid 1px white;
	width:584px;
	height:150px;
	position:relative;
	float:left;
	box-sizing:border-box;
	display:block;
	overflow:hidden;
	margin:5px;
	border-radius: 5px;
	z-index:0;
	background: rgba(255,255,255,0.3);
	box-shadow: 0 4px 8px 0 rgba(0,0,0,0.3);
	backdrop-filter: blur(10px);
	-webkit-backdrop-filter: blur(5px);
}
.profile-box p {
	margin: 0 10px;
}
.profile-photo{
	width:75px;
	height:75px;
	margin:6.5px;
	float:left;
	border: solid 1px lightblue;
	padding:5px;
	border-radius: 5px;
	background: linear-gradient(to bottom, #e2f3ff 1%,#a5d5ff 79%,#85b4ff 81%,#ebf0f4 100%);
}
.site-info{
	text-align:center;
	width:1200px;
	margin:25px auto;
}
#profile-info{
	margin-top:12.5px;
}
.profile-gradient {
	background: linear-gradient(to bottom, #e2f3ff 1%,#a5d5ff 79%,#85b4ff 81%,#ebf0f4 100%);
	height:100%;
	width: 100%;
	position:absolute;
	display:block;
	top:0;
	left:0;
	z-index:-1;
	opacity:0.3;
}
.profile-backimg {
	width:100%;
	height:200px;
	/* margin-top:-50px; */
	opacity:.1;
	top:0;
	left:0;
	position: absolute;
	z-index:-1;
	background: url("https://frutigeraeroarchive.org/images/wallpapers/materialdictionary226/materialdictionary226_29.jpg");
	background-position: bottom center;
	/* background-attachment: fixed; */
	background-size: cover contain;
}
.profile-like {
	padding:2px 5px;
	background: linear-gradient(to bottom, #e2f3ff 1%,#a5d5ff 29%,#85b4ff 61%,#ebf0f4 100%);
	border: solid 1px lightblue;
	border-radius:25px;
	color: #000000c0;
	font-size:13px;
	box-shadow: 0 4px 8px 0 rgba(0,0,0,0.1);
}
.profile-like img, .profile-dislike img {
	height:10px;
	margin-bottom:-1px;
}
.profile-dislike {
	padding:2px 5px;
	background: linear-gradient(to bottom, #e2f3ff 1%,#a5d5ff 59%,#85b4ff 61%,#ebf0f4 100%);
	border: solid 1px lightblue;
	border-radius:25px;
	color: #494949c4;
	font-size:13px;
	box-shadow: 0 4px 8px 0 rgba(0,0,0,0.1);
}
.login{
	text-align:right;
	width:1200px;
	margin:auto;
	display:block;
	padding:5px;
	color:white;
	text-decoration:underline;
}
.login::before{
	content: url("https://i.imgur.com/u0X82vZ.gif");
	padding:0 5px;
	opacity:0.5;
}
#ad{
	width:300px;
	height:300px;
	background:black;
	position:fixed;
	bottom:0;
	border:solid 1px black;
	border-radius:3px;
}
#ad:hover{
	cursor:pointer;
}
#ad img{
	width:300px;
	height:300px;
	position:absolute;
	z-index:0;
}
.ad-sign{
	position:absolute;
	top:0; left:0;
	z-index:1;
	background:black;
	color:white;
	width:100%;
}
.top-img {
	margin:auto;
	display:block;
	width:150px;
}
.profile-feeling {
	position:absolute;
	top:65px;
	left: 5px;
	background: rgba(255,255,255,0.2);
	border-radius:5px;
}
@keyframes spinnn {
	from {
		transform: rotate(0deg);
	}
	to {
		transform: rotate(360deg);
	}
}
#earth {
	z-index:-1;
	position:absolute;
	width:1000px;
	left: calc(50vw - 500px);
	top:0;
	opacity:0.1;
	/* filter: invert(100%); */
	/* animation: spinnn 180s linear infinite; */
}
	
</style>
</head>
<body>
	<img id="earth" src="https://pngimg.com/uploads/globe/globe_PNG100087.png">
	<div id="header">
		<a class="login" href="login.php">login</a>
		<img class="top-img" src="https://i.postimg.cc/jqzK4Ryq/ffish.gif">
		<h1>friend online</h1>
		<h3>Meet new fun people from across world. online!</h3>
		<p class="site-info">We curated a finest collection of friends for you to talk to from around globe! Please contact and make friendship today!</p>
	</div>
	<div id="body-wrap">
	<div id="profile-area">
<?php
$profile_count = 48;
for($i=0;$i<$profile_count;$i++){
	//Generate user name
	$first_name = $name_start[array_rand($name_start)] . $name_end[array_rand($name_end)];
	$second_name = $name_start[array_rand($name_start)] . $name_end[array_rand($name_end)];
	$user_name = $first_name . ' ' . $second_name;
	
	//Generate user age
	$user_age = rand(18,80);
	
	//Generate user image
	//save used images so no images are repeated
	shuffle($faces);
	$user_face = $faces[0];
	$faces = array_diff($faces, [$user_face]);
	
	//generate user id
	$choice = $username_array[array_rand($username_array)];
	$user_id = $choice;
	$user_id = str_replace('[firstname]', $first_name, $user_id);
	$user_id = str_replace('[Firstname]', ucfirst($first_name), $user_id);
	$user_id = str_replace('[FIRSTNAME]', strtoupper($first_name), $user_id);
	$user_id = str_replace('[lastname]', $second_name, $user_id);
	$user_id = str_replace('[Lastname]', ucfirst($second_name), $user_id);
	$user_id = str_replace('[LASTNAME]', strtoupper($second_name), $user_id);
	$user_id = str_replace('[number]', rand(0,9999), $user_id);
	shuffle($adjective_array);
	$user_id = str_replace('[adjective]', $adjective_array[0], $user_id);
	$user_id = str_replace('[Adjective]', ucfirst($adjective_array[0]), $user_id);
	$user_id = str_replace('[ADJECTIVE]', strtoupper($adjective_array[0]), $user_id);
	shuffle($object_array);
	$user_id = str_replace('[object]', $object_array[0], $user_id);
	$user_id = str_replace('[Object]', ucfirst($object_array[0]), $user_id);
	$user_id = str_replace('[OBJECT]', strtoupper($object_array[0]), $user_id);
	shuffle($job_array);
	$user_id = str_replace('[job]', $job_array[0], $user_id);
	$user_id = str_replace('[Job]', ucfirst($job_array[0]), $user_id);
	$user_id = str_replace('[JOB]', strtoupper($job_array[0]), $user_id);
	$user_id = str_replace('[year]', rand(1970,2020), $user_id);
	$user_id = str_replace(" ", "", $user_id);
	
	shuffle($country_array);
	$choice = $country_array[array_rand($country_array)];
	$country = $choice;
	
	//Generate user bio
	$choice = $bio_array[array_rand($bio_array)];
	$bio_array = array_diff($bio_array, [$choice]);
	$user_bio = $choice;
	shuffle($object_array);
	$user_bio = str_replace('[object]', $object_array[0], $user_bio);
	$user_bio = str_replace('[Object]', ucfirst($object_array[0]), $user_bio);
	$user_bio = str_replace('[OBJECT]', strtoupper($object_array[0]), $user_bio);
	shuffle($adjective_array);
	$user_bio = str_replace('[adjective]', $adjective_array[0], $user_bio);
	$user_bio = str_replace('[Adjective]', ucfirst($adjective_array[0]), $user_bio);
	$user_bio = str_replace('[ADJECTIVE]', strtoupper($adjective_array[0]), $user_bio);
	shuffle($user_likes_array);
	$user_bio = str_replace('[like]', $user_likes_array[0], $user_bio);
	$user_bio = str_replace('[Like]', ucfirst($user_likes_array[0]), $user_bio);
	$user_bio = str_replace('[LIKE]', strtoupper($user_likes_array[0]), $user_bio);
	shuffle($gender_array);
	$user_bio = str_replace('[gender]', $gender_array[0], $user_bio);
	$user_bio = str_replace('[Gender]', ucfirst($gender_array[0]), $user_bio);
	$user_bio = str_replace('[GENDER]', strtoupper($gender_array[0]), $user_bio);
	shuffle($place_array);
	$user_bio = str_replace('[place]', $place_array[0], $user_bio);
	$user_bio = str_replace('[Place]', ucfirst($place_array[0]), $user_bio);
	$user_bio = str_replace('[PLACE]', strtoupper($place_array[0]), $user_bio);
	shuffle($job_array);
	$user_bio = str_replace('[job]', $job_array[0], $user_bio);
	$user_bio = str_replace('[Job]', ucfirst($job_array[0]), $user_bio);
	$user_bio = str_replace('[JOB]', strtoupper($job_array[0]), $user_bio);
	shuffle($country_array);
	$user_bio = str_replace('[country]', $country_array[0], $user_bio);
	$user_bio = str_replace('[Country]', ucfirst($country_array[0]), $user_bio);
	$user_bio = str_replace('[COUNTRY]', strtoupper($country_array[0]), $user_bio);
	shuffle($food_array);
	$user_bio = str_replace('[food]', $food_array[0], $user_bio);
	$user_bio = str_replace('[Food]', ucfirst($food_array[0]), $user_bio);
	$user_bio = str_replace('[FOOD]', strtoupper($food_array[0]), $user_bio);
	shuffle($animal_array);
	$user_bio = str_replace('[animal]', $animal_array[0], $user_bio);
	$user_bio = str_replace('[Animal]', ucfirst($animal_array[0]), $user_bio);
	$user_bio = str_replace('[ANIMAL]', strtoupper($animal_array[0]), $user_bio);
	
	$user_bio = str_replace('[year]', rand(1970,2020), $user_bio);
	$user_bio = str_replace('[age]', $user_age, $user_bio);
	$user_bio = str_replace('[shortcode]', substr(str_shuffle(MD5(microtime())), 0, 8), $user_bio);
	
	
	
	//Generate user likes
	//Pull likes from txt file into array & shuffle array to provide random order
	//get first 4 items from array, add together, and trim trailing comma
	shuffle($user_likes_array);
	$user_likes = [];
	$count = rand(1,3);
	for($x=0;$x<$count;$x++){
		$choice = $user_likes_array[$x];
		array_push($user_likes, $choice);
	}
	
	//Generate user dislikes
	//use while loop to allow to validate whether the current choice exists in the likes. No point having clashing likes/dislikes
	shuffle($user_likes_array);
	$user_dislikes = [];
	$dislike_count = 0;
	$x = 0;
	$count = rand(1,3);
	while($dislike_count < $count){
		$choice = $user_likes_array[$x];
		if(!in_array($choice, $user_likes)){
			array_push($user_dislikes, $choice);
			$dislike_count++;
		}
		$x++;
	}
	
	//Generate background colour
	$colour = $colour_array[array_rand($colour_array)];
	
	$feelings = [
		"https://i.imgur.com/4DCKhtb.gif",
		"https://i.imgur.com/lAiTlqk.gif",
		"https://i.imgur.com/D5okAFL.gif",
		"https://i.imgur.com/3GMCYqS.gif",
		"https://i.imgur.com/AdI3kcM.gif",
		"https://i.imgur.com/abQPK7k.gif",
		"https://i.imgur.com/JrFcHap.gif",
		"https://i.imgur.com/zRyIUQq.gif",
		"https://i.imgur.com/S89ceBR.gif",
		"https://i.imgur.com/DzCuYFu.gif",
		"https://i.imgur.com/qQbmfVU.gif",
		"https://i.imgur.com/OTqspj7.gif",
		"https://i.imgur.com/z64synw.gif",
		"https://i.imgur.com/cN6imbz.gif",
		"https://i.imgur.com/cN6imbz.gif",
		"https://i.imgur.com/tFCecpe.gif",
		"https://i.imgur.com/jfbXbLu.gif",
		"https://i.imgur.com/e9sDHJy.gif",
		"https://i.imgur.com/8H7804z.gif",
		"https://i.imgur.com/WlLTWDN.gif",
		"https://i.imgur.com/HT3RIEC.gif",
		"https://i.imgur.com/EtM4i1a.gif",
		"https://i.imgur.com/V34xskT.gif"
	];
	$feeling = $feelings[array_rand($feelings)];

echo '<div class="profile-box">
<img class="profile-photo" src="' . $user_face . '">
<img class="profile-feeling" src="' . $feeling . '" title="feeling">
<div id="profile-info">
<p class="profile-name"><b>' . $user_name . '</b><span class="profile-age">, ' . $user_age . '</span></p>
<p class="profile-id"><a href="mailto:' . $user_id . '@virtualdream.live">' . $user_id . '@virtualdream.live</a></p>
<p class="profile-country">Country: ' . $country . '</p>
<p class="profile-bio"><i>' . $user_bio . '</i></p>
<p class="profile-likes"><b>Likes/Dislikes</b>: ';
foreach($user_likes as $like) { echo '<span class="profile-like"><img src="https://i.imgur.com/V0Rorfj.gif"> ' . $like . '</span>'; }
foreach($user_dislikes as $dislike) { echo '<span class="profile-dislike"><img src="https://i.imgur.com/hcwClcY.gif"> ' . $dislike . '</span>'; }
echo '</p>
</div>
<div class="profile-gradient"></div>
<div class="profile-backimg"></div>
</div>';
}
?>
</div>
</div>
</body>
</html>