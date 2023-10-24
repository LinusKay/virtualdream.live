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
    </style>
</head>
<body>
    virtualdream.live
    <br>
    
    <p>Popular Sites</p>
    <ul>
        <li><a href="sites/ratparty">rat party (ratparty)</a></li>
        <li><a href="sites/theporncomputer">The Porn Computer (theporncomputer)</a></li>
        <li><a href="sites/missingorb">MISSING: ORB (missingorb)</a></li>
    </ul>
    <p>Sponsored Sites</p>
    <ul>
        <li><a href="sites/rapiddealsonlinesaleswebboard">Joe Sales' Rapid Deals Online Sales Web Board (rapiddealsonlinesaleswebboard)</a></li>
        <li><a href="sites/gobingo">GoBingo! Search Engine (gobingo)</a></li>
    </ul>
    <br>
    Directory:
    <br>
    <?php
        $sites = glob('./sites/*' , GLOB_ONLYDIR);
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
                    echo "<td><a href=\"$siteurl\">$sitename</a></td>";
                    $index++;
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <p>Want your very own Virtual Dream page? Email webmaster@virtualdream.live</p>
</body>
</html>