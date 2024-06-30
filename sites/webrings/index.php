<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Dream - Webrings</title>
    <link rel="stylesheet" href="webrings.css">
</head>
<body>
    <center>
    <p>Webrings help bring sites with similar content together. Here are all of Virtual Dream's official webrings!</p>
    <p>If you would like to request to create or join an official webring please <a href="mailto:webmaster@virtualdream.live">send an email</a></p>
    <?php 
        include('../../src/setup.php');
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
                $siteUrl = "https://$site.virtualdream.live/";
                echo "<li><a href='$siteUrl'>$site</a></li>";
            }
            echo "</ul>";
            echo "<hr size='1'>";
        }
    ?>
    <font face="verdana" size="-2">Copyright © <a href="https://virtualdream.live/">Virtual Dream</a>. All rights reserved.</font>
    </center>
</body>
</html>