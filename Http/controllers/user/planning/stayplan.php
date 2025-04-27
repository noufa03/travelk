<?php

use Core\Session;
use Models\Location;

$selectedKeywords = Session::get('selectedKeywords', []);
$selectedPlaces = Session::get('selectedPlaces', []);
$selectedPlacesStay = Session::get('selectedPlacesStay', []);

// Fetch the details of the selected stay places
if (!empty($selectedPlacesStay)) {
    $placeholders = implode(',', array_fill(0, count($selectedPlacesStay), '?'));

    $selectedPlacesStayDetails = Location::i_getSelectedLocationDetails($selectedPlacesStay, $placeholders);
} else {
    $selectedPlacesStayDetails = [];
}

// Fetch the details of the selected places
if (!empty($selectedPlaces)) {
    $placeholders = implode(',', array_fill(0, count($selectedPlaces), '?'));

    $selectedPlacesDetails = Location::i_getSelectedLocationDetails($selectedPlaces, $placeholders);
} else {
    $selectedPlacesDetails = [];
}

// Fetch details stay places by district
$districtIds = [];
$filterByDistrict = [];
if (!empty($selectedPlacesDetails)) {
    foreach ($selectedPlacesDetails as $place) {
        $districtIds[] = $place['districtid'];
    }
    foreach ($districtIds as $districtId) {
        $filterByDistrict[] = Location::i_getStayLocationsByDistrictID($districtId);
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
$allStayFilteredByDistrictAndRadius = $filterByDistrict;
if (is_array($nearByLocations)) {
    $allStayFilteredByDistrictAndRadius = array_merge($filterByDistrict, $nearByLocations);
}

// Flatten the array to ensure it's a single-level array of location data
$flattenedLocations = [];
foreach ($allStayFilteredByDistrictAndRadius as $item) {
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

$allStayFilteredByDistrictAndRadius = $uniqueLocations;

// If there are no stay places, then get all stay places
if (!empty($allStayFilteredByDistrictAndRadius)) {
    $places = $allStayFilteredByDistrictAndRadius;
} else {
    $places = Location::i_getStayLocations();
}

// If selectedPlacesStay is not null, then decode it and get the places
if (isset($_POST['selectedPlacesStay'])) {
    $selectedPlacesStay = json_decode($_POST['selectedPlacesStay'], true);
    if (!is_array($selectedPlacesStay)) {
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

// Handle the photos in the directory
foreach ($places as &$place) {
    $place['photos_fulldir'] = public_dir_files($place['photos']); // Assuming this function fetches photo paths

    $place['photo_name'] = (!empty($place['photos_fulldir']) && isset($place['photos_fulldir'][0]))
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