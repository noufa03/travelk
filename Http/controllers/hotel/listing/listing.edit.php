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

// Redirect if not found
if (!$hotel) {
    header("Location: /dashboard_hotel");
    exit();
}

$accID = $hotel['accid'];

// Profile complete status
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
    $listid = $_POST['listid'];

    // Fetch existing listing
    $existingListing = $db->query("SELECT image FROM accommodation_listings WHERE listid = :listid AND accid = :accid", [
        'listid' => $listid,
        'accid' => $accID
    ])->find();

    $imagePath = $existingListing['image'] ?? '';

    // Correct upload folder path: /assets/hotel/listing/{accID}/{listid}
    $uploadDir = BASE_PATH . "/public/assets/hotel/listing/{$accID}/{$listid}";
    $image = new Image($uploadDir);

    try {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $uploaded = $image->upload($_FILES['image'], 'listing_');
            if ($uploaded) {
                $basename = basename($uploaded);
                $imagePath = "/assets/hotel/listing/{$accID}/{$listid}/{$basename}";
            }
        }
    } catch (Exception $e) {
        // fallback to old image
        $imagePath = $existingListing['image'] ?? '';
    }

    $data = [
        'listid' => $listid,
        'accid' => $accID,
        'name' => $_POST['name'],
        'category' => $_POST['category'],
        'features' => $_POST['features'],
        'price' => $_POST['price'],
        'availability' => isset($_POST['availability']) ? 1 : 0,
        'image' => $imagePath,
        'updated_at' => date('Y-m-d H:i:s')
    ];

    // Update listing
    $db->query(
        "UPDATE accommodation_listings SET
            name = :name,
            category = :category,
            features = :features,
            price = :price,
            availability = :availability,
            image = :image,
            updated_at = :updated_at
        WHERE listid = :listid AND accid = :accid",
        $data
    );

    // Redirect after update
    header("Location: /listing_hotel");
    exit();
} else {
    // GET request: Load Listing for editing
    $listid = $_GET['id'] ?? null;

    if (!$listid) {
        header('Location: /listing_hotel');
        exit();
    }

    // FETCH listing
    $listing = $db->query("SELECT * FROM accommodation_listings WHERE listid = :listid AND accid = :accid", [
        'listid' => $listid,
        'accid' => $accID
    ])->find();

    if (!$listing) {
        header("Location: /listing_hotel");
        exit();
    }

    view('hotel/listing/listing.edit.view.php', [
        'hotel' => $hotel,
        'hotelEmail' => $userEmail,
        'listing' => $listing,
        'profileComplete' => $profileComplete
    ]);
}
