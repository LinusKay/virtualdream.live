<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Dream</title>
    <style>
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
    </style>
</head>
<body>
    <h1>Virtual Dream</h1>
    <p>Welcome home, netizen</p>
    <h3><img src="index/aniheart.gif" class="headericon">Popular Sites</h3>
    <ul>
        <li><a href="https://snailmail.virtualdream.live">snailmail - Consult the Snail</a></li>
        <li><a href="https://malwarecleaner.virtualdream.live">Malware Cleaner</a></li>
    </ul>
    <h3><img src="index/dollar.gif" class="headericon">Sponsored Sites</h3>
    <ul>
        <li><a href="https://rapiddealsonlinesaleswebboard.virtualdream.live">Joe Sales' Rapid Deals Online Sales Web Board (rapiddealsonlinesaleswebboard)</a></li>
        <li><a href="https://gobingo.virtualdream.live">GoBingo! Search Engine (gobingo)</a></li>
    </ul>
    <h3><img src="index/book2.gif" class="headericon">Public Directory</h3>
    <?php
        $sites = glob('./sites/*' , GLOB_ONLYDIR);
        $excludedDirs = [
            'advertising', 
            'earnvirtubucks', 
            'webrings',
            'zambonisimulator'
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
                    echo "<td><a href=\"https://$sitename.virtualdream.live\">$sitename</a></td>";
                    $index++;
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <p><img src="index/emailtr.gif" class="headericon">Want your very own Virtual Dream page? Email webmaster@virtualdream.live</p>
    <!-- <p><a href="disclaimer.php">Disclaimer</a></p> -->
</body>
</html>