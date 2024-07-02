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
    
    $sites = glob('./sites/*' , GLOB_ONLYDIR);
    $siteCount = sizeof( $sites );
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
        #officialsites li {
            display:inline;
        }
        .newsite {
            font-size:10px;
            background:red;
            padding:2px 4px;
            border-radius: 25px;
            margin: 2px;
            color:white;
            font-weight:bold;
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
                if ($baseDomain == $hostLocal) {
                    echo "<li><a href='sites/$siteName'>$siteTagline</a></li>";
                }
                else {
                    echo "<li><a href='https://$siteName.$baseDomain'>$siteTagline</a></li>";
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
            if ($baseDomain == $hostLocal) {
                echo "<li><a href='sites/$siteName'>$siteTagline</a></li>";
            }
            else {
                echo "<li><a href='https://$siteName.$baseDomain'>$siteTagline</a></li>";
            }
        }
    ?>
    </ul>
    <h3><img src="index/book2.gif" class="headericon">Public Directory</h3>
    <?php
        $excludedDirs = [
            'advertising', 
            'earnvirtubucks', 
            'webrings',
            'zambonisimulator',
            'rand',
            'help',
            'status',
            'test',
            'winbigcasinosweepstakes-bg9yzw0taxbzdw0',
            'stickers',
            '404',
            'rememberdreamwipe',
            'downloadmania',
            'lonelyboyloserclub',
            'adrenadine',
            'theporncomputer'
        ];
        $sites = array_filter($sites, function($dir) use ($excludedDirs) {
            return !in_array(basename($dir), $excludedDirs);
        });
        $sites = array_values($sites);

        $sitecount = sizeof($sites);
        $colcount = 4;
        $rowcount = ceil($sitecount/4);
        $index = 0;

        $newSites = [
            'planetxarxax',
            'armourofgod',
            'colordreamhyperforce',
            'neocortex1986',
            'rememberdreamwipe',
            'spiceking',
            'theoneleader',
            'downloadmania',
            'bubblechat',
            'squelchtv',
            'laika'
        ];
        $isNewSite = false;
    ?>
    <table>
        <tbody>
            <?php
            for($row=0;$row<$rowcount;$row++) {
                echo "<tr>";
                for($cell=0;$cell<4 && $index < $sitecount;$cell++) {
                    $siteurl = $sites[$index];
                    $sitename = str_replace("./sites/", "", $siteurl);

                    # check if new site
                    if(in_array($sitename, $newSites)) {
                        $isNewSite = true;
                    }

                    if ($baseDomain == $hostLocal) {
                        if($isNewSite) {
                            echo "<td><a href=\"sites/$sitename\">$sitename</a><span class='newsite'>New!</span></td>";
                        }
                        else {
                            echo "<td><a href=\"sites/$sitename\">$sitename</a></td>";
                        }
                    }
                    else {
                        if($isNewSite) {
                            echo "<td><a href=\"https://$sitename.$baseDomain\">$sitename</a><span class='newsite'>New!</span></td>";
                        }
                        else {
                            echo "<td><a href=\"https://$sitename.$baseDomain\">$sitename</a></td>";
                        }
                    }
                    $isNewSite = false;
                    $index++;
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <p>Don't see your site here? You may have it set to private.</p>
    <table>
        <tbody>
            <tr>
                <td width="475">
                    <h3><img src="index/aniheart.gif" class="headericon">Official Sites</h3>
                    <ul id="officialsites">
                        <?php 
                        if($baseDomain == $hostLocal) {
                            echo "<li><a href='sites/help/'>help</a></li>
                            |
                            <li><a href='sites/status/'>status</a></li>
                            |
                            <li><a href='sites/stickers/'>stickers</a><span class='newsite'>Hot!</span></li>
                            |
                            <li><a href='sites/webrings/'>webrings</a></li>";
                        }
                        else {
                            echo "<li><a href='https://help.$baseDomain'>help</a></li>
                            |
                            <li><a href='https://status.$baseDomain/'>status</a></li>
                            |
                            <li><a href='https://stickers.$baseDomain/'>stickers</a><span class='newsite'>Hot!</span></li>
                            |
                            <li><a href='https://webrings.$baseDomain/'>webrings</a></li>";
                        }
                        ?>
                        
                    </ul>
                    <p><img src="index/emailtr.gif" class="headericon">Want your very own Virtual Dream page? <a href="mailto:webmaster@<?php echo "$hostProd";?>">Email us</a>!</p>
                    
                </td>
                <td width="325" align="right" bgcolor="#FDFBD6">
                    <h3><img src="index/flashingflowersmiley.gif" class="headericon">Tips: Exploring Virtual Dream</h3>
                    <p>A personal computer (PC) is highly recommended</p>
                    <p>Turn off ad-blocker. All advertisements are local only.</p>
                    <p>Many sites are hidden. Try exploring!</p>
                </td>
            </tr>
        </tbody>
    </table>
    <font face="verdana" size="-2">Copyright © <a href="<?php echo "https://$hostProd";?>">Virtual Dream</a>. All rights reserved.</font>
    </center>
</body>
</html>