<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$booking = $db->query('select * from vehiclebooking where "bookingid"=:id  ', [
    'id' => $_GET['id']
])->find();


$update = $db->query('update vehiclebooking set "confirmation_of_driver"=:confirm where "bookingid"=:id ', [

    'confirm' => $booking['confirmation_of_driver'] == 'true' ? 'false' : 'true',
    'id' => $_GET['id']

]);

$vehicle_details = $db->query('SELECT * FROM vehicle_details WHERE "id"=:id', [
    'id' => $userid

])->find();

$beforeupdateconfirmation=$booking['confirmation_of_driver'] ;

if ($beforeupdateconfirmation == 'false') {
$   $unavailable=0;
    $bookvehicle = $db->query('UPDATE vehicle_details SET "status"=:status WHERE "id"=:id', [
        'status' => $unavailable,
        'id' => $booking['carid']

    ]);
  
    $bookdriver = $db->query('UPDATE drivers SET "status"=:status WHERE "driverid"=:id', [
        'id' => $vehicle_details['driverid'],
        'status' => $unavailable

    ]);
} else {
  $available=1;

    $bookvehicle = $db->query('UPDATE vehicle_details SET "status"=:status WHERE "id"=:id', [
        'status' => $available,
        'id' => $booking['carid']

    ]);

    $bookdriver = $db->query('UPDATE drivers SET "status"=:status WHERE "driverid"=:id', [
        'id' => $vehicle_details['driverid'],
        'status' => $available

    ]);
}

$msg = ($booking['confirmation_of_driver'] == 'true')
    ? 'The booking has been cancelled.'
    : 'The booking has been successfully confirmed.';




header('location: /bookings');
Session::flash('toast', $msg);

die();
