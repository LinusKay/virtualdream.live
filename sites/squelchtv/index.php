<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        # PAGE SETUP
        include('../../src/setup.php');
        $goBingoDomain = $baseDomain === $hostLocal ? '../gobingo' : "https://gobingo.$baseDomain";
        # /PAGE SETUP
    ?>
    <title>SquelchTV - Share What You Love</title>
    <style>
        * {
            margin:0;
            padding:0;
        }
        .logo {
            width:200px;
        }
        .logotext {
            width:750px;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size:13px;
            background-size: 200px;
        }
        table {
            padding-top:5px;
            border-radius:5px;
        }
        .vid-container {
            height:200px;
            background-color: #F5F5F5;
            vertical-align: top;
        }
        .vid-container a {
            text-decoration: none;
            color:#9320BD;
        }
        .vid-thumb {
            width: 170px;
            height: 130px;
            overflow:hidden;
            margin: 5px 10px;
            position:relative;
            cursor:pointer;
            border: solid 1px rgba(171, 56, 255, 0.5);
        }
        .vid-thumb img {
            width:230px;
            height:130px;
        }
        .vid-time {
            position:absolute;
            bottom: 5px;
            right: 5px;
            opacity:0.4;
            font-size:13px;
            font-weight:bold;
            pointer-events:none;
        }
        .vid-thumb:hover .vid-time {
            opacity:1;
        }
        .vid-title {
            font-weight:bold;
            margin: 0 10px;
            font-size:14px;
            cursor:pointer;
            text-decoration: underline;
        }
        .vid-uploader {
            margin: 0 10px;
            opacity:0.8;
            font-size:13px;
            color: gray;
        }
        .vid-uploader:hover {
            opacity:1;
        }
        .vid-stats {
            margin: 0 10px 5px 10px;
            color:white; 
            font-size:13px;
            opacity:0.6;
            color: gray;
        }
        .nav-top{
            float:right;
        }
        .nav-top li {
            display: inline-block;
            font-size:12px;
        }
        .nav-top li::after {
            content: " |"
        }
        .nav-top li:last-child::after {
            content: ""
        }
        .powerbox {
            width:130px;
            height:30px;
            opacity: 0.4;
            padding:7px;
        }
        .powerbox * {
            float:left;
            text-align:right;
        }
        .powerbox .poweredby {
            font-size:9px;
            width:45px;
        }
        .powerbox .gobingo {
            font-size:20px;
        }
        .search-bar td {
            background: linear-gradient(180deg,rgba(204, 204, 204, 1) 0%, rgba(226, 226, 226, 1) 100%);
        }
        .search-bar td:first-child {
            border-top-left-radius: 10px;
        }
        .search-bar td:last-child {
            border-top-right-radius: 10px;
        }
        .search-bar button {
            border-radius: 3px;
            border: solid 1px gray;
            padding: 1px 6px;
        }
        .sidebar-list {
            list-style-type:none;
            font-size:14px;
        }
        .sidebar-heading {
            font-size:15px;
        }
        .sidebar-list li {
            color: rgba(171, 56, 255, 0.5);
            font-weight:bold;
            text-decoration: underline;
            cursor:pointer;
        }
        .footer td {
            background: #eeeeee;
            border-bottom: solid 1px #dbdbdb;
        }
        .footer tr:first-child td {
            border-top: solid 2px #dbdbdb;
        }
        .footer .legal {
            font-size:10px;
            padding: 5px 0;
        }
        hr {
            height:0px;
            border-color: #f5f5f5;
        }
        .advertisement-card {
            width:150px;
            height:125px;
            border-radius:15px;
            overflow:hidden;
        }
        .advertisement-card a img {
            width:100%;
        }
    </style>
</head>
<body>
    <center>
        <table width="800" cellspacing="0">
            <tbody>
                <tr>
                    <td width="233"><img class="logo" src="src/img/squelchtv-text.png"></td>
                    <td colspan="2" width="466">
                        <ul class="nav-top">
                            <li><a href=""><b>Sign Up</b></a></li>
                            <li><a href="">Log In</a></li>
                            <li><a href="<?php echo $goBingoDomain; ?>">GoBingo!</a></li>
                        </ul>
                    </td>
                </tr>
                <tr class="search-bar">
                    <td width="233"></td>
                    <td width="233" align="center">
                        <form action="<?php echo $goBingoDomain; ?>/search.php">
                            <input name="s"/> <button>Search</button>
                        </form>
                    </td>
                    <td width="233" align="right">
                        <div class="powerbox">
                            <p class="poweredby">powered by</p>
                            <p class="gobingo">GoBingo!</p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="800" cellspacing="0">
            <tr>
                <td width="200" valign="top">
                    <h4>Check it out! </h4>
                    <hr>
                    <h3 class="sidebar-heading">Sidebar</h3>
                    <ul class="sidebar-list">
                        <li><a href="">Sidebar</a></li>
                        <li><a href="">Sidebar</a></li>
                        <li><a href="">Sidebar</a></li>
                    </ul>

                    <br>
                    <h3 class="sidebar-heading">Sidebar</h3>
                    <ul class="sidebar-list">
                        <li><a href="">Sidebar</a></li>
                        <li><a href="">Sidebar</a></li>
                    </ul>
                    <br>
                    <div class="advertisement-card"></div>
                </td>
                <td width="600">
                    <h4>Popular : (This Week)</h3>
                    <hr>
                    <p>Check out the latest uploads from your community. Connect your BrainGlob now to upload squelchy digital media direct to your senses! All right here on Virtual Dream.</p>
                    <br>
                    <table width="600" >
                        <tbody>
                            <tr>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb1_small.jpg"><p class="vid-time">10:01</p></div></a>
                                    <p class="vid-uploader">KingSquelcher</p>
                                    <a href=""><p class="vid-title">10000 VOLT SQUELCH FOR $$$</p></a>
                                    <p class="vid-stats">238,094 Views - 3 days</p>
                                </td>
                                <td class="vid-container">
                                    <a href=""><a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb4_small.jpg"><p class="vid-time">13:20</p></div></a></a>
                                    <a href=""><p class="vid-title">$10,000,000 SQUELCH BOX!!!</p></a>
                                    <p class="vid-uploader">MrEpicStyle - Cool Video</p>
                                    <p class="vid-stats">77,732 Views - 1 day</p>
                                </td>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb3_small.jpg"><p class="vid-time">41:00</p></div></a>
                                    <a href=""><p class="vid-title">Why I'm Leaving the SquelchTV Community...</p></a>
                                    <p class="vid-uploader">SquelchGod</p>
                                    <p class="vid-stats">1,001,876 Views - 5 days</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb21_small.jpg"><p class="vid-time">3:10</p></div></a>
                                    <a href=""><p class="vid-title">Squelching my neighbour</p></a>
                                    <p class="vid-uploader">arnold47</p>
                                    <p class="vid-stats">288,091 Views - 2 days</p>
                                </td>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb5_small.jpg"><p class="vid-time">7:53</p></div></a>
                                    <a href=""><p class="vid-title">Gromlin Funny Moments Pt. 17</p></a>
                                    <p class="vid-uploader">Best Top Clips in History</p>
                                    <p class="vid-stats">1,259 Views - 7 days</p>
                                </td>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb6_small.jpg"><p class="vid-time">2:15</p></div></a>
                                    <a href=""><p class="vid-title">10 Brutal Airplane Crashes (LOL)</p></a>
                                    <p class="vid-uploader">Top 10 Things</p>
                                    <p class="vid-stats">102 Views - 3 days</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb10_small.jpg"><p class="vid-time">16:29</p></div></a>
                                    <a href=""><p class="vid-title">Why Virtual Dream is Dying</p></a>
                                    <p class="vid-uploader">SquelchTech</p>
                                    <p class="vid-stats">18,240 Views - 1 day</p>
                                </td>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb17_small.jpg"><p class="vid-time">5:00</p></div></a>
                                    <a href=""><p class="vid-title">They uncovered what???</p></a>
                                    <p class="vid-uploader">GromlinHater23</p>
                                    <p class="vid-stats">2,624 Views - 2 weeks</p>
                                </td>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb4_small.jpg"><p class="vid-time">16:20</p></div></a>
                                    <a href=""><p class="vid-title">$100 OR MYSTERY SQUELCH BOX</p></a>
                                    <p class="vid-uploader">MrEpicStyle - Cool Video</p>
                                    <p class="vid-stats">842,342 Views - 3 days</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb2_small.jpg"><p class="vid-time">25:33</p></div></a>
                                    <a href=""><p class="vid-title">I SQUELCHED MY HOUSE?</p></a>
                                    <p class="vid-uploader">Squelch Or Die</p>
                                    <p class="vid-stats">2,910,242 Views - 1 year</p>
                                </td>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb7_small.jpg"><p class="vid-time">1:37:00</p></div></a>
                                    <a href=""><p class="vid-title">Genre Breakdown: SquelchCore</p></a>
                                    <p class="vid-uploader">FunkMeister93 - Keepin' it Funky</p>
                                    <p class="vid-stats">120 Views - 3 weeks</p>
                                </td>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb11_small.jpg"><p class="vid-time">11:11</p></div></a>
                                    <a href=""><p class="vid-title">Virtual Dream Stronger than Ever?</p></a>
                                    <p class="vid-uploader">SquelchTech</p>
                                    <p class="vid-stats">89,083 Views - 2 weeks</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb22_small.jpg"><p class="vid-time">4:55</p></div></a>
                                    <a href=""><p class="vid-title">✧˖°. ~Squelch Haul~ ✧˖°. <3</p></a>
                                    <p class="vid-uploader">AllieAllieAllie</p>
                                    <p class="vid-stats">55,437 Views - 5 days</p>
                                </td>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb12_small.jpg"><p class="vid-time">9:09</p></div></a>
                                    <a href=""><p class="vid-title">The Squelch Revolution</p></a>
                                    <p class="vid-uploader">Unseen History</p>
                                    <p class="vid-stats">658 Views - 2 weeks</p>
                                </td>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb8_small.jpg"><p class="vid-time">43:22</p></div></a>
                                    <a href=""><p class="vid-title">iNsAnI7Y - sQu3lCh PiL3 M3gA (Full Album)</p></a>
                                    <p class="vid-uploader">Filth Den</p>
                                    <p class="vid-stats">43,269 Views - 2 years</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb20_small.jpg"><p class="vid-time">5:12:48</p></div></a>
                                    <a href=""><p class="vid-title">Squelch Kingdom (2003), Class Warfare & You</p></a>
                                    <p class="vid-uploader">astronaut219</p>
                                    <p class="vid-stats">1,439,589 Views - 6 days</p>
                                </td>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb15_small.jpg"><p class="vid-time">12:01</p></div></a>
                                    <a href=""><p class="vid-title">$15000 OR SQUELCH GUN!!!!!!!</p></a>
                                    <p class="vid-uploader">KingSquelch</p>
                                    <p class="vid-stats">2,492,935 Views - 3 weeks</p>
                                </td>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb18_small.jpg"><p class="vid-time">1:00:05</p></div></a>
                                    <a href=""><p class="vid-title">Relaxing Gameplay - Squelch Beats - Study Time - No Talking</p></a>
                                    <p class="vid-uploader">VolcanicMoose - Free Beats</p>
                                    <p class="vid-stats">128,394 Views - 1 year</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb9_small.jpg"><p class="vid-time">36:40</p></div></a>
                                    <a href=""><p class="vid-title">666Squelch999 - Z290b2hlbGw (Full EP)</p></a>
                                    <p class="vid-uploader">Filth Den</p>
                                    <p class="vid-stats">1,409 Views - 6 days</p>
                                </td>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb13_small.jpg"><p class="vid-time">10:21</p></div></a>
                                    <a href=""><p class="vid-title">BREAKING LEGS PRANK!! $700 PRIZE</p></a>
                                    <p class="vid-uploader">KingSquelch</p>
                                    <p class="vid-stats">9,043,299 Views - 2 days</p>
                                </td>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb4_small.jpg"><p class="vid-time">0:35</p></div></a>
                                    <a href=""><p class="vid-title">$1 SQUELCH BOX - GIVEAWAY</p></a>
                                    <p class="vid-uploader">MrEpicStyle - Cool Video</p>
                                    <p class="vid-stats">4,332,523 Views - 2 year</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb14_small.jpg"><p class="vid-time">36:40</p></div></a>
                                    <a href=""><p class="vid-title">GONE 2 JAIL (FUNDRAISER) + GIVEAWAY!!</p></a>
                                    <p class="vid-uploader">KingSquelch</p>
                                    <p class="vid-stats">193,239 Views - 1 day</p>
                                </td>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb19_small.jpg"><p class="vid-time">22:31</p></div></a>
                                    <a href=""><p class="vid-title">So... THAT Just Happened!!</p></a>
                                    <p class="vid-uploader">Veen Deezel</p>
                                    <p class="vid-stats">84,392 Views - 3 weeks</p>
                                </td>
                                <td class="vid-container">
                                    <a href=""><div class="vid-thumb"><img src="src/img/thumb/thumb16_small.jpg"><p class="vid-time">0:07</p></div></a>
                                    <a href=""><p class="vid-title">Man bitby dawg (yeowch)</p></a>
                                    <p class="vid-uploader">holeymoleygwocamoly</p>
                                    <p class="vid-stats">124,034,829 Views - 1 year</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" align="center">
                                    <br>
                                    <div class="advertisement-banner"></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        
        
        
        </table>
        <div class="footer">
            <table width="800" cellspacing="0">
                <tbody>
                    <tr class="search-bar-footer">
                        <td width="233"></td>
                        <td width="233" align="center">
                            <form action="<?php echo $goBingoDomain; ?>/search.php">
                            <input name="s"/> <button>Search</button>
                            </form>
                        </td>
                        <td width="233" align="right">
                            <div class="powerbox">
                                <p class="poweredby">powered by</p>
                                <p class="gobingo">GoBingo!</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="233"><br></td>
                        <td width="233"><br></td>
                        <td width="233"><br></td>
                    </tr>
                </tbody>
            </table>
            <p class="legal">c 2024 SquelchTV. All rights reserved.<br>All uploaded videos property of SquelchTV Inc.</p>
        </div>
    </center>
</body>
</html>