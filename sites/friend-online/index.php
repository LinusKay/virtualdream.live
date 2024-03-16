<?php
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
<?php 
# PAGE SETUP
$webRings = ["joesales", "techring"];
$cursorFollow = "../../src/assets/img/heart.gif";
include('../../src/setup.php');
# /PAGE SETUP
?>
<style>
*{
	margin:0;
}
#profile-box{
	border:solid 1px black;
	width:600px;
	height:200px;
	position:relative;
	float:left;
	box-sizing:border-box;
}
.profile-photo{
	width:175px;
	height:175px;
	margin:12.5px;
	float:left;
}
h1, h3{
	text-align:center;
	width:1200px;
	margin:auto;
}
.site-info{
	text-align:center;
	width:1200px;
	margin:25px auto;
}
#profile-area{
	margin:auto;
	height:100%;
	width:1200px;
}
#profile-info{
	margin-top:12.5px;
}
p{
	line-height:20px;
}
.profile-id, .profile-bio{
	margin-bottom:10px;
}
.login{
	text-align:right;
	width:1200px;
	margin:auto;
	display:block;
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
	
</style>
</head>
<body style="background-color:<?php echo $colour_array[array_rand($colour_array)]; ?>">
<a class="login" href="login.php">login</a>
<h1>Make friends online!</h1>
<h3>Meet new fun people from across world. online!</h3>
<p class="site-info">We curated a finest collection of friends for you to talk to from around globe! Please contact and make friendship today!
<div id="profile-area">
<?php
$profile_count = 72;
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
	$user_likes = "";
	$count = rand(1,6);
	for($x=0;$x<$count;$x++){
		$choice = $user_likes_array[$x];
		$user_likes = $user_likes . $choice . ", ";
	}
	$user_likes = rtrim($user_likes, ", ");
	
	//Generate user dislikes
	//use while loop to allow to validate whether the current choice exists in the likes. No point having clashing likes/dislikes
	shuffle($user_likes_array);
	$user_dislikes = "";
	$dislike_count = 0;
	$x = 0;
	$count = rand(1,6);
	while($dislike_count < $count){
		$choice = $user_likes_array[$x];
		if(!strpos($user_likes, $choice)){
			$user_dislikes = $user_dislikes . $choice . ', ';
			$dislike_count++;
		}
		$x++;
	}
	$user_dislikes = rtrim($user_dislikes, ", ");
	
	//Generate background colour
	$colour = $colour_array[array_rand($colour_array)];
	
echo '<div id="profile-box" style="background-color:' . $colour . '">
<img class="profile-photo" src="' . $user_face . '">
<div id="profile-info">
<p class="profile-name">' . $user_name . '<span class="profile-age">, ' . $user_age . '</span></p>
<p class="profile-id"><i>Username: ' . $user_id . '</i></p>
<p class="profile-country"><b>Location</b>: ' . $country . '</p>
<p class="profile-bio"><b>Bio</b>: ' . $user_bio . '</p>
<p class="profile-likes"><b>Likes</b>: ' . $user_likes . '</p>
<p class="profile-dislikes"><b>Dislikes</b>: ' . $user_dislikes . '</p>
</div>
</div>';
}
?>
</div>
<?php

// $ad_count = rand(0,2);
// for($i=0;$i<$ad_count;$i++){
// 	echo 
// '<div id="ad" style="right:' . rand(0,100) . '%">
// 	<a href="https://libus.xyz/ads" target="_blank"><img src="' . $ad_image_array[array_rand($ad_image_array)] . '"></a>
// 	<p class="ad-sign" onclick="$(this).parent().remove()">Advert</p>
// 	</div>
// 	<br>';
// }
// ?>
</body>
</html>