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
//Profile complete status
$profileComplete = !(
    empty($hotel['star_rating']) ||
    empty($hotel['no_rooms']) ||
    empty(trim($hotel['amenities'])) ||
    (empty($hotel['payment_credit']) && empty($hotel['payment_debit']) && empty($hotel['payment_cash'])) ||
    empty($hotel['checkin']) ||
    empty($hotel['checkout']) ||
    empty($hotel['logo']) ||
    empty(trim($hotel['business_reg_num'])) ||
    empty(trim($hotel['licensing_info'])) ||
    empty(trim($hotel['owner_name'])) ||
    empty(trim($hotel['owner_contact']))
);
view('hotel/listing/listing.view.php',[
    'hotel'=>$hotel,
    'hotelEmail'=>$userEmail,
    'listings'=>$listings,
    'profileComplete'=>$profileComplete
]);