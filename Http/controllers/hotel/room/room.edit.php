<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$userEmail = $_SESSION['user']['email'];

// Get user ID
$userID = $db->query("SELECT userid FROM users WHERE email = :userEmail", ['userEmail' => $userEmail])->find();

if (!$userID) {
    header("Location: /dashboard_hotel");
    exit();
}
$hotel = $db->query("SELECT * FROM accommodation WHERE accid = :userID", [
    'userID' => $userID['userid']
])->find();
// Fetch room details using roomid from query
$roomID = $_GET['roomid'] ?? null;

$room = $db->query("SELECT * FROM accommodation_rooms WHERE roomid = :roomid", ['roomid' => $roomID])->find();

if (!$room) {
    header("Location: /room_hotel");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'room_number' => $_POST['room_number'],
        'room_type' => $_POST['room_type'],
        'bed_type' => $_POST['bed_type'],
        'capacity' => $_POST['capacity'],
        'price_per_night' => $_POST['price_per_night'],
        'description' => $_POST['description'],
        'amenities' => $_POST['amenities'],
        'availability' => $_POST['availability']
    ];

    $updateQuery = "UPDATE accommodation_rooms SET 
        room_number = :room_number,
        room_type = :room_type,
        bed_type = :bed_type,
        capacity = :capacity,
        price_per_night = :price_per_night,
        description = :description,
        amenities = :amenities,
        availability = :availability
        WHERE roomid = :roomid";

    $db->query($updateQuery, array_merge($data, ['roomid' => $roomID]));

    header("Location: /room_hotel");
    exit();
}

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

// Load view
view('hotel/room/room.edit.view.php', [
    'room' => $room,
    'profileComplete' => $profileComplete
]);
