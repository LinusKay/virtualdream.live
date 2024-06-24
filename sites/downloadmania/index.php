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
            font-weight:bold;
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
        #wrap {
            width:753px;
        }
        #dl-popular {
            text-align: left;
            font-size:12px;
            list-style-type:none;
        }
        #dl-popular li::before {
            content: "⬇";
            padding-right: 5px;
        }
        #downloadbarwrap {
            height:20px;
            width:400px;
            background:#eeeeee;
            border:solid 1px gray;
            border-radius:2px;
            overflow:hidden;
        }
        #downloadbarfill {
            height:20px;
            width:150px;
            background:#11cccc;
            float:left;
            border-radius:5px;
            margin-left: -5px;
        }
        #downloadbarpercent {
            float:right;
            margin-right:10px;
            font-family: Arial, Helvetica, sans-serif;
            font-size:10px;
            line-height:20px;
        }
        #bomb {
            width:100px;
        }
        .heading {
            height:30px;
            margin-top:15px;
        }
    </style>
</head>
<body>
    <center>
    <img src="src/img/bannergridcroptext.png">
    <p>GET YOUR LOAD ON - LET SOFTWARE BE FREE</p>
    <img class="heading" src="src/img/toploads.png" alt="today's top loads">
    <table width="600">
        <tbody>
            <tr>
                <td align="center">
                    <img class="dl-preview" src="src/img/zipper.png">
                    <p class="dl-title"><a href="download.php?file=ziploader_v12.3_01_57_installer_RU.exe">ZipLoader</a> (EXE) 1.2MB</p>
                    <p class="dl-owner">Serial Computing And Manufacturing Inc.</p>
                    <p class="dl-total"><b>Downloads</b>: 300930</p>
                </td>
                <td align="center">
                    <img class="dl-preview" src="src/img/dancingbaby.gif">
                    <p class="dl-title"><a href="download.php?file=dancingbaby.gif">Dancing Baby</a> (GIF) 62.7KB</p>
                    <p class="dl-total"><b>Downloads</b>: 10003837</p>
                </td>
            </tr>
        </tbody>
    </table>
    <img class="heading" src="src/img/popularloads.png" alt="popular loads">
    <table width="600">
        <tbody>
            <tr>
                <td width="300">
                    <ul id="dl-popular">
                        <li><span class="dl-title"><a href="download.php?file=Xarxax_VII_(Season_17)_[ES].zip">Xarxax_VII_(Season_17)_[ES]</a></span> - (ZIP) 35.1KB</li>
                        <li><span class="dl-title"><a href="download.php?file=VirusV1.3_RENAMEBEFOREUPLOAD.exe">MicroMedia Splash Player</a></span> - (ZIP) 97KB</li>
                    </ul>
                </td>
                <td width="300">
                    <ul id="dl-popular">
                    <li><span class="dl-title"><a href="download.php?file=DesktopFriendInstallerRU.exe">DesktopBuddy_Web</a></span> - (EXE) 23KB</li>
                    <li><span class="dl-title"><a href="download.php?file=Programming_for_dummies.pdf">Programming_for_dummies.PDF</a></span> - (PDF) 7KB</li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
    <img class="heading" src="src/img/dailyloadbomb.png" alt="daily load bomb">
    <div id="downloadbarwrap">
        <div id="downloadbarfill"></div>
        <?php 
            if(isset($_COOKIE['uploads'])) {
                $uploads = $_COOKIE['uploads'];
            }
            else {
                $uploads = 0;
            }
            if(isset($_COOKIE['downloads'])) {
                $downloads = $_COOKIE['downloads'];
            }
            else {
                $downloads = 0;
            }
            $uploadBaseline = 37.5;
            $uploadTotal = $uploadBaseline + $uploads + $downloads;
        ?>
        <span id="downloadbarpercent"><?php echo $uploadTotal; ?>%</span>
    </div>
    <p>DANGER! DANGER! WE HAVE NOT YET HIT THE UPLOAD/DOWNLOAD GOAL<br>
    IF WE DO NOT GET ENOUGH UPLOADS/DOWNLOADS THIS BOMB GOES OFF AND KILLS 17 ELDERLY<br>
    THIS IS IN YOUR HANDS</p>
    <img id="bomb" src="src/img/dynamite_bomb_md_clr.gif" alt="dynamite bomb">
    <P>DO YOUR PART TODAY!</P>
    <img class="heading" src="src/img/uploadload.png" alt="upload a load">
    <form action="upload.php">
        <label for="uploadfile">Choose a file to upload:</label>
        <br>
        <input type="file" id="uploadfile" name="uploadfile" required>
        <br>
        <label for="uploadname">Load name:</label>
        <input type="text" id="uploadname" name="uploadname">
        <input type="submit" value="Upload">
    </form>
    </center>
</body>
</html>