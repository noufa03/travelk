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

// if ($booking['confirmation_of_driver']) { //true nam
//     $notifications = $db->query(
//         'INSERT INTO notifications("userid", "message", "type", "is_read") VALUES (:id, :msg, :type, :read)',
//         [
//             'id' => $userid,
//             'msg' => 'you have confirmed a ride on ' . $booking["pickupdate"],
//             'type' => 'ride',
//             'read' => 'false',
//         ]
//     );
// } else {

//     $notifications = $db->query(
//         'INSERT INTO notifications("userid", "message", "type", "is_read") VALUES (:id, :msg, :type, :read)',
//         [
//             'id' => $userid,
//             'msg' => 'you have cancelled a ride on ' . $booking["pickupdate"],
//             'type' => 'ride',
//             'read' => 'false',
//         ]
//     );
// }
//if it is true it was updated to cancelled
$msg = ($booking['confirmation_of_driver'] == 'true') 
    ? 'The booking has been cancelled.' 
    : 'The booking has been successfully confirmed.';




header('location: /bookings');
Session::flash('toast',$msg);

die();
