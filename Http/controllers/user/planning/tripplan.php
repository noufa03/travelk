<?php

use Core\Session;
use Models\Location;

// dd($_POST);

$selectedPlaces = Session::get('selectedPlaces', []);
$selectedPlacesStay = Session::get('selectedPlacesStay', []);
$selectedPlacesRest = Session::get('selectedPlacesRest', []);

// dd([
//     'selectedPlacesDetails' => $selectedPlacesDetails,
//     'selectedPlacesStayDetails' => $selectedPlacesStayDetails,
//     'selectedPlacesRestDetails' => $selectedPlacesRestDetails
// ]);

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


view('user/planning/tripplan.view.php', [
  'selectedPlacesDetails' => $selectedPlacesDetails,
  'selectedPlacesStayDetails' => $selectedPlacesStayDetails,
  'selectedPlacesRestDetails' => $selectedPlacesRestDetails
]);

