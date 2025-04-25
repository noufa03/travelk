<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);
$userEmail = $_SESSION['user']['email'];
$userID = $db->query("SELECT userid FROM users WHERE email = :userEmail",['userEmail'=>$userEmail])->find();


if(!$userID){
    $hotel = null;
}else{
    $hotel = $db->query("SELECT * FROM accommodation WHERE accid=:userID",['userID'=>$userID['userid']])->find();
}
//ridirect if not found
if(!$hotel){
    header("Location: /dashboard_hotel");
    exit();
}
$accID = $hotel['accid'];
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

//form data
if($_SERVER['REQUEST_METHOD']==='POST'){
    $data = [
        'listid' => $_POST['listid'],
        'accid' => $accID,
        'name' => $_POST['name'],
        'category' => $_POST['category'],
        'features' => $_POST['features'],
        'location' => $_POST['location'],
        'price' => $_POST['price'],
        'availability' => isset($_POST['availability']) ? 1 : 0,
        'updated_at' => date('Y-m-d H:i:s')
    ];
    //UPDATE listing
    $db->query(
        "UPDATE accommodation_listings SET
        name = :name,
        category = :category,
        features = :features,
        location = :location,
        price = :price,
        availability = :availability,
        updated_at = :updated_at
        WHERE listid = :listid AND accid = :accid",$data
    );
    //successful UPDATE
    header("Location: /listing_hotel");
    exit();
}else{
    //GET request : Load Listing for editing
    //$listid = explode('/',$_SERVER['REQUEST_URI'])[2] ?? null;
    $listid = $_GET['id'] ?? null;

    if(!$listid){
        header('Location: /listing_hotel');
        exit();
    }
    //FETCH listing
    $listing = $db->query("SELECT * FROM accommodation_listings WHERE listid=:listid AND accid=:accid",
    ['listid'=>$listid, 'accid'=>$accID])->find();
    //!listing ridirect
    if(!$listing){
        header("Location: /listing_hotel");
        exit();
    }
    view('hotel/listing/listing.edit.view.php',[
    'hotel'=>$hotel,
    'hotelEmail'=>$userEmail,
    'listing'=>$listing,
    'profileComplete'=>$profileComplete
]);

}


