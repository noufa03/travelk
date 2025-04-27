<?php

use Core\Session;
use Models\Location;

$selectedKeywords = Session::get('selectedKeywords', []);
$selectedPlaces = Session::get('selectedPlaces', []);
$selectedPlacesStay = Session::get('selectedPlacesStay', []);
$selectedPlacesRest = Session::get('selectedPlacesRest', []);

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

// Fetch details rest places by district
$districtIds = [];
$filterByDistrict = [];
if (!empty($selectedPlacesDetails)) {
  foreach ($selectedPlacesDetails as $place) {
    $districtIds[] = $place['districtid'];
  }
  foreach ($districtIds as $districtId) {
    $filterByDistrict[] = Location::i_getRestLocationsByDistrictID($districtId);
  }
}

// Fetch locations within radius of selected places
$longitutes_latitudes = [[], []];
$nearByLocations = []; // Initialize as empty array to prevent undefined variable
if (!empty($selectedPlacesDetails)) {
  foreach ($selectedPlacesDetails as $place) {
    $longitutes_latitudes[] = [$place['longitude'], $place['latitude']];
  }
  foreach ($longitutes_latitudes as $longitute_latitude) {
    if (!empty($longitute_latitude) && isset($longitute_latitude[0], $longitute_latitude[1])) {
      $nearByLocations = Location::i_getLocationsWithinRadius($longitute_latitude[1], $longitute_latitude[0]);
    }
  }
}

// Merge only if $nearByLocations is a valid array
$allRestFilteredByDistrictAndRadius = $filterByDistrict;
if (is_array($nearByLocations)) {
  $allRestFilteredByDistrictAndRadius = array_merge($filterByDistrict, $nearByLocations);
}

// Flatten the array to ensure it's a single-level array of location data 
$flattenedLocations = [];
foreach ($allRestFilteredByDistrictAndRadius as $item) {
  if (is_array($item)) {
    foreach ($item as $subItem) {
      if (is_array($subItem) && isset($subItem['locationid'])) {
        $flattenedLocations[] = $subItem;
      }
    }
  }
}

// Remove duplicates based on locationid
$uniqueLocations = [];
$seenLocationIds = [];

foreach ($flattenedLocations as $location) {
  if (!in_array($location['locationid'], $seenLocationIds)) {
    $seenLocationIds[] = $location['locationid'];
    $uniqueLocations[] = $location;
  }
}

$allRestFilteredByDistrictAndRadius = $uniqueLocations;

// If there are no rest places, then get all rest places
if (!empty($allRestFilteredByDistrictAndRadius)) {
  $places = $allRestFilteredByDistrictAndRadius;
} else {
  $places = Location::i_getRestLocations();
}

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