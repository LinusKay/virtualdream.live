<?php
// Determine the environment (e.g., based on domain or some other indicator)
$environment = $_SERVER['HTTP_HOST'] === 'localhost' ? 'local' : 'production';
$advertsBaseUrl = $environment === 'local' ? '../advertising' : 'https://advertising.virtualdream.live';

$jsContent = file_get_contents('adverts.js');
$jsContent = str_replace('ADVERTISING_DIRECTORY', $advertsBaseUrl, $jsContent);

header('Content-Type: application/javascript');
echo $jsContent;
?>
