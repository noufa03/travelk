<?php
  
use Models\Trip;
use Models\User;

$userEmail = $_SESSION['user']['email'];
$userid = User::i_getUserID($userEmail);

$pastTrips = Trip::i_getPastTrips($userid);

view('user/profile/past-trips.view.php',[
  'heading' => 'Past Trips',
  'pastTrips' => $pastTrips,
]);
