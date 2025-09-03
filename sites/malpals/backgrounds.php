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
    <title>MalPals! - Free Backgrounds</title>
    <link rel="stylesheet" href="src/style.css">
</head>
<body>
    <div id="spacer-top"></div>
    <table id="table-main">
        <tr id="row-main">
            <td id="col-left">
                <div id="bar-left">
                    <?php include("nav.php");?>
                </div>
            </td>
            <td id="col-middle">
                <div id="spacer-top"></div>
                <img id="site-logo" src="src/img//malpals-logo.png">
                <p id="introduction">Check out some of the cool and fun backgrounds we've got for you to decorate your PC <b>your</b> way!</p>
                <hr>
                <table>
                    <tbody>
                        <tr>
                            <td width="180">
                                <a href="src/img/backgrounds/MalPal_TubularTriangle_DesktopWallpaper_1024x568.png">
                                    <img class="background-preview" src="src/img/backgrounds/MalPal_TubularTriangle_DesktopWallpaper_1024x568.png">
                                </a>
                                <a download class="background-download" href="src/img/backgrounds/MalPal_TubularTriangle_DesktopWallpaper_1024x568.png">Download</a>
                            </td>
                            <td width="180"></td>
                            <td width="180"></td>
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