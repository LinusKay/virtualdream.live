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
    "m",
    "i",
    "n",
    "a",

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
let setup = false;

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

    const guestUsernameElement = document.getElementById('guestUsername');
    const guestUsernameID = Math.random().toString().substring(2, 8);
    const guestUsername = "guest" + guestUsernameID;
    guestUsernameElement.innerText = guestUsername;
    addUserLoggedIn(guestUsername);
    
    motdEvent();
    const firstLoginLogoutTimerMin = 100;
    const firstLoginLogoutTimerMax = 3000;
    const firstLoginLogoutTimer = Math.floor(Math.random() * (firstLoginLogoutTimerMax - firstLoginLogoutTimerMin) + firstLoginLogoutTimerMin);
    setTimeout(userLoginLogoutEvent, firstLoginLogoutTimer);

    const newMessageText = messageTextOptions[Math.floor(Math.random() * messageTextOptions.length)];
    const newMessageUserName = usersLoggedIn[Math.floor(Math.random() * usersLoggedIn.length)];
    createMessage("message", newMessageText, newMessageUserName);
    setup = true;
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
    if (messageType === "join") {
        if(setup) { let audio = new Audio('../../src/sounds/cuckoo.wav'); audio.play(); }
        messageClasses.push("message-join");
    }
    else if (messageType === "quit") {
        if(setup) { let audio = new Audio('../../src/sounds/error.wav'); audio.play(); }
        messageClasses.push("message-quit");
    }
    else if (messageType === "motd") messageClasses.push("message-motd");
    else if (messageType === "messageUser") messageClasses.push("message-user");
    else { 
        if(setup) { let audio = new Audio('../../src/sounds/stagechangeoldnotification.wav'); audio.play(); }
    }
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

function sendUserMessage() {
    const inputBox = document.getElementsByClassName('input-message')[0];
    const inputContents = inputBox.value;
    const guestUsername = document.getElementById('guestUsername').innerText;
    createMessage("messageUser", inputContents, guestUsername);
    inputBox.value = "";
}

function GOAWAY() {
    console.error("GOAWAY");
    setTimeout(() => {
        GOAWAY();
    }, 0.2)
}

/**
 * Sets up the chatroom when the window is loaded.
 */
window.addEventListener("load", () => {
    
    setupChatroom();
    GOAWAY();
});

