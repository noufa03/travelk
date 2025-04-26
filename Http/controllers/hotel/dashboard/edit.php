<?php

use Core\App;
use Core\Database;
use Core\Image;

$db = App::resolve(Database::class);
$userEmail = $_SESSION['user']['email'];

// Fetch user ID
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

$accID = $hotel['accid'];

// Available amenities
$availableAmenities = ['Wi-Fi', 'Pool', 'Gym', 'Parking', 'Restaurant', 'Spa', 'Bar', 'Pet-friendly', 'Airport Shuttle', 'Laundry Service'];

// Parse selected amenities (convert the saved comma string into an array)
$selectedAmenities = [];
if (!empty($hotel['amenities'])) {
    $selectedAmenities = array_map('trim', explode(',', $hotel['amenities']));
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle amenities from checkboxes
    $amenities = '';
    if (isset($_POST['amenities_list']) && is_array($_POST['amenities_list'])) {
        $amenities = implode(', ', $_POST['amenities_list']);
    }

    // Form data with default logo value
    $data = [
        'star_rating' => $_POST['star_rating'],
        'no_rooms' => $_POST['no_rooms'],
        'amenities' => $amenities,
        'payment_credit' => isset($_POST['payment_credit']) ? 1 : 0,
        'payment_debit' => isset($_POST['payment_debit']) ? 1 : 0,
        'payment_cash' => isset($_POST['payment_cash']) ? 1 : 0,
        'checkin' => $_POST['checkin'],
        'checkout' => $_POST['checkout'],
        'business_reg_num' => $_POST['business_reg_num'],
        'licensing_info' => $_POST['licensing_info'],
        'owner_name' => $_POST['owner_name'],
        'owner_contact' => $_POST['owner_contact'],
        'booking_confirmation' => isset($_POST['booking_confirmation']) ? 1 : 0,
        'logo' => $hotel['logo'] // Default to existing logo
    ];

    // Handle logo upload if new file was provided
    if (!empty($_FILES['logo']['name'])) {
        $uploadDir = BASE_PATH . '/public/assets/hotel/logo/';
        $imageUploader = new Image($uploadDir);
        
        try {
            $uploadedLogo = $imageUploader->upload($_FILES['logo'], 'logo_');
            if ($uploadedLogo) {
                // Store just the filename (not full path)
                $data['logo'] = basename($uploadedLogo);
            }
        } catch (Exception $e) {
            // Optionally store error message
            $_SESSION['upload_error'] = $e->getMessage();
        }
    }

    // Update database
    $updateQuery = "UPDATE accommodation SET 
        star_rating = :star_rating,
        no_rooms = :no_rooms,
        amenities = :amenities,
        payment_credit = :payment_credit,
        payment_debit = :payment_debit,
        payment_cash = :payment_cash,
        checkin = :checkin,
        checkout = :checkout,
        logo = :logo,
        business_reg_num = :business_reg_num,
        licensing_info = :licensing_info,
        owner_name = :owner_name,
        owner_contact = :owner_contact,
        booking_confirmation = :booking_confirmation
        WHERE accid = :accID";

    $db->query($updateQuery, array_merge($data, ['accID' => $accID]));

    header("Location: /dashboard_hotel");
    exit();
}

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

view('hotel/dashboard/edit.view.php', [
    'hotel' => $hotel,
    'hotelEmail' => $userEmail,
    'availableAmenities' => $availableAmenities,
    'selectedAmenities' => $selectedAmenities,
    'profileComplete' => $profileComplete
]);
