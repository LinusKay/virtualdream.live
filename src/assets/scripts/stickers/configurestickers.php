<?php 
$environment = $_SERVER['HTTP_HOST'] === 'localhost' ? 'local' : 'production';
$assetBaseUrlStickers = $environment === 'local' ? '../../src/assets/img/stickers' : 'https://assets.virtualdream.live/img/stickers';

$stickers = [
    "$assetBaseUrlStickers/polyfox2-transparent.gif",
    "$assetBaseUrlStickers/skull-spin.gif",
    "$assetBaseUrlStickers/planet8.gif",
    "$assetBaseUrlStickers/planet3.gif",
    "$assetBaseUrlStickers/planet4.gif",
    "$assetBaseUrlStickers/planet5.gif",
    "$assetBaseUrlStickers/planet6.gif",
    "$assetBaseUrlStickers/dollar.gif"
];

if(isset($_COOKIE["stickersUnlocked"])) {
    $stickersUnlocked = json_decode($_COOKIE["stickersUnlocked"]);
    if(in_array("malPals", $stickersUnlocked)) {
        $megaFunPackStickers = ["$assetBaseUrlStickers/mascot-pyramid.gif"];
        $stickers = array_merge($stickers, $megaFunPackStickers);
    }
}

?>