<?php

use Core\Session;
use Models\Location;

// dd($_POST);

$selectedKeywords = Session::get('selectedKeywords', []);
$selectedPlaces = Session::get('selectedPlaces', []);
// dd($selectedPlaces);
$selectedPlacesStay = Session::get('selectedPlacesStay', []);
$selectedPlacesRest = Session::get('selectedPlacesRest', []);

$places = Location::i_getStayLocations();

// Handle selected places updates
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['selectedPlaces'])) {
      $selectedPlacesRest = json_decode($_POST['selectedPlaces'], true) ?? [];
  }

  if (isset($_POST['add_place'])) {
      $placeId = (int)$_POST['add_place'];
      if (!in_array($placeId, $selectedPlacesRest)) {
          $selectedPlacesRest[] = $placeId;
      }
  } elseif (isset($_POST['remove_place'])) {
      $placeId = (int)$_POST['remove_place'];
      $selectedPlacesRest = array_values(array_diff($selectedPlacesRest, [$placeId]));
  }

  Session::put('selectedPlacesRest', $selectedPlacesRest);
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


//handle the photos in the directory
foreach ($places as &$place) {
  $place['photos_fulldir'] = public_dir_files($place['photos']); // Assuming this function fetches photo paths

  $place['photo_name'] =  (!empty($place['photos_fulldir'])  && isset($place['photos_fulldir'][0])) 
                      ? filename($place['photos_fulldir'][0]) // Extract the first photo name
                      : $place['photos'] = '/assets/Placeholder.jpg'; // Use first photo or an empty string
}

// Store selected keywords in the session
Session::put('selectedKeywords', $selectedKeywords);

view('user/planning/restplan.view.php', [
  'selectedKeywords' => $selectedKeywords,
  'places' => $places,
  // 'selectedPlaces' => $selectedPlaces,
  'selectedPlacesDetails' => $selectedPlacesDetails,
  // 'selectedPlacesStay' => $selectedPlacesStay,
  'selectedPlacesStayDetails' => $selectedPlacesStayDetails,
  'selectedPlacesRestDetails' => $selectedPlacesRestDetails
]);