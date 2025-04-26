<?php

use Core\App;
use Core\Database;
use Core\Image;

$db = App::resolve(Database::class);
$userEmail = $_SESSION['user']['email'];

// Get user ID
$userRecord = $db->query("SELECT userid FROM users WHERE email = :email", [
    'email' => $userEmail
])->find();

if (!$userRecord) {
    die("User not found");
}

$userid = $userRecord['userid'];

// Get hotel info
$hotel = $db->query("SELECT * FROM accommodation WHERE accid = :userid", [
    'userid' => $userid
])->find();

if (!$hotel) {
    die("Hotel not found");
}

$accid = $hotel['accid'];

// Fetch all listings
$listings = $db->query("SELECT * FROM accommodation_listings WHERE accid = :accid", [
    'accid' => $accid
])->get();

// Initialize empty listing
$listing = [];

// Check for existing listing (for editing)
if (isset($_GET['id'])) {
    $selectedListing = $db->query("SELECT * FROM accommodation_listings WHERE listid = :id AND accid = :accid", [
        'id' => $_GET['id'],
        'accid' => $accid
    ])->find();

    if ($selectedListing) {
        $listing = $selectedListing;
    } else {
        die("Listing not found or access denied.");
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $listid = $_POST['listid'] ?? null;

    if ($listid) {
        // Updating an existing listing
        $uploadDir = BASE_PATH . "/public/assets/hotel/listing/{$accid}/{$listid}";
        $image = new Image($uploadDir);

        $imagePath = $listing['image'] ?? '';

        try {
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $uploaded = $image->upload($_FILES['image'], 'listing_');
                if ($uploaded) {
                    $basename = basename($uploaded);
                    $imagePath = "/assets/hotel/listing/{$accid}/{$listid}/{$basename}";
                }
            }
        } catch (Exception $e) {
            $imagePath = $listing['image'] ?? '';
        }

        $data = [
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'image' => $imagePath,
            'listid' => $listid,
            'accid' => $accid
        ];

        $db->query("UPDATE accommodation_listings SET 
            name = :name, 
            description = :description, 
            price = :price, 
            image = :image 
            WHERE listid = :listid AND accid = :accid", $data);

    } else {
        // Creating a new listing (first insert basic info, get listid)
        $insertData = [
            'accid' => $accid,
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'image' => '' // temporary blank, we'll update after image upload
        ];

        $db->query("INSERT INTO accommodation_listings (accid, name, description, price, image) 
            VALUES (:accid, :name, :description, :price, :image)", $insertData);

        $newListid = $db->lastInsertId();

        // Now handle the image
        $uploadDir = BASE_PATH . "/public/assets/hotel/listing/{$accid}/{$newListid}";
        $image = new Image($uploadDir);

        $imagePath = '';

        try {
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $uploaded = $image->upload($_FILES['image'], 'listing_');
                if ($uploaded) {
                    $basename = basename($uploaded);
                    $imagePath = "/assets/hotel/listing/{$accid}/{$newListid}/{$basename}";
                }
            }
        } catch (Exception $e) {
            $imagePath = '';
        }

        if ($imagePath) {
            // Update listing with image
            $db->query("UPDATE accommodation_listings SET image = :image WHERE listid = :listid", [
                'image' => $imagePath,
                'listid' => $newListid
            ]);
        }
    }

    header("Location: /listing");
    exit();
}

// Profile completeness check
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

// Render view
view('hotel/listing/listing.view.php', [
    'hotel' => $hotel,
    'hotelEmail' => $userEmail,
    'listings' => $listings,
    'profileComplete' => $profileComplete,
]);
