<?php


// dd('hello');
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$userEmail = $_SESSION['user']['email'];

$userID = $db->query("SELECT userid FROM     users WHERE email = :userEmail", ['userEmail' => $userEmail])->find();

//$hotel, $profileComplete and $locationComplete

$hotel = null;
$profileComplete = false;
$locationComplete = false;

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

        $location = $db->query("SELECT * FROM locations WHERE userid = :accid", ['accid' => $userID['userid']])->find();
        $locationComplete = $location ? true : false;
    }
}

$accid = $userID['userid'];

$stats = [
    'rooms' => $db->query("SELECT COUNT(*) as count FROM accommodation_rooms WHERE accid = :id", ['id' => $accid])->find()['count'],
    'reviews' => $db->query("SELECT COUNT(*) as count FROM accommodation_reviews WHERE accid = :id", ['id' => $accid])->find()['count'],
    'packages' => $db->query("SELECT COUNT(*) as count FROM accommodation_listings WHERE accid = :id", ['id' => $accid])->find()['count'],
    'averageRating' => $db->query("SELECT ROUND(AVG(rating), 1) as avg_rating FROM accommodation_reviews WHERE accid = :id", ['id' => $accid])->find()['avg_rating'] ?? 0,
    'bookingsThisMonth' => 0 // Replace with actual booking query if needed
];

view('user/location/hotel.show.view.php', [
    'hotel' => ($profileComplete && $locationComplete) ? $hotel : null,
    'hotelEmail' => $userEmail,
    'profileComplete' => $profileComplete,
    'locationComplete' => $locationComplete,
    'stats' => $stats
]);
