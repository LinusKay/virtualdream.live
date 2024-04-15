let songIndex = 0;

// Function to create the audio player with custom styles
function createAudioPlayer(options) {
    const { playerBackground, playerBackgroundOffset, backgroundColor, borderColour, borderWidth, borderStyle, playIcon, pauseIcon, timelineBackgroundColor, timelineColor, timelineOpacity, showCover, songs, textColour } = options;

    const playerWrap = document.createElement("div");
    playerWrap.style.position = "fixed";
    playerWrap.style.color = textColour;
    document.body.appendChild(playerWrap);

    const playerContainer = document.createElement("div");
    playerContainer.style.position = "absolute";
    playerContainer.style.bottom = "0";
    playerContainer.style.left = "0";
    playerContainer.style.width = "250px";
    playerContainer.style.height = "75px";
    playerContainer.style.border = `${borderWidth}px ${borderStyle} ${borderColour}`;
    playerContainer.style.background = backgroundColor;
    playerContainer.style.boxSizing = "border-box";
    playerContainer.style.zIndex = 2;
    playerWrap.appendChild(playerContainer);

    if(playerBackground) {
        const playerBackgroundElement = document.createElement("img");
        playerBackgroundElement.src = playerBackground;
        playerBackgroundElement.style.position = "absolute";
        playerBackgroundElement.style.left = `${playerBackgroundOffset[0]}px`;
        playerBackgroundElement.style.top = `${playerBackgroundOffset[1]}px`;
        playerBackgroundElement.style.zIndex = 1;
        playerBackgroundElement.addEventListener("dragstart", function(event) {
            event.preventDefault(); // Prevent the default browser dragging behavior
        });
        playerWrap.appendChild(playerBackgroundElement);
    }
    

    // Create audio element
    const audioPlayer = document.createElement("audio");
    audioPlayer.src = songs[songIndex].file;
    playerContainer.appendChild(audioPlayer);

    const coverContainer = document.createElement("div");
    coverContainer.style.position = "absolute";
    coverContainer.style.width = "250px";
    coverContainer.style.height = "250px";
    coverContainer.style.top = "-250px";
    coverContainer.style.left = `-${borderWidth}px`;
    coverContainer.style.background = "red";
    coverContainer.style.backgroundImage = `url(${songs[songIndex].cover})`;
    coverContainer.style.backgroundSize = "contain";
    coverContainer.style.border = `${borderWidth}px ${borderStyle} ${borderColour}`;
    coverContainer.style.boxSizing = "border-box";
        
    if(showCover) {
        playerContainer.appendChild(coverContainer);
    }

    const titleParaContainer = document.createElement("div");
    titleParaContainer.style.display = "block";
    titleParaContainer.style.position = "absolute";
    titleParaContainer.style.top = "5px";
    titleParaContainer.style.left = "70px";
    titleParaContainer.style.margin = "0";
    titleParaContainer.style.whiteSpace = "nowrap"; // Prevent text from wrapping
    titleParaContainer.style.overflow = "hidden"; // Hide the overflowing text
    titleParaContainer.style.width = "fit-content"; // Set a fixed width to trigger overflow
    playerContainer.appendChild(titleParaContainer);

    // create song title
    const titlePara = document.createElement("p");
    titlePara.innerHTML = songs[songIndex].title;
    titlePara.style.fontFamily = "Arial";
    titlePara.style.fontWeight = "bold";
    titlePara.style.fontSize = "13px";
    titlePara.style.animation = "scroll 5s linear infinite 5s";
    titlePara.style.margin = 0;
    titleParaContainer.style.pointerEvents = "none"; 
    titlePara.style.userSelect = "none"; 
    const scrollAnimation = document.createElement("style");
    scrollAnimation.textContent = `
    @keyframes scroll {
        0% { transform: translateX(0%); } 
        100% { transform: translateX(-100%); } 
    }
    `;
    document.head.appendChild(scrollAnimation);
    titleParaContainer.appendChild(titlePara);

    // create song artist
    const artistPara = document.createElement("p");
    artistPara.innerHTML = songs[songIndex].artist;
    artistPara.style.display = "block";
    artistPara.style.position = "absolute";
    artistPara.style.top = "25px";
    artistPara.style.left = "70px";
    artistPara.style.margin = "0";
    artistPara.style.fontFamily = "Arial";
    artistPara.style.fontSize = "13px";
    artistPara.style.pointerEvents = "none"; 
    artistPara.style.userSelect = "none"; 
    playerContainer.appendChild(artistPara);

    // Create play/pause button
    const audioPlayingIcon = document.createElement("img");
    audioPlayingIcon.style.width = `50px`;
    audioPlayingIcon.style.height = `50px   `;
    audioPlayingIcon.src = playIcon;
    audioPlayingIcon.style.cursor = "pointer"; // Change cursor to indicate clickable
    audioPlayingIcon.style.position = "absolute";
    audioPlayingIcon.style.bottom = `10px`; // Move to the bottom
    audioPlayingIcon.style.left = `10px`; // Align to the left
    audioPlayingIcon.addEventListener("dragstart", function(event) {
        event.preventDefault(); // Prevent the default browser dragging behavior
    });
    playerContainer.appendChild(audioPlayingIcon);

    // Create timeline
    const timelineContainer = document.createElement("div");
    timelineContainer.style.position = "absolute"; // Set position to absolute
    timelineContainer.style.bottom = `10px`; // Move to the bottom
    timelineContainer.style.left = `70px`; // Align to the left
    timelineContainer.style.width = `160px`; // Set playerWidth
    timelineContainer.style.cursor = "pointer"; // Change cursor to indicate clickable
    timelineContainer.style.opacity = timelineOpacity; // Change cursor to indicate clickable
    timelineContainer.style.backgroundColor = timelineBackgroundColor;
    playerContainer.appendChild(timelineContainer);

    const timeline = document.createElement("div");
    timeline.style.width = "0";
    timeline.style.height = `10px`;
    timeline.style.backgroundColor = timelineColor;
    timeline.style.position = "relative"; // Set position to relative
    timeline.style.bottom = "0";
    timelineContainer.appendChild(timeline);

    // handle play/pause logic
    audioPlayingIcon.onclick = function() {
        audioPlayer.paused ? playAudio() : pauseAudio();
    };

    function playAudio() {
        audioPlayer.play();
        audioPlayingIcon.src = pauseIcon;
        updateTimeline();
    }

    function pauseAudio() {
        audioPlayer.pause();
        audioPlayingIcon.src = playIcon;
    }

    audioPlayer.addEventListener('ended', function() {
        songIndex++;
        if (songIndex >= songs.length) {
            songIndex = 0;
        }
        audioPlayer.src = songs[songIndex].file;
        audioPlayer.play();
        titlePara.innerHTML = songs[songIndex].title;
        artistPara.innerHTML = songs[songIndex].artist;
        coverContainer.style.backgroundImage = `url(${songs[songIndex].cover})`;
    });

    function updateTimeline() {
        const duration = audioPlayer.duration;
        const currentTime = audioPlayer.currentTime;
        const timelineWidth = (currentTime / duration) * 100;
        timeline.style.width = timelineWidth + "%";
        if (!audioPlayer.paused) {
            requestAnimationFrame(updateTimeline);
        }
    }

    // Seek through the song on timeline click
    timelineContainer.addEventListener("click", function(event) {
        const boundingRect = timelineContainer.getBoundingClientRect();
        const clickX = event.clientX - boundingRect.left;
        const timelineWidth = boundingRect.width;
        const seekTime = (clickX / timelineWidth) * audioPlayer.duration;
        audioPlayer.currentTime = seekTime;
        updateTimeline();
    });

    // Prevent the player from being dragged off the screen
    let isDragging = false;
    let offsetX, offsetY;

    playerWrap.addEventListener("mousedown", function(event) {
        isDragging = true;
        offsetX = event.clientX - playerWrap.getBoundingClientRect().left;
        offsetY = event.clientY - playerWrap.getBoundingClientRect().top;
    });

    document.addEventListener("mousemove", function(event) {
        if (isDragging) {
            let newX = event.clientX - offsetX;
            let newY = event.clientY - offsetY;

            // Check boundaries
            const maxX = window.innerWidth - playerWrap.offsetWidth;
            const maxY = window.innerHeight - playerWrap.offsetHeight;
            newX = Math.min(Math.max(0, newX), maxX);
            newY = Math.min(Math.max(0, newY), maxY);

            // Apply new position
            playerWrap.style.left = newX + "px";
            playerWrap.style.top = newY + "px";
        }
    });

    document.addEventListener("mouseup", function() {
        isDragging = false;
    });
}
window.createAudioPlayer = createAudioPlayer;
    // createAudioPlayer({
    //     backgroundColor: "red",
    //     playIcon: "img/play.png",
    //     pauseIcon: "img/pause.png",
    //     timelineBackgroundColor: "white",
    //     timelineColor: "black",
    //     timelineOpacity: 1,
    //     showCover: false,
    //     songs: [
    //         {
    //             file: "music/antero/antero.mp3",
    //             title: "Antero",
    //             artist: "Anodiser",
    //             cover: "music/antero/cover.png"
    //         },
    //         {
    //             file: "music/draindance/draindance.wav",
    //             title: "Draindance",
    //             artist: "Filther",
    //             cover: "music/antero/cover.png"
    //         }
    //     ]
    // });