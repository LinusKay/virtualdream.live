<?php 
if(isset($_COOKIE['uploads'])) {
    $uploads = $_COOKIE['uploads'];
}
else { $uploads = 0; }
setcookie( "uploads", $uploads + 1, time() + (86400 * 30)); 

$redirectURL = "index.php";
header('Location: ' . $redirectURL);
?>