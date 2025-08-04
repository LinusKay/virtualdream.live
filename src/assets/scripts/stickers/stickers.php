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

include("../../../config.php");
$domain = $hostName === 'localhost' ? 'localhost' : ".$baseDomain";

include('configurestickers.php');
if(isset($_COOKIE['stickerPackMalPals'])) { include('stickerpackmalpals.php'); }
if(isset($_COOKIE['stickerPackSales'])) { include('stickerpacksales.php'); }
if(isset($_COOKIE['stickerPack10000000'])) { include('stickerpack10000000.php'); }

$stickersString = "";
foreach($stickers as $sticker) {
    $stickerSrc = $sticker[0];
    $stickersString = $stickersString . "'$stickerSrc',";
}

$jsContent = file_get_contents('stickers.js');
$jsContent = str_replace('STICKERS', $stickersString, $jsContent);
$jsContent = str_replace('ASSET_DIRECTORY', $assetBaseUrl, $jsContent);
$jsContent = str_replace('DOMAIN', $domain, $jsContent);

header('Content-Type: application/javascript');
echo $jsContent;
?>
