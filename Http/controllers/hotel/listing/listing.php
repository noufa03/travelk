<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$userEmail = $_SESSION['user']['email'];//current logged in email
//User ID based on Email
$userID = $db->query("SELECT userid FROM users WHERE email = :userEmail",['userEmail'=>$userEmail])->find();

//userID not found?
if(!$userID){
    $hotel = null;
    $listings = [];
}else{
    //userId exists! -> fetch data
    $hotel = $db->query("SELECT * from accommodation WHERE accid = :userID",['userID'=>$userID['userid']])->find();
    //fetch listings data
    $listings = $db->query("SELECT * from accommodation_listings WHERE accid = :userID",['userID'=>$userID['userid']])->get();
}


view('hotel/listing/listing.view.php',[
    'hotel'=>$hotel,
    'hotelEmail'=>$userEmail,
    'listings'=>$listings
]);