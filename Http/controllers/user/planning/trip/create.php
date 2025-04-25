<?php

use Core\Session;
use Models\Location;
use Models\Cuisine;
use Models\Hotel_Package;
use Core\Trip;
use Models\User;
// dd($_POST);

$user_email = Session::get('user');
$user_id = User::i_getUserID($user_email['email']);

$your_country = $_POST['your_country'] ?? Session::get('your_country');
$startDate = $_POST['startDate'] ?? Session::get('startDate');
$endDate = $_POST['endDate'] ?? Session::get('endDate');
$flexibleDates = $_POST['flexibleDates'] ?? Session::get('flexibleDates');
$num_travelers = $_POST['num_travelers'] ?? Session::get('num_travelers');
$age_range = $_POST['age_range'] ?? Session::get('age_range');
$budget = $_POST['budget'] ?? Session::get('budget');
$currency = $_POST['currency'] ?? Session::get('currency');

Session::put('user_id', $user_id);
Session::put('your_country', $your_country);
Session::put('startDate', $startDate);
Session::put('endDate', $endDate);
Session::put('flexibleDates', $flexibleDates);
Session::put('num_travelers', $num_travelers);
Session::put('age_range', $age_range);
Session::put('budget', $budget);
Session::put('currency', $currency);


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
    $stay_userID[$key]['min_price'] = Hotel_Package::i_getPackageMinPriceByAccID($item['userid']);
}

// Get the minimum price for the hotels to int array
$minPricesStay = [];

foreach ($stay_userID as $key => $item) {
    $priceData = $item['min_price'][0]['min_price'];
    $minPricesStay[$key] = is_null($priceData) ? null : (int)$priceData;
}

$total_budget = Trip::getTotalExpenceForStayAndRest($minPricesRest, $minPricesStay);

// dd([
//     'user_id' => $user_id,
//     'your_country' => $your_country,
//     'startDate' => $startDate,
//     'endDate' => $endDate,
//     'flexibleDates' => $flexibleDates,
//     'num_travelers' => $num_travelers,
//     'age_range' => $age_range,
//     'budget' => $budget,
//     'total_budget' => $total_budget,
//     'currency' => $currency,
//     'selectedPlaces' => $selectedPlaces,
//     'selectedPlacesStay' => $selectedPlacesStay,
//     'selectedPlacesRest' => $selectedPlacesRest,
//     'rest_userID' => $rest_userID,
//     'stay_userID' => $stay_userID,
//     'place_userID' => $place_userID
// ]);

view('user/planning/trip/create.view.php', [
    'user_id' => $user_id,
    'your_country' => $your_country,
    'startDate' => $startDate,
    'endDate' => $endDate,
    'flexibleDates' => $flexibleDates,
    'num_travelers' => $num_travelers,
    'age_range' => $age_range,
    'budget' => $budget,
    'total_budget' => $total_budget,
    'currency' => $currency,
    'selectedPlaces' => $selectedPlaces,
    'selectedPlacesStay' => $selectedPlacesStay,
    'selectedPlacesRest' => $selectedPlacesRest,
    'rest_userID' => $rest_userID,
    'stay_userID' => $stay_userID,
    'place_userID' => $place_userID
]);
