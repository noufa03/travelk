<?php

use Core\App;
use Core\Database;
use Core\Image;

$db = App::resolve(Database::class);

$userEmail = $_SESSION['user']['email'] ?? null;
$userID = null;
$hotel = null;
$rooms = [];
$profileComplete = false;

if ($userEmail) {
    $userID = $db->query("SELECT userid FROM users WHERE email = :userEmail", [
        'userEmail' => $userEmail
    ])->find();
}

if ($userID) {
    $hotel = $db->query("SELECT * FROM accommodation WHERE accid = :userID", [
        'userID' => $userID['userid']
    ])->find();

    if ($hotel) {
        // Check profile completeness
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

        // Get all rooms for the accommodation
        $rooms = $db->query("SELECT * FROM accommodation_rooms WHERE accid = :accid", [
            'accid' => $hotel['accid']
        ])->get();
    }
}

// Handle image upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['room_images'])) {
    try {
        $imageDir = BASE_PATH . 'uploads/rooms'; // Directory for images
        $imageClass = new Image($imageDir); // Image class instance

        $roomImages = []; // Array to store uploaded image paths
        $roomId = $_POST['roomid']; // Assuming roomid is passed via POST

        // Loop through each file uploaded
        foreach ($_FILES['room_images']['name'] as $index => $fileName) {
            $file = [
                'name' => $_FILES['room_images']['name'][$index],
                'tmp_name' => $_FILES['room_images']['tmp_name'][$index],
                'error' => $_FILES['room_images']['error'][$index],
                'size' => $_FILES['room_images']['size'][$index],
            ];

            // Upload the image
            $uploadedFile = $imageClass->upload($file, 'room_img_');
            if ($uploadedFile) {
                $roomImages[] = $uploadedFile; // Add to the array of uploaded images
            }
        }

        // Store the images in the database
        if (!empty($roomImages)) {
            $imagePaths = implode(',', $roomImages); // Convert to a comma-separated string
            $db->query("UPDATE accommodation_rooms SET images = :images WHERE roomid = :roomid", [
                'images' => $imagePaths,
                'roomid' => $roomId,
            ]);
        }

        echo 'Images uploaded successfully.';
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

view('hotel/room/room.view.php', [
    'hotel' => $hotel,
    'rooms' => $rooms,
    'hotelEmail' => $userEmail,
    'profileComplete' => $profileComplete
]);
