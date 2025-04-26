<?php

use Core\Session;
use Models\Trip;

$user_id = Session::get('user_id');
$your_country = Session::get('your_country') ?? '';
$startDate = Session::get('startDate') ?? '';
$endDate = Session::get('endDate') ?? '';

$flexibleDates = (Session::get('flexibleDates') === "false") ? 0 : 1;

// Handle empty numeric values
$num_travelers = Session::get('num_travelers') ? (int)Session::get('num_travelers') : null;
$age_range = Session::get('age_range') ?? '';
$budget = Session::get('budget') ? (int)Session::get('budget') : null;
$currency = Session::get('currency') ?? '';

// Convert arrays to JSON strings
$selectedPlaces = Session::get('selectedPlaces') ?? [];
$selectedPlacesStay = Session::get('selectedPlacesStay') ?? [];
$selectedPlacesRest = Session::get('selectedPlacesRest') ?? [];

$place_ids = !empty($selectedPlaces) ? json_encode($selectedPlaces) : null;
$stay_ids = !empty($selectedPlacesStay) ? json_encode($selectedPlacesStay) : null;
$rest_ids = !empty($selectedPlacesRest) ? json_encode($selectedPlacesRest) : null;



Trip::i_createTrip($user_id['userid'], $your_country, $startDate, $endDate, $flexibleDates, $num_travelers, $age_range, $budget, $currency, $place_ids, $stay_ids, $rest_ids);

Session::unset('your_country');
Session::unset('startDate');
Session::unset('endDate');
Session::unset('flexibleDates');
Session::unset('num_travelers');
Session::unset('age_range');
Session::unset('budget');
Session::unset('currency');
Session::unset('selectedPlaces');
Session::unset('selectedPlacesStay');
Session::unset('selectedPlacesRest');

view('user/planning/trip/rent.view.php');

// $place_ids_new = Session::get('selectedPlaces');
// dd($place_ids_new);
