<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$searchTerm = $_GET['search'] ?? '';

if ($searchTerm) {
    $searchTerm =  $searchTerm . "%";

    $places = $db->query(
        "SELECT 
            *
        FROM 
            locations l
        LEFT JOIN 
            places p ON l.locationID = p.locationID
        WHERE 
            (l.display_name LIKE :searchTerm 
            OR l.street_address LIKE :searchTerm 
            OR l.city LIKE :searchTerm 
            OR p.key_words LIKE :searchTerm)",
        ['searchTerm' => $searchTerm])->get();
} else {
    $places = $db->query('SELECT * FROM locations')->get();
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

    


view("user/home.view.php", [
    'places' => $places,
]);
