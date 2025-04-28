<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);
$errors = [];


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


$key_words = isset($_POST['key_words']) ? '{' . implode(',', array_map('trim', $_POST['key_words'])) . '}' : null;


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
        'photos' => 'None',
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


$location_dir = __DIR__ . "assets/uploads/locations/places/{$location_id['locationid']}";
if (!file_exists($location_dir)) {
    mkdir($location_dir, 0777, true);
}


$photo_paths = [];
dd(($_FILES));
if (isset($_FILES['photos'])) {
    $files = $_FILES['photos'];
    for ($i = 0; $i < count($files['name']); $i++) {
        $photo_name = basename($files['name'][$i]);
        $target_path = $location_dir . '/' . $photo_name;

        if (move_uploaded_file($files['tmp_name'][$i], $target_path)) {
            $photo_paths[] = "assets/uploads/locations/places/{$location_id['locationid']}/" . $photo_name;
        }
    }
}



$photos_string = $photo_paths ? '{' . implode(',', $photo_paths) . '}' : null;

dd($photos_string);

$db->query(
    'UPDATE "locations" SET photos = :photos WHERE locationid = :locationid',
    [
        'photos' => $photos_string,
        'locationid' => $location_id['locationid']
    ]
);



$db->query(
    'INSERT INTO "places" (placeid, description, key_words, categoryid, open_h, entry_fee_type, entry_fee, best_travel_time, accessibility)
    VALUES (:placeid, :description, :key_words, :categoryid, :open_h, :entry_fee_type, :entry_fee, :best_travel_time, :accessibility)',
    [
        'placeid' => $location_id['locationid'],
        'description' => $_POST['description'] ?? null,
        'key_words' => $key_words,
        'categoryid' => $_POST['categoryid'] ?? null,
        'open_h' => $_POST['open_h'] ?? null,
        'entry_fee_type' => $_POST['entry_fee_type'] ?? null,
        'entry_fee' => $_POST['entry_fee'] ?? null,
        'best_travel_time' => $_POST['best_travel_time'] ?? null,
        'accessibility' => $_POST['accessibility'] ?? null,
    ]
);


header('Location: /admin/locations');
die();