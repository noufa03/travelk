<?php

use Core\App;
use Core\Database;
use Core\Image;

$db = App::resolve(Database::class);

$userEmail = $_SESSION['user']['email'];

$userID = $db->query("SELECT userid FROM users WHERE email = :userEmail", ['userEmail' => $userEmail])->find();

if (!$userID) {
    $hotel = null;
} else {
    $hotel = $db->query("SELECT * FROM accommodation WHERE accid = :userID", ['userID' => $userID['userid']])->find();
}

if (!$hotel) {
    header("Location: /dashboard_hotel");
    exit();
}

$accID = $hotel['accid'];

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Step 1: Insert without image first
    $db->query("INSERT INTO accommodation_listings (
        accid, name, category, features, location, price, availability, created_at, updated_at
    ) VALUES (
        :accid, :name, :category, :features, :location, :price, :availability, :created_at, :updated_at
    )", [
        'accid' => $accID,
        'name' => $_POST['name'],
        'category' => $_POST['category'],
        'features' => $_POST['features'],
        'location' => $_POST['location'],
        'price' => $_POST['price'],
        'availability' => isset($_POST['availability']) ? 1 : 0,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ]);

    // Step 2: Now find the latest inserted listid manually
    $latestListing = $db->query("SELECT listid FROM accommodation_listings WHERE accid = :accid ORDER BY created_at DESC LIMIT 1", [
        'accid' => $accID
    ])->find();

    $listid = $latestListing['listid'] ?? null;

    if ($listid && isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        try {
            // Step 3: Upload image into the correct folder
            $uploadDir = BASE_PATH . "/public/assets/hotel/listing/{$accID}/{$listid}";
            $image = new Image($uploadDir);

            $uploadedPath = $image->upload($_FILES['image'], 'listing_');

            if ($uploadedPath) {
                // Step 4: Update the listing with image path
                $relativePath = str_replace(BASE_PATH . "/public", '', $uploadedPath); // Make it relative
                $db->query("UPDATE accommodation_listings SET image = :image WHERE listid = :listid AND accid = :accid", [
                    'image' => $relativePath,
                    'listid' => $listid,
                    'accid' => $accID
                ]);
            }
        } catch (Exception $e) {
            // Optional: Log error
        }
    }

    // Step 5: Redirect after successful operation
    header("Location: /listing_hotel");
    exit();
}

view('hotel/listing/listing.add.view.php', [
    'hotel' => $hotel,
    'hotelEmail' => $userEmail,
    'profileComplete' => $profileComplete
]);
