<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$userEmail = $_SESSION['user']['email'];

$userID = $db->query("SELECT userID FROM users WHERE email = :userEmail",['userEmail' => $userEmail])->find();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tripID = $_POST['tripID'] ?? null;

    if (!$tripID) {
        echo "Invalid request.";
        exit;
    }

    // Fetch the trip details from the database
    $trip = $db->query('SELECT userID FROM trips WHERE tripID = :tripID',['tripID' => $tripID])->find();
//    $stmt->execute(['tripID' => $tripID]);
//    $trip = $stmt->fetch();

    if (!$trip) {
        echo "Trip not found.";
        exit;
    }

    // Check if the session userID matches the trip's userID
    if ($userID['userID'] === $trip['userID']) {
        // Delete the trip
        $deleteStmt = $db->query('DELETE FROM trips WHERE tripID = :tripID',['tripID' => $tripID]);
//        $deleteStmt->execute();

        echo "Trip deleted successfully.";
        // Redirect or show a success message
        header('Location: /userpage'); // Replace with your trips listing page
        exit;
    } else {
        echo "Unauthorized action.";
        exit;
    }

}
