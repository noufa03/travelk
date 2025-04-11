<?php

// dd("hello");

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);


$selectedKeywords = Session::get('selectedKeywords', []);
$selectedPlaces = Session::get('selectedPlaces', []);

// Handle keyword-based search
if (isset($_POST['selectedSearchOptions'])) {
  $selectedKeywords = json_decode($_POST['selectedSearchOptions'], true);
  $selectedKeywords = array_map(fn($option) => $option['answer'], $selectedKeywords);

  $conditions = implode(' OR ', array_fill(0, count($selectedKeywords), "description ILIKE ? OR EXISTS (SELECT 1 FROM unnest(key_words) AS kw WHERE kw ILIKE ?)"));

  $searchTerms = [];
  foreach ($selectedKeywords as $keyword) {
      $searchTerms[] = "%$keyword%";
      $searchTerms[] = "%$keyword%";
  }

  $places = $db->query("SELECT * FROM places WHERE $conditions", $searchTerms)->get();
} else {
  $places = $db->query("SELECT * FROM locations WHERE location_type = 'place'")->get();
}

// Handle selected places updates
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['selectedPlaces'])) {
      $selectedPlaces = json_decode($_POST['selectedPlaces'], true) ?? [];
  }

  if (isset($_POST['add_place'])) {
      $placeId = (int)$_POST['add_place'];
      if (!in_array($placeId, $selectedPlaces)) {
          $selectedPlaces[] = $placeId;
      }
  } elseif (isset($_POST['remove_place'])) {
      $placeId = (int)$_POST['remove_place'];
      $selectedPlaces = array_values(array_diff($selectedPlaces, [$placeId]));
  }

  Session::put('selectedPlaces', $selectedPlaces);
}

// Fetch details of selected places
$selectedPlacesDetails = empty($selectedPlaces) ? [] : $db->query("
  SELECT locationID, display_name, street_address, hot_line, location_type
  FROM locations 
  WHERE locationID IN (" . implode(',', array_fill(0, count($selectedPlaces), '?')) . ")
", $selectedPlaces)->get();

//handle the photos in the directory
foreach ($places as &$place) {
  $place['photos_fulldir'] = public_dir_files($place['photos']); // Assuming this function fetches photo paths

  $place['photo_name'] =  (!empty($place['photos_fulldir'])  && isset($place['photos_fulldir'][0])) 
                      ? filename($place['photos_fulldir'][0]) // Extract the first photo name
                      : $place['photos'] = '/assets/Placeholder.jpg'; // Use first photo or an empty string
}

// Store selected keywords in the session
Session::put('selectedKeywords', $selectedKeywords);

view('user/planning/stayplan.view.php', [
  'selectedKeywords' => $selectedKeywords,
  'places' => $places,
  'selectedPlaces' => $selectedPlaces,
  'selectedPlacesDetails' => $selectedPlacesDetails
]);