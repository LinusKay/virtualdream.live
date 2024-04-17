<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
        # PAGE SETUP
        include('../../src/setup.php');
        # /PAGE SETUP
        ?>

        <title>GoBingo!</title>
        <link rel="stylesheet" href="style.css">
        <style> 
        body {
            text-align:center;
        }
        #globe {
            margin-top:25px;
        }
        h1 {
            margin-top:0;
        }
        </style>

    </head>
    <body>
        <img id="globe" src="src/img/Earth_Globe.gif">
        <h1>GoBingo!</h1>
        <p><i>Virtual Dream's most reliable search engine</i></p>
        <form action="search.php" method="get" enctype="multipart/form-data">
            <input class="inputsearch" placeholder="Search" name="s">
            <input type="submit" value="Go!">
        </form> 
        <div id="adspace">
            
    <div class="advertisement-banner"></div>
    <div class="advertisement-banner"></div>

    <div class="advertisement-card"></div>

    <div class="advertisement-banner"></div>
    <div class="advertisement-banner"></div>
    
    <div class="advertisement-card"></div>

    
        </div>

    </body>
</html>