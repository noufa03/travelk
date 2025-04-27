<?php   

use Core\App;
use Core\Database;
use Models\Location;

$db = App::resolve(Database::class);

$searchTerm = isset($_GET['destination']) ? $_GET['destination'] : '';

if ($searchTerm) {
    $places = Location::i_search_restaurants($searchTerm);
} else {
    $places = Location::i_getRestLocations();
}

// Now handle photos
foreach ($places as &$place) {
    $place['photos_fulldir'] = public_dir_files('/' . $place['photos']);

    $place['photo_name'] = (!empty($place['photos_fulldir']) && isset($place['photos_fulldir'][0]))
        ? filename($place['photos_fulldir'][0])
        : '/assets/Placeholder.jpg';
}

view("user/home/restaurants.view.php", [
    'places' => $places,
    'destination' => $searchTerm
]);
