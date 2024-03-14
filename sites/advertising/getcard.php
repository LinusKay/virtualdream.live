<?php 
$adverts = [];
$file_path = "../advertising/card/adverts.csv";

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

// Get number of advertisements to return
$n = isset($_GET['count']) ? intval($_GET['count']) : 1;
$n = max(1, $n); // Ensure $n is at least 1

$randomAdverts = [];

// Select random items from the advertisements array
for ($i = 0; $i < $n; $i++) {
    $randomIndex = array_rand($adverts);
    $randomAdverts[] = $adverts[$randomIndex];
}

// Return the randomly selected advertisements as JSON
echo json_encode($randomAdverts);
?>
