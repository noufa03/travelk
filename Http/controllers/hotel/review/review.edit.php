<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

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

view('hotel/review/review.edit.view.php', ['review' => $review]);
