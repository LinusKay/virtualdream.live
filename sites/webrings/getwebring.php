<?php
include('webringsetup.php');

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