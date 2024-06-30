
/**
 * Fetches advertisement data from the server.
 * 
 * @param {string} type - The type of advertisement ('banner' or 'card').
 * @param {number} count - The number of advertisements to fetch.
 * @returns {Promise<Array>} A promise resolving to an array of advertisement data.
 */
function fetchAdvertisements(type, count) {
    // Fetch new advertisement data asynchronously
    return fetch(`ADVERTISING_DIRECTORY/getadvert.php?type=${type}&count=${count}`)
        .then(response => response.json())
        .catch(error => {
            console.error('Error fetching advertisement data:', error);
            return []; // Return empty array on error
        });
}

/**
 * Updates the advertisement containers with new advertisement data.
 * 
 * @returns {void}
 */
function updateAdvertisements() {
    // Object to store the count of each advertisement type
    const advertisementCounts = {};

    // Iterate over all advertisement containers
    const containers = document.querySelectorAll('.advertisement-banner, .advertisement-card');
    containers.forEach(container => {
        const type = container.classList.contains('advertisement-banner') ? 'banner' : 'card';
        advertisementCounts[type] = (advertisementCounts[type] || 0) + 1;
    });

    // Fetch and fill advertisements for each type
    for (const type in advertisementCounts) {
        fetchAdvertisements(type, advertisementCounts[type])
            .then(data => {
                // Find advertisement containers of the current type
                const typeContainers = document.querySelectorAll(`.advertisement-${type}`);
                // Fill each container with advertisement data
                typeContainers.forEach((container, index) => {
                    const ad = data[index];
                    const adDataUrl = ad[0];
                    const adDataImg = ad[1];

                    // Create anchor element for the advertisement link
                    const adLink = document.createElement('a');
                    adLink.href = adDataUrl;

                    // Create image element for the advertisement image
                    const adImage = document.createElement('img');
                    adImage.src = `ADVERTISING_DIRECTORY/${type}/images/${adDataImg}`;
                    adImage.alt = 'Advertisement';

                    // Append image to anchor element and then to the container
                    adLink.appendChild(adImage);
                    container.innerHTML = ''; // Clear existing content
                    container.appendChild(adLink);
                });
            });
    }
}

window.addEventListener("load", function onLoad() {
    // Call function to fill advertisement containers with content
    updateAdvertisements();
    startAdvertRefresh();
});

let adRefreshInterval;

/**
 * Starts refreshing advertisements at a specified interval.
 * 
 * @returns {void}
 */
function startAdvertRefresh() {
    adRefreshInterval = setInterval(updateAdvertisements, 10000); 
}

/**
 * Stops refreshing advertisements.
 * 
 * @returns {void}
 */
function stopAdvertRefresh() {
    clearInterval(adRefreshInterval);
}


