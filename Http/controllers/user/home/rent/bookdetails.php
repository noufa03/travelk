<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();
$userid = $user['userid'];

//past bookings are the bookings that were in the past,when pickupdate is passed
$mybookings = $db->query('SELECT * FROM vehiclebooking vb JOIN vehicle_details vd on vd."id"=vb."carid" WHERE "emailaddress"= :email', [
    'email' => $user['email'],
])->find();



if (isset($mybookings['driverid'])) {
    $drivers_details = $db->query('SELECT * FROM drivers WHERE "driverid"=:id', [
        'id' => $mybookings['driverid']
    ])->find();
}
$drivers_details = $drivers_details ?? null;

// dd($mybookings['confirmation_of_driver']);
// dd( $mybookings['confirmation_of_driver']);
view("user/home/rent/book.view.php", [
    'mybookings' => $mybookings,
    'drivers_details' => $drivers_details,
   

]);
