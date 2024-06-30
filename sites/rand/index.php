<?php 
    
        if(isset($_GET['seed'])) { 
            $seedRaw = $_GET['seed'];
        } else {
            $seedRaw = generateRandomString();
        }

        function generateRandomString($length = 10) {
            $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
            $charactersLength = strlen($characters);
            $randomString = "";
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        echo "Seed Raw: " . $seedRaw . "<br>";
        $seedHash = crc32($seedRaw);
        echo "Seed Hash: " . $seedHash . "<br>";
        srand($seedHash);
        echo (rand() % 100) . "<br>";

        $neighbourNext = generateRandomString();


        function rand_color() {
            return '#' . str_pad(dechex(rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }

        $images = glob("src/img/sources/*.{jpg,png,gif}", GLOB_BRACE);
        $imageChosen = $images[rand(0, sizeof($images) - 1)];
        echo "<img src='$imageChosen'><br>";

        $colourOne = rand_color();
        $colourTwo = rand_color();

        // Source: https://gist.github.com/sepehr/3371339
        function readable_random_string($length = 6)
        {  
            $string = '';
            $vowels = array("a","e","i","o","u");  
            $consonants = array(
                'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 
                'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z'
            ); 

            $max = $length / 2;
            for ($i = 1; $i <= $max; $i++)
            {
                $string .= $consonants[rand(0,19)];
                $string .= $vowels[rand(0,4)];
            }

            return $string;
        }
        $wordCount = 1;
        $punctuationTimer = rand(1, 10);
        $punctuation = [",", ".", "!", "?"];
        $wordLimit = rand(100, 500);
        $capitaliseNext = True;
        for ($x = 0; $x <= $wordLimit; $x++) {
            $wordLength = rand(2, 10);
            if($capitaliseNext) {
                echo ucfirst(readable_random_string($wordLength));
                $capitaliseNext = False;
            }
            else echo readable_random_string($wordLength);
            if($wordCount % $punctuationTimer == 0) {
                echo $punctuation[rand(0, sizeof($punctuation) - 1)];
                $punctuationTimer = rand(1, 10);
                $capitaliseNext = True;
            }
            echo " ";
            $wordCount += 1;
          }
          echo "<br>";
    ?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background: <?php echo $colourOne; ?>;
            color: <?php echo $colourTwo; ?>;
        }
        #nav {
            width:200px;
            margin:auto;
            text-align:center;
            background:black;
        }
        #nav a {
            display:inline-block;
            color:white;
        }
    </style>
</head>
<body>  
    <div id="nav">
        <a href="<?php echo "?seed=" . $neighbourNext; ?>">Next Neighbour</a>
    </div>
</body>
</html>