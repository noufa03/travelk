<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$userEmail = $_SESSION['user']['email'];
$userID = $db->query("SELECT userID FROM users WHERE email = :userEmail",['userEmail' => $userEmail])->find();

$tripID = $_POST['tripID'] ?? null;

if ($tripID) {
    $trip = $db->query("SELECT * FROM trips WHERE tripID = ?", [$tripID])->find();

    if ($trip && $trip['userID'] == $userID['userID']) {
        $locationsStmt = $db->query("
            SELECT Locations.*, Trip_Locations.visitDate, Trip_Locations.booking_status 
            FROM Trip_Locations
            JOIN Locations ON Trip_Locations.locationID = Locations.locationID
            WHERE Trip_Locations.tripID = :tripID
        ",['tripID' => $tripID])->get();

        view('trip/edit.view.php',[
            'trip' => $trip,
            'locations' => $locationsStmt
        ]);
    } else {
        echo "You do not have permission to edit this trip.";
        exit;
    }
}

