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
            <td id="col-left">
                <div id="bar-left">
                    <?php include("nav.php");?>
                </div>
            </td>
            <td id="col-middle">
                <div id="spacer-top"></div>
                <img id="site-logo" src="src/img//malpals-logo.png">
                <p id="introduction">Select your pal!</p>
                <hr>
                <table>
                    <tbody>
                        <tr>
                            <td width="180">
                                <a href="success.php?pal=spagbol">
                                    <img class="pal-preview" src="src/img/spagbol.png">
                                </a>
                                <p class="pal-download" >Spag Bol</p>
                                <a class="pal-download" href="success.php?pal=spagbol">Download</a>
                            </td>
                            <td width="180">
                                <a  href="success.php?pal=triangle">
                                    <img class="pal-preview" src="src/img/malpal-tubulartriangle.png">
                                </a>
                                <p class="pal-download" >Tubular Triangle</p>
                                <a class="pal-download" href="success.php?pal=triangle">Download</a>
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