<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Fetch the location ID from the URL
$id = $_GET['id'] ?? null;
if (!$id) {
    die('Invalid request. Location ID is required.');
}

// Fetch the location data from the database
$location = $db->query('SELECT * FROM locations WHERE locationid = :id', [
    'id' => $id
])->findOrFail();

// Fetch the related place data (if needed for the update form)
$place = $db->query('SELECT * FROM places WHERE placeid = :placeid', [
    'placeid' => $id
])->findOrFail();

// Render the edit form with the location data
view("areaadmin/locations/edit.view.php", [
    'heading' => 'Edit Location',
    'location' => $location,
    'place' => $place
]);