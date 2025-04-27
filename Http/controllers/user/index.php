<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$userEmail = $_SESSION['user']['email'];

$userID = $db->query("SELECT userid FROM users WHERE email = :userEmail",['userEmail' => $userEmail])->find();


if (!$userID) {
    // Handle case where user is not found
    $user = null;
} else {
    $user = $db->query("SELECT * FROM travelers WHERE traid = :userID",['userID' => $userID['userid']])->find();
}


$trips = $db->query("SELECT * FROM Trips WHERE userID = :userID",["userID" => $userID['userid']])->get();
$trips=isset($trips)?$trips:'no trips found';
$reviews=$db->query("SELECT * FROM reviews WHERE traid=:traid",[

'traid'=>$userID['userid']
])->get();

$pasttrips=$db->query("SELECT * FROM Trips WHERE userid = :userid AND end_date < :end_date",[
    "userid" => $userID['userid'],
    "end_date" => date('Y-m-d')
])->get();

$num_trips=$db->query("SELECT COUNT(*) FROM Trips WHERE userID = :userID",["userID" => $userID['userid']])->find();

// dd($num_trips);

$userID=$userID['userid'];
view('user/index.view.php', [
    'user' => $user,
    'userEmail' => $userEmail,
    'trips' => $trips,
    'reviews'=>$reviews,
    'userID'=>$userID,
    'heading' => 'Trip Planner',
    'totaltrips'=>$num_trips['count'],
    'wishlist'=>1,
    'totalBookings'=>1,
]);
