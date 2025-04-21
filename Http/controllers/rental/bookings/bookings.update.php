<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$booking = $db->query('select confirmation_of_driver from vehiclebooking where "bookingid"=:id  ', [
    'id' => $_GET['id']
])->find();

$update = $db->query('update vehiclebooking set "confirmation_of_driver"=:confirm where "bookingid"=:id ', [

    'confirm' => $booking['confirmation_of_driver'] == 'true' ? 'false' : 'true',
    'id' => $_GET['id']

]);

header('location: /bookings');
die();
