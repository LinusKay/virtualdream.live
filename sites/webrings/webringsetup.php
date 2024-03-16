<?php

// Development mode check
$environment = $_SERVER['HTTP_HOST'] === 'localhost' ? 'local' : 'production';

// Define base URL for assets based on environment
$assetBaseUrl = $environment === 'local' ? '../../src/assets' : 'https://assets.virtualdream.live';
$webringBaseUrl = $environment === 'local' ? '../webrings' : 'https://webrings.virtualdream.live';

$webRingPresets = [
    ["test", "$assetBaseUrl/img/webrings/webring-web-bin.png", "$webringBaseUrl/test", "placeholder webring!"],
    ["darknet", "$assetBaseUrl/img/webrings/webring-darknet.png", "$webringBaseUrl/darknet", "all things dark and creepy&#013;come forth, all creatures of the night!"],
    ["joesales", "$assetBaseUrl/img/webrings/webring-joesales.png", "$webringBaseUrl/joesales", "$$$$$$$$$$$$$$$$$$$"],
    ["tech", "$assetBaseUrl/img/webrings/webring-tech.png", "$webringBaseUrl/tech", "BEEP BEEP BEEP"],
    ["mindpalace", "$assetBaseUrl/img/webrings/webring-mindpalace.gif", "$webringBaseUrl/mindpalace", "for the thinkers..."],
    ["fist", "$assetBaseUrl/img/webrings/webring-fist.png", "$webringBaseUrl/fist", "seek the fist"]
];

// Define the site-to-webrings mapping
$siteToWebrings = [
    "funktempest" => ["fist", "mindpalace", "darknet"],
    "tombfreaks"  => ["darknet", "tech"],
    "rapiddealsonlinesaleswebboard" => ["joesales"],
    "theporncomputer" => ["tech", "darknet", "joesales"]

];

foreach ($siteToWebrings as $site => $webrings) {
    foreach ($webrings as $webring) {
        $webRingDirectory = "./$webring"; 
        $indexFile = $webRingDirectory . "/index.php";

        if (!file_exists($webRingDirectory)) {
            // Create the directory if it doesn't exist
            mkdir($webRingDirectory, 0777, true); 
            // Read existing content from index.php
            $content = '';
            if (!file_exists($indexFile)) {
                $content = "<html><head><title>$webring Webring</title></head><body><h1>$webring Webring</h1><ul>";
            } else {
                $content = file_get_contents($indexFile);
            }

            // Check if the site entry already exists in the index file
            $siteEntry = "<li><a href='https://virtualdream.live/sites/$site'>$site</a></li>";
            if (strpos($content, $siteEntry) === false) {
                // Add the site entry to the index file
                $content .= $siteEntry;
                file_put_contents($indexFile, $content);
            }
        }

        
    }
}
?>