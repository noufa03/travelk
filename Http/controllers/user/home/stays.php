<?php

use Core\App;
use Core\Database;


$destination = $_GET['destination'] ?? '';

$db = App::resolve(Database::class);

if($destination){
    $places = $db->query('SELECT * FROM locations WHERE location_type = :place AND name LIKE :name', [
        'name' => '%' . $destination . '%',
        'place' => 'accommodation'
    ])->get();
}else{
    $places = $db->query('SELECT * FROM locations WHERE location_type = :place', [
        'place' => 'accommodation'
    ])->get();
}

// dd($places);

foreach ($places as &$place) {
  $place['photos_fulldir'] = public_dir_files($place['photos']); // Assuming this function fetches photo paths

  $place['photo_name'] =  (!empty($place['photos_fulldir'])  && isset($place['photos_fulldir'][0])) 
                      ? filename($place['photos_fulldir'][0]) // Extract the first photo name
                      : $place['photos'] = '/assets/Placeholder.jpg'; // Use first photo or an empty string
}

view("user/home/stays.view.php", [
  'places' => $places,
  'destination' => $destination
]);