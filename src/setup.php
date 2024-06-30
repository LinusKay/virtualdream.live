<?php 
// Error reporting
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

// Development mode check
$environment = $_SERVER['HTTP_HOST'];

$hostLocal = 'localhost';
$hostProd = 'virtualdream.live';
$hostDev = 'virtualdream.dev';

// Define base URL for assets based on environment
$assetBaseUrl = $environment === $hostLocal ? '../../src/assets' : "https://assets.$environment";
$webringBaseUrl = $environment === $hostLocal ? "http://$hostLocal/virtualdream.live/sites/webrings" : "https://webrings.$environment";
$advertsBaseUrl = $environment === $hostLocal ? '../advertising' : "https://advertising.$environment";

echo $assetBaseUrl . '<br>';
echo $webringBaseUrl . '<br>';
echo $advertsBaseUrl . '<br>';

// Get the current URL
$currentUrl = "http://$environment$_SERVER[REQUEST_URI]";
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
    $subdomain = explode('.', $environment )[0];
    $siteName = $subdomain;
}

if(!isset($metaTitle)) $metaTitle = $siteName; else $metaTitle = $metaTitle . " ";
if(!isset($metaDescription)) $metaDescription = "";
$brandingTagline = "Virtual Dream - Your new favourite web host, powered by community.";

echo "<meta property=\"og:title\" content=\"$metaTitle — Virtual Dream\" />\n";
echo "<meta property=\"og:url\" content=\"$currentUrl\" />\n";
echo "<meta property=\"og:image\" content=\"$assetBaseUrl/img/vdbanner.png\" />\n";
echo "<meta property=\"og:type\" content=\"website\" />\n";
echo "<meta property=\"og:description\" content=\"$metaDescription $brandingTagline\" />\n";
echo "<meta property=\"twitter:card\" content=\"$assetBaseUrl/img/vdbanner.png\" />\n";

echo "<link rel='icon' type='image/x-icon' href='$assetBaseUrl/img/computer.ico'>\n";

echo "<script src='https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js'></script>\n";
// Include stickers and malware scripts if not disabled
echo "<script src='$assetBaseUrl/scripts/stickers/stickers.php' type='module'></script>\n";
echo "<link rel='stylesheet' href='$assetBaseUrl/scripts/stickers/stickers.css'>\n";

echo "<script src='$assetBaseUrl/scripts/malware/malware.php' type='module'></script>\n";
echo "<link rel='stylesheet' href='$assetBaseUrl/scripts/malware/malware.css'>\n";

// allow opt out for screensaver feature
if (!isset($screensaverOptOut) || !$screensaverOptOut) {
    echo "<script src='{$assetBaseUrl}/scripts/screensaver/screensaver.php' type='module'></script>\n";
}

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
    print($response);
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
