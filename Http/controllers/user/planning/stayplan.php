<?php

use Core\Session;
use Models\Location;

//there will be little changes to do when multiple hitels where selected

$selectedKeywords = Session::get('selectedKeywords', []);
$selectedPlaces = Session::get('selectedPlaces', []);
$selectedPlacesStay = Session::get('selectedPlacesStay', []);

$places = [];
if(!empty($selectedPlaces)){
  foreach($selectedPlaces as $place['locationid']){
    $places = Location::i_getLocationsWithinRadius($place['latitude'], $place['longitude']);
    $places = Location::i_filterStayLocations($places['locationid']);
    // dd($place);
  }
}else{
  $places = Location::i_getStayLocations();
}
//if selectedPlacesStay is not null, then decode it and get the places
if(isset($_POST['selectedPlacesStay'])){
  $selectedPlacesStay = json_decode($_POST['selectedPlacesStay'], true);
  if(!is_array($selectedPlacesStay)){
    $selectedPlacesStay = [];
  }
}

// Handle selected places updates
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (isset($_POST['add_place'])) {
      $placeId = (int)$_POST['add_place'];
      if (!in_array($placeId, $selectedPlacesStay)) {
          $selectedPlacesStay[] = $placeId;
      }
  } elseif (isset($_POST['remove_place'])) {
      $placeId = (int)$_POST['remove_place'];
      if (($key = array_search($placeId, $selectedPlacesStay)) !== false) {
          unset($selectedPlacesStay[$key]);
          $selectedPlacesStay = array_values($selectedPlacesStay); // Re-index array
      }
  }
}

//fetch the details of the selected stay places
if (!empty($selectedPlacesStay)) {
  $placeholders = implode(',', array_fill(0, count($selectedPlacesStay), '?'));

  $selectedPlacesStayDetails = Location::i_getSelectedLocationDetails($selectedPlacesStay, $placeholders);
} else {
  $selectedPlacesStayDetails = [];
}

// Fetch details of selected places
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


Session::put('selectedPlacesStay', $selectedPlacesStay);


view('user/planning/stayplan.view.php', [
  'places' => $places,
  'selectedPlacesDetails' => $selectedPlacesDetails,
  'selectedPlacesStay' => $selectedPlacesStay,
  'selectedPlacesStayDetails' => $selectedPlacesStayDetails
]);