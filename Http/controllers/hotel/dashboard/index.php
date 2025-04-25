<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$userEmail = $_SESSION['user']['email'];

$userID = $db->query("SELECT userid FROM users WHERE email = :userEmail", ['userEmail' => $userEmail])->find();

$hotel = null;
$profileComplete = false;

if ($userID) {
    $hotel = $db->query("SELECT * FROM accommodation WHERE accid = :userID", ['userID' => $userID['userid']])->find();

    if ($hotel) {
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
    }
}

$accid = $userID['userid'];

// Statistics
$totalRooms = $db->query("SELECT COUNT(*) as count FROM accommodation_rooms WHERE accid = :id", ['id' => $accid])->find()['count'];
$totalReviews = $db->query("SELECT COUNT(*) as count FROM accommodation_reviews WHERE accid = :id", ['id' => $accid])->find()['count'];
$totalPackages = $db->query("SELECT COUNT(*) as count FROM accommodation_listings WHERE accid = :id", ['id' => $accid])->find()['count'];
//stat 2
$averageRating = $db->query(
    "SELECT ROUND(AVG(rating), 1) as avg_rating FROM accommodation_reviews WHERE accid = :id",
    ['id' => $accid]
)->find()['avg_rating'] ?? 0;

// Optional: bookings this month (requires booking table)
// $bookingsThisMonth = $db->query(
//     "SELECT COUNT(*) as count FROM bookings WHERE accid = :id AND EXTRACT(MONTH FROM booking_date) = EXTRACT(MONTH FROM CURRENT_DATE)",
//     ['id' => $accid]
// )->find()['count'] ?? 0;

//temp booking no   
$bookingsThisMonth = 0;

view('hotel/dashboard/index.view.php', [
    'hotel' => $profileComplete ? $hotel : null,
    'hotelEmail' => $userEmail,
    'profileComplete' => $profileComplete,
    'stats' => [
        'rooms' => $totalRooms,
        'reviews' => $totalReviews,
        'packages' => $totalPackages,
        'averageRating' => $averageRating,
        'bookingsThisMonth' => $bookingsThisMonth
    ]
]);
