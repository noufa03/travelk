<?php

use Core\Session;
use Models\Location;
use Models\Cuisine;

// dd($_POST);

$budget = $_POST['budget'];
$budget_preference = $_POST['budget_preference'];
$expense_priority = $_POST['expense_priority'];
$travelers = $_POST['travelers'];
$age_range = $_POST['age_range'];
$traveler_type = $_POST['traveler_type'];
$departure_date = $_POST['departure_date'];
$return_date = $_POST['return_date'];
$flexible_dates = $_POST['flexible_dates'];
$transport_mode = $_POST['transport_mode'];
$pickup = $_POST['pickup'];
$vehicle_preference = $_POST['vehicle_preference'];

$selectedPlaces = Session::get('selectedPlaces');
$selectedPlacesStay = Session::get('selectedPlacesStay');
$selectedPlacesRest = Session::get('selectedPlacesRest');

// dd([
//     'selectedPlaces' => $selectedPlaces,
//     'selectedPlacesStay' => $selectedPlacesStay,
//     'selectedPlacesRest' => $selectedPlacesRest
// ]);

$stay_rest_LocationIDs = array_merge($selectedPlacesStay, $selectedPlacesRest);

// dd($stay_rest_LocationIDs);

$stay_rest_LocationUserID = Location::i_getStayRestLocationsUserID($stay_rest_LocationIDs);
// dd(Location::i_getStayRestLocationsUserID($stay_rest_LocationIDs));
$rest_userID = array_filter($stay_rest_LocationUserID, function ($item) {
  return $item['location_type'] === 'restaurant';
});
// dd($rest_userID);
foreach ($rest_userID as $key => $value) {
    // dd($key['userid']);
    $rest_userID[$key]['min_price'] = Cuisine::i_getCuisineMinPriceByResID($value['userid']);
}

dd($rest_userID);

$stay_userID = array_filter($stay_rest_LocationUserID, function ($item) {
  return $item['location_type'] === 'accommodation';
});

// dd($rest_userID);
// dd($stay_userID);


view('user/planning/trip/create.view.php', [
    'rest_userID' => $rest_userID,
    'stay_userID' => $stay_userID
]);
?>
