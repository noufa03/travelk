<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$booking = $db->query('select * from vehiclebooking where "bookingid"=:id  ', [
    'id' => $_POST['bookingid']
])->find();

//confrimation of the driver false nam true wenawa true nam false wena will the click
$update = $db->query('update vehiclebooking set "confirmation_of_driver"=:confirm where "bookingid"=:id ', [

    'confirm' => $booking['confirmation_of_driver'] == 'true' ? 'false' : 'true',
    'id' => $_POST['bookingid']

]);


$msg = ($booking['confirmation_of_driver'] == 'true') 
    ? 'The booking has been cancelled.' 
    : 'The booking has been successfully confirmed.';




header('location: /bookings');
Session::flash('toast',$msg);

die();
