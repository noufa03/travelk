<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$userEmail = $_SESSION['user']['email'];

$userID = $db->query("SELECT userid FROM users WHERE email = :userEmail", ['userEmail' => $userEmail])->find();

$hotel = null;
$profileComplete = false;

if ($userID) {
    $hotel = $db->query("SELECT * FROM accommodation WHERE accid = :userID", ['userID' => $userID['userid']])->find();

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
    }
}

view('hotel/dashboard/index.view.php', [
    'hotel' => $profileComplete ? $hotel : null,
    'hotelEmail' => $userEmail,
    'profileComplete' => $profileComplete
]);
