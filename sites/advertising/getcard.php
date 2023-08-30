<?php 
    $adverts = array();
    if (($handle = fopen("../advertising/card/adverts.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $adverts[] = $data;
        }
        fclose($handle);
    }
    $ad_count = sizeof($adverts);
    $ad_selected = rand(0, $ad_count - 1);

    $ad = $adverts[$ad_selected];
    $ad_url = $ad[0];
    $ad_img = $ad[1];
    echo "<a class=\"advertisement-card\" href=\"$ad_url\"><img src=\"https://advertising.virtualdream.live/card/images/$ad_img\"></a>";
?>