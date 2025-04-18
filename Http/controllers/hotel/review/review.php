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




view('hotel/review/review.view.php', [
    'hotelEmail'=>$userEmail,
    'hotel' => $hotel,
    'reviews' => $reviews,
    'averageRating'=> $avgRating,
    'totalReviews' => $totReviews
]);
