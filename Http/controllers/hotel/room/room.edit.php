<?php

use Core\App;
use Core\Database;
use Core\Image;

$db = App::resolve(Database::class);
$userEmail = $_SESSION['user']['email'];

// Get user ID
$userID = $db->query("SELECT userid FROM users WHERE email = :userEmail", ['userEmail' => $userEmail])->find();

if (!$userID) {
    header("Location: /dashboard_hotel");
    exit();
}

$hotel = $db->query("SELECT * FROM accommodation WHERE accid = :userID", ['userID' => $userID['userid']])->find();

// Fetch room details using roomid from query
$roomID = $_GET['roomid'] ?? null;
$room = $db->query("SELECT * FROM accommodation_rooms WHERE roomid = :roomid", ['roomid' => $roomID])->find();

if (!$room) {
    header("Location: /room_hotel");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle multiple image uploads
    $imagesPaths = [];
    if (isset($_FILES['images']) && $_FILES['images']['error'][0] === 0) {
        foreach ($_FILES['images']['tmp_name'] as $index => $tmpName) {
            $image = $_FILES['images'];
            $imagePath = "/assets/hotel/room/{$hotel['accid']}/{$roomID}/" . basename($image['name'][$index]);
            move_uploaded_file($tmpName, BASE_PATH . "/public" . $imagePath);
            $imagesPaths[] = $imagePath;
        }
    }

    // If images are uploaded, update the room details
    $imagesString = !empty($imagesPaths) ? implode(',', $imagesPaths) : $room['images']; // Use existing images if no new images

    $data = [
        'room_number' => $_POST['room_number'],
        'room_type' => $_POST['room_type'],
        'bed_type' => $_POST['bed_type'],
        'capacity' => $_POST['capacity'],
        'price_per_night' => $_POST['price_per_night'],
        'description' => $_POST['description'],
        'amenities' => $_POST['amenities'],
        'availability' => $_POST['availability'],
        'images' => $imagesString // Always include 'images' here
    ];

    // Update the room details in the database
    $db->query("UPDATE accommodation_rooms SET 
        room_number = :room_number,
        room_type = :room_type,
        bed_type = :bed_type,
        capacity = :capacity,
        price_per_night = :price_per_night,
        description = :description,
        amenities = :amenities,
        availability = :availability,
        images = :images
        WHERE roomid = :roomid", array_merge($data, ['roomid' => $roomID]));

    // Redirect to room list
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

// Load the view
view('hotel/room/room.edit.view.php', [
    'hotel' => $hotel,
    'hotelEmail' => $userEmail,
    'room' => $room,
    'profileComplete' => $profileComplete
]);
?>
