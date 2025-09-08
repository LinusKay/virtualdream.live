<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        # PAGE SETUP
        include('../../../../src/setup.php');
        # /PAGE SETUP
    ?>
    <title>BubbleChat: ~<?php echo $roomTitle; ?>~</title>
    <link rel="stylesheet" href="../../src/scripts/style.css">
    <script src="../../src/scripts/rooms.js"></script>
</head>
<body>
    <div class="wrap-header">
    <img class="logo" src="../../src/img/BubbleChat900x171.png">
    </div>
    
    <div class="wrap-chatbox aero">
        <div id="chatbox" class="wrap-chat">
            <div class="chat-fade"></div>
            <p class="message message-join">&lt;Guest&gt; has joined.</p>
            <p class="message message-motd">Welcome to ~<?php echo $roomTitle; ?>~! Be kind!! For help type /help!</p>
        </div>
        <div class="wrap-chatsidebar">
            <div id="userlist" class="wrap-chatsidebar-userlist">
            </div>
            <p class="usercount"><span id="usercount">0</span> users online</p>
            <p>You are <span id="guestUsername"></span></p>
        </div>
        <div class="wrap-input">
            <form onsubmit="return false">
                <input class="input-message" type="text" placeholder="Send guest message.">
                <button class="input-send aero" value="Send" onclick="sendUserMessage()">Send</button>
            </form>
        </div>
    </div>
    <div class="footer aero">
        <p>© BubbleChat<a href="https://bubblechat.virtualdream.live/">[Go back]</a></p>
    </div>
    <div style="text-align:center" class="advertisement-banner"></div>
</body>
</html>