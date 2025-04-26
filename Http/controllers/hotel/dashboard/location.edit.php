<?php

use Core\App;
use Core\Database;
use Core\Image;

$db = App::resolve(Database::class);
$userEmail = $_SESSION['user']['email'];

// Get user ID
$userRecord = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $userEmail
])->find();

if (!$userRecord) {
    die("User not found");
}

$userid = $userRecord['userid'];

// Get hotel info
$hotel = null;
$profileComplete = false;
$locationComplete = false;
if ($userid) {
    $hotel = $db->query("SELECT * FROM accommodation WHERE accid = :userID", ['userID' => $userid])->find();

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

        $location = $db->query("SELECT * FROM locations WHERE userid = :accid", ['accid' => $userid ])->find();
        $locationComplete = $location ? true : false;
    }
}

$accid = $hotel['accid'];

// Get all districts
$districts = $db->query("SELECT districtid, district FROM districts")->get();

// Initialize location variable
$location = [];

// Check for existing location for the current user
$existingLocation = $db->query("SELECT * FROM locations WHERE userid = :userid AND location_type = 'accommodation'", [
    'userid' => $userid
])->find();

if ($existingLocation) {
    $location = $existingLocation;
}

// If a specific location ID is passed (for edit), override
if (isset($_GET['id'])) {
    $selectedLocation = $db->query("SELECT * FROM locations WHERE locationid = :id AND userid = :userid", [
        'id' => $_GET['id'],
        'userid' => $userid
    ])->find();

    if ($selectedLocation) {
        $location = $selectedLocation;
    } else {
        die("Location not found or access denied.");
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = BASE_PATH . "/public/assets/hotel/location/{$accid}";
    $image = new Image($uploadDir);

    $photoDirectory = $location['photos'] ?? '';

    try {
        if (isset($_FILES['photos']) && $_FILES['photos']['error'] === 0) {
            $uploaded = $image->upload($_FILES['photos'], 'loc_');
            if ($uploaded) {
                $photoDirectory = '/assets/hotel/location/' . $accid;
            }
        }
    } catch (Exception $e) {
        // fallback to old photo
        $photoDirectory = $location['photos'] ?? '';
    }

    $latitude = trim($_POST['latitude']) !== '' ? $_POST['latitude'] : null;
    $longitude = trim($_POST['longitude']) !== '' ? $_POST['longitude'] : null;

    $data = [
        'name' => $_POST['name'],
        'display_name' => $_POST['display_name'],
        'street_address' => $_POST['street_address'],
        'city' => $_POST['city'],
        'google_map_link' => $_POST['google_map_link'],
        'districtid' => $_POST['districtid'],
        'photos' => $photoDirectory,
        'hot_line' => $_POST['hot_line'],
        'latitude' => $latitude,
        'longitude' => $longitude,
        'userid' => $userid
    ];

    if (!empty($_POST['locationid'])) {
        // Update existing location
        $data['locationid'] = $_POST['locationid'];
        $updateQuery = "UPDATE locations SET
            name = :name, display_name = :display_name, street_address = :street_address,
            city = :city, google_map_link = :google_map_link, districtid = :districtid,
            photos = :photos, hot_line = :hot_line, latitude = :latitude, longitude = :longitude
            WHERE locationid = :locationid AND userid = :userid";

        $db->query($updateQuery, $data);
    } else {
        // Insert new location
        $insertQuery = "INSERT INTO locations (
            location_type, name, display_name, street_address, city, google_map_link,
            districtid, photos, hot_line, userid, latitude, longitude
        ) VALUES (
            'accommodation', :name, :display_name, :street_address, :city, :google_map_link,
            :districtid, :photos, :hot_line, :userid, :latitude, :longitude
        )";

        $db->query($insertQuery, $data);
    }

    header("Location: /dashboard_hotel");
    exit();
}

// Render the form
view('hotel/dashboard/location.edit.view.php', [
    'hotel' => $hotel,
    'districts' => $districts,
    'hotelEmail' => $userEmail,
    'location' => $location,
    'profileComplete' => $profileComplete
]);
