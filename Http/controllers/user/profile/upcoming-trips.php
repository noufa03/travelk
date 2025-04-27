<?php

use Models\Trip;
use Models\User;
use Models\Location;

$userEmail = $_SESSION['user']['email'] ?? null;
// dd($userEmail);
if (!$userEmail) {
    // Handle case where user is not logged in
    die('Error: User not logged in');
}

$userid = User::i_getUserID($userEmail);
// dd($userid);

if (!$userid) {
    // Handle case where user ID is not found
    $upcomingTrips = [];
} else {
    $upcomingTrips = Trip::i_getUpcomingTrips($userid['userid']);
}

foreach ($upcomingTrips as &$trip) {
  $trip['place_names'] = Location::i_getPlaceNames(parseIds($trip['place_ids']), 'place');
  $trip['stay_names'] = Location::i_getLocationNames(parseIds($trip['stay_ids']), 'accommodation');
  $trip['rest_names'] = Location::i_getLocationNames(parseIds($trip['rest_ids']), 'restaurant');
}
// Debugging (optional)
// dd($upcomingTrips);

view('user/profile/upcoming-trips.view.php', [
    'heading' => 'Upcoming Trips',
    'upcomingTrips' => $upcomingTrips,
]);