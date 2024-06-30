let songIndex = 0;

/**
 * Function to create the audio player with custom styles.
 * @param {object} options - Configuration options for the audio player.
 * @param {string} options.playerWrapBackground - URL of the player background image.
 * @param {number[]} options.playerWrapBackgroundOffset - Offset coordinates [x, y] for the player background image.
 * @param {string} options.backgroundColour - Background color of the player container.
 * @param {string} options.borderColour - Border color of the player container.
 * @param {number} options.borderWidth - Border width of the player container.
 * @param {string} options.borderStyle - Border style of the player container.
 * @param {string} options.playIcon - URL of the play icon image.
 * @param {string} options.pauseIcon - URL of the pause icon image.
 * @param {string} options.timelineBackgroundColour - Background color of the timeline container.
 * @param {string} options.timelineColour - Colour of the timeline indicator.
 * @param {number} options.timelineOpacity - Opacity of the timeline container.
 * @param {boolean} options.showCover - Whether to show the cover image.
 * @param {object[]} options.songs - Array of song objects with `file`, `cover`, `title`, and `artist` properties.
 * @param {string} options.textColour - Text color of the player.
 * @param {boolean} options.dragEnabled - If player is draggable.
 */
function createAudioPlayer(options) {
    const { 
        playerOrigin = ["bottom", "left"], 
        playerXY, 
        playerWidth = 250, 
        playerHeight = 75, 
        playerWrapBackground, 
        playerWrapBackgroundOffset, 
        backgroundColour, 
        backgroundImage, 
        borderColour, 
        borderWidth, 
        borderStyle,
        borderRadius,
        playIcon, 
        pauseIcon, 
        timelineBackgroundColour, 
        timelineColour, 
        timelineOpacity, 
        showCover, 
        songs, 
        textColour, 
        dragEnabled 
    } = options;

    // Create player wrapper
    const playerWrap = document.createElement("div");
    const playerX = playerXY[0];
    const playerY = playerXY[1];
    const playerOriginX = playerOrigin[1];
    const playerOriginY = playerOrigin[0];
    playerWrap.style = `
        position: fixed;
        color: ${textColour};
        ${playerOriginX}: ${playerX}px;
        ${playerOriginY}: ${playerY}px;
    `
    document.body.appendChild(playerWrap);

    // Create player container
    const playerContainer = document.createElement("div");
    playerContainer.style = `
        position: absolute;
        width: ${playerWidth}px;
        height: ${playerHeight}px;
        border: ${borderWidth}px ${borderStyle} ${borderColour};
        border-radius: ${borderRadius}px;
        background: ${backgroundColour};
        background-image: url('${backgroundImage}');
        background-size: cover;
        box-sizing: border-box;
        z-index: 2;
    `;
    playerWrap.appendChild(playerContainer);

    // Add player background image if provided
    if (playerWrapBackground) {
        const playerWrapBackgroundElement = document.createElement("img");
        playerWrapBackgroundElement.src = playerWrapBackground;
        const playerWrapBackgroundLeft = playerWrapBackgroundOffset[0];
        const playerWrapBackgroundTop = playerWrapBackgroundOffset[1];
        playerWrapBackgroundElement.style = `
            position: absolute;
            left:${playerWrapBackgroundLeft}px;
            top: ${playerWrapBackgroundTop}px;
            z-index: 1;
        `;
        playerWrapBackgroundElement.addEventListener("dragstart", event => event.preventDefault());
        playerWrap.appendChild(playerWrapBackgroundElement);
    }

    // Create audio element
    const audioPlayer = document.createElement("audio");
    audioPlayer.src = songs[songIndex].file;
    playerContainer.appendChild(audioPlayer);

    // Create cover container
    const coverContainer = document.createElement("div");
    coverContainer.style = `
        position: absolute;
        width: 250px;
        height: 250px;
        top: -250px;
        left: -${borderWidth}px;
        background: red;
        background-image: url(${songs[songIndex].cover});
        background-size: contain;
        border: ${borderWidth}px ${borderStyle} ${borderColour};
        box-sizing: border-box;
    `;
    if (showCover) {
        playerContainer.appendChild(coverContainer);
    }

    // Create title container
    const titleParaContainer = document.createElement("div");
    titleParaContainer.style = `
        display: block;
        position: absolute;
        top: 5px;
        left: 70px;
        margin: 0;
        white-space: nowrap;
        overflow: hidden;
        width: fit-content;
        pointer-events: none;
        user-select: none;
    `;
    playerContainer.appendChild(titleParaContainer);

    // Create song title
    const titlePara = document.createElement("p");
    titlePara.innerHTML = songs[songIndex].title;
    titlePara.style = `
        font-family: Arial;
        font-weight: bold;
        font-size: 13px;
        animation: scroll 5s linear infinite 5s;
        margin: 0;
    `;
    titleParaContainer.appendChild(titlePara);

    // Create scroll animation style
    const scrollAnimation = document.createElement("style");
    scrollAnimation.textContent = `
        @keyframes scroll {
            0% { transform: translateX(0%); } 
            100% { transform: translateX(-100%); } 
        }
    `;
    document.head.appendChild(scrollAnimation);

    // Create song artist
    const artistPara = document.createElement("p");
    artistPara.innerHTML = songs[songIndex].artist;
    artistPara.style = `
        display: block;
        position: absolute;
        top: 25px;
        left: 70px;
        margin: 0;
        font-family: Arial;
        font-size: 13px;
        pointer-events: none;
        user-select: none;
    `;
    playerContainer.appendChild(artistPara);

    // Create play/pause button
    const audioPlayingIcon = document.createElement("img");
    audioPlayingIcon.src = playIcon;
    audioPlayingIcon.style = `
        width: 50px;
        height: 50px;
        cursor: pointer;
        position: absolute;
        bottom: 10px;
        left: 10px;
    `;
    audioPlayingIcon.addEventListener("dragstart", event => event.preventDefault());
    playerContainer.appendChild(audioPlayingIcon);

    // Create timeline container
    const timelineContainer = document.createElement("div");
    const timelineWidth = playerWidth - 90;
    timelineContainer.style = `
        position: absolute;
        bottom: 10px;
        left: 70px;
        width: ${timelineWidth}px;
        cursor: pointer;
        opacity: ${timelineOpacity};
        background-color: ${timelineBackgroundColour};
    `;
    playerContainer.appendChild(timelineContainer);

    // Create timeline
    const timeline = document.createElement("div");
    timeline.style = `
        width: 0;
        height: 10px;
        background-color: ${timelineColour};
        position: relative;
        bottom: 0;
    `;
    timelineContainer.appendChild(timeline);

    // Play/pause button click handler
    audioPlayingIcon.onclick = () => {
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

    // Update song on end
    audioPlayer.addEventListener('ended', () => {
        songIndex = (songIndex + 1) % songs.length;
        audioPlayer.src = songs[songIndex].file;
        audioPlayer.play();
        titlePara.innerHTML = songs[songIndex].title;
        artistPara.innerHTML = songs[songIndex].artist;
        coverContainer.style.backgroundImage = `url(${songs[songIndex].cover})`;
    });

    // Update timeline
    function updateTimeline() {
        const { duration, currentTime } = audioPlayer;
        const timelineWidth = (currentTime / duration) * 100;
        timeline.style.width = timelineWidth + "%";
        if (!audioPlayer.paused) {
            requestAnimationFrame(updateTimeline);
        }
    }

    // Seek through song on timeline click
    timelineContainer.addEventListener("click", event => {
        const { left, width } = timelineContainer.getBoundingClientRect();
        const clickX = event.clientX - left;
        const seekTime = (clickX / width) * audioPlayer.duration;
        audioPlayer.currentTime = seekTime;
        updateTimeline();
    });

    if(dragEnabled) {
        // Drag and drop functionality for the player
        let isDragging = false;
        let offsetX, offsetY;

        playerWrap.addEventListener("mousedown", event => {
            isDragging = true;
            offsetX = event.clientX - playerWrap.getBoundingClientRect().left;
            offsetY = event.clientY - playerWrap.getBoundingClientRect().top;
        });

        document.addEventListener("mousemove", event => {
            if (isDragging) {
                let newX = event.clientX - offsetX;
                let newY = event.clientY - offsetY;

                // Check boundaries
                const maxX = window.innerWidth - playerWrap.offsetWidth;
                const maxY = window.innerHeight - playerWrap.offsetHeight;
                newX = Math.min(Math.max(0, newX), maxX);
                newY = Math.min(Math.max(0, newY), maxY);

                // Apply new position
                playerWrap.style.left = `${newX}px`;
                playerWrap.style.top = `${newY}px`;
            }
        });

        document.addEventListener("mouseup", () => {
            isDragging = false;
        });
    }
}

window.createAudioPlayer = createAudioPlayer;
