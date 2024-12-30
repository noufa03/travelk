<?php

use Core\App;
use Core\Database;

// Get userID from the user_session or some authentication system
//$userID = $_SESSION['userID']; // Assuming user is logged in and userID is stored in the user_session
$db = App::resolve(Database::class);
//dd( $_SESSION['user']['email']);
$userEmail = $_SESSION['user']['email'];
//$db->query("SELECT userID FROM users WHERE email = ':userEmail'",['userEmail' => $userEmail]);

$userID = $db->query("SELECT userid FROM users WHERE email = :userEmail",['userEmail' => $userEmail])->find();
//dd($userID);
// Database connection
//$db = App::resolve(Database::class);
//$id = $userID['userID'];
//dd($id);
$user = $db->query("SELECT user_name, profile FROM travelers WHERE traid = :userID",["userID" => $userID['userID']])->find();

$trips = $db->query("SELECT tripID, create_date, start_date, end_date FROM Trips WHERE userID = :userID",["userID" => $userID['userID']])->get();

view('user/index.view.php', [
    'user' => $user,
    'trips' => $trips,
]);
