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
$key_words = isset($_POST['key_words']) ? '{' . implode(',', array_map('trim', $_POST['key_words'])) . '}' : null;

// Insert the data into the locations table without manually setting locationid
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
        'photos' => $_POST['photos'] ?? null,
        'hot_line' => $_POST['hot_line'] ?? null,
        'userid' => $_POST['userid'] ?? null,
        'latitude' => $_POST['latitude'] ?? null,
        'longitude' => $_POST['longitude'] ?? null,
    ]
);

$location_id = $db->query(
    'SELECT locationid FROM locations WHERE name = :name', [
        'name' => $_POST['name']
    ]
)->find();

// Insert data into places table
$db->query(
    'INSERT INTO "places" (placeid, description, key_words, categoryid, open_h, entry_fee_type, entry_fee, best_travel_time, accessibility)
    VALUES (:placeid, :description, :key_words, :categoryid, :open_h, :entry_fee_type, :entry_fee, :best_travel_time, :accessibility)',
    [
        'placeid' => $location_id['locationid'],
        'description' => $_POST['description'] ?? null,
        'key_words' => $key_words, // Now formatted as PostgreSQL array
        'categoryid' => $_POST['categoryid'] ?? null,
        'open_h' => $_POST['open_h'] ?? null,
        'entry_fee_type' => $_POST['entry_fee_type'] ?? null,
        'entry_fee' => $_POST['entry_fee'] ?? null,
        'best_travel_time' => $_POST['best_travel_time'] ?? null,
        'accessibility' => $_POST['accessibility'] ?? null,
    ]
);

// Redirect to the admin locations page after successful insertion
header('Location: /admin/locations');
die();