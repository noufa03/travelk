<?php

use Core\App;
use Core\Database;

$destination = $_GET['destination'] ?? '';

$db = App::resolve(Database::class);

if($destination){
    $placeids = $db->query('SELECT placeid FROM places WHERE description LIKE :name', [
      'name' => '%' . $destination . '%',
    ])->get();
    // Extract place IDs as an array
    $placeidArray = array_column($placeids, 'placeid');
    if (!empty($placeidArray)) {
      // Convert array to a comma-separated string for SQL IN clause
      $placeidString = implode(',', array_map('intval', $placeidArray));
      $places = $db->query('SELECT * FROM locations WHERE location_type = :place OR placeid IN (:placeidString)', [
        'placeidString' => $placeidString,
        'place' => 'place'
      ])->get();
    }
    $places = $db->query('SELECT * FROM locations WHERE location_type = :place OR name LIKE :name', [
        'name' => '%' . $destination . '%',
        'place' => 'place'
    ])->get();
}else{
    $places = $db->query('SELECT * FROM locations WHERE location_type = :place', [
        'place' => 'place'
    ])->get();
}

foreach ($places as &$place) {
  $place['photos_fulldir'] = public_dir_files($place['photos']); // Assuming this function fetches photo paths

  $place['photo_name'] =  (!empty($place['photos_fulldir'])  && isset($place['photos_fulldir'][0])) 
                      ? filename($place['photos_fulldir'][0]) // Extract the first photo name
                      : 'default.jpg';; // Use first photo or an empty string
}

// dd($places);
view("user/home/places.view.php", [
  'places' => $places,
  'destination' => $destination
]);