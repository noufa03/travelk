<?php

use Core\Session;
use Models\Location;
use Models\Cuisine;
use Models\Hotel_Rooms;
use Core\Trip;

// dd($_POST);

$user_id = (int)$_POST['user_id'];
$your_country = $_POST['your_country'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$flexibleDates = $_POST['flexibleDates'];
$num_travelers = $_POST['num_travelers'];
$age_range = $_POST['age_range'];
$traveler_type = $_POST['traveler_type'];
$budget = $_POST['budget'];
$currency = $_POST['currency'];
$budget_preference = $_POST['budget_preference'];


$selectedPlaces = Session::get('selectedPlaces');
$selectedPlacesStay = Session::get('selectedPlacesStay');
$selectedPlacesRest = Session::get('selectedPlacesRest');

// Merge the selected places(Stay and Rest) into a single array
$stay_rest_LocationIDs = array_merge($selectedPlacesStay, $selectedPlacesRest);

// Get the userID and location_type for the selected places(Stay and Rest)
$stay_rest_LocationUserID = Location::i_getStayRestLocationsUserID($stay_rest_LocationIDs);

//place
$place_userID = Location::i_getPlaceLocationsUserID($selectedPlaces);

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

$total_budget = Trip::getTotalExpenceForStayAndRest($minPricesRest, $minPricesStay);


view('user/planning/trip/create.view.php', [
    'user_id' => $user_id,
    'your_country' => $your_country,
    'startDate' => $startDate,
    'endDate' => $endDate,
    'flexibleDates' => $flexibleDates,
    'num_travelers' => $num_travelers,
    'age_range' => $age_range,
    'traveler_type' => $traveler_type,
    'budget' => $budget,
    'total_budget' => $total_budget,
    'currency' => $currency,
    'budget_preference' => $budget_preference,
    'selectedPlaces' => $selectedPlaces,
    'selectedPlacesStay' => $selectedPlacesStay,
    'selectedPlacesRest' => $selectedPlacesRest,
    'rest_userID' => $rest_userID,
    'stay_userID' => $stay_userID,
    'place_userID' => $place_userID
]);
