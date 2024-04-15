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
        </style>

    </head>
    <body>
        <h1>GoBingo!</h1>
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