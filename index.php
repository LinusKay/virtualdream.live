<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <br>
    directory:
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
</body>
</html>
