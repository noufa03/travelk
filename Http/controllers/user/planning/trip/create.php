<?php

use Core\Session;
use Models\Location;
use Models\Cuisine;
use Models\Hotel_Rooms;
use Core\Trip;

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

// Merge the selected places(Stay and Rest) into a single array
$stay_rest_LocationIDs = array_merge($selectedPlacesStay, $selectedPlacesRest);

// Get the userID and location_type for the selected places(Stay and Rest)
$stay_rest_LocationUserID = Location::i_getStayRestLocationsUserID($stay_rest_LocationIDs);


//Restaurant
// Filter and get only the restaurants
$rest_userID = array_filter($stay_rest_LocationUserID, function ($item) {
  return $item['location_type'] === 'restaurant';
});

// Get the minimum price for the restaurants
foreach ($rest_userID as $key => $value) {
    $rest_userID[$key]['min_price'] = Cuisine::i_getCuisineMinPriceByResID($value['userid']);
}

// Get the minimum price for the restaurants to int array
$minPricesRest = [];

foreach ($rest_userID as $key => $item) {
    $priceData = $item['min_price'][0]['min_price'];
    // Convert string "0" to int 0, and keep NULL as is
    $minPricesRest[$key] = is_null($priceData) ? null : (int)$priceData;
}


// Hotel
// Filter and get only the hotels
$stay_userID = array_filter($stay_rest_LocationUserID, function ($item) {
    return $item['location_type'] === 'accommodation';
});

// Get the minimum price for the hotels
foreach ($stay_userID as $key => $item) {
    $stay_userID[$key]['min_price'] = Hotel_Rooms::i_getRoomMinPriceByAccID($item['userid']);
}

// Get the minimum price for the hotels to int array
$minPricesStay = [];

foreach ($stay_userID as $key => $item) {
    $priceData = $item['min_price'][0]['min_price'];
    $minPricesStay[$key] = is_null($priceData) ? null : (int)$priceData;
}

// dd([$minPricesStay, $minPricesRest]);

$total_budget = Trip::getTotalExpenceForStayAndRest($minPricesRest, $minPricesStay);
// dd($total_budget);


// dd($rest_userID);
// dd($stay_userID);


view('user/planning/trip/create.view.php', [
    'rest_userID' => $rest_userID,
    'stay_userID' => $stay_userID,
    'total_budget' => $total_budget
]);
