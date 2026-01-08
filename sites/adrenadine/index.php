<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    # PAGE SETUP
    $cursorFollow = "src/img/plane-cursor.png";
    include('../../src/setup.php');
    # /PAGE SETUP
    ?>
    <title>Goodbye from Adrenadine</title>
    <script src="https://unpkg.com/cursor-effects@latest/dist/browser.js"></script>
    <script>
        new cursoreffects.emojiCursor({ emoji: ["🍔", "🍟", "🥩", "🍷"] });
    </script>
    <style>
        body {
            background:url('src/img/bgfull2-index.png');
            /* background:url('https://frutigeraeroarchive.org/images/wallpapers/miscellaneous/miscellaneous_2.jpg'); */
            background-repeat:repeat;
            font-family: Arial, Helvetica, sans-serif;
            font-size:12px;
            background-size: cover;
            z-index:-1;
        }
        #site-container {
            width: 800px;
            height:1250px;
            margin:auto;
            background:white;
            border-radius: 25px 25px 0 0;
            position:relative;
            border: solid 1px #dfdfdf;
            background: url("src/img/pixlbg.png")
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
            /* color: white; */
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
            width: 160px !important;
            height: 133px !important;
        }
        .sidebar .quote {
            padding:0 15px;
            margin-top:0;
            font-style:italic;
            font-size:11px;
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
        .post-box .post-highlight p {
            /* color: white; */
            font-size:12px;
            padding-left:6px;
            padding-top:1px;
            margin:0;
            height:20px;
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
    <audio autoplay loop>
        <source src="src/audio/adrenatheme.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio> 
    <div id="site-container">
        <div class="header">
            <img class="logo" src="src/img/cooltext490062004273314-index.png">
            <div class="imgfeature">
                <img src="src/img/3ZK3UZ65SZB6DWP6BVM6QZA6GUT7ZJGU.gif">
                <a href="#Goodbye from AdrenaDine"><p class="aero">Life starts NOW!</p></a>
            </div>
            
            <img class="plane" src="src/img/plane-index.png">
            <div class="navbar">
                <ul>
                    <a href="#Goodbye from AdrenaDine"><li>News</li></a>
                    <a href="#Goodbye from AdrenaDine"><li>About</li></a>
                    <a href="mailto:booking.adrenadine@virtualdream.live"><li>Contact Us</li></a>
                    <a href="#Goodbye from AdrenaDine"><li><img class="pageicon" src="src/img/CS3Z4OCTMK6YD3HFKRLDG2NEQIL4M6YD.gif">Book NOW</li></a>
                </ul>
            </div>
        </div>
        <div class="sidebar">
            <h3>Jump About!</h3>
            <hr>
            <p class="sidenav-header">Hot Links</p>
            <ul>
                <li><a href="#Goodbye from AdrenaDine"><img class="pageicon" src="src/img/MRX2LYIICWA4LDZPAVA2SOG7WR3Y57OR.gif">News</a></li>
                <li><a href="#Goodbye from AdrenaDine"><img class="pageicon" src="src/img/m0Vcoqe.gif">About</a></li>
                <li><a href="#Goodbye from AdrenaDine"><img class="pageicon" src="src/img/DpYgwQk.gif">Menu Options</a></li>
                <li><a href="#Goodbye from AdrenaDine"><img class="pageicon" src="src/img/A7cLpvn.gif">Reviews</a></li>
                <li><a href="#Goodbye from AdrenaDine"><img class="pageicon" src="src/img/K42tb7f.gif">Deals $$</a></li>
                <li><a href="#Goodbye from AdrenaDine"><img class="pageicon" src="src/img/Q97Bg6M.gif">Family Packages</a></li>
                <li><a href="#Goodbye from AdrenaDine"><img class="pageicon" src="src/img/abQPK7k.gif">Pet Passengers</a></li>
                <li><a href="#Goodbye from AdrenaDine"><img class="pageicon" src="src/img/7UGY7VH7ZSBQTP62QEYQIHTOKE3GFYJD.gif">Vehicle Hire</a></li>
            </ul>
            <p class="sidenav-header">Mark, 57</p>
            <p class="quote">I just can't take business flights anymore. All I can think about is my adrenaline. The blood, pumping through my veins like fire. Strapped in that passenger seat, but my eyes never leave the cockpit. Oh god.</p>
            <p class="sidenav-header">Paige, 46</p>
            <p class="quote">Barely had to chew, go gravity!</p>
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
                    "postContent" => "CHOW to your HEARTS CONTENT from the SAFETY* of your very own DINEGLIDER. ENJOY a FULL 3-COURSE DINNER, with DRINKS PROVIDED^ at the comfortable altitude of 15,000 FEET. IT DOESN'T GET MORE ROMANTIC THAN THAT! Profess your love for a cherised one with our 2-for-1 SKYDINING EXPERIENCE, all through February ONLY. WANT MORE? GET MORE. Upgrade your package to get access to our PREMIUM in-flight entertainment as the stylings of world-renouned guitarist Alfonse Capriolo join you on your RAPID and AGGRESSIVE descent. GUARANTEED to get your HEART RACING. IT DOESN'T GET MORE ROMANTIC THAN THAT! NOT SATISFIED? THEN NEITHER ARE WE! Our PREMIUM Date Night Rush package includes not just ONE but TWO SKYDINE experiences all rolled into the one ADRENALINE NUGGET served DIRECTLY to YOUR NERVOUS SYSTEM. Customise your descents with a choice of drop locations. Sunrise and Sunset dives available at additional cost to flyers. IT REALLY DOESN'T GET MORE ROMANTIC THAN THAT! LIMITED SPOTS AVAILABLE. Email bookings.adrenadine@virtualdream.live for questions or to secure your spot NOW!",
                    "postDisclaimers" => "*SAFETY is a registered trademark of AdrenaDine Co. ^at additional cost of $199/pp."
                ],
                [
                    "postTitle" => "One of our planes went missing",
                    "postThumb" => "",
                    "postContent" => "AND THAT JUST MAKES ALL OF OUR EXPERIENCES THAT MUCH MORE EXCLUSIVE. With a dwindling stock of aircraft, we're just dying to get you onboard more than ever before! CONTACT one of our sales representatives by email TODAY to find out how WE can get YOU in the RIDE OF YOUR LIFE!",
                    "postDisclaimers" => ""
                ],
                [
                    "postTitle" => "MAYDAY! MAYDAY!",
                    "postThumb" => "",
                    "postContent" => "THAT'S RIGHT! We're coming to you with our EMERGENCY deal for THIS MAY ONLY! Our deluxe in-flight disaster package is HALF-PRICE*. For a LIMITED TIME ONLY you can experience your very own custom-tailored air emergency experience. Feel the rush of a mid-air communication breakdown, mechanical mayhap, or violent passenger outburst from the safety of our of our specialised entertainment crafts. We sit you down with one of our EXPERTS to find out what kind of panic-inducing situation is going to suit you best. Through a series of rigorous tests, heavy interrogative questioning and adrenaline-hypnosis^ sessions, we're guaranteed to EXCEED your expectations. With the SELF-SERVICE addon package, YOU CAN BE THE DISASTER. TAKE CONTROL of your life, and a REAL PASSENGER AIRCRAFT for only $399.99. Do it your way!",
                    "postDisclaimers" => "*When you order for 35 passengers or more. ^patent pending"
                ],
                [
                    "postTitle" => "March MAYHEM",
                    "postThumb" => "src/img/GWHJTMYJVPDLA7MVZYN2S2TS2OCTUBGT.gif",
                    "postContent" => "This March we're going ABSOLUTELY MAD with our MOST EXCLUSIVE* OFFER EVER! For just $399 YOU and 12 OTHERS can pilot your very own PRIVATE CHARTER PLANE. YOU bring the friends. YOU FLY THE PLANE. Catering and drinks provided^. Contact us TODAY and use code MARCHINSANITY to secure your spot.",
                    "postDisclaimers" => "*EXCLUSIVE is a registered trademark of AdrenaDine Co. ^at additional cost of $199/pp."
                ]
            ];

            foreach($posts as $post) {
                $postTitle = $post["postTitle"];
                $postThumb = $post["postThumb"];
                $postContent = $post["postContent"];
                $postDisclaimers = $post["postDisclaimers"];
                echo "
                <div class=\"post-box\" id=\"$postTitle\">
                    <div class=\"post-highlight\"><p>$postTitle</p></div>";
                if($postThumb != "") {
                    echo "<div class=\"post-thumb-container\">
                        <img class=\"post-thumb\" src=\"$postThumb\">
                    </div>";
                }
                echo "
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
            <p>Copyright Adrenadine. <a href="" title="REMINDER: Email JRL to fill in Ts & Cs. Dolor ipsum deserunt ut occaecat qui commodo nulla adipisicing culpa cupidatat consequat enim ea adipisicing. Exercitation sit amet irure et culpa quis culpa officia nisi ex labore. Qui sit ad ipsum laborum dolore mollit deserunt mollit enim eu cupidatat voluptate officia. Exercitation aliqua in adipisicing duis sunt. Non anim deserunt dolor nostrud duis cillum duis dolore voluptate eiusmod mollit aliquip ut minim. Esse reprehenderit sit nulla nostrud Lorem incididunt magna magna nostrud sunt quis officia ad.Qui aliquip sint incididunt aliqua. Deserunt amet tempor elit sint ut occaecat. Magna esse consectetur officia adipisicing pariatur ea. Esse dolore cupidatat dolore esse mollit. Minim ullamco enim exercitation fugiat laborum incididunt consectetur mollit consequat. Incididunt sunt aliquip consequat tempor nostrud exercitation occaecat ullamco commodo aute ad tempor ad sit.Esse nulla sit est laborum irure anim est enim. Laboris laborum exercitation proident nulla. Deserunt laboris eu enim dolore amet et labore cillum minim est labore ut consectetur. Occaecat duis deserunt laboris mollit et duis est exercitation eiusmod elit et duis officia. Occaecat pariatur eu sunt culpa quis cillum quis. Aliqua quis laborum sit mollit sit eu et laboris. Consectetur magna sint pariatur officia id est. Do magna velit fugiat ex ipsum. Ullamco reprehenderit id veniam tempor dolor do et ea nostrud. Culpa excepteur deserunt ex sunt pariatur culpa cupidatat ea duis aute ut ut Lorem non. Tempor elit incididunt velit nostrud velit nisi sit officia aliqua. Dolor laborum officia occaecat aute deserunt velit quis aliquip mollit nostrud. Sunt consequat excepteur dolore deserunt aliqua labore Lorem ipsum fugiat labore ullamco anim. Cillum cupidatat qui dolor quis exercitation tempor mollit. Elit deserunt enim reprehenderit est dolore. Nostrud culpa est proident quis est quis elit in eiusmod ea magna et laborum do. Velit nulla amet cupidatat magna proident. Labore irure consequat incididunt sint officia ex sunt id. Voluptate ipsum officia voluptate commodo amet cupidatat est. Sint irure incididunt adipisicing in magna ea. Deserunt incididunt commodo deserunt proident enim qui ullamco laboris qui id ipsum sunt nostrud officia. Incididunt ut magna velit proident anim dolor qui laborum cupidatat do. Amet minim nulla veniam velit adipisicing dolore eiusmod. Eu amet laboris qui nisi est officia est labore quis quis. Nulla cupidatat Lorem amet enim do in adipisicing duis elit esse cupidatat enim. Ex fugiat consequat enim do nulla proident. Officia id ullamco ipsum excepteur et enim. Culpa ad commodo ipsum ut fugiat sint est mollit. Ut aliquip quis duis velit officia adipisicing tempor anim amet eu sunt adipisicing sit veniam. Irure aliquip do est labore voluptate. Enim sint qui in ipsum ea ex elit ullamco. Laboris et commodo consectetur nisi dolore id cupidatat ipsum. Nisi ullamco fugiat consectetur enim ullamco. Deserunt ex sint deserunt esse veniam laboris anim consectetur. Aliqua laborum ut velit sint culpa aliqua exercitation. Ipsum est non proident reprehenderit fugiat aliqua elit. Velit labore qui excepteur aliqua proident aliquip commodo reprehenderit enim sint elit aliquip ipsum. Anim commodo irure enim irure anim elit officia id laboris ea. Ullamco mollit exercitation do velit. Eiusmod esse aliquip pariatur occaecat Lorem et mollit. Pariatur consectetur consequat aute dolor voluptate sint. Eiusmod occaecat non reprehenderit magna dolor adipisicing consectetur fugiat elit adipisicing consequat irure. Nostrud ullamco enim ad veniam adipisicing ea ut anim ut veniam ad. Veniam ut nostrud non occaecat Lorem laboris deserunt in ut id. Duis labore mollit adipisicing velit deserunt reprehenderit. Irure ipsum laborum tempor exercitation veniam aute id mollit laboris consequat ut. Mollit sint qui non cillum sunt. Laboris mollit aute dolore excepteur. Fugiat ipsum pariatur minim exercitation veniam et mollit culpa dolor. Mollit veniam occaecat do ea id quis consequat consectetur veniam et voluptate Lorem tempor nostrud. Sint sit tempor sunt non aliquip proident sint commodo aliqua occaecat officia magna. Esse ut reprehenderit enim sint aliquip culpa. Veniam mollit occaecat esse consectetur. Aliqua ipsum nisi consectetur anim exercitation. Aliquip aute id culpa occaecat ad consectetur anim aute id reprehenderit irure ut excepteur cupidatat. Sit veniam anim commodo qui consectetur ea proident consectetur. Sunt est duis laborum quis deserunt esse. Ad ex eiusmod id laboris eiusmod pariatur. Ex incididunt magna anim eu cillum velit aliquip laborum enim ad commodo enim reprehenderit. Minim est ad laborum anim excepteur. Aute enim cillum pariatur pariatur.">Terms & Conditions</a></p>
        </div>
    </div>
</body>
</html>