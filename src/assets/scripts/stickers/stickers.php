<?php
// Determine the environment (e.g., based on domain or some other indicator)
$environment = $_SERVER['HTTP_HOST'] === 'localhost' ? 'local' : 'production';
$assetBaseUrl = $environment === 'local' ? '../../src/assets' : 'https://assets.virtualdream.live';

$jsContent = file_get_contents('stickers.js');
$jsContent = str_replace('ASSET_DIRECTORY', $assetBaseUrl, $jsContent);

header('Content-Type: application/javascript');
echo $jsContent;
?>