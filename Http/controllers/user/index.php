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

$trips = $db->query("SELECT tripID, create_date, start_date, end_date FROM Trips WHERE userID = :userID",["userID" => $userID['userid']])->get();

view('user/index.view.php', [
    'user' => $user,
    'userEmail' => $userEmail,
    'trips' => $trips,
]);
