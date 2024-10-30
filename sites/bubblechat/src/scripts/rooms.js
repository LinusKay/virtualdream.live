const messageBufferMax = 50;
const quitReasons = ["User disconnected.", "Ping timeout"];
const messageTextOptions = [
    "hi!",
    "hello world!",
    "asl?",
    "is anyone actually here?"
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
    const newMessageUserName = usersLoggedIn[Math.floor(Math.random() * usersLoggedIn.length)];
    
    createMessage("message", newMessageText, newMessageUserName);

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
        const userToRemove = usersLoggedIn[Math.floor(Math.random() * usersLoggedIn.length)];
        const guestUsername = document.getElementById('guestUsername').innerText;
        if(userToRemove == guestUsername) userToRemove = usersLoggedIn[0];
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
        const newMessageUserName = usersLoggedIn[Math.floor(Math.random() * usersLoggedIn.length)];
        const guestUsername = document.getElementById('guestUsername').innerText;
        if(newMessageUserName == guestUsername) newMessageUserName = usersLoggedIn[0];

        setTimeout(() => {
            createMessage("message", newMessageText, newMessageUserName);
        }, newMessageTimer);
    }
}

function sendUserMessage() {
    const inputBox = document.getElementsByClassName('input-message')[0];
    const inputContents = inputBox.value;
    const guestUsername = document.getElementById('guestUsername').innerText;
    createMessage("messageUser", inputContents, guestUsername);
    inputBox.value = "";
}

/**
 * Sets up the chatroom when the window is loaded.
 */
window.addEventListener("load", () => {
    setupChatroom();
});

