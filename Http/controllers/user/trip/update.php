<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$userEmail = $_SESSION['user']['email'];

$userID = $db->query("SELECT userID FROM users WHERE email = :userEmail",['userEmail' => $userEmail])->find();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tripID = $_POST['tripID'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $amount = $_POST['amount'];

    if (!$tripID || !$start_date || !$end_date || !$amount) {
        die('Required fields are missing!');
    }


    $updateStmt = $db->query("
        UPDATE Trips SET start_date = :start_date, end_date = :end_date, full_amount = :amount WHERE tripID = :tripID
    ",[
        'start_date' => $start_date,
        'end_date' => $end_date,
        'amount' => $amount,
        'tripID' => $tripID
    ]);

    if (isset($_POST['place_dates']) && is_array($_POST['place_dates'])) {
        foreach ($_POST['place_dates'] as $locationID => $visitDate) {
            if ($visitDate) {
                $bookingStatus = $_POST['booking_status'][$locationID] ?? null;

                $updatePlaceStmt = $db->query("
                    UPDATE Trip_Locations SET visitDate = :visitDate, booking_status = :booking_status WHERE tripID = :tripID AND locationID = :locationID
                ",[
                    'visitDate' => $visitDate,
                    'booking_status' => $bookingStatus,
                    'tripID' => $tripID,
                    'locationID' => $locationID
                ]);
            }
        }
    }

    header("Location: /trip?tripID=" . $tripID);
    exit;
}
?>
