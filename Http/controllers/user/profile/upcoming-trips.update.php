<?php

use Models\Trip;
use Models\User;

$userEmail = $_SESSION['user']['email'];
$userid = User::i_getUserID($userEmail);

$tripId = $_POST['tripId'];
$status = $_POST['status'];

Trip::i_changeTripStatus($tripId, $status);

// $upcomingTrips = Trip::i_getUpcomingTrips($userid);

header('location: /upcoming-trips');
exit();
