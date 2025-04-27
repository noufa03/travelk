<?php

use Core\Session;
use Models\Location;

$searchTerm = $_GET['destination'] ?? '';


if ($searchTerm) {
    // $searchTerm =  $searchTerm . "%";
    // dd($searchTerm);
    $places = Location::i_Search($searchTerm) ?? Location::i_getAllLocations();
} else {
    $places = Location::i_getAllLocations();
}


foreach ($places as &$place) {
    if($place['location_type'] == 'restaurant'){
        $place['photos_fulldir'] = public_dir_files('/' . $place['photos']); // Assuming this function fetches photo paths

        $place['photo_name'] =  (!empty($place['photos_fulldir'])  && isset($place['photos_fulldir'][0])) 
                            ? filename($place['photos_fulldir'][0]) // Extract the first photo name
                            : $place['photos'] = '/assets/Placeholder.jpg'; // Use first photo or an empty string
    }else{
        $place['photos_fulldir'] = public_dir_files($place['photos']); // Assuming this function fetches photo paths

        $place['photo_name'] =  (!empty($place['photos_fulldir'])  && isset($place['photos_fulldir'][0])) 
                            ? filename($place['photos_fulldir'][0]) // Extract the first photo name
                            : $place['photos'] = '/assets/Placeholder.jpg'; // Use first photo or an empty string
    }
}    


// dd($places);
// dd($places);
view("user/home.view.php", [
    'places' => $places
]);
