<?php
$hostLocal = 'localhost';
$hostProd = 'virtualdream.live';
$hostDev = 'virtualdream.dev';

// Development mode check
$hostName = $_SERVER['HTTP_HOST'];

$envparts = explode('.', $hostName);
if (count($envparts) > 2) {
    // Remove the first part (subdomain) from the array
    $baseDomain = implode('.', array_slice($envparts, 1));
} else {
    // If there's no subdomain, the base domain is the same as the hostname
    $baseDomain = $hostName;
}

// Define base URL for assets based on environment
$assetBaseUrl = $baseDomain === $hostLocal ? '../../src/assets' : "https://assets.$baseDomain";
$webringBaseUrl = $baseDomain === $hostLocal ? "http://$hostLocal/virtualdream.live/sites/webrings" : "https://webrings.$baseDomain";
$advertsBaseUrl = $baseDomain === $hostLocal ? '../advertising' : "https://advertising.$baseDomain";
?>