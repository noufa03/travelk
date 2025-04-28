<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$id = $_GET['id'] ?? null;
if (!$id) {
    die('Invalid request. Location ID is required.');
}


$location = $db->query('SELECT * FROM locations WHERE locationid = :id', [
    'id' => $id
])->findOrFail();


$place = $db->query('SELECT * FROM places WHERE placeid = :placeid', [
    'placeid' => $id
])->findOrFail();


view("admin/locations/edit.view.php", [
    'heading' => 'Edit Location',
    'location' => $location,
    'place' => $place
]);