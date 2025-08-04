<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planet Xarxax - Central for everything Xarxax</title>
    <?php 
        include('../../src/setup.php');
        echo "<script src='$assetBaseUrl/scripts/audioplayer/audioplayer.php' type='module'></script>\n";
    ?>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center>
        <div class="advertisement-banner"></div>
        <table width="600" height="139" cellpadding="0" cellspacing="0" border="0">
            <tbody>
                <tr height="139">
                    <td valign="top" width="600" height="139">
                        <img alt="Site Banner" src="banner.png">
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="600" cellpadding="0" cellspacing="0" border="0">
            <tbody>
                <tr>
                    <td valign="top" width="600" height="23" bgcolor="#0066ff">
                        <a href="faq.php">
                        <p align="center" style="margin:0;" height="23">
                            <font size="3" face="Verdana, Arial, Helvetica, sans-serif" color="white">Welcome! Click</font> 
                            <font size="3" face="Verdana, Arial, Helvetica, sans-serif" color="yellow">HERE</font> 
                            <font size="3" face="Verdana, Arial, Helvetica, sans-serif" color="white">for our</font> 
                            <font size="3" face="Verdana, Arial, Helvetica, sans-serif" color="yellow">FAQs</font>
                            <font size="3" face="Verdana, Arial, Helvetica, sans-serif" color="white">!</font>
                        </p>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="600" cellpadding="0" cellspacing="0" border="0">
            <tbody>
                <tr>
                    <td valign="top" width="6" height="340" bgcolor="white"></td>
                    <td valign="top" width="194" height="340" bgcolor="white">
                        <p style="margin:0;">&nbsp;</p>
                        <ul>
                            <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="reviews">Episode Reviews</a></font></li>
                            <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="wallpapers.php">Wallpapers</a></font></li>
                            <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="rants">Rants and Raves</a></font></li>
                            <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="coolsites.php">Cool Sites</a></font></li>
                            <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="aboutindex.php">Get To Know Us</a></font></li>
                            <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="mailto:xebulonluv@virtualdream.live">Email Me</a></font></li>
                        </ul>
                        <p align="center">
                            <font size="2" face="Verdana, Arial, Helvetica, sans-serif">Also check out:<br><b><a href="https://virtualdream.live">VirtualDream.Live</a></b></font>
                        </p>
                    </td>
                    <td valign="top" width="373" height="340" bgcolor="white">
                        <p style="margin:7px;">&nbsp;</p>
                        <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Friday, 30th of March 2001 </b>--- <b>[ <a href="history.php">Previous</a> ]</b></font>
                        <p><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Welcome to Planet Xarxax! This is the #1 spot for anything and everything Xarxax. Here you'll find episode reviews, rants, artwork and more.<br>~xebulonluv <3</font></p>
                        <ul>
                            <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Added a new <a href="reviews">episode review</a>!</font></li>
                            <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Welcome to the new site layout!</a>!</font></li>
                            <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Removed all reviews by neocortex1986 [<a href="rants/solongsnoretex.php">SEE HERE</a>]</font></li>
                            <li><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Even more coming soon!</font></li>
                        </ul>
                        <script>
                            window.addEventListener("load", function() {
                                window.createAudioPlayer({
                                    playerXY: [50, 350],
                                    dragEnabled: true,
                                    backgroundColour: "#A12B74",
                                    borderColour: "white",
                                    borderWidth: "2",
                                    borderStyle: "outset",
                                    textColour: "white",
                                    playIcon: "<?php echo "$assetBaseUrl/img/audioplayer/play-invert.png" ?>",
                                    pauseIcon: "<?php echo "$assetBaseUrl/img/audioplayer/pause-invert.png" ?>",
                                    timelineBackgroundColour: "white",
                                    timelineColour: "black",
                                    timelineOpacity: 1,
                                    showCover: false,
                                    // playerBackground: "<?php echo "$assetBaseUrl/img/audioplayer/skins/palm.png" ?>",
                                    // playerBackgroundOffset: [-190, -160],
                                    playerWrapBackground: "<?php echo "spaceship5.gif" ?>",
                                    playerWrapBackgroundOffset: [0, 75],
                                    playerWrapBackgroundSize: 2,
                                    songs: [
                                        { 
                                            file: "theme.wav",
                                            title: "Xarxax VII Theme",
                                            artist: "Brian Goldfield"
                                        }
                                    ]
                                });
                            });
                            
                        </script>
                        <!-- <p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="">An ad that you probably shouldnt trust!</a></font></p> -->
                    </td>
                    <td valign="top" width="27" height="340" bgcolor="white"></td>
                </tr>
            </tbody>
        </table>
        <table width="600" cellpadding="0" cellspacing="0" border="0">
            <tbody>
                <tr>
                    <td valign="top" width="600" height="35" bgcolor="white" style="line-height:12px">
                        <center>
                        <font size="1" face="Verdana, Arial, Helvetica, sans-serif">© 2000 planetxarxax. This page was created by xebulonluv. Xarxax and all characters belong to their creators. No copyright infringement is intended. Thanks for visiting!</font>
                        </center>
                    </td>
                </tr>
            </tbody>
        </table>
    </center>
</body>
</html>