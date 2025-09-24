const messageBufferMax = 50;
const quitReasons = ["User disconnected.", "Ping timeout"];
const messageTextOptions = [
    "hi! :smile:",
    "hello world!",
    "asl?",
    "is anyone actually here? :confused::confused::bored:",
    ":devil:",
    ":confused::devil::tease::bored::exclaim::bliral::bluequestion::dolphin::greenblur::griral::hearts1::hearts2::hearts3::piral::cake::horse::beetle::cuss::zapzap::sparkle::starbang::hearts4::mp3::stress::bubbleexclaim::snail::sun::shrimp::prawn::galaxy::city::sweat::blanet::wave:"
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
    let audio = new Audio('../../src/sounds/cuckoo.wav');
    audio.play();
    const userCount = Math.floor(Math.random() * 3);
    for (let i = 0; i < userCount; i++) {
        addUserLoggedIn(generateRandomUsername(), true);
    }
    
    motdEvent();
    const firstLoginLogoutTimerMin = 100;
    const firstLoginLogoutTimerMax = 30000;
    const firstLoginLogoutTimer = Math.floor(Math.random() * (firstLoginLogoutTimerMax - firstLoginLogoutTimerMin) + firstLoginLogoutTimerMin);
    setTimeout(userLoginLogoutEvent, firstLoginLogoutTimer);

    const newMessageText = messageTextOptions[Math.floor(Math.random() * messageTextOptions.length)];
    let newMessageTextFormatted = newMessageText.replace(":smile:", "<img src=\"../../src/img/smilies/smile.gif\" class=\"\">")
    const newMessageUserName = usersLoggedIn[Math.floor(Math.random() * usersLoggedIn.length)];
    
    createMessage("message", newMessageTextFormatted, newMessageUserName);

    const guestUsernameElement = document.getElementById('guestUsername');
    const guestUsernameID = Math.random().toString().substring(2, 8);
    const guestUsername = "guest" + guestUsernameID;
    guestUsernameElement.innerText = guestUsername;
    addUserLoggedIn(guestUsername);
}

/**
 * Simulates login and logout events of users in the chatroom.
 */
function userLoginLogoutEvent() {
    const rand = Math.random();
    if (rand < 0.5) {
        addUserLoggedIn(generateRandomUsername());
    } else {
        let userToRemove = usersLoggedIn[Math.floor(Math.random() * usersLoggedIn.length)];
        const guestUsername = document.getElementById('guestUsername').innerText;
        if(userToRemove == guestUsername) userToRemove = usersLoggedIn[0];
        if(userToRemove != guestUsername) { removeUserLoggedIn(userToRemove); }
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
    const roomName = window.location.pathname.split("/").filter(path => path !== '').at(-1).replace("room-", "")
    createMessage("motd", `Welcome to ~${roomName}! Be kind! For help type /help!`, "", false);
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
    const messageUserNameFormatted = messageUserName ? `${messageUserName}:` : "";
    const messageContents = `(${messageTime}) ${messageUserNameFormatted} ${messageText}`;
    messageElement.innerHTML = messageContents;

    let messageClasses = ["message"];
    if (messageType === "join") messageClasses.push("message-join");
    else if (messageType === "quit") messageClasses.push("message-quit");
    else if (messageType === "motd") messageClasses.push("message-motd");
    else if (messageType === "messageUser") messageClasses.push("message-user");
    messageElement.classList.add(...messageClasses);

    chatBox.appendChild(messageElement);
    chatBox.scrollTop = chatBox.scrollHeight - chatBox.clientHeight;
    
    let audio = new Audio('../../src/sounds/stagechangeoldnotification.wav');
    audio.play();

    const messageBuffer = document.getElementsByClassName("message");
    if (messageBuffer.length > messageBufferMax) {
        messageBuffer[0].remove();
    }

    if (schedule) {
        const newMessageTimerMin = 1000;
        const newMessageTimerMax = 30000;
        const newMessageTimer = Math.floor(Math.random() * (newMessageTimerMax - newMessageTimerMin) + newMessageTimerMin);

        const newMessageText = messageTextOptions[Math.floor(Math.random() * messageTextOptions.length)];
        const newMessageTextFormatted = formatMessageSmilies(newMessageText);
        let newMessageUserName = usersLoggedIn[Math.floor(Math.random() * usersLoggedIn.length)];
        const guestUsername = document.getElementById('guestUsername').innerText;
        if(newMessageUserName == guestUsername) newMessageUserName = usersLoggedIn[0];
        if(newMessageUserName != guestUsername) {
            setTimeout(() => {
                createMessage("message", newMessageTextFormatted, newMessageUserName);
            }, newMessageTimer);
        }
    }
}

function sendUserMessage() {
    const inputBox = document.getElementsByClassName('input-message')[0];
    const inputContents = inputBox.value;
    const inputContentsFormatSmilies = formatMessageSmilies(inputContents);
    const guestUsername = document.getElementById('guestUsername').innerText;
    createMessage("messageUser", inputContentsFormatSmilies, guestUsername);
    inputBox.value = "";
}

function formatMessageSmilies(messageText) {
    let messageTextFormatted = messageText.replaceAll(":smile:", "<img src=\"../../src/img/smilies/smile.gif\" class=\"smiley\" title=\":smile:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":confused:", "<img src=\"../../src/img/smilies/confused.gif\" class=\"smiley\" title=\":confused:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":devil:", "<img src=\"../../src/img/smilies/devil.gif\" class=\"smiley\" title=\":devil:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":tease:", "<img src=\"../../src/img/smilies/tease.gif\" class=\"smiley\" title=\":tease:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":bored:", "<img src=\"../../src/img/smilies/bored.gif\" class=\"smiley\" title=\":bored:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":exclaim:", "<img src=\"../../src/img/smilies/exclaim.gif\" class=\"smiley\" title=\":exclaim:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":bliral:", "<img src=\"../../src/img/smilies/bliral.gif\" class=\"smiley\" title=\":bliral:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":bluequestion:", "<img src=\"../../src/img/smilies/bluequestion.gif\" class=\"smiley\" title=\":bluequestion:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":dolphin:", "<img src=\"../../src/img/smilies/dolphin.gif\" class=\"smiley\" title=\":dolphin:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":greenblur:", "<img src=\"../../src/img/smilies/greenblur.gif\" class=\"smiley\" title=\":greenblur:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":griral:", "<img src=\"../../src/img/smilies/griral.gif\" class=\"smiley\" title=\":griral:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":hearts1:", "<img src=\"../../src/img/smilies/hearts1.gif\" class=\"smiley\" title=\":hearts1:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":hearts2:", "<img src=\"../../src/img/smilies/hearts2.gif\" class=\"smiley\" title=\":hearts2:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":hearts3:", "<img src=\"../../src/img/smilies/hearts3.gif\" class=\"smiley\" title=\":hearts3:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":piral:", "<img src=\"../../src/img/smilies/piral.gif\" class=\"smiley\" title=\":piral:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":cake:", "<img src=\"../../src/img/smilies/cake.gif\" class=\"smiley\" title=\":cake:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":horse:", "<img src=\"../../src/img/smilies/horse.gif\" class=\"smiley\" title=\":horse:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":beetle:", "<img src=\"../../src/img/smilies/beetle.gif\" class=\"smiley\" title=\":beetle:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":cuss:", "<img src=\"../../src/img/smilies/cuss.gif\" class=\"smiley\" title=\":cuss:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":zapzap:", "<img src=\"../../src/img/smilies/zapzap.gif\" class=\"smiley\" title=\":zapzap:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":sparkle:", "<img src=\"../../src/img/smilies/sparkle.gif\" class=\"smiley\" title=\":sparkle:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":starbang:", "<img src=\"../../src/img/smilies/starbang.gif\" class=\"smiley\" title=\":starbang:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":hearts4:", "<img src=\"../../src/img/smilies/hearts4.gif\" class=\"smiley\" title=\":hearts4:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":mp3:", "<img src=\"../../src/img/smilies/mp3.gif\" class=\"smiley\" title=\":mp3:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":stress:", "<img src=\"../../src/img/smilies/stress.gif\" class=\"smiley\" title=\":stress:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":bubbleexclaim:", "<img src=\"../../src/img/smilies/bubbleexclaim.gif\" class=\"smiley\" title=\":bubbleexclaim:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":snail:", "<img src=\"../../src/img/smilies/snail.gif\" class=\"smiley\" title=\":snail:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":sun:", "<img src=\"../../src/img/smilies/sun.gif\" class=\"smiley\" title=\":sun:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":shrimp:", "<img src=\"../../src/img/smilies/shrimp.gif\" class=\"smiley\" title=\":shrimp:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":prawn:", "<img src=\"../../src/img/smilies/shrimp.gif\" class=\"smiley\" title=\":prawn:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":galaxy:", "<img src=\"../../src/img/smilies/galaxy.gif\" class=\"smiley\" title=\":galaxy:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":city:", "<img src=\"../../src/img/smilies/city.gif\" class=\"smiley\" title=\":city:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":sweat:", "<img src=\"../../src/img/smilies/sweat.gif\" class=\"smiley\" title=\":sweat:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":blanet:", "<img src=\"../../src/img/smilies/blanet.gif\" class=\"smiley\" title=\":blanet:\">")
    messageTextFormatted = messageTextFormatted.replaceAll(":wave:", "<img src=\"../../src/img/smilies/wave.gif\" class=\"smiley\" title=\":wave:\">")
    return messageTextFormatted;
    // :confused::devil::tease::bored::exclaim::bliral::bluequestion::dolphin::greenblur::griral::hearts1::hearts2::hearts3::piral::cake::horse::beetle::cuss::zapzap::sparkle::starbang::hearts4::mp3::stress::bubbleexclaim::snail::sun::shrimp::prawn::galaxy::city::sweat::blanet::wave:
}

/**
 * Sets up the chatroom when the window is loaded.
 */
window.addEventListener("load", () => {
    setupChatroom();
});

