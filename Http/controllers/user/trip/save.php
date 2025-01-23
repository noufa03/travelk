<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$userEmail = $_SESSION['user']['email'];
$userID = $db->query("SELECT userID FROM users WHERE email = :userEmail",['userEmail' => $userEmail])->find();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $amount = $_POST['amount'];
    $selectedPlacesDetails = json_decode($_POST['selectedPlacesDetails'], true);

    $db = App::resolve(Database::class);

    $tripInserted = $db->query(
        "INSERT INTO Trips (userID, start_date, end_date, full_amount, create_date, create_time) 
                 VALUES (:userID, :start_date, :end_date,  :full_amount, NOW(), NOW())",
        [
            'userID' => $userID['userID'],
            'start_date' => $start_date,
            'end_date' => $end_date,
            'full_amount' => $amount,
        ]
    );

    if ($tripInserted) {
        $placeDates = $_POST['place_dates'];

        $locationDates = [];

        $tripID = $db->lastInsertId();

        foreach ($selectedPlacesDetails as $place) {
            $locationID = $place['locationID'] ?? null;
            $selectedDate = $placeDates[$locationID] ?? null;
            $booking_status = $place['booking_status'] ?? null;

            if ($locationID && $selectedDate) {
                $locationDates[] = [
                    'locationID' => $locationID,
                    'selectedDate' => $selectedDate,
                    'booking_status'=> $booking_status
                ];

                $db->query(
                    "INSERT INTO trip_locations (tripID, locationID, visitDate, booking_status) 
             VALUES (:tripID, :locationID, :visitDate, :booking_status)",
                    [
                        'tripID' => $tripID,
                        'locationID' => $locationID,
                        'visitDate' => $selectedDate,
                        'booking_status' => $booking_status
                    ]
                );
            }
        }

        header('Location: /userpage');
        exit;
    } else {
        echo "There was an error saving your trip. Please try again later.";
        exit;
    }
}
