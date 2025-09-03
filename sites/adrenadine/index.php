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
    <title>Goodbye from Adrenadine</title>
    <style>
        body {
            background:url('src/img/bgsky.png');
            background-repeat:repeat;
            font-family: Arial, Helvetica, sans-serif;
            font-size:12px;
        }
        #site-container {
            width: 800px;
            height:900px;
            margin:auto;
            background:white;
            border-radius: 25px 25px 0 0;
            position:relative;
            border: solid 1px #dfdfdf;
        }
        .header {
            height: 220px;
            width:800px;
            background: url('src/img/banner4.png');
            background-size: 100% auto;
            border-radius: 25px 25px 0 0;
            position:relative;
        }
        .header .logo {
            position:absolute;
            top:15px;
            width:700px;
        }
        .header .imgfeature {
            position: absolute;
            top: 10px;
            left: 10px;
            width:150px;
        }
        .header .imgfeature a {
            
            text-decoration: none;
        }
        .header .imgfeature p {
            text-align:center;
            padding: 10px;
            border-radius: 25px;
        }
        .navbar{
            height: 25px;
            position: absolute;
            bottom: 25px;
            width:800px;
            text-align:left;
        }
        .navbar ul {
            list-style-type:none;
            padding:0;
            /* padding-left: 15px; */
        }
        .navbar ul li {
            display: inline-block;
            text-align:center;
            border-left: solid 1px #dfdfdf;
            padding:10px;
            margin:0;
            float:left;
            width:75px;
            background: linear-gradient(180deg,rgba(204, 204, 204, 0) 0%, rgba(255, 255, 255, 0.54) 50%, rgba(255, 255, 255, 0.54) 88%, rgba(0, 0, 0, 0) 100%);
            opacity:0.6;
        }
        .navbar ul li:hover {
            opacity:1;
        }
        .navbar ul li:first-child {
            border-left: none;
        }
        .navbar ul li::after {
            background: linear-gradient(180deg,rgba(204, 204, 204, 0) 0%, rgba(255, 255, 255, 1) 50%, rgba(255, 255, 255, 1) 88%, rgba(0, 0, 0, 0) 100%);
            /* content: " |"; */
        }
        .navbar ul li:last-child::after {
            content: "";
        }
        a {
            padding-left: 0;
        }
        .sidebar {
            width: 200px;
            height:500px;
            float:left;
        }
        .sidebar h3 {
            margin:0;
        }
        .sidebar * {
            padding-left:10px;
        }
        .sidebar .sidenav-header {
            height:15px;
            width:160px;
            margin-left:10px;
            margin-bottom :0;
            background:#67D941;
            font-size:10px;
            border-radius: 0 25px 0 0;
            color: white;
        }
        .sidebar ul {
            list-style-type: none;
            padding-left: 0;
            margin-top: 0;
        }
        .pageicon{
            padding: 0;
            width:10px;
        }
        .sidebar ul li {
            padding-left: 0;
            margin-left:10px;
            background: linear-gradient(180deg,rgba(204, 204, 204, 0) 0%, rgba(232, 232, 232, 1) 100%);
            border-bottom: solid 1px #dfdfdf;
            height:20px;
            width:170px;
        }
        .sidebar .advertisement-card {
            width:160px;
            padding-left: 0;
        }
        .sidebar .advertisement-card img {
            width: 100%;
        }
        .post-feed {
            width:600px;
            float:left;
        }
        .post-feed h3 {
            margin:0;
        }
        .post-box {
            width:570px;
            background: #F2FFF4;
            padding:0px 10px;
            margin-bottom: 5px;
            border-bottom: solid 1px #dbdbdb;
            min-height: 105px;
            /* border-top:solid 1px green; */
            border-radius: 10px 10px 0 0;
            overflow:hidden;
        }
        .post-box .post-highlight {
            width:600px ;
            height: 20px;
            background: #67D941;
            margin:0;
            margin-left: -10px;
            top: 0;
            padding:0;
            margin-bottom: 5px;
        }
        .post-box .post-highlight span {
            color: white;
            font-size:12px;
            padding-left:6px;
            margin-top:2px;
            font-weight: bold;
        }
        /* .post-box:first-of-type {
            border-top: solid 1px #dbdbdb;
            overflow:hidden;
            padding-top:20px;
        } */
        .post-thumb-container {
            display:inline-block;
            float:left;
            width: 100px;
            height:100px;
            background: white;   
            border: solid 1px #dbdbdb;        
            margin-right: 10px;
        }
        .post-thumb {
            display:inline-block;
            float:left;
            width: 90px;
            height:90px;
            border: solid 1px #dbdbdb;       
            margin:5px;
        }
        .post-title {
            display: inline-block;
            width:450px;
            float:left;
            margin:0;
        }
        .post-content {
            display:inline;
        }
        .post-disclaimers {
            opacity: 0.2;
            margin: 5px 0;
        }
        .post-social {
            list-style-type: none;
            padding:0;
            margin:0;
            margin-bottom:10px;
        }
        .post-social li {
            display: inline;
        }
        
        .adheader {
            opacity: 0.4;
            margin:0;
            font-size:10px;
            padding-left:20px;
        }

        .aero {
            background-color: #67D941;
            background: radial-gradient(farthest-corner at bottom center, rgba(255, 255, 255, 0.7), transparent), linear-gradient(to bottom, #44A822, #67D941);
            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
            border: 1px solid #67D941;
            color: rgba(50, 26, 17, 0.8);
            font-weight: 600;
            position: relative;
            text-shadow: 0 2px 0.5em #0003;
            transition: all 300ms;
        }
        p.aero {
            border-radius: 9999px;
            cursor: pointer;
            padding: 0 1em;
        }
        p.aero::after {
            content: "";
            position: absolute;
            top: 4%;
            left: 3%;
            width: 94%;
            height: 40%;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.1));
            border-radius: 9999px;
            transition: background 400ms;
        }
        p.aero:hover, button.aero:focus {
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.4);
        }
        p.aero:active {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
        }
        .plane {
            position:absolute;
            bottom:0;
            right:0;
            width:250px;
        }
        .footer {
            height:15px;
            width:800px;
            bottom:0;
            position:absolute;
            background: #f5f5f5;
        }
        .footer p {
            margin:0;
            padding-left: 10px;
            font-size: 10px;
            opacity:0.7;
        }
        .footer a {
            float:right;
            padding-right:10px;
        }
    </style>
</head>

<body>
    <div id="site-container">
        <div class="header">
            <img class="logo" src="src/img/cooltext490062004273314.png">
            <div class="imgfeature">
                <img src="src/img/3ZK3UZ65SZB6DWP6BVM6QZA6GUT7ZJGU.gif">
                <a href=""><p class="aero">Life starts NOW!</p></a>
            </div>
            
            <img class="plane" src="src/img/plane.png">
            <div class="navbar">
                <ul>
                    <a href=""><li>News</li></a>
                    <a href=""><li>About</li></a>
                    <a href=""><li>Contact Us</li></a>
                    <a href=""><li><img class="pageicon" src="src/img/CS3Z4OCTMK6YD3HFKRLDG2NEQIL4M6YD.gif">Book NOW</li></a>
                </ul>
            </div>
        </div>
        <div class="sidebar">
            <h3>Jump About!</h3>
            <hr>
            <p class="sidenav-header">Hot Links</p>
            <ul>
                <li><a href=""><img class="pageicon" src="src/img/MRX2LYIICWA4LDZPAVA2SOG7WR3Y57OR.gif">News</a></li>
                <li><a href=""><img class="pageicon" src="src/img/7UGY7VH7ZSBQTP62QEYQIHTOKE3GFYJD.gif">About</a></li>
                <li><a href=""><img class="pageicon" src="src/img/7UGY7VH7ZSBQTP62QEYQIHTOKE3GFYJD.gif">Menu Options</a></li>
                <li><a href=""><img class="pageicon" src="src/img/7UGY7VH7ZSBQTP62QEYQIHTOKE3GFYJD.gif">Reviews</a></li>
                <li><a href=""><img class="pageicon" src="src/img/7UGY7VH7ZSBQTP62QEYQIHTOKE3GFYJD.gif">Deals $$</a></li>
                <li><a href=""><img class="pageicon" src="src/img/7UGY7VH7ZSBQTP62QEYQIHTOKE3GFYJD.gif">Family Packages</a></li>
                <li><a href=""><img class="pageicon" src="src/img/7UGY7VH7ZSBQTP62QEYQIHTOKE3GFYJD.gif">Pet Passengers</a></li>
                <li><a href=""><img class="pageicon" src="src/img/7UGY7VH7ZSBQTP62QEYQIHTOKE3GFYJD.gif">Vehicle Hire</a></li>
            </ul>
            <p class="adheader">Advertisements</p>
            <div class="advertisement-card"></div>
            <div class="advertisement-card"></div>
            <div class="advertisement-card"></div>
        </div>
        <div class="post-feed">
            <h3>News</h3>
            <hr>
        <?php 
            $posts = [
                [
                    "postTitle" => "Goodbye from AdrenaDine",
                    "postThumb" => "src/img/broken_heart.gif",
                    "postContent" => "Due to <u>tragic and unforeseeable</u> circumstances AdrenaDine has been forced to close permanently.<br>
                We thank you for an adrenaline-filled 2 months.",
                    "postDisclaimers" => "If you believe you are eligible for compensation as a result of any alleged operations run by AdrenaDine Co. or SkyHotel Co. Pty. Ltd. please contact reachout@jerryromlinsonlawyers.net.<br>
                Under state legislation (3589 U.S.C. § 41356, 1993) the above statement is purely informational and does not consitute any admission of guilt."
                ],
                [
                    "postTitle" => "$$ February Deal: SOLO SKYDINING for 2!!",
                    "postThumb" => "src/img/3ZK3UZ65SZB6DWP6BVM6QZA6GUT7ZJGU.gif",
                    "postContent" => "CHOW to your HEARTS CONTENT from the SAFETY* of your very own DINEGLIDER. ENJOY a FULL 3-COURSE DINNER, with DRINKS PROVIDED^ at the comfortable altitude of 15,000 FEET. IT DOESN'T GET MORE ROMANTIC THAN THAT! Profess your love for a cherised one with our 2-for-1 SKYDINING EXPERIENCE, all through February ONLY. WANT MORE? GET MORE. Upgrade your package to get access to our PREMIUM in-flight entertainment as the stylings of world-renouned guitarist Alfonse Capriolo join you on your RAPID and AGGRESSIVE descent. GUARANTEED to get your HEART RACING. NOT SATISFIED? THEN NEITHER ARE WE! Our PREMIUM Date Night Rush package includes not just ONE but TWO SKYDINE experiences all rolled into the one ADRENALINE NUGGET served DIRECTLY to YOUR NERVOUS SYSTEM. Customise your descents with a choice of drop locations. Sunrise and Sunset dives available at additional cost to flyers. LIMITED SPOTS AVAILABLE. Email bookings.adrenadine@virtualdream.live for questions or to secure your spot NOW!",
                    "postDisclaimers" => "*SAFETY is a registered trademark of AdrenaDine Co. ^at additional cost of $199/pp."
                ],
                [
                    "postTitle" => "March MAYHEM",
                    "postThumb" => "src/img/GWHJTMYJVPDLA7MVZYN2S2TS2OCTUBGT.gif",
                    "postContent" => "This March we're going ABSOLUTELY MAD with our MOST EXCLUSIVE* OFFER EVER! For just $399 YOU and 12 OTHERS can pilot your very own PRIVATE CHARTER PLANE. YOU bring the friends. YOU FLY THE PLANE. Catering and drinks provided^. Contact us TODAY and use code MARCHINSANITY to secure your spot.",
                    "postDisclaimers" => "*EXCLUSIVE is a registered trademark of AdrenaDine Co.^at additional cost of $199/pp."
                ]
            ];

            foreach($posts as $post) {
                $postTitle = $post["postTitle"];
                $postThumb = $post["postThumb"];
                $postContent = $post["postContent"];
                $postDisclaimers = $post["postDisclaimers"];
                echo "
                <div class=\"post-box\" id=\"$postTitle\">
                    <div class=\"post-highlight\"><span>$postTitle</span></div>
                    <div class=\"post-thumb-container\">
                        <img class=\"post-thumb\" src=\"$postThumb\">
                    </div>
                    <p class=\"post-content\">$postContent</p>
                    <p class=\"post-disclaimers\">$postDisclaimers</p>
                    <ul class=\"post-social\">
                        <li><a href=\"#$postTitle\">Link</a></li>
                        <li><a href=\"mailto:booking.adrenadine@virtualdream.live\">Book</a></li>
                    </ul>
                </div>
                ";
            }
        ?>
        
        </div>
        <div class="footer">
            <p>Copyright Adrenadine. <a href="">Terms & Conditions</a></p>
        </div>
    </div>
</body>
</html>