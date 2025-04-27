<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();
$userid = $user['userid'];

//past bookings are the bookings that were in the past,when pickupdate is passed
$mybookings = $db->query('SELECT * FROM vehiclebooking vb JOIN vehicle_details vd on vd."id"=vb."carid" JOIN drivers d on d."driverid"=vd."driverid" WHERE vb."emailaddress"= :email', [
    'email' => $user['email'],
])->get();





// dd($mybookings['confirmation_of_driver']);
// dd( $mybookings['confirmation_of_driver']);
view("user/home/rent/book.view.php", [
    'mybookings' => $mybookings,
 
   

]);
