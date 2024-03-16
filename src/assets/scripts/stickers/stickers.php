<?php
// Allow requests from all origins
header("Access-Control-Allow-Origin: *");

// Set other CORS headers as needed
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Respond to preflight requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("HTTP/1.1 200 OK");
    exit();
}

// Determine the environment (e.g., based on domain or some other indicator)
$environment = $_SERVER['HTTP_HOST'] === 'localhost' ? 'local' : 'production';
$assetBaseUrl = $environment === 'local' ? '../../src/assets' : 'https://assets.virtualdream.live';
$domain = $environment === 'local' ? 'localhost' : '.virtualdream.live';

$jsContent = file_get_contents('stickers.js');
$jsContent = str_replace('ASSET_DIRECTORY', $assetBaseUrl, $jsContent);
$jsContent = str_replace('DOMAIN', $domain, $jsContent);

header('Content-Type: application/javascript');
echo $jsContent;
?>
