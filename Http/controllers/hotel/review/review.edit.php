<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$userEmail = $_SESSION['user']['email'];
$userID = $db->query("SELECT * FROM users WHERE email = :userEmail", ['userEmail' => $userEmail])->find();
$hotel = $db->query("SELECT * FROM accommodation WHERE accid = :id", ['id' => $userID['userid']])->find();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reviewID = $_POST['reviewid'];
    $reply = $_POST['reply'] ?? '';
    $status = $_POST['status'];

    $db->query("UPDATE accommodation_reviews SET reply = :reply, status = :status, updated_at = CURRENT_TIMESTAMP WHERE reviewid = :reviewID", [
        'reply' => $reply,
        'status' => $status,
        'reviewID' => $reviewID
    ]);

    header("Location: /review_hotel");
    exit();
}

$reviewID = $_GET['reviewid'] ?? null;
$review = $db->query("SELECT * FROM accommodation_reviews WHERE reviewid = :id", ['id' => $reviewID])->find();

//profile complete status
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

view('hotel/review/review.edit.view.php', [
    'hotel'=> $hotel,
    'hotelEmail' => $userEmail,
    'review' => $review,
    'profileComplete' => $profileComplete
]);
