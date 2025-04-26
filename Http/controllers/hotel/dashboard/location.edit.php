<?php

use Core\App;
use Core\Database;
use Core\Image;

$db = App::resolve(Database::class);
$userEmail = $_SESSION['user']['email'];

// Get user ID and hotel ID
$userID = $db->query("SELECT userid FROM users WHERE email = :userEmail", ['userEmail' => $userEmail])->find();
if (!$userID) die("User not found");

$userid = $userID['userid'];
$hotel = $db->query("SELECT * FROM accommodation WHERE accid = :userid", ['userid' => $userid])->find();
if (!$hotel) die("Hotel not found");

$accid = $hotel['accid'];

// Get districts
$districts = $db->query("
    SELECT DISTINCT d.districtid, d.district
    FROM locations l
    JOIN districts d ON l.districtid = d.districtid
")->get();

// Initialize location variable
$location = [];

// Editing: fetch location if ID is provided
if (isset($_GET['id'])) {
    $location = $db->query("SELECT * FROM locations WHERE locationid = :id AND userid = :userid", [
        'id' => $_GET['id'],
        'userid' => $userid
    ])->find();

    if (!$location) die("Location not found or access denied.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = BASE_PATH . "/public/assets/hotel/location/{$accid}";
    $image = new Image($uploadDir);

    $photoDirectory = $location['photos'] ?? ''; // Default to existing if editing
    try {
        if (isset($_FILES['photos']) && $_FILES['photos']['error'] === 0) {
            $uploaded = $image->upload($_FILES['photos'], 'loc_');
            if ($uploaded) {
                $photoDirectory = '/assets/hotel/location/' . $accid;
            }
        }
    } catch (Exception $e) {
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

    if (isset($_POST['locationid'])) {
        // Update
        $data['locationid'] = $_POST['locationid'];
        $updateQuery = "UPDATE locations SET
            name = :name, display_name = :display_name, street_address = :street_address,
            city = :city, google_map_link = :google_map_link, districtid = :districtid,
            photos = :photos, hot_line = :hot_line, latitude = :latitude, longitude = :longitude
            WHERE locationid = :locationid AND userid = :userid";

        $db->query($updateQuery, $data);
    } else {
        // Insert
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

// Render view
view('hotel/dashboard/location.edit.view.php', [
    'districts' => $districts,
    'hotelEmail' => $userEmail,
    'location' => $location
]);
