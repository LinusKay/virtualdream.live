<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BubbleChat: Talk Online</title>
    <?php 
    # PAGE SETUP
    include('../../../../src/setup.php');
    # /PAGE SETUP
    if(!isset(($_COOKIE['ZWNob2Vz']))) {
        echo "
        <link rel=\"stylesheet\" href=\"../../src/scripts/ssc.css\">
        <script src=\"../../src/scripts/sj.js\"></script>";
        $footer = "You shouldn't be here.";
        setcookie("ZWNob2Vz", "aGVhcmQ");
    }
    else {
        echo "
        <link rel=\"stylesheet\" href=\"../../src/scripts/style.css\">
        <script src=\"../../src/scripts/rooms.js\"></script>";
        $footer = "© BubbleChat";
    }
    ?>
    <link rel="stylesheet" href="../../src/scripts/elyts.css">
    <script src="../../src/scripts/rooms.js"></script>
</head>
<body>
    <div class="wrap-header">
    <img class="logo" src="../../src/img/BubbleChat900x171.png">
    </div>
    <div class="wrap-chatbox aero">
        <div id="chatbox" class="wrap-chat"><div class="chat-fade"></div></div>
        <div class="wrap-chatsidebar">
            <div id="userlist" class="wrap-chatsidebar-userlist">
                <p class="userlist-heading">Users Online</p>
                <p class="userlist-user">userlist</p>
            </div>
            <p class="usercount"><span id="usercount">X</span> users online</p>
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
        <p><?php echo $footer; ?><a href="https://bubblechat.virtualdream.live/">[Go back]</a></p>
    </div>
</body>
</html>