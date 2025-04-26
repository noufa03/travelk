<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();
$userid = $user['userid'];

//past bookings are the bookings that were in the past,when pickupdate is passed
$past_bookings = $db->query('SELECT * FROM vehiclebooking WHERE "carid"= :id and "pickupdate" < NOW()', [
    'id' => $userid,
])->get();

//confirmed future bookings= pickupdate is in future and confirmation of the driver is confirmed
$future_bookings_confirmeds = $db->query('SELECT * FROM vehiclebooking WHERE "carid"= :id and "pickupdate" >=NOW() and "confirmation_of_driver"=:confirm', [
    'id' => $userid,
    'confirm' => 'true'
])->get();

//cancelled future booking=pickupdate is in future and confirmation of the driver is cancelled(false)
$future_bookings_cancelleds = $db->query('SELECT * FROM vehiclebooking WHERE "carid"= :id and "pickupdate" >=NOW() and "confirmation_of_driver"=:confirm', [
    'id' => $userid,
    'confirm' => 'false'
])->get();

// dd($future_bookings_confirmeds);
view("rental/bookings/index.view.php", [
    'heading' => 'My Bookings',
    'past_bookings' => $past_bookings,
    'future_bookings_confirmeds' => $future_bookings_confirmeds,
    'future_bookings_cancelleds' => $future_bookings_cancelleds
]);
