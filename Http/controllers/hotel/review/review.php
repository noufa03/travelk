<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$userEmail = $_SESSION['user']['email'];

$userID = $db->query("SELECT userid FROM users WHERE email=:userEmail", ['userEmail' => $userEmail])->find();
if (!$userID) {
    header("Location: /dashboard_hotel");
    exit();
}

$hotel = $db->query("SELECT * FROM accommodation WHERE accid=:userID", ['userID' => $userID['userid']])->find();
if (!$hotel) {
    header("Location: /dashboard_hotel");
    exit();
}

$accID = $hotel['accid'];
$reviews = $db->query("SELECT * FROM accommodation_reviews WHERE accid = :accID", ['accID' => $accID])->get();
//Calculating AVG rating
$totReviews = count($reviews);
$avgRating = $totReviews > 0 ? round(array_sum(array_column($reviews,'rating'))/$totReviews,1) : 0;

//To Seperate Replied and Yet to reply reviews
$repliedReviews = [];
$unrepliedReviews =[];

foreach ($reviews as $review){
    if(!empty(trim($review['reply']))){
        $repliedReviews[]=$review;
    }else{
        $unrepliedReviews[]=$review;
    }
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


view('hotel/review/review.view.php', [
    'hotelEmail'=>$userEmail,
    'hotel' => $hotel,
    'reviews' => $reviews,
    'averageRating'=> $avgRating,
    'totalReviews' => $totReviews,
    'repliedReviews' => $repliedReviews,
    'unrepliedReviews' => $unrepliedReviews,
    'profileComplete' => $profileComplete
]);
