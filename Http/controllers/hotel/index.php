<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class); // allowing querries to be excecuted
$userEmail = $_SESSION['user']['email']; // current logged in email
$userID = $db->query("SELECT userid from users WHERE email= :userEmail",['userEmail'=>$userEmail])->find();

//handle "user id not found!"
if(!$userID){
    $user = null;
}else{
    $user = $db->query("SELECT * from accommodation WHERE accid = :userID",['userID' => $userID['userid']])->find();
}
//passing Data to view.php
view('hotel/index.view.php',[
    'hotel'=>$user,
    'hotelEmail'=>$userEmail
]);