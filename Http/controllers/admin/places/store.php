<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);
$errors = [];

// Validate form inputs
if (!Validator::string($_POST['name'], 1, 100)) {
    $errors['name'] = 'Name is required and must be no more than 100 characters.';
}
if (!Validator::string($_POST['street_address'], 1)) {
    $errors['street_address'] = 'Street address is required.';
}
if (!Validator::string($_POST['city'], 1, 100)) {
    $errors['city'] = 'City is required and must be no more than 100 characters.';
}

if (!filter_var($_POST['districtid'], FILTER_VALIDATE_INT)) {
    $errors['districtid'] = 'District ID is required and must be a valid number.';
}

if (!empty($errors)) {
    return view("admin/locations/create.view.php", [
        'heading' => 'Add Location',
        'errors' => $errors
    ]);
}

// Prepare key_words as a PostgreSQL-compatible array
$keywords_array = array_map('trim', explode(',', $_POST['key_words']));
$keywords = '{' . implode(',', array_map(fn($k) => '"' . addslashes($k) . '"', $keywords_array)) . '}';

// Insert the data into the locations table
$db->query(
    'INSERT INTO "locations" (location_type, name, display_name, street_address, city, google_map_link, districtid, photos, hot_line, userid, latitude, longitude) 
    VALUES (:location_type, :name, :display_name, :street_address, :city, :google_map_link, :districtid, :photos, :hot_line, :userid, :latitude, :longitude)', 
    [
        'location_type' => 'place',
        'name' => $_POST['name'],
        'display_name' => $_POST['display_name'] ?? null,
        'street_address' => $_POST['street_address'],
        'city' => $_POST['city'],
        'google_map_link' => $_POST['google_map_link'] ?? null,
        'districtid' => $_POST['districtid'],
        'photos' => 'None',  // We'll handle this after the insert
        'hot_line' => $_POST['hot_line'] ?? null,
        'userid' => $_POST['userid'] ?? null,
        'latitude' => $_POST['latitude'] ?? null,
        'longitude' => $_POST['longitude'] ?? null,
    ]
);

// Get the location ID for the newly inserted location
$location_id = $db->query(
    'SELECT locationid FROM locations WHERE name = :name', [
        'name' => $_POST['name']
    ]
)->find();

// Create a directory for the location
// $location_dir = __DIR__ . "assets/uploads/locations/places/{$location_id['locationid']}";
// if (!file_exists($location_dir)) {
//     mkdir($location_dir, 0777, true);  // Create the directory if it doesn't exist
// }

// // Handle the uploaded photos
// $photo_paths = [];
// dd(($_FILES));
// if (isset($_FILES['photos'])) {
//     $files = $_FILES['photos'];
//     for ($i = 0; $i < count($files['name']); $i++) {
//         $photo_name = basename($files['name'][$i]);
//         $target_path = $location_dir . '/' . $photo_name;

//         // Move the uploaded file to the new location
//         if (move_uploaded_file($files['tmp_name'][$i], $target_path)) {
//             $photo_paths[] = "assets/uploads/locations/places/{$location_id['locationid']}/" . $photo_name;
//         }
//     }
// }


// // Update the photos field in the database
// $photos_string = $photo_paths ? '{' . implode(',', $photo_paths) . '}' : null;

// $db->query(
//     'UPDATE "locations" SET photos = :photos WHERE locationid = :locationid',
//     [
//         'photos' => $photos_string,
//         'locationid' => $location_id['locationid']
//     ]
// );


// Insert data into places table
$db->query(
    'INSERT INTO "places" (name, placeid, description, key_words, categoryid, open_h, entry_fee_type, entry_fee, best_travel_time, accessibility)
    VALUES (:name, :placeid, :description, :key_words, :categoryid, :open_h, :entry_fee_type, :entry_fee, :best_travel_time, :accessibility)',
    [
        'name' => $_POST['name'],
        'placeid' => $location_id['locationid'],
        'description' => $_POST['description'] ?? null,
        'key_words' => $keywords ?? null,
        'categoryid' => $_POST['categoryid'] ?? null,
        'open_h' => $_POST['open_h'] ?? null,
        'entry_fee_type' => $_POST['entry_fee_type'] ?? null,
        'entry_fee' => $_POST['entry_fee'] ?? null,
        'best_travel_time' => $_POST['best_travel_time'] ?? null,
        'accessibility' => $_POST['accessibility'] ?? null,
    ]
);

// Redirect to the admin locations page after successful insertion
header('Location: /admin/places');
die();