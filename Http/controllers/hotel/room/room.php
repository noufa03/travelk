<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$userEmail = $_SESSION['user']['email'] ?? null;

$userID = $db->query("SELECT userid FROM users WHERE email = :userEmail", [
    'userEmail' => $userEmail
])->find();

$rooms = [];
if ($userID) {
    // Get hotel info
    $hotel = $db->query("SELECT * FROM accommodation WHERE accid = :userID", [
        'userID' => $userID['userid']
    ])->find();

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

    if ($hotel) {
        // Get all rooms for that accommodation
        $rooms = $db->query("SELECT * FROM accommodation_rooms WHERE accid = :accid", [
            'accid' => $hotel['accid']
        ])->get();
    }
}




view('hotel/room/room.view.php', [
    'hotel' => $hotel,
    'rooms' => $rooms,
    'hotelEmail' => $userEmail,
    'profileComplete' => $profileComplete
]);