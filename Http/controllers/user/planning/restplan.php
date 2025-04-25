<?php

use Core\Session;
use Models\Location;

// dd([
//     'selectedKeywords' => Session::get('selectedKeywords'),
//     'selectedPlaces' => Session::get('selectedPlaces'),
//     'selectedPlacesStay' => Session::get('selectedPlacesStay'),
//     'selectedPlacesRest' => Session::get('selectedPlacesRest')
// ]);

$selectedKeywords = Session::get('selectedKeywords', []);
$selectedPlaces = Session::get('selectedPlaces', []);
$selectedPlacesStay = Session::get('selectedPlacesStay', []);
$selectedPlacesRest = Session::get('selectedPlacesRest', []);

$places = Location::i_getRestLocations();

//if selectedPlacesRest is not null, then decode it and get the places
if(isset($_POST['selectedPlacesRest'])){
  $selectedPlacesRest = json_decode($_POST['selectedPlacesRest'], true);
  if(!is_array($selectedPlacesRest)){
    $selectedPlacesRest = [];
  }
}

// Handle selected places updates
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['add_place'])) {
      $placeId = (int)$_POST['add_place'];
      if (!in_array($placeId, $selectedPlacesRest)) {
          $selectedPlacesRest[] = $placeId;
      }
  } elseif (isset($_POST['remove_place'])) {
      $placeId = (int)$_POST['remove_place'];
      if (($key = array_search($placeId, $selectedPlacesRest)) !== false) {
          unset($selectedPlacesRest[$key]);
          $selectedPlacesRest = array_values($selectedPlacesRest); // Re-index array
      }
  }
}

//fetch the details of the selected stay places
if (!empty($selectedPlacesRest)) {
  $placeholders = implode(',', array_fill(0, count($selectedPlacesRest), '?'));

  $selectedPlacesRestDetails = Location::i_getSelectedLocationDetails($selectedPlacesRest, $placeholders);
} else {
  $selectedPlacesRestDetails = [];
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

// dd($places);
//handle the photos in the directory
foreach ($places as &$place) {
        $place['photos_fulldir'] = public_dir_files_rest('/' . $place['photos']); // Assuming this function fetches photo paths

        $place['photo_name'] =  (!empty($place['photos_fulldir'])  && isset($place['photos_fulldir'][0])) 
                            ? filename($place['photos_fulldir'][0]) // Extract the first photo name
                            : $place['photos'] = '/assets/Placeholder.jpg'; // Use first photo or an empty string
}
// dd($places);
Session::put('selectedPlacesRest', $selectedPlacesRest);

view('user/planning/restplan.view.php', [
  'places' => $places,
  'selectedPlacesDetails' => $selectedPlacesDetails,
  'selectedPlacesRest' => $selectedPlacesRest,
  'selectedPlacesStayDetails' => $selectedPlacesStayDetails,
  'selectedPlacesRestDetails' => $selectedPlacesRestDetails
]);