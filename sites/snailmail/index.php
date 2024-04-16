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
        <title>Snail Mail</title>
        <link rel="stylesheet" href="style.css">
        <style> 
        body {
            text-align:center;
            width:800px;
            margin:auto;
        }
        #advicebox {
            border: solid 1px black;
            padding:10px;
            border-radius: 10px;
        }
        </style>
    </head>
    <body>
        <img src="src/img/snailmail.gif">
        <p>Consult the snail</p>
        <?php 
            $snailphrases = [
                "The early snail catches the dew... but only if it's a morning snail.",
                "Slow and steady wins the snail race, but only if no one else shows up.",
                "When life gives you snails, make escargot-flavored lemonade.",
                "In the kingdom of snails, the one-eyed snail is king... until the other eye grows back.",
                "You can lead a snail to water, but you'll have to wait a while for it to decide to drink.",
                "Don't count your snails before they slime.",
                "Every snail has its shell, but not every shell has its snail... yet.",
                "A watched snail never boils... or moves... or does much of anything, really.",
                "The snail that travels alone leaves the slimiest trail... and usually gets lost.",
                "A penny saved is a penny earned, but a snail saved is just a snail.",
                "When life throws snails at you, make a slippery slope and slide away.",
                "Two snails in a shell are better than one, unless they're arguing over who gets the window seat.",
                "A snail's silence speaks volumes... mostly about their lack of vocal cords.",
                "The early snail gets the leaf... unless the late snail gets there first.",
                "You can't make a snail climb a tree, but you can make a snail wonder why you're trying.",
                "When in doubt, follow the snail trail... but beware of where it leads.",
                "A snail's home is its castle... until the landlord raises the rent on leaves.",
                "When life gives you snails, make snail-ade... but don't ask what's in it.",
                "Don't judge a snail by its slime... unless you're a snail slime connoisseur.",
                "A rolling snail gathers no... oh wait, snails don't roll.",
                "Even a broken clock is right twice a day, but a snail clock is just perpetually slow.",
                "If at first, you don't succeed, try being a snail... or something like that.",
                "The early bird catches the worm, but the early snail catches... well, nothing really, just dew.",
                "You can't teach an old snail new tricks... unless those tricks involve even slower movement.",
                "When in doubt, consult the snail oracle... but don't expect quick answers, or any answers at all, really.",
                "Why did the snail buy a sports car? To go from 0 to 60 in... oh, never mind.",
                "What do you call a snail on a ship? A slow sailor.",
                "Why did the snail climb the tree? To branch out from its slow lifestyle.",
                "Did you hear about the snail who won the lottery? It's still celebrating... the ticket was a bit too heavy.",
                "What's a snail's favorite game? Escargot and Seek.",
                "Why don't snails like to ride bicycles? They're afraid of getting a flat tire... or a slow leak.",
                "How do you apologize to a snail? You shell-ebrate its slowness and offer it a leaf.",
                "Why did the snail become a gardener? It wanted to make its own 'slow food' movement.",
                "What's a snail's favorite dance move? The slime shuffle.",
                "A snail's wisdom: sometimes the longest journeys begin with the smallest steps... and a lot of slime.",
                "The snail knows: there's no need to rush when you're carrying your home on your back.",
                "In the kingdom of snails, the wise rule at a snail's pace... which can be quite slow.",
                "A snail's secret to success: persistence, patience, and a good supply of lettuce.",
                "When facing adversity, remember the snail: slow progress is still progress.",
                
            ];
            $snailWisdom = $snailphrases[array_rand($snailphrases)];
        ?>
        <p id="advicebox"><?php echo $snailWisdom; ?></p>
        <p>Copyright (c) Harry Humour - <a href="../harryhumour">MORE JOKES</a></p>
    </body> 
</html>