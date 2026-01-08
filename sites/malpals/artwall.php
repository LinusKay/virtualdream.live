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
    <title>MalPals! - Art Wall</title>
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
                <p id="introduction">Check out some of the totally awesome art from fans just like you!!<br><a href="mailto:malpals@virtualdream.live">Send us some mail</a> to get your art featured. Every week we pick a new special piece to feature on the MalPals homepage!</p>
                <hr>
                <table>
                    <tbody>
                        <tr>
                            <td width="180">
                                <a href="src/img/fanart/MalPal_FanartTuesday_01_DesktopWallpaper_1024x568.png">
                                    <img class="background-preview" src="src/img/fanart/MalPal_FanartTuesday_01_DesktopWallpaper_1024x568.png">
                                </a>
                            </td>
                            <td width="180">
                                <a href="src/img/fanart/MalPal_FanartTuesday_02_DesktopWallpaper_1024x568.png">
                                    <img class="background-preview" src="src/img/fanart/MalPal_FanartTuesday_02_DesktopWallpaper_1024x568.png">
                                </a>
                            </td>
                            <td width="180">
                                <a href="src/img/fanart/MalPal_FanartTuesday_03_DesktopWallpaper_1024x568.png">
                                    <img class="background-preview" src="src/img/fanart/MalPal_FanartTuesday_03_DesktopWallpaper_1024x568.png">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td width="180">
                                <a href="src/img/fanart/MalPal_FanartTuesday_04_DesktopWallpaper_1024x568.png">
                                    <img class="background-preview" src="src/img/fanart/MalPal_FanartTuesday_04_DesktopWallpaper_1024x568.png">
                                </a>
                            </td>
                            <td width="180">
                                <a href="src/img/fanart/WilliamArtwork.jpg">
                                    <img class="background-preview" src="src/img/fanart/WilliamArtwork.jpg">
                                </a>
                            </td>
                            <td width="180">
                                <a href="src/img/fanart/MalPal_FanartTuesday_05.png">
                                    <img class="background-preview" src="src/img/fanart/MalPal_FanartTuesday_05.png">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td width="180">
                            </td>
                            <td width="180">
                            </td>
                            <td width="180">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <?php include("news.php"); ?>
        </tr>
        <?php include("footer.php"); ?>
    </table>
</body>
</html>