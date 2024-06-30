<?php 
    if(isset($_GET['s'])) {
        $search = $_GET['s'];
    }
    else {
        $search = NULL;
    }
    $results = rand(15, 50);
    $url = "https://MalPals.virtualdream.live/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoBingo! Search - <?php echo $search; ?></title>
    <link rel="stylesheet" href="style.css">
        <?php 
        # PAGE SETUP
        include('../../src/setup.php');
        # /PAGE SETUP
        ?>
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
        <!-- banner advertisement -->
        <div class="advertisement-banner"></div>
    </div>
    <div id="results">
        <?php
        if(strtolower($search) != 'malpals') {
            echo '<p>Did you mean <a id="suggestion" href="?s=malpals">malpals</a>?</p>';
        }
        if($search == NULL) {
            echo "<p><strong>Bingo found 0 results</strong></p>";
        }
        else {
            echo "<p><strong>Bingo found $results results for \"$search\"!</strong></p>";
            for($i = 0; $i < $results; $i++) {
                echo "<div class=\"result\">
                    <p class=\"resulttitle\"><a href=\"$url\">MalPals</a></p>
                    <p class=\"resulturl\">https://malpals.virtualdream.live/</p>
                    <p class=\"resultdesc\">Your #1 homepage for MalPals News Updated Gossip Images Hot Tips MalPals Online MalPals For Kids MalPals For Adults MalPals Merchandise Buy MalPals Tickets MalPals Tour MalPals Music</p>
                </div>";
            }
        }
        ?>
    </div>
    <div id="adspace">
        <div class="advertisement-banner"></div>
    </div>
</body>
</html>