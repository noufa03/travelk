<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$searchTerm = $_GET['search'] ?? '';

if ($searchTerm) {
    $searchTerm =  $searchTerm . "%";

    $places = $db->query(
        "SELECT 
            l.locationID,
            l.location_type,
            l.display_name,
            l.street_address,
            l.city,
            l.google_map_link,
            l.districtID,
            l.photos,
            l.hot_line,
            l.area_adID,
            p.description
        FROM 
            locations l
        LEFT JOIN 
            places p ON l.locationID = p.locationID
        WHERE 
            (l.display_name LIKE :searchTerm 
            OR l.street_address LIKE :searchTerm 
            OR l.city LIKE :searchTerm 
            OR l.location_type LIKE :searchTerm)",
        ['searchTerm' => $searchTerm])->get();
} else {
    $places = $db->query("SELECT 
            l.locationID,
            l.location_type,
            l.display_name,
            l.street_address,
            l.city,
            l.google_map_link,
            l.districtID,
            l.photos,
            l.hot_line,
            l.area_adID,
            p.description
        FROM 
            locations l
        LEFT JOIN 
            places p ON l.locationID = p.locationID
    ")->get();

}

$selectedPlaces = [];

if (isset($_POST['selectedPlaces'])) {
    $selectedPlaces = json_decode($_POST['selectedPlaces'], true);
    if (!is_array($selectedPlaces)) {
        $selectedPlaces = [];
    }
}

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
            $selectedPlaces = array_values($selectedPlaces); // re-index array
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

view('trip/index.view.php', [
    'places' => $places,
    'selectedPlaces' => $selectedPlaces,
    'selectedPlacesDetails' => $selectedPlacesDetails
]);

