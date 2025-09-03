<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    # PAGE SETUP
    $metaDescription = "Introducing MalPals!® The fun interactive friends that totally chill out on your browser!";
    include('../../src/setup.php');
    # /PAGE SETUP
    ?>
    <title>MalPals! - Cool Online Friends</title>
    <script>
        window.addEventListener("load", function() {
            Cookies.set('stickerPackMalPals', JSON.stringify(true), { domain: '<?php echo $baseDomain?>' , path: '/' });
        });
    </script>
    <link rel="stylesheet" href="src/style.css">
</head>
<body>
    <div id="spacer-top"></div>
    <table id="table-main">
        <tr id="row-main">
            <?php include("nav.php");?>
            <td id="col-middle">
                <div id="spacer-top"></div>
                <img id="site-logo" src="src/img//malpals-logo.png">
                <p id="introduction">Introducing <b>MalPals!</b>® The fun interactive friends that totally chill out on your browser! Coming all the way from planet Maltron, these Pals do whatever they can to have fun and be safe. The MalPals site has everything you need to become a true Paller, including cool backgrounds, epic games and art from fans! Are you ready???</p>
                <hr>
                <table id="content-table">
                    <tr>
                        <td>
                            <div id="feature-bar">
                                <h2>What's New!</h2>
                                <img id="feature-img" src="src/img/malpal-tubulartriangle.png">
                                <p id="feature-title"><b>Try our newest MalPal FREE!</b></p>
                                <p id="feature-text">Meet Tubular Triangle, your new best bud that lives right on your browser! Escaping into our world through a crazy cosmic wormhole, Tubular Triangle is here to surf along with you. <a href="success.php?pal=triangle">Click here</a> to try!</p>
                                <br>
                                <img id="feature-img" src="src/img/WilliamArtwork.jpg">
                                <p id="feature-title"><b>Art Wall Feature!</b></p>
                                <p id="feature-text">This art wall feature is from William P! Thanks Will, we really love your work!</p>
                            </div>
                        </td>
                        <td id="activity-bar">
                            <div id="feature-wall">
                                <h3>Feature Wall!</h3>
                                <p id="featured-paller-title">Today's featured Pallers</p>
                                <p id="featured-paller-text">Sarah W says <i>"i love love love LOVE my pals so so much thank you so much malpals :~) ribbit ~sarah <3"</i></p>
                                <p id="featured-paller-text">Andrew M says <i>"MalPals are the best. All my friends think they're awsome at school."</i></p>
                                <p id="featured-paller-response">Wow! Thanks guys. Send us some email by clicking the mailbox below to be featured!</p>
                                <a id="mailbox" href="mailto:malpals@virtualdream.live"><img src="src/img/mailbx14.gif"></a>
                            </div>
                            <h3>Check out some cool activities!</h3>
                            <table id="extra-goodies-table">
                                <tr>
                                    <td style="width:50px">
                                        <img src="src/img/ball.gif">
                                    </td>
                                    <td style="width:221px">
                                        <p id="activity-title">Games!</p>
                                        <p>Coming Soon!</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:50px">
                                        <img src="src/img/computer.gif">
                                    </td>
                                    <td style="width:221px">
                                        <p id="activity-title">Extra goodies</p>
                                        <p>Download some awesome <a href="backgrounds.php">MalPals Backgrounds</a></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:50px">
                                        <img src="src/img/Earth_Globe.gif">
                                    </td>
                                    <td style="width:221px">
                                        <p id="activity-title">Total Cool Visitors</p>
                                        <p>100893</p>
                                    </td>
                                </tr>
                            </table>
                            <div id="poll">
                                <form>
                                    <p id="poll-title">MalPoll!</p>
                                    <p id="poll-text">Would you be more inclined to purchase a product if it featured MalPal characters on it?</p>
                                    <input type="radio" id="poll-yes" name="poll-response" value="yes">
                                    <label for="poll-yes">Yes</label><br>
                                    <input type="radio" id="poll-no" name="poll-response" value="no">
                                    <label for="poll-no">No</label><br>
                                    <input type="submit" value="Vote">
                                </form>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
            <?php include("news.php"); ?>
        </tr>
        <?php include("footer.php"); ?>
    </table>
</body>
</html>