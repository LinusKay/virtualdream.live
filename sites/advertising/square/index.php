<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> 
    * {
        margin:0;
    }
    </style>
</head>
<body>
<?php
    $adverts = array();
    if (($handle = fopen("adverts.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $adverts[] = $data;
        }
        fclose($handle);
    }

    $ad_count = sizeof($adverts);
    $ad_selected = rand(0, $ad_count - 1);

    $ad_link = $adverts[$ad_selected][0];
    $ad_image = $adverts[$ad_selected][1];

    echo "<a href=\"$ad_link\"><img src=\"images/$ad_image\"></a>";
?>  
</body>
</html>
