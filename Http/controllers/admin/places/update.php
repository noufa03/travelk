<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

// Validate and sanitize incoming request data
$id = $_POST['id'] ?? null;
if (!$id || !filter_var($id, FILTER_VALIDATE_INT)) {
    die('Invalid request. Location ID is required.');
}

// Fetch existing location
$location = $db->query('SELECT * FROM locations WHERE locationid = :id', [
    'id' => $id
])->findOrFail();

// Fetch corresponding place data
$place = $db->query('SELECT * FROM places WHERE placeid = :id', [
    'id' => $id
])->findOrFail();

// Validation errors
$errors = [];

// Validate form inputs
if (!Validator::string($_POST['name'], 1, 100)) {
    $errors['name'] = 'Name is required and must be no more than 100 characters.';
}
if (isset($_POST['street_address']) && $_POST['street_address'] !== '' && !Validator::string($_POST['street_address'])) {
    $errors['street_address'] = 'Street address must be a valid string.';
}
if (!Validator::string($_POST['city'], 1, 100)) {
    $errors['city'] = 'City is required and must be no more than 100 characters.';
}
if (!filter_var($_POST['district_id'], FILTER_VALIDATE_INT)) {
    $errors['district_id'] = 'District ID is required and must be a valid number.';
}
if (!filter_var($_POST['categoryid'], FILTER_VALIDATE_INT)) {
    $errors['categoryid'] = 'Valid category ID is required.';
}

// Handle validation errors
if (!empty($errors)) {
    return view('admin/locations/edit.view.php', [
        'heading' => 'Edit Location',
        'errors' => $errors,
        'location' => $location,
        'place' => $place
    ]);
}

// Process tags into key_words format
$keywords_array = isset($_POST['tags']) ? $_POST['tags'] : [];
$keywords = '{' . implode(',', array_map(fn($k) => '"' . addslashes($k) . '"', $keywords_array)) . '}';

// Handle photo uploads
$photo_paths = [];
$photos_folder_path = $location['photos'] ?? null;
if (isset($_FILES['location_photos']) && $_FILES['location_photos']['name'][0] != '') {
    $location_dir = base_path("public/assets/uploads/locations/places/{$id}");
    if (!file_exists($location_dir)) {
        mkdir($location_dir, 0777, true);
    }

    $files = $_FILES['location_photos'];
    for ($i = 0; $i < count($files['name']); $i++) {
        $photo_name = basename($files['name'][$i]);
        $target_path = $location_dir . '/' . $photo_name;
        if (move_uploaded_file($files['tmp_name'][$i], $target_path)) {
            // Optionally store individual paths if needed
        }
    }

    $photos_folder_path = "/assets/uploads/locations/places/{$id}";
}

// Update the `locations` table
$db->query(
    'UPDATE locations SET name = :name, display_name = :display_name, street_address = :street_address, 
    city = :city, google_map_link = :google_map_link, districtid = :districtid, photos = :photos, 
    hot_line = :hot_line, userid = :userid WHERE locationid = :id',
    [
        'id' => $id,
        'name' => $_POST['name'],
        'display_name' => $_POST['display_name'] ?? null,
        'street_address' => $_POST['street_address'] ?? null,
        'city' => $_POST['city'],
        'google_map_link' => $_POST['google_map_link'] ?? null,
        'districtid' => $_POST['district_id'],
        'photos' => $photos_folder_path,
        'hot_line' => null,
        'userid' => 1
    ]
);

// Convert entry fee to appropriate format
$entry_fee = !empty($_POST['entry_fee']) ? floatval($_POST['entry_fee']) : null;

// Update the `places` table
$db->query(
    'UPDATE places SET name = :name, description = :description, key_words = :key_words, categoryid = :categoryid, 
    open_h = :open_h, entry_fee_type = :entry_fee_type, entry_fee = :entry_fee, best_travel_time = :best_travel_time, 
    accessibility = :accessibility WHERE placeid = :placeid',
    [
        'placeid' => $id,
        'name' => $_POST['name'],
        'description' => $_POST['description'] ?? null,
        'key_words' => $keywords,
        'categoryid' => $_POST['categoryid'],
        'open_h' => 'All day',
        'entry_fee_type' => ($entry_fee !== null && $entry_fee != 0) ? 'fixed' : 'free',
        'entry_fee' => ($entry_fee !== null && $entry_fee != 0) ? $entry_fee : '0.00',
        'best_travel_time' => $_POST['visit_h'] ?? null,
        'accessibility' => $_POST['accessibility'] ?? null
    ]
);

// Redirect after successful update
header('Location: /admin/places');
die();