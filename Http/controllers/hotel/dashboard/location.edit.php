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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = BASE_PATH . "public/assets/hotel/location/{$accid}";
    $image = new Image($uploadDir);

    $photoFilename = json_encode([]);
    try {
        if (isset($_FILES['photos'])) {
            $uploaded = $image->upload($_FILES['photos'], 'loc_');
            if ($uploaded) {
                $photoFilename = json_encode([$uploaded]);
            }
        }
    } catch (Exception $e) {
        // Optional: log error or show a flash message
        $photoFilename = json_encode([]);
    }
    //converting empty values of latitude and longitude to null
    $latitude = trim($_POST['latitude']) !== '' ? $_POST['latitude'] : null;
    $longitude = trim($_POST['longitude']) !== '' ? $_POST['longitude'] : null;

    $data = [
        'name' => $_POST['name'],
        'display_name' => $_POST['display_name'],
        'street_address' => $_POST['street_address'],
        'city' => $_POST['city'],
        'google_map_link' => $_POST['google_map_link'],
        'districtid' => $_POST['districtid'],
        'photos' => $photoFilename,
        'hot_line' => $_POST['hot_line'],
        'userid' => $userid,
        'latitude' => $latitude,
        'longitude' => $longitude,
    ];

    $insertQuery = "INSERT INTO locations (
        location_type, name, display_name, street_address, city, google_map_link,
        districtid, photos, hot_line, userid, latitude, longitude
    ) VALUES (
        'accommodation', :name, :display_name, :street_address, :city, :google_map_link,
        :districtid, :photos, :hot_line, :userid, :latitude, :longitude
    )";

    $db->query($insertQuery, $data);

    header("Location: /dashboard_hotel");
    exit();
}


view('hotel/dashboard/location.edit.view.php', [
    'districts' => $districts,
    'hotelEmail' => $userEmail
]);
