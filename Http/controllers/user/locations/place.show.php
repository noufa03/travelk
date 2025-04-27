<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
// dd($_GET['id']);
$place_id = $_GET['id'];


$place = $db->query('SELECT * FROM locations WHERE locationid = :locationid', [
    'locationid' => $place_id
])->find();
// dd($place);
$place_details = $db->query('SELECT * FROM places WHERE placeid = :placeid', [
    'placeid' => $place_id
])->find();
// dd($place);
$place['photos_fulldir'] = public_dir_files($place['photos']); // Assuming this function fetches photo paths
// dd($place['photos_fulldir']);
$place['photo_names'] =  (!empty($place['photos_fulldir'])) 
                        ? array_map('filename', $place['photos_fulldir']) // Extract all photo names
                        : $place['photos'] = '/assets/Placeholder.jpg'; // Use 'default.jpg' if no photos are available

// dd($place);
view("user/locations/place.show.view.php", [
  'place' => $place,
  'place_details' => $place_details
]);

