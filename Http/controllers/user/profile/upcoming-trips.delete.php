<?php

use Models\Trip;
use Models\User;

// dd($_POST);
$userEmail = $_SESSION['user']['email'];
$userid = User::i_getUserID($userEmail);

$tripId = (int)$_POST['tripid'];
// dd($tripId);
Trip::i_deleteTrip($tripId);

header('location: /upcoming-trips');
exit();