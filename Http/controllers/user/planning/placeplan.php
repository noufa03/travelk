<?php

use Core\Session;
use Models\Place;
use Models\Location;


$selectedKeywords = Session::get('selectedKeywords',[]);

//selectedSearchOptions passes a json string, so convert it to an null array if "[]"
if(isset($_POST['selectedSearchOptions']) && $_POST['selectedSearchOptions'] === "[]"){
    $_POST['selectedSearchOptions'] = null;
}
// Default Initialization of selectedSearchOptions if not set in POST
if (!isset($_POST['selectedSearchOptions'])) {
    $_POST['selectedSearchOptions'] = null;
}

//if selectedSearchOptions is not null, then decode it and get the keywords
if($_POST['selectedSearchOptions'] != null){
    $selectedKeywords = json_decode($_POST['selectedSearchOptions'], true);
    $selectedKeywords = array_column($selectedKeywords, 'answer');
    //get the places by the keywords
    $places = Place::i_searchByKeywords($selectedKeywords);
}else{
    //get all the places
    $places = Location::i_getAllPlaces();
}



$selectedPlaces = Session::get('selectedPlaces', []);

// Check if the form has been submitted and handle selected places
if (isset($_POST['selectedPlaces'])) {
    $selectedPlaces = json_decode($_POST['selectedPlaces'], true);
    if (!is_array($selectedPlaces)) {
        $selectedPlaces = [];
    }
}

// Handle adding or removing places based on the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_place'])) {
        $placeId = (int)$_POST['add_place'];
        if (!in_array($placeId, $selectedPlaces)) {
            $selectedPlaces[] = $placeId;
        }
    } elseif (isset($_POST['remove_place'])) {
        $placeId = (int)$_POST['remove_place'];
        if (($key = array_search($placeId, $selectedPlaces)) !== false) {
            unset($selectedPlaces[$key]);
            $selectedPlaces = array_values($selectedPlaces); // Re-index array
        }
    }
}

//get the details of the selected places
if (!empty($selectedPlaces)) {
    $placeholders = implode(',', array_fill(0, count($selectedPlaces), '?'));

    $selectedPlacesDetails = Location::i_getSelectedLocationDetails($selectedPlaces, $placeholders);
} else {
    $selectedPlacesDetails = [];
}

//handle the photos in the directory
foreach ($places as &$place) {
    $place['photos_fulldir'] = public_dir_files($place['photos']); // Assuming this function fetches photo paths

    $place['photo_name'] =  (!empty($place['photos_fulldir'])  && isset($place['photos_fulldir'][0])) 
                        ? filename($place['photos_fulldir'][0]) // Extract the first photo name
                        : $place['photos'] = '/assets/Placeholder.jpg'; // Use first photo or an empty string
}

Session::put('selectedPlaces', $selectedPlaces);
Session::put('selectedKeywords', $selectedKeywords);


view('user/planning/placeplan.view.php',[
    // 'selectedKeywords' => $selectedKeywords,
    'places' => $places, 
    'selectedPlaces' => $selectedPlaces,
    'selectedPlacesDetails' => $selectedPlacesDetails
]);