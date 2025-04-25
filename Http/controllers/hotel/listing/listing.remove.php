<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$userEmail = $_SESSION['user']['email'];
$userID = $db->query("SELECT userid FROM users WHERE email = :userEmail",['userEmail'=>$userEmail])->find();
if(!$userID){
    header("Location: /dashboard_hotel");
    exit();
}

$hotel = $db->query("SELECT * FROM accommodation WHERE accid = :userID",['userID'=>$userID['userid']])->find();
if(!$hotel){
    header("Location: /dashboard_hotel");
    exit();
}

//profile complete status
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

$accID = $hotel['accid'];
$listID = $_GET['id'] ?? null;
if(!$listID){
    header("Location: /listing_hotel");
    exit();
}
if($_SERVER['REQUEST_METHOD']==='POST'){
    //perform DELETION
    $db->query("DELETE from accommodation_listings WHERE accid = :accID AND listid = :listID",[
        'accID'=>$accID,
        'listID'=>$listID
    ]);
    header("Location: /listing_hotel");
    exit();
}else{
    //show confirmation
    $listing = $db->query("SELECT * FROM accommodation_listings WHERE listid=:listID AND accid=:accID",
    ['listID'=>$listID,'accID'=>$accID])->find();

     if(!$listing){
        header("LOcation: /listing_hotel");
        exit();
     }
     view('hotel/listing/listing.remove.view.php',[
        'listing'=>$listing,
        'hotelEmail'=>$userEmail,
        'profileComplete'=>$profileComplete
     ]);
}

//GET: for confirmation view
// if($_SERVER['REQUEST_METHOD']==='GET'){
//     $listID = $_GET['id'] ?? null;
//     if(!$listID){
//         header("Location: /listing_hotel");
//         exit();
//     }

//     $listing = $db->query("SELECT * FROM accommodation_listings WHERE listid=:listID AND accid=:accID",
//     ['listID'=>$listID,'accID'=>$accID])->find();

//      if(!$listing){
//         header("LOcation: /listing_hotel");
//         exit();
//      }
//      view('hotel/listing/listing.remove.view.php',[
//         'listing'=>$listing
//      ]);
// }else{

// }

//POST: for DELETION process
//if($_SERVER[''])
