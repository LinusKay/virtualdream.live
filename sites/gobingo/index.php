<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
        # PAGE SETUP
        include('../../src/setup.php');
        # /PAGE SETUP
        ?>
        <title>GoBingo!</title>
        <link rel="stylesheet" href="style.css">
        <script src="../../src/assets/scripts/stickers/stickers.js"></script>
        <link rel="stylesheet" href="../../src/assets/scripts/stickers/stickers.css">
        <style> 
        body {
            text-align:center;
        }
        </style>

    </head>
    <body>
        
        <h1>GoBingo!</h1>
        <form action="search.php" method="get" enctype="multipart/form-data">
            <input class="inputsearch" placeholder="Search" name="s">
            <input type="submit" value="Go!">
        </form> 
        <div id="adspace">
            
            <!-- Example banner divs -->
    <div class="advertisement-banner"></div>
    <div class="advertisement-banner"></div>

    <!-- Example card divs -->
    <div class="advertisement-card"></div>
    <div class="advertisement-card"></div>
    <div class="advertisement-card"></div>

    <script>
        // Function to fetch advertisement data based on the type and count
        function fetchAdvertisements(type, count) {
            // Fetch new advertisement data asynchronously
            return fetch(`../advertising/getbanner.php?type=${type}&count=${count}`)
                .then(response => response.json())
                .catch(error => {
                    console.error('Error fetching advertisement data:', error);
                    return []; // Return empty array on error
                });
        }

        // Function to fill advertisement containers with content
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
                            adImage.src = `../advertising/${type}/images/${adDataImg}`;
                            adImage.alt = 'Advertisement';

                            // Append image to anchor element and then to the container
                            adLink.appendChild(adImage);
                            container.innerHTML = ''; // Clear existing content
                            container.appendChild(adLink);
                        });
                    });
            }
        }

        // Call function to fill advertisement containers with content
        updateAdvertisements();

        // Set interval to update advertisements every 5 minutes (adjust as needed)
        setInterval(updateAdvertisements, 1000); // 5 minutes
    </script>
        </div>

    </body>
</html>