<?php


use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$user = authUser();

$userid = $user['userid'];

$booking = $db->query('select * from vehiclebooking where "bookingid"= :id', [
    'id' => $_POST['bookingid']
])->findOrFail();

authorize($booking['emailaddress'] === $user['email']); //authorize before deleting

$carid=$booking['carid'];

//update the driver and vehicle status
$bookvehicle = $db->query('UPDATE vehicle_details SET "status"=:status WHERE "id"=:id', [
    'status' => 1,
    'id' => $booking['carid']

]);
//bookingcancelled = 1 → Booking is cancelled.
$db->query('UPDATE vehiclebooking 
    SET "bookingcancelled" = :status, "cancellationreason" = :reason 
    WHERE "bookingid" = :id', [
    'id' => $_POST['bookingid'],
    'status' => 1,
    'reason' => $_POST['reason'] ?? ''
]);



//unbook the driver, make them available =1
$bookdriver = $db->query('UPDATE drivers SET "status"=:status WHERE "driverid"=:id', [
    'id' => $_POST['driverid'],
    'status' => 1

]);

header('location:/book/rental/details');

exit();
