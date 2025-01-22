<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$userEmail = $_SESSION['user']['email'];

$userID = $db->query("SELECT userID FROM users WHERE email = :userEmail",['userEmail' => $userEmail])->find();
$tripID = $_GET['tripID'];

$tripDetails = $db->query("
    SELECT 
        trips.tripID,
        trips.start_date,
        trips.end_date,
        trips.full_amount,
        trip_locations.locationID,
        locations.display_name,
        trip_locations.visitDate  
    FROM 
        trips
    JOIN 
        trip_locations ON trips.tripID = trip_locations.tripID
    JOIN 
        locations ON trip_locations.locationID = locations.locationID
    WHERE 
        trips.userID = :userID AND trips.tripID = :tripID;
    ",[
        'userID' => $userID['userID'],
        'tripID' => $tripID
])->get();

view('trip/trip.view.php',[
    'trip' => $tripDetails
]);