<?php 
    if(isset($_GET['s'])) {
        $search = $_GET['s'];
    }
    else {
        $search = NULL;
    }
    $results = rand(15, 50);
    $url = "https://grungle.virtualdream.live/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoBingo! Search - <?php echo $search; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="topbar">
        <form action="search.php" method="get" enctype="multipart/form-data">
            <h1 class="sitetitle"><a href="index.php" class="nolink">GoBingo!</a></h1>
            <input class="inputsearch" value="<?php echo $search; ?>" placeholder="<?php echo $search; ?>" name="s">
            <input type="submit" value="Go!">
        </form> 
    </div>
    <div id="adspace">
        <iframe class="advertisement" width="468px" height="75px" style="-webkit-transform:scale(1);-moz-transform-scale(1);" src="https://advertising.virtualdream.live/banner/" scrolling="no"></iframe>
    </div>
    <div id="results">
        <?php
        if($search == NULL) {
            echo "<p><strong>Bingo found 0 results</strong></p>";
        }
        else {
            echo "<p><strong>Bingo found $results results for \"$search\"!</strong></p>";
            for($i = 0; $i < $results; $i++) {
                echo "<div class=\"result\">
                    <p class=\"resulttitle\"><a href=\"$url\">GRUNGLE</a></p>
                    <p class=\"resulturl\">https://grungle.virtualdream.live/</p>
                    <p class=\"resultdesc\">Your #1 homepage for Grungle News Updated Gossip Images Hot Tips Grungle Online Grungle For Kids Grungle For Adults Grungle Merchandise Buy Grungle Tickets Grungle Tour Grungle Music</p>
                </div>";
            }
        }
        ?>
    </div>
    <div id="adspace">
        <iframe class="advertisement" width="468px" height="55px" style="-webkit-transform:scale(1);-moz-transform-scale(1);" src="https://advertising.virtualdream.live/banner/" scrolling="no"></iframe>
    </div>
</body>
</html>