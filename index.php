<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    # PAGE SETUP
    include('src/setup.php');
    # /PAGE SETUP
    $popularSites = [
        ["snailmail", "SnailMail - Consult the Snail"],
        ["malwarecleaner", "Malware Cleaner"]
    ];
    $sponsoredSites = [
        ["rapiddealsonlinesaleswebboard", "Joe Sales' Rapid Deals Online Sales Web Board"],
        ["gobingo", "GoBingo! Search Engine"]
    ];
    ?>
    <title>Virtual Dream</title>
    <style>
        body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:13px;
            width:800px;
            margin:auto;
        }
        tr {
            margin:auto;
        }
        td {
            padding:10px;
        }
        .headericon {
            width:15px;
            margin:0 5px;
        }
        a {
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration:underline;
        }
        li {
            list-style-type: none;
        }
        ul {
            padding:0;
        }
    </style>
</head>
<body>
    <center>
    <h1>Virtual Dream</h1>
    <p>Welcome home, netizen</p>
    <h3><img src="index/aniheart.gif" class="headericon">Popular Sites</h3>
    <ul>
        <?php 
            foreach($popularSites as $site) {
                $siteName = $site[0];
                $siteTagline = $site[1];
                if ($environment == 'local') {
                    echo "<li><a href='sites/$siteName'>$siteTagline</a></li>";
                }
                else {
                    echo "<li><a href='https://$siteName.virtualdream.live'>$siteTagline</a></li>";
                }
            }
        ?>
    </ul>
    <h3><img src="index/dollar.gif" class="headericon">Sponsored Sites</h3>
    <ul>
    <?php 
        foreach($sponsoredSites as $site) {
            $siteName = $site[0];
            $siteTagline = $site[1];
            if ($environment == 'local') {
                echo "<li><a href='sites/$siteName'>$siteTagline</a></li>";
            }
            else {
                echo "<li><a href='https://$siteName.virtualdream.live'>$siteTagline</a></li>";
            }
        }
    ?>
    </ul>
    <h3><img src="index/book2.gif" class="headericon">Public Directory</h3>
    <?php
        $sites = glob('./sites/*' , GLOB_ONLYDIR);
        $excludedDirs = [
            'advertising', 
            'earnvirtubucks', 
            'webrings',
            'zambonisimulator',
            'rand'
        ];
        $sites = array_filter($sites, function($dir) use ($excludedDirs) {
            return !in_array(basename($dir), $excludedDirs);
        });
        $sites = array_values($sites);

        $sitecount = sizeof($sites);
        $colcount = 4;
        $rowcount = ceil($sitecount/4);
        $index = 0;
    ?>
    <table>
        <tbody>
            <?php
            for($row=0;$row<$rowcount;$row++) {
                echo "<tr>";
                for($cell=0;$cell<4 && $index < $sitecount;$cell++) {
                    $siteurl = $sites[$index];
                    $sitename = str_replace("./sites/", "", $siteurl);
                    if ($environment == 'local') {
                        echo "<td><a href=\"sites/$sitename\">$sitename</a></td>";
                    }
                    else {
                        echo "<td><a href=\"https://$sitename.virtualdream.live\">$sitename</a></td>";
                    }
                    $index++;
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <p><img src="index/emailtr.gif" class="headericon">Want your very own Virtual Dream page? <a href="mailto:webmaster@virtualdream.live">Email us</a>!</p>
    <!-- <p><a href="index/disclaimer.php">Disclaimer</a></p> -->
    <font face="verdana" size="-2">Copyright © <a href="https://virtualdream.live/">Virtual Dream</a>. All rights reserved.</font>
    </center>
</body>
</html>