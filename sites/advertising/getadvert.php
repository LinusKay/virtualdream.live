<?php 
// Allow requests from all origins
header("Access-Control-Allow-Origin: https://*.virtualdream.live");

// Set other CORS headers as needed
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Respond to preflight requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("HTTP/1.1 200 OK");
    exit();
}

// Function to fetch advertisement data based on type
function fetchAdvertisements($type, $count) {
    $adverts = [];
    $file_path = "../advertising/$type/adverts.csv";

    // Check if the file exists and is readable
    if (is_readable($file_path)) {
        $handle = fopen($file_path, "r");

        // Check if file opened successfully
        if ($handle !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $adverts[] = $data;
            }
            fclose($handle);
        }
    }

    // Select random items from the advertisements array
    $randomAdverts = [];
    for ($i = 0; $i < $count; $i++) {
        $randomIndex = array_rand($adverts);
        $randomAdverts[] = $adverts[$randomIndex];
    }

    return $randomAdverts;
}

// Get advertisement type from request parameter
$type = isset($_GET['type']) ? $_GET['type'] : 'banner';
$type = in_array($type, ['banner', 'card']) ? $type : 'banner'; // Ensure valid type

// Get number of advertisements to return
$count = isset($_GET['count']) ? intval($_GET['count']) : 1;
$count = max(1, $count); // Ensure count is at least 1

// Fetch advertisements based on type and return as JSON
$advertisements = fetchAdvertisements($type, $count);
echo json_encode($advertisements);
?>
