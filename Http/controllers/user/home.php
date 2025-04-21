<?php


use Models\Location;


$searchTerm = $_GET['search'] ?? '';

if ($searchTerm) {
    $searchTerm =  $searchTerm . "%";

    $places = Location::i_findBySearchTerm($searchTerm);
} else {
    $places = Location::i_getAllLocations();
}


foreach ($places as &$place) {
    if($place['location_type'] == 'restaurant'){
        if($place['photos'] == null){
            $place['photos'] = '/assets/Placeholder.jpg'; // Use first photo or an empty string
        }
    }else{
        $place['photos_fulldir'] = public_dir_files($place['photos']); // Assuming this function fetches photo paths

        $place['photo_name'] =  (!empty($place['photos_fulldir'])  && isset($place['photos_fulldir'][0])) 
                            ? filename($place['photos_fulldir'][0]) // Extract the first photo name
                            : $place['photos'] = '/assets/Placeholder.jpg'; // Use first photo or an empty string
    }
    
}    

    

// dd($places);
view("user/home.view.php", [
    'places' => $places
]);
