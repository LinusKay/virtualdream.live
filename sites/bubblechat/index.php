<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BubbleChat: Talk Online</title>
    <?php 
    # PAGE SETUP
    include('../../src/setup.php');
    # /PAGE SETUP
    ?>
    <style>
        * {
            margin:0;
            padding:0;
        }
        @font-face {
            font-family: YujiSyuku;
            font-weight: normal;
            src: url('src/fonts/YujiSyuku/YujiSyuku-Regular.ttf') format('truetype');
        }
        body {
            font-family: YujiSyuku;
            font-size:12px;
            background: url('src/img/Wallpaper_ParadisoMillenium.png');
        }
        a {
            color:orange;
        }
        .wrap-header {
            width:500px;
            margin:auto;
        }
        .logo {
            width:150px;
            margin-top:25px;
        }
        .wrap-menubox {
            width:500px;
            height:360px;
            background:lightgray;
            margin:0 auto 15px;
            position:relative;
            background: rgb(228,228,228);
            background: linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(217,217,217,1) 45%, rgba(209,247,199,1) 100%);
            border: solid 1px rgba(209,247,199,1);
            border-radius:10px;
        }
        .wrap-menu {
            width:300px;
            height:310px;
            background:white;
            position:absolute;
            left: 20px;
            top: 20px;
            border: solid 1px gray;
            overflow-y:scroll;
            overflow-x:hidden;
            padding:5px;
            border-radius:5px;
            scrollbar-color: rgba(255, 127, 80, 0.8) white;
        }
        .menu-fade {
            width:300px;
            height:50px;
            background: linear-gradient(180deg, rgba(255,255,255,1) 0%, rgba(209,247,199,0) 100%);
            position:absolute;
            top:0;
            left:0;
        }
        .wrap-sidebar {
            width: 140px;
            height: 300px;
            position: absolute;
            right: 20px;
            top: 20px;
        }
        .wrap-sidebar-roomlist {
            background:white;
            padding:5px;
            border: solid 1px gray;
            border-radius:5px;
            height:150px;
            overflow-y:scroll;
            scrollbar-color: rgba(255, 127, 80, 0.8) white;
        }
        .usercount {
            margin:5px 0;
        }
        .roomlist-heading {
            font-weight:bold;
        }
        .aero {
            background-color: rgba(255, 127, 80, 0.8);
            background: radial-gradient(farthest-corner at bottom center, rgba(255, 255, 255, 0.7), transparent), linear-gradient(to bottom, rgba(235, 63, 0, 0.72), rgba(255, 127, 80, 0.8));
            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 127, 80, 0.8);
            color: rgba(50, 26, 17, 0.8);
            font-weight: 600;
            position: relative;
            text-shadow: 0 2px 0.5em #0003;
            transition: all 300ms;
        }
        button.aero {
            border-radius: 9999px;
            cursor: pointer;
            padding: 0 1em;
        }
        button.aero::after {
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
        button.aero:hover, button.aero:focus {
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.4);
        }
        button.aero:active {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
        }
        .footer {
            width:500px;
            margin:auto;
            border-radius:25px;
        }
        .footer p {
            font-size:10px;
            color:white;
            padding:0 10px;
        }
        .footer p a {
            color:white;
            text-decoration: none;
            float:right;
        }
        .footer p a:hover {
            text-decoration:underline;
        }
        .menu-heading {
            color:blue;
            font-weight:bold;
        }
    </style>
</head>
<body>
    <div class="wrap-header">
    <img class="logo" src="src/img/BubbleChat900x171.png">
    </div>
    <div class="wrap-menubox aero">
        <div id="menubox" class="wrap-menu">
            <p class="menu-heading">Welcome to <b>BubbleChat</b>!</p>
            <p>We provide chatrooms for you to chat with your friends and get to know people online.</p>
            <br>
            <p class="menu-heading"><b>Rules</b></p>
            <ul>
                <li><b>Be kind!</b> - Everyone is here to have a good time. This means no racism, sexism or homophobia will be tolerated.</li>
                <li><b>No spamming!</b> - Respect your fellow chatters, keep the clutter to a minimum.</li>
                <li><b>No sharing nasty links</b> - Any suspicious links can result in a permanent ban.</li>
            </ul>
            <br>
            <p class="menu-heading">For enquiries, or to report an issue, please email <a href="mailto:bubblechat@virtualdream.live">bubblechat@virtualdream.live</a></p>
        </div>
        <div class="wrap-sidebar">
            <div id="roomlist" class="wrap-sidebar-roomlist">
                <p class="roomlist-heading">Rooms Open</p>
                <p class="roomlist-room"><a href="rooms/room-europe">europe</a></p>
                <p class="roomlist-room"><a href="rooms/room-usa">usa</a></p>
                <p class="roomlist-room"><a href="rooms/room-africa">africa</a></p>
                <p class="roomlist-room"><a href="rooms/room-southamerica">southamerica</a></p>
                <p class="roomlist-room"><a href="rooms/room-oceania">oceania</a></p>
                <p class="roomlist-room"><a href="rooms/room-20somethings">20somethings</a></p>
                <p class="roomlist-room"><a href="rooms/room-30somethings">30somethings</a></p>
                <p class="roomlist-room"><a href="rooms/room-animemanga">animemanga</a></p>
                <p class="roomlist-room"><a href="rooms/room-unknown">???</a></p>
            </div>
        </div>
    </div>
    <div class="footer aero">
        <p>© BubbleChat</p>
    </div>
</body>
</html>