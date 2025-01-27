<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$places = $db->query('SELECT * FROM locations')->get();
// $photos = public_dir_files($place['photos']);
// $photo_name = filename($photos[0]); 
foreach ($places as &$place) {
  $place['photos_fulldir'] = public_dir_files($place['photos']); // Assuming this function fetches photo paths
  $place['photo_name'] =  (!empty($place['photos_fulldir'])  && isset($place['photos_fulldir'][0])) 
                          ? filename($place['photos_fulldir'][0]) // Extract the first photo name
                          : 'default.jpg';; // Use first photo or an empty string
}

view("user/home.view.php", [
  'places' => $places,
  // 'photos' => $photos,
  // 'photo_name' => $photo_name
]);
