<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BubbleChat: ~usa~</title>
    <style>
        * {
            margin:0;
            padding:0;
        }
        @font-face {
            font-family: YujiSyuku;
            font-weight: normal;
            src: url('../../src/fonts/YujiSyuku/YujiSyuku-Regular.ttf') format('truetype');
        }
        body {
            font-family: YujiSyuku;
            font-size:12px;
            background: url('../../src/img/Wallpaper_ParadisoMillenium.png');
        }
        .wrap-header {
            width:500px;
            margin:auto;
        }
        .logo {
            width:150px;
            margin-top:25px;
        }
        .wrap-chatbox {
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
        .wrap-chat {
            width:300px;
            height:290px;
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
        .chat-fade {
            width:300px;
            height:50px;
            background: linear-gradient(180deg, rgba(255,255,255,1) 0%, rgba(209,247,199,0) 100%);
            position:absolute;
            top:0;
            left:0;
        }
        .wrap-chatsidebar {
            width: 140px;
            height: 300px;
            position: absolute;
            right: 20px;
            top: 20px;
        }
        .wrap-chatsidebar-userlist {
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
        .wrap-input {
            width:500px;
            height:40px;
            position:absolute;
            bottom:0;
        }
        .input-message {
            width:300px;
            height:15px;
            position:absolute;
            left: 20px;
            top: 10px;
            border-radius:5px;
            background:lightgray;
            padding:2px;
            font-family: YujiSyuku;
        }
        .input-send {
            width:100px;
            height:20px;
            position:absolute;
            left: 340px;
            top: 10px;
            font-weight:bold;
            font-family: YujiSyuku;
        }
        .message {
            font-size:12px;
        }
        .message-join {
            color:green;
        }
        .message-quit {
            color:red;
        }
        .message-motd {
            color: orange;
            font-weight:bold;
        }
        .userlist-heading {
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
    </style>
</head>
<body>
    <div class="wrap-header">
    <img class="logo" src="../../src/img/BubbleChat900x171.png">
    </div>
    
    <div class="wrap-chatbox aero">
        <div id="chatbox" class="wrap-chat">
            <div class="chat-fade"></div>
            <p class="message message-join">&lt;Guest&gt; has joined.</p>
            <p class="message message-motd">Welcome to ~usa~! Be kind!! For help type /help!</p>
        </div>
        <div class="wrap-chatsidebar">
            <div id="userlist" class="wrap-chatsidebar-userlist">
            </div>
            <p class="usercount"><span id="usercount">0</span> users online</p>
        </div>
        <div class="wrap-input">
            <input class="input-message" type="text" value="You must be logged in to chat." disabled>
            <button class="input-send aero" type="submit" value="Send" onclick="alert('You must be logged in to chat!');">Send</button>
        </div>
    </div>
    <div class="footer aero">
        <p>© BubbleChat<a href="https://bubblechat.virtualdream.live/">[Go back]</a></p>
    </div>
</body>
</html>