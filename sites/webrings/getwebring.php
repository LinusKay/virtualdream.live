<?php
// Development mode check
$environment = $_SERVER['HTTP_HOST'] === 'localhost' ? 'local' : 'production';

// Define base URL for assets based on environment
$assetBaseUrl = $environment === 'local' ? '../../src/assets' : 'https://assets.virtualdream.live';

$webRingPresets = [
    ["test", "$assetBaseUrl/img/webrings/webring-web-bin.png", "https://virtualdream.live/webrings/test", "placeholder webring!"],
    ["darknet", "$assetBaseUrl/img/webrings/webring-darknet.png", "https://virtualdream.live/webrings/darknet", "all things dark and creepy&#013;come forth, all creatures of the night!"],
    ["joesales", "$assetBaseUrl/img/webrings/webring-joesales.png", "https://virtualdream.live/webrings/joesales", "$$$$$$$$$$$$$$$$$$$"],
    ["tech", "$assetBaseUrl/img/webrings/webring-tech.png", "https://virtualdream.live/webrings/tech", "BEEP BEEP BEEP"],
    ["mindpalace", "$assetBaseUrl/img/webrings/webring-mindpalace.gif", "https://virtualdream.live/webrings/mindpalace", "for the thinkers..."],
    ["fist", "$assetBaseUrl/img/webrings/webring-fist.png", "https://virtualdream.live/webrings/fist", "seek the fist"]
];

// Define the site-to-webrings mapping
$siteToWebrings = [
    "funktempest" => ["fist", "mindpalace"],
    "tombfreaks"  => ["darknet", "tech"],
    "rapiddealsonlinesaleswebboard" => ["joesales"],
    "theporncomputer" => ["tech", "darknet", "joesales"]

];

// Get the site name from the query parameter
$site = isset($_GET['site']) ? $_GET['site'] : '';

// Function to retrieve webrings for a given site
function getWebringsForSite($site, $siteToWebrings, $webRingPresets) {
    $webrings = [];
    if (isset($siteToWebrings[$site])) {
        $siteWebrings = $siteToWebrings[$site];
        foreach ($siteWebrings as $webring) {
            foreach ($webRingPresets as $preset) {
                if ($preset[0] === $webring) {
                    $webrings[] = $preset;
                    break;
                }
            }
        }
    }
    return $webrings;
}

// Get the webrings associated with the requested site
$siteWebrings = getWebringsForSite($site, $siteToWebrings, $webRingPresets);

// Return the webrings as JSON
header('Content-Type: application/json');
echo json_encode($siteWebrings);
?>