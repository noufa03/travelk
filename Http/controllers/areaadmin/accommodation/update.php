<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

// Validate and sanitize incoming request data
$id = $_POST['id'] ?? null;
if (!$id) {
    die('Invalid request. Location ID is required.');
}

// Fetch existing location
$location = $db->query('SELECT * FROM locations WHERE locationid = :id', [
    'id' => $id
])->findOrFail();

// Fetch corresponding place data (if exists)
$place = $db->query('SELECT * FROM places WHERE placeid = :id', [
    'id' => $id
])->find();

// Validation errors
$errors = [];

// Validate essential fields
if (!Validator::string($_POST['location_type'], 1, 50)) {
    $errors['location_type'] = 'Location type is required and must not exceed 50 characters.';
}
if (!Validator::string($_POST['name'], 1, 100)) {
    $errors['name'] = 'Name is required and must not exceed 100 characters.';
}
if (!Validator::string($_POST['street_address'], 1)) {
    $errors['street_address'] = 'Street address is required.';
}
if (!Validator::string($_POST['city'], 1, 100)) {
    $errors['city'] = 'City is required and must not exceed 100 characters.';
}
if (!filter_var($_POST['districtid'], FILTER_VALIDATE_INT)) {
    $errors['districtid'] = 'Valid district ID is required.';
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

// Prepare `key_words` as a PostgreSQL-compatible array
if (!empty($_POST['key_words'])) {
    $keywords = array_map('trim', explode(',', $_POST['key_words']));
    $key_words = "'{" . implode(',', array_map(fn($word) => "\"$word\"", $keywords)) . "}'"; // Proper PostgreSQL array formatting
} else {
    $key_words = null;
}

// Update the `locations` table
$db->query(
    'UPDATE locations SET location_type = :location_type, name = :name, display_name = :display_name,
    street_address = :street_address, city = :city, google_map_link = :google_map_link, districtid = :districtid,
    photos = :photos, hot_line = :hot_line, userid = :userid WHERE locationid = :id',
    [
        'id' => $_POST['id'],
        'location_type' => $_POST['location_type'],
        'name' => $_POST['name'],
        'display_name' => $_POST['display_name'] ?? null,
        'street_address' => $_POST['street_address'],
        'city' => $_POST['city'],
        'google_map_link' => $_POST['google_map_link'] ?? null,
        'districtid' => $_POST['districtid'],
        'photos' => $_POST['photos'] ?? null,
        'hot_line' => $_POST['hot_line'] ?? null,
        'userid' => $_POST['userid'] ?? null,
    ]
);

// Update `places` table only if it exists
if (!empty($_POST['key_words'])) {
    $keywords = array_map('trim', explode(',', $_POST['key_words']));
    $key_words = '{' . implode(',', array_map(fn($word) => '"' . addslashes($word) . '"', $keywords)) . '}';
} else {
    $key_words = null;
}

// Update `places` table only if it exists
if ($place) {
    $db->query(
        'UPDATE places SET description = :description, key_words = :key_words, categoryid = :categoryid,
        open_h = :open_h, entry_fee_type = :entry_fee_type, entry_fee = :entry_fee, best_travel_time = :best_travel_time,
        accessibility = :accessibility WHERE placeid = :placeid',
        [
            'placeid' => $id,
            'description' => $_POST['description'] ?? null,
            'key_words' => $key_words,
            'categoryid' => $_POST['categoryid'],
            'open_h' => $_POST['open_h'] ?? null,
            'entry_fee_type' => $_POST['entry_fee_type'] ?? null,
            'entry_fee' => $_POST['entry_fee'] ?? null,
            'best_travel_time' => $_POST['best_travel_time'] ?? null,
            'accessibility' => $_POST['accessibility'] ?? null,
        ]
    );
}

// Redirect after successful update
header('Location: /areaadmin/locations');
die();