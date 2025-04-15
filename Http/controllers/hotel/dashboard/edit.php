<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$userEmail = $_SESSION['user']['email'];

// Fetch user ID
$userID = $db->query("SELECT userid FROM users WHERE email = :userEmail", ['userEmail' => $userEmail])->find();

// Handle "user ID not found!"
if (!$userID) {
    $user = null;
} else {
    $user = $db->query("SELECT * FROM accommodation WHERE accid = :userID", ['userID' => $userID['userid']])->find();
}

// If user details are missing, redirect to the dashboard
if (!$user) {
    header("Location: /dashboard_hotel");
    exit();
}

$accID = $user['accid']; // Store accid for update

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form data
    $data = [
        'star_rating' => $_POST['star_rating'],
        'no_rooms' => $_POST['no_rooms'],
        'amenities' => $_POST['amenities'],
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
        'logo' => $user['logo'] // Default to existing logo
    ];

    // Handle logo upload
    if (!empty($_FILES['logo']['name'])) {
        $uploadDir = 'assets/uploads/';
        $uploadFile = $uploadDir . basename($_FILES['logo']['name']);

        if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadFile)) {
            $data['logo'] = $_FILES['logo']['name']; // Update logo if uploaded
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

    // Redirect to dashboard after update
    header("Location: /dashboard_hotel");
    exit();
}

// Load view
view('hotel/dashboard/edit.view.php', [
    'hotel' => $user
]);
