<?php

use Models\Trip;
use Models\User;

$userEmail = $_SESSION['user']['email'];
$userid = User::i_getUserID($userEmail);

$tripId = $_POST['tripId'];

Trip::i_deleteTrip($tripId);

header('location: /upcoming-trips');
exit();