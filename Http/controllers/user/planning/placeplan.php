<?php
// dd($_POST);
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$selectedKeywords = json_decode($_POST['selectedSearchOptions'], true);
$answers = array_map(function($option) {
    return $option['answer'];
}, $selectedKeywords);
$selectedKeywords = $answers;

$placeholders = implode(',', array_fill(0, count($selectedKeywords), '?'));
$places = $db->query("SELECT * FROM locations WHERE display_name IN ($placeholders)", $selectedKeywords)->get();

$selectedPlaces = [];

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

if (!empty($selectedPlaces)) {
    $placeholders = implode(',', array_fill(0, count($selectedPlaces), '?'));

    $selectedPlacesDetails = $db->query("
        SELECT locationID, display_name, street_address, hot_line, location_type
        FROM locations 
        WHERE locationID IN ($placeholders)
    ", $selectedPlaces)->get();
} else {
    $selectedPlacesDetails = [];
}

//lot more code here

view('user/planning/placeplan.view.php',[
    'selectedKeywords' => $selectedKeywords,
    'places' => $places, // Ensure $places is defined earlier in your code
    'selectedPlaces' => $selectedPlaces,
    'selectedPlacesDetails' => $selectedPlacesDetails
]);