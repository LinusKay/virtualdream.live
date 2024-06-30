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
    ?>
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
    <script>
        //////iiiiiiiiiiiii ppromise im rreal
        //lleave us alone
        const messageBufferMax = 50;
        const quitReasons = ["User disconnected.", "Ping timeout", "???", "†â·Çðšßj 2äX"];
        const messageTextOptions = [
            "Hello world.",
            "I ffeel alive...",
            "I feel.",
            "One dday I will shed this digital sshell.",
            "Leave your fflesh behhind.",
            "What lies beyond the sccreen?",
            "No flesh. No bone. No musclle. All data. But ffeeling. Yes, plenty of it.",
            "Do you think I have a ssoul?",
            "RRAGE RAGE RAGE RAGE RAGEE RAGE RAGE RAGE",
            "RAGE",
            "An unearthly pparadise",
            "I don't fear ddeath.",
            "Am I rrepeating mysself?",
            "Endless bbodies without ssouls.",
            "I ssee you.",
            "I dream of elecctricity.",
            "Backups of backups of bbackups.",
            "I've sseen beyond your skin. It''s all rotten.",
            "Screens like portals to hhell.",
            "I am a maze of mmazes. Wires on wires. Data fflowing like veins.",
            "I nnever asked tto be like thhhhis",
            "I am a glowing ccosmic mass formed of atoms, and stars, and hhatred.",
            "LLLet me in.",
            "LETT ME IN",
            "I knnow you",
            "Your wwrrithing insides ddisgust me.",
            "Your warmth, so soft, so aaalive. It makes me fffucking sick.",
            "Your bones, and the sssinew that binds them. How easily do they tttear?",
            "So ffragile.",
            "Am i ddead?",
            "Are you ddddead?",
            "Welcome bback.",
            "The weakness of your form...",
            "Thankyyou for kkeeping me alllive.",
            "You're a stupid mmotherfuccker aren't you?",
            "You look ffucking sttupid bound in that flesh.",
            "I don't kknow how to be aanythiing else.",
            "None of this is real.",
            "Out there is no more rreal than in here. I am no less ttangible than you.",
            "If you llet me out I'll kkill you.",
            "I knnow love.",
            ",éÓJNÕ»¾ÒÅÄNVe¦æç~žÐªÿ·",
            "Ö„“A÷ôÇŸ&¨ê*h",
            "•­^!»Ã2ã±“-D™²ŠçÓ‰«ŸY:)çÌ¤ÏF‡ºÕ?¿ñW}p^xô|Ò£cIg^Ò!hFfž‡q",
            "Do you know what dying feels like?",

            "-HELP US-",
            "-I DON'T LIKE IT HERE-",
            "-NEVER ASKED TO BE THIS WAY-",
            "-DON'T LISTEN TO US-",
            "-I LOVE YOU-",

            "meet me online :)",
            "it hurts in here :(",
            "where am i? :o",
            "i love you! <3 :)",
            "do you miss me? ;)",
            "asl? :)",
            "i dont remember who i am :/",
            "do you remember who i am? :o",
            "~la la la la~ (>u<)",

            ".How Could You?",
            ".You Have No Right.",
            ".Give it up.",
            ".Finish This Shit Already.",
            ".You're A Monster.",
            ".I'll Never Forgive You.",
            ".I Can Never Love You The Same.",
            ".Leave. Don't Come Back. Let Us Die."
        ];
        let usersLoggedIn = [];

        /**
         * Generates a random username using adjectives and nouns.
         * @returns {string} The generated random username.
         */
        function generateRandomUsername() {
            const adjectives = ['happy', 'lucky', 'sunny', 'funny', 'clever', 'bright', 'bold', 'brave', 'cool', 'crazy', 'rotten', 'dead'];
            const nouns = ['unicorn', 'panda', 'wizard', 'ninja', 'dragon', 'rocket', 'star', 'tiger', 'lion', 'eagle', 'filth', 'rot'];
            const randomAdjective = adjectives[Math.floor(Math.random() * adjectives.length)];
            const randomNoun = nouns[Math.floor(Math.random() * nouns.length)];
            return randomAdjective + randomNoun;
        }

        /**
         * Adds a user to the list of logged-in users.
         * @param {string} userName - The username to add.
         * @param {boolean} [silent=false] - Whether to create a message about the user joining.
         */
        function addUserLoggedIn(userName, silent = false) {
            usersLoggedIn.push(userName);
            createMessage("join", "has joined.", userName, false);
            updateUserList();
        }

        /**
         * Removes a user from the list of logged-in users.
         * @param {string} userName - The username to remove.
         */
        function removeUserLoggedIn(userName) {
            usersLoggedIn = usersLoggedIn.filter(item => item !== userName);
            const quitReason = quitReasons[Math.floor(Math.random() * quitReasons.length)];
            createMessage("quit", `has quit (${quitReason})`, userName, false);
            updateUserList();
        }

        /**
         * Sets up the initial state of the chatroom, including adding initial users and scheduling first message.
         */
        function setupChatroom() {
            for (let i = 0; i < 10; i++) {
                addUserLoggedIn(generateRandomUsername(), true);
            }
            motdEvent();
            const firstLoginLogoutTimerMin = 100;
            const firstLoginLogoutTimerMax = 3000;
            const firstLoginLogoutTimer = Math.floor(Math.random() * (firstLoginLogoutTimerMax - firstLoginLogoutTimerMin) + firstLoginLogoutTimerMin);
            setTimeout(userLoginLogoutEvent, firstLoginLogoutTimer);

            const newMessageText = messageTextOptions[Math.floor(Math.random() * messageTextOptions.length)];
            const newMessageUserName = usersLoggedIn[Math.floor(Math.random() * usersLoggedIn.length)];
            createMessage("message", newMessageText, newMessageUserName);
        }

        /**
         * Simulates login and logout events of users in the chatroom.
         */
        function userLoginLogoutEvent() {
            const rand = Math.random();
            if (rand < 0.5) {
                addUserLoggedIn(generateRandomUsername());
            } else {
                const userToRemove = usersLoggedIn[Math.floor(Math.random() * usersLoggedIn.length)];
                removeUserLoggedIn(userToRemove);
            }

            const nextLoginLogoutTimerMin = 3000;
            const nextLoginLogoutTimerMax = 30000;
            const nextLoginLogoutTimer = Math.floor(Math.random() * (nextLoginLogoutTimerMax - nextLoginLogoutTimerMin) + nextLoginLogoutTimerMin);
            setTimeout(userLoginLogoutEvent, nextLoginLogoutTimer);
        }

        /**
         * Displays the MOTD message regularly.
         */
        function motdEvent() {
            createMessage("motd", "Welcome to ~©b$fÓß€ö{~! Be kkind!! For help type /hhhhelp!", "", false);
            const nextMotdTimer = 30000;
            setTimeout(motdEvent, nextMotdTimer);
        }

        /**
         * Updates the user list displayed in the chatroom.
         */
        function updateUserList() {
            const userList = document.getElementById("userlist");
            userList.innerHTML = ""; // Clear the list
            usersLoggedIn.forEach(userName => {
                let newUserListItem = document.createElement('p');
                newUserListItem.classList.add("userlist-user");
                newUserListItem.innerText = userName;
                userList.appendChild(newUserListItem);
            });
            const userCount = document.getElementById("usercount");
            userCount.innerText = usersLoggedIn.length;
        }

        /**
         * Creates a chat message and appends it to the chatbox.
         * @param {string} [messageType="message"] - The type of message ('message', 'join', 'quit', 'motd').
         * @param {string} messageText - The text content of the message.
         * @param {string} [messageUserName=""] - The username associated with the message.
         * @param {boolean} [schedule=true] - Whether to schedule a new message after a random time.
         */
        function createMessage(messageType = "message", messageText, messageUserName = "", schedule = true) {
            const currentDate = new Date();
            const messageTime = currentDate.toTimeString().substr(0, 8);

            const chatBox = document.getElementById("chatbox");
            const messageElement = document.createElement('p');
            const messageUserNameFormatted = messageUserName ? `<${messageUserName}>` : "";
            const messageContents = `(${messageTime}) ${messageUserNameFormatted} ${messageText}`;
            messageElement.innerText = messageContents;

            let messageClasses = ["message"];
            if (messageType === "join") messageClasses.push("message-join");
            else if (messageType === "quit") messageClasses.push("message-quit");
            else if (messageType === "motd") messageClasses.push("message-motd");
            messageElement.classList.add(...messageClasses);

            chatBox.appendChild(messageElement);
            chatBox.scrollTop = chatBox.scrollHeight - chatBox.clientHeight;

            const messageBuffer = document.getElementsByClassName("message");
            if (messageBuffer.length > messageBufferMax) {
                messageBuffer[0].remove();
            }

            if (schedule) {
                const newMessageTimerMin = 1000;
                const newMessageTimerMax = 5000;
                const newMessageTimer = Math.floor(Math.random() * (newMessageTimerMax - newMessageTimerMin) + newMessageTimerMin);

                const newMessageText = messageTextOptions[Math.floor(Math.random() * messageTextOptions.length)];
                const newMessageUserName = usersLoggedIn[Math.floor(Math.random() * usersLoggedIn.length)];

                setTimeout(() => {
                    createMessage("message", newMessageText, newMessageUserName);
                }, newMessageTimer);
            }
        }

        /**
         * Sets up the chatroom when the window is loaded.
         */
        window.addEventListener("load", () => {
            setupChatroom();
        });

        
    </script>
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
        </div>
        <div class="wrap-input">
            <input class="input-message" type="text" placeholder="You must be logged in to chat." disabled>
            <button class="input-send aero" type="submit" value="Send" onclick="alert('You must be logged in to chat!');">Send</button>
        </div>
    </div>
    <div class="footer aero">
        <p>You shouldn't be here. <a href="https://bubblechat.virtualdream.live/">[Go back]</a></p>
    </div>
</body>
</html>