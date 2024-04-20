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
?>