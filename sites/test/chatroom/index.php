<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin:0;
            padding:0;
        }
        body {
            font-family: Arial;
            font-size:12px;
        }
        .wrap-chatbox {
            width:500px;
            height:360px;
            background:lightgray;
            margin:auto;
            position:relative;
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
            padding:5px;
        }
        .wrap-chatsidebar {
            width: 140px;
            height: 300px;
            position: absolute;
            right: 20px;
            top: 20px;
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
        }
        .input-send {
            width:100px;
            height:20px;
            position:absolute;
            left: 340px;
            top: 10px;
            font-weight:bold;
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
        .userlist-user {
        }
    </style>
    <script>
        const messageBufferMax = 50;

        const users = [
            "user123", "libus"
        ];
        let usersLoggedIn = [];
        const messageTextOptions = [
            "hello world!", "fuck you", "I LOVE VIRTUAL DREAM", "Anyone seen Xarxax VII?"
        ];
        
        const quitReasons = ["User disconnected.", "Ping timeout"]

        // make a better generator
        function generateRandomUsername() {
            const adjectives = ['happy', 'lucky', 'sunny', 'funny', 'clever', 'bright', 'bold', 'brave', 'cool', 'crazy'];
            const nouns = ['unicorn', 'panda', 'wizard', 'ninja', 'dragon', 'rocket', 'star', 'tiger', 'lion', 'eagle'];
            const randomAdjectiveIndex = Math.floor(Math.random() * adjectives.length);
            const randomNounIndex = Math.floor(Math.random() * nouns.length);
            const username = adjectives[randomAdjectiveIndex] + nouns[randomNounIndex];
            return username;
        }
        
        function addUserLoggedIn(userName, silent=false) {
            usersLoggedIn.push(userName);
            createMessage("join", "has joined.", userName, false);
            updateUserList();
        }

        function removeUserLoggedIn(userName) {
            usersLoggedIn = usersLoggedIn.filter(function(item) {
                return item !== userName
            })
            const quitReason = quitReasons[Math.floor(Math.random() * quitReasons.length)];
            createMessage("quit", "has quit (" + quitReason + ")", userName, false);
            updateUserList();
        }

        function setupChatroom() {
            for(var i=0; i < 10; i++) {
                addUserLoggedIn(generateRandomUsername(), true);
            }
            createMessage("motd", "Welcome to ~cyberchat~! Be kind!! For help type /help!", "", false)
            
            const firstLoginLogoutTimerMin = 100;
            const firstLoginLogoutTimerMax = 3000;
            const firstLoginLogoutTimer = Math.floor(Math.random() * (firstLoginLogoutTimerMax - firstLoginLogoutTimerMin) + firstLoginLogoutTimerMin);
            setTimeout(function() {
                userLoginLogoutEvent();
            }, firstLoginLogoutTimer)
        }

        function userLoginLogoutEvent() {
            const rand = Math.random();
            if(rand < 0.5) {
                addUserLoggedIn(generateRandomUsername());
            }
            else {
                const userToRemove = usersLoggedIn[Math.floor(Math.random() * usersLoggedIn.length)];
                removeUserLoggedIn(userToRemove);
            }

            const nextLoginLogoutTimerMin = 3000;
            const nextLoginLogoutTimerMax = 30000;
            const nextLoginLogoutTimer = Math.floor(Math.random() * (nextLoginLogoutTimerMax - nextLoginLogoutTimerMin) + nextLoginLogoutTimerMin);
            setTimeout(function() {
                userLoginLogoutEvent();
            }, nextLoginLogoutTimer)
        }
        
        function updateUserList() {
            const userList = document.getElementById("userlist");
            const userListItems = Array.from(userList.getElementsByClassName("userlist-user"));
            userListItems.forEach(element => { element.parentElement.removeChild(element) });
            usersLoggedIn.forEach(userName =>  {
                let newUserListItem = document.createElement('p');
                newUserListItem.classList.add("userlist-user");
                newUserListItem.innerText = userName;
                userList.appendChild(newUserListItem);
            })
        }

        function createMessage(messageType="message", messageText, messageUserName="", schedule=true){ 
            console.log('create')
            const chatBox = document.getElementById("chatbox");
            const messageElement = document.createElement('p');
            if(messageUserName !== "") messageUserName = `<${messageUserName}>`;
            const messageContents = `${messageUserName} ${messageText}`;
            messageElement.innerText = messageContents;
            
            let messageClasses = ["message"];
                 if(messageType == "join") messageClasses.push("message-join");
            else if(messageType == "quit") messageClasses.push("message-quit");
            else if(messageType == "motd") messageClasses.push("message-motd");
            messageElement.classList.add(...messageClasses);

            chatBox.appendChild(messageElement);
            chatBox.scrollTop = chatBox.scrollHeight - chatBox.clientHeight;

            const messageBuffer = document.getElementsByClassName("message");
            if(messageBuffer.length > messageBufferMax) {
                messageBuffer[0].remove();
            }
            if(schedule) {
                const newMessageTimerMin = 1000;
                const newMessageTimerMax = 3000;
                const newMessageTimer = Math.floor(Math.random() * (newMessageTimerMax - newMessageTimerMin) + newMessageTimerMin);

                const newMessageText = messageTextOptions[Math.floor(Math.random() * messageTextOptions.length)];
                const newMessageUserName = usersLoggedIn[Math.floor(Math.random() * usersLoggedIn.length)];

                setTimeout(function() {
                    createMessage("message", newMessageText, newMessageUserName)
                }, newMessageTimer);
            }
        }

        window.addEventListener("load", function() {
            setupChatroom();
            const newMessageText = messageTextOptions[Math.floor(Math.random() * messageTextOptions.length)];
            const newMessageUserName = usersLoggedIn[Math.floor(Math.random() * usersLoggedIn.length)];
            createMessage("message", newMessageText, newMessageUserName);
        });
        
    </script>
</head>
<body>
    <div class="wrap-chatbox">
        <div id="chatbox" class="wrap-chat"></div>
        <div class="wrap-chatsidebar">
            <div id="userlist">
                <p class="userlist-heading">Users Online</p>
                <p class="userlist-user">userlist</p>
            </div>
        </div>
        <div class="wrap-input">
            <input class="input-message" type="text" disabled>
            <input class="input-send" type="submit" value="Send" disabled>
        </div>
    </div>
</body>
</html>