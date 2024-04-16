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

        <title>pet wonderland</title>
        <link rel="stylesheet" href="style.css">
        <style> 
        body {
            text-align:center;
            width:800px;
            margin:auto;
        }
        </style>

    </head>
    <body>
        <?php 
            $pets = glob("src/img/*");
            foreach($pets as $pet) {
                echo "<img src='$pet'>";
            }
        ?>
    </body> 
</html>