<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            width:700px;
            margin:auto;
        }
        .gifcontainer {
            width:100px;
            height:100px;
            float:left;
        }
        .gifthumb {
            height:50px;
            width:50px;
            margin-top:25px;
        }
        .sourced {
            border: solid 1px lawngreen;
            box-sizing: border-box;
        }
    </style>
</head>
<body style="text-align:center;">
    <img src="hacker.gif">
    <p>
    Virtual Dream is a multimedia art project created by Linus Kay<br>
    All music produced by Linus Kay, with the exception of Funk Tempest
    All GIFs sourced from gifcities. Sources (attempted to be) linked below<br>
    The project pulls from a lot of sources for inspiration, the most materal being <a href="https://store.steampowered.com/app/844590/Hypnospace_Outlaw/">Hypnospace Outlaw</a>, <a href="https://www.cameronsworld.net/">Cameron's World</a>
    </p>
    <?php
        // $Directory = new RecursiveDirectoryIterator('D:/Programs/xampp/htdocs/virtualdream.live/');
        // $Iterator = new RecursiveIteratorIterator($Directory);
        // $Regex = new RegexIterator($Iterator, '/^.+(.gif)$/i', RecursiveRegexIterator::GET_MATCH);
        // foreach($Regex as $name => $Regex){
        //     $sourceFile = $name;
        //     $fileName = basename($sourceFile);
        //     $destinationFile = "D:/Programs/xampp/htdocs/virtualdream.live/index/sources/$fileName";
        //     if (copy($sourceFile, $destinationFile)) {
        //         echo "File $fileName copied successfully.";
        //         echo "<img src='$destinationFile' style='width:20px;'>";
        //     } else {
        //         echo "Failed to copy the file.";
        //     }
        // }

        // $gifs = glob('./sources/*');
        // $csvFile = './sources/sources.csv';
        // $handle = fopen($csvFile, 'w');
        // if ($handle === false) {
        //     die('Error opening the CSV file for writing');
        // }
        // foreach ($gifs as $file) {
        //     $fileName = basename($file); // Extract the filename from the path
        //     fputcsv($handle, [$fileName]); // Write the filename to the CSV file
        // }
        // fclose($handle);

        // echo "GIF filenames have been written to $csvFile";

        $csvFile = './sources/sources.csv';
        // Open the CSV file for reading
        $handle = fopen($csvFile, 'r');

        if ($handle === false) {
            die('Error opening the CSV file for reading');
        }
        while (($data = fgetcsv($handle)) !== false) {
            if (count($data) == 2) {
                // If the line contains both filename and URL
                $fileName = $data[0];
                $url = $data[1];
            } elseif (count($data) == 1) {
                // If the line contains only the filename
                $fileName = $data[0];
                $url = ''; // Or you can set a default URL, e.g., '#'
            } else {
                // Skip lines that don't meet the expected format
                continue;
            }
        
            // Generate HTML to display the GIF image
            if (!empty($url)) {
                echo "<a class='gifcontainer sourced' href=\"$url\" target=\"_blank\"><img class='gifthumb' src=\"./sources/$fileName\" alt=\"$fileName\"></a>";
            } else {
                echo "<div class='gifcontainer'><img class='gifthumb' src=\"./sources/$fileName\" alt=\"$fileName\"></div>";
            }
        }
    ?>
</body>
</html>