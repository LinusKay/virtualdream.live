<?php 
// Error reporting
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

// Development mode check
$environment = $_SERVER['HTTP_HOST'] === 'localhost' ? 'local' : 'production';

// Define base URL for assets based on environment
$assetBaseUrl = $environment === 'local' ? '../../src/assets' : 'https://assets.virtualdream.live';
$webringBaseUrl = $environment === 'local' ? 'http://localhost/virtualdream.live/sites/webrings' : 'https://webrings.virtualdream.live';
$advertsBaseUrl = $environment === 'local' ? '../advertising' : 'https://advertising.virtualdream.live';

// Get the current URL
$currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// Extract site name based on environment
if ($environment === 'local') {
    // Development environment
    $path = parse_url($currentUrl, PHP_URL_PATH);
    $siteName = '';
    $pathParts = explode('/', $path);
    $siteIndex = array_search('sites', $pathParts);
    if ($siteIndex !== false && isset($pathParts[$siteIndex + 1])) {
        $siteName = $pathParts[$siteIndex + 1];
    }
} else {
    // Production environment
    $subdomain = explode('.', $_SERVER['HTTP_HOST'])[0];
    $siteName = $subdomain;
}

echo "<script src='https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js'></script>\n";
// Include stickers and malware scripts if not disabled
echo "<script src='$assetBaseUrl/scripts/stickers/stickers.php' type='module'></script>\n";
echo "<link rel='stylesheet' href='$assetBaseUrl/scripts/stickers/stickers.css'>\n";

echo "<script src='$assetBaseUrl/scripts/malware/malware.php' type='module'></script>\n";
echo "<link rel='stylesheet' href='$assetBaseUrl/scripts/malware/malware.css'>\n";

echo "<script src='$assetBaseUrl/scripts/screensaver/screensaver.php' type='module'></script>\n";

echo "<script src='$assetBaseUrl/scripts/roguecursors/roguecursors.php' type='module'></script>\n";

echo "<script src='$advertsBaseUrl/adverts.php'></script>\n";

// Inline styles
echo "<style>
    html {
        ";
if(isset($backgroundImage)) { echo "background: url('$backgroundImage');\n"; }
if(isset($backgroundColour)) { echo "background: $backgroundColour;\n"; }
if(isset($cursorCustom)) { echo "cursor: url('$cursorCustom'), auto;"; }
echo "
    }
</style>";

// Cursor Follow feature
if(isset($cursorFollow)) {
    echo "
    <!-- Cursor Follow -->
    <img id='cursor-follow' src='$cursorFollow' style='position: fixed; z-index: 99;'>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var cursorFollow = document.getElementById('cursor-follow');
            document.addEventListener('mousemove', function(e) {
                let offset = 10;
                let left = e.clientX + offset;
                let top = e.clientY + offset;
                cursorFollow.style.left = left + 'px';
                cursorFollow.style.top = top + 'px';
            });
        });
    </script>
    
    <!-- /Cursor Follow -->
    ";
}

// Function to fetch webring data
function fetchWebringData($site, $webringBaseUrl) {
    $url = "$webringBaseUrl/getwebring.php?site=" . urlencode($site);
    $response = file_get_contents($url);
    return json_decode($response, true);
}

$webrings = fetchWebringData($siteName, $webringBaseUrl);

// Process the received webring data
if(count($webrings) > 0) {
    echo "
    <!-- web ring -->
    <div id='webring-container' style='position:fixed;bottom:25px;right:25px;margin:0;'>
        <span style='color:lightgray;font-size:10px;margin:0;text-align:left;'>Web Rings<br></span>";
    foreach($webrings as $webring) {
        [$webRingName, $webRingImage, $webRingLink, $webRingTagline] = $webring;
        echo "
        <a href='$webRingLink' title='$webRingName Web Ring&#013;$webRingTagline' style='text-decoration:none;'>
            <img src='$webRingImage' style='margin:0;'>
        </a>";
    }
        
    echo "
    </div>
    <!-- /web ring -->
    ";
}

?>
