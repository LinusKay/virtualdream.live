<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        include('webringsetup.php');
        $webringSites = [];

        // Iterate through each site and its webrings to populate the $webringSites array
        foreach ($siteToWebrings as $site => $webrings) {
            foreach ($webrings as $webring) {
                $webringSites[$webring][] = $site;
            }
        }

        // Iterate through each webring and its associated websites to print the output
        foreach ($webringSites as $webring => $sites) {

            // Find the webring's image URL from the presets
            $webringImageUrl = '';
            $webringUrl = '';
            foreach ($webRingPresets as $preset) {
                if ($preset[0] === $webring) {
                    $webringImageUrl = $preset[1];
                    $webringUrl = $preset[2];
                    $webringDescription = $preset[3];
                    break;
                }
            }

            // Display the webring heading
            echo "<h2>$webring webring:</h2>";

            // Display the webring image
            if (!empty($webringImageUrl)) {
                echo "<a href='$webringUrl'><img src='$webringImageUrl' alt='$webring'></a>";
                echo "<br>";
            }

            echo "<p>$webringDescription</p>";
            // Display the list of websites for this webring
            echo "<ul>";
            foreach ($sites as $site) {
                // Hyperlink each website
                $siteUrl = "https://virtualdream.live/sites/$site";
                echo "<li><a href='$siteUrl'>$site</a></li>";
            }
            echo "</ul>";
        }
    ?>
</body>
</html>