<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include('../../src/setup.php');
    ?>
    <title>Sebs Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <center>

        <div class="cool-banner" style="margin:0;background-image: url('src/aliasmarble.png');">
            <h1>Hail and well met, User, welcome to Sophisticated Sebastian's Soiree </h1>

            <p>Salutations dear visitor, for it is I: Sophisticated Sebastian! Here to bring some INTELLECT and DECENCY into this sordid affair we know as 'VirtualDream'</p>
            <p>Feel free to query my emersonian mind on any one-word subject of your choosing. Might I suggest you click the animatic of the violin to stimulate your aural senses as we dialogue?</p>
            <img id="playImage" src="src/violin.gif" alt="Click for an intelligent soundscape.">
            <audio id="song" src="src/concerto.mp3"></audio>
        </div>
        <div class="image-row">
            <img src="src/romanpillar.png" alt="divine beauty">
            <div style="margin:0;background-image: url('src/aliasmarble.png');" class="center-content">
                <form method="post" action="">
                    <input type="text" name="topic" placeholder="Enter a word..." required>
                    <button type="submit" name="askBtn">Ask</button>
                </form>
                <?php
                if (isset($_POST['askBtn'])) {   // user pressed the ask button
                    $thoughts = json_decode(file_get_contents("thoughts.json"), true);
                    //Grab seb's thoughts from the json
                    $input = strtolower(trim($_POST['topic']));
                    //Make everythin to lower, less pain that way.
                    $found = false;
                    foreach ($thoughts as $key => $data) {
                        //Note, that one topic can be known by many different names. We can define that as an 'alias' 
                        if ($input === $key || in_array($input, $data['aliases'])) {
                            echo "<strong>My thoughts:</strong> " . htmlspecialchars($data['response']);
                            $found = true;
                            break;
                        }
                    }
                    
                    //Mite b cool to have many diff responses.
                    if (!$found) {
                        echo "<strong>Answer:</strong> I've never heard of that, likely as it is not worth my time.";
                    }
                }
                ?>

            </div>
            <img src="src/romanpillar.png" alt="divine beauty">
        </div>

    </center>

    <script>
        const img = document.getElementById("playImage");
        const audio = document.getElementById("song");

        img.addEventListener("click", () => {
            if (audio.paused) {
                audio.play();
            } else {
                audio.pause();
                audio.currentTime = 0;
            }
        });
    </script>
</body>

</html>