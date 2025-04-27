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

if (!$hotel) {
    header("Location: /dashboard_hotel");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Insert a new room first to get the roomid
    $db->query("INSERT INTO accommodation_rooms (accid, room_number, room_type, bed_type, capacity, price_per_night, description, amenities, availability, images, created_at, updated_at) 
                VALUES (:accid, :room_number, :room_type, :bed_type, :capacity, :price_per_night, :description, :amenities, :availability, '', NOW(), NOW())", [
        'accid' => $hotel['accid'],
        'room_number' => $_POST['room_number'],
        'room_type' => $_POST['room_type'],
        'bed_type' => $_POST['bed_type'],
        'capacity' => $_POST['capacity'],
        'price_per_night' => $_POST['price_per_night'],
        'description' => $_POST['description'],
        'amenities' => $_POST['amenities'],
        'availability' => $_POST['availability']
    ]);

    // Get the last inserted roomid
    $roomID = $db->connection->lastInsertId();

    // Handle multiple image uploads
    $imagesPaths = [];
    if (isset($_FILES['images']) && $_FILES['images']['error'][0] === 0) {
        foreach ($_FILES['images']['tmp_name'] as $index => $tmpName) {
            $image = $_FILES['images'];
            $folderPath = BASE_PATH . "/public/assets/hotel/room/{$hotel['accid']}/{$roomID}";
            
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            $imagePath = "/assets/hotel/room/{$hotel['accid']}/{$roomID}/" . basename($image['name'][$index]);
            move_uploaded_file($tmpName, $folderPath . "/" . basename($image['name'][$index]));
            $imagesPaths[] = $imagePath;
        }
    }

    // Update the room with images
    if (!empty($imagesPaths)) {
        $imagesString = implode(',', $imagesPaths);
        $db->query("UPDATE accommodation_rooms SET images = :images WHERE roomid = :roomid", [
            'images' => $imagesString,
            'roomid' => $roomID
        ]);
    }

    // Redirect back to room listing
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
view('hotel/room/room.add.view.php', [
    'hotel' => $hotel,
    'hotelEmail' => $userEmail,
    'profileComplete' => $profileComplete
]);
