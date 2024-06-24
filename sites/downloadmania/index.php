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
    <title>DOWNLOAD MANIA - GET YOUR LOAD ON</title>
    <style>
        .dl-title {
            
        }
        .dl-preview {
            height:50px;
            width:50px;
        }
        .dl-owner{
            font-size:12px;
        }
        .dl-total {
            font-size:12px;
        }
        a {

        }
    </style>
</head>
<body>
    <center>
    <img src="src/img/bannergridcroptext.png">
    <p>GET YOUR LOAD ON</p>
    <h3>TODAY'S TOP LOADS</h3>
    <table width="600">
        <tbody>
            <tr>
                <td align="center">
                    <img class="dl-preview" src="src/img/zipper.png">
                    <p><b><a href="download.php?file=ziploader_v12.3_01_57_installer_RU.exe">ZipLoader</a> (EXE)</b></p>
                    <p class="dl-owner">Serial Computing And Manufacturing Inc.</p>
                    <p class="dl-total"><b>Downloads</b>: 300930</p>
                </td>
                <td align="center">
                    <img class="dl-preview" src="src/img/dancingbaby.gif">
                    <p><a href="download.php?file=dancingbaby.gif">Dancing Baby</a> (GIF)</p>
                    <p class="dl-total"><b>Downloads</b>: 10003837</p>
                </td>
            </tr>
        </tbody>
    </table>
    </center>
</body>
</html>