<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);
$errors = [];

// Process tags into key_words format
$keywords_array = isset($_POST['tags']) ? $_POST['tags'] : [];
$keywords = '{' . implode(',', array_map(fn($k) => '"' . addslashes($k) . '"', $keywords_array)) . '}';

// Insert the data into the locations table
$db->query(
    'INSERT INTO "locations" (location_type, name, display_name, street_address, city, google_map_link, districtid, photos, hot_line, userid, latitude, longitude) 
    VALUES (:location_type, :name, :display_name, :street_address, :city, :google_map_link, :districtid, :photos, :hot_line, :userid, :latitude, :longitude)', 
    [
        'location_type' => 'place',
        'name' => $_POST['name'],
        'display_name' => $_POST['display_name'] ?? null,
        'street_address' => $_POST['street_address'] ?? null,
        'city' => $_POST['city'],
        'google_map_link' => $_POST['google_map_link'] ?? null,
        'districtid' => $_POST['district_id'], // Changed from districtid to district_id to match form
        'photos' => 'None',  // We'll handle this after the insert
        'hot_line' => null,
        'userid' => 1,
        'latitude' => null, // Not in form
        'longitude' => null, // Not in form
    ]
);

// Get the location ID for the newly inserted location
$location_id = $db->query(
    'SELECT locationid FROM locations WHERE name = :name ORDER BY locationid DESC LIMIT 1', [
        'name' => $_POST['name']
    ]
)->find();

// Ensure location_id is correctly accessed (the result should be a single row)
$location_id_value = $location_id['locationid'] ?? null; // Access locationid from the result

// Handle the uploaded photos
$photo_paths = [];
if (isset($_FILES['location_photos']) && $_FILES['location_photos']['name'][0] != '') {
    // Create a directory for the location (this will hold all the uploaded photos)
    $location_dir = base_path("public/assets/uploads/locations/places/{$location_id_value}");
    if (!file_exists($location_dir)) {
        mkdir($location_dir, 0777, true);  // Create the directory if it doesn't exist
    }

    $files = $_FILES['location_photos'];
    for ($i = 0; $i < count($files['name']); $i++) {
        $photo_name = basename($files['name'][$i]);
        $target_path = $location_dir . '/' . $photo_name;

        // Move the uploaded file to the new location
        if (move_uploaded_file($files['tmp_name'][$i], $target_path)) {
            // You can store the individual photo paths if you want
            // $photo_paths[] = "assets/uploads/locations/places/{$location_id_value}/" . $photo_name;
        }
    }

    // Update the photos field in the database with the folder path
    if (!empty($location_dir)) {
        // Store the path to the folder where all the photos are located
        $photos_folder_path = "/assets/uploads/locations/places/{$location_id_value}";

        // Update the database with the folder path
        $db->query(
            'UPDATE "locations" SET photos = :photos WHERE locationid = :locationid',
            [
                'photos' => $photos_folder_path,
                'locationid' => $location_id_value // Corrected to use locationid value
            ]
        );
    }
}

// Convert entry fee to appropriate format
$entry_fee = !empty($_POST['entry_fee']) ? floatval($_POST['entry_fee']) : null;

// Insert data into places table
$db->query(
    'INSERT INTO "places" (name, placeid, description, key_words, categoryid, open_h, entry_fee_type, entry_fee, best_travel_time, accessibility)
    VALUES (:name, :placeid, :description, :key_words, :categoryid, :open_h, :entry_fee_type, :entry_fee, :best_travel_time, :accessibility)',
    [
        'name' => $_POST['name'],
        'placeid' => $location_id_value, // Use the correct location_id_value
        'description' => $_POST['description'] ?? null,
        'key_words' => $keywords, // Pass formatted key_words here
        'categoryid' => $_POST['categoryid'] ?? null,
        'open_h' => 'All day',
        'entry_fee_type' => ($entry_fee !== null && $entry_fee != 0) ? 'fixed' : 'free', // Not in form, defaulting to fixed
        'entry_fee' => ($entry_fee !== null && $entry_fee != 0) ? $entry_fee : '0.00',
        'best_travel_time' => $_POST['visit_h'] ?? null, // Changed from open_h to visit_h to match form
        'accessibility' => $_POST['accessibility'] ?? null,
    ]
);

// Redirect to the admin locations page after successful insertion
header('Location: /admin/places');
die();