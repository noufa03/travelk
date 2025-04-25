<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reviewID = $_POST['reviewid'];

    $db->query("DELETE FROM accommodation_reviews WHERE reviewid = :reviewid", ['reviewid' => $reviewID]);

    header("Location: /review_hotel");
    exit();
}

$reviewID = $_GET['reviewid'] ?? null;
$review = $db->query("SELECT * FROM accommodation_reviews WHERE reviewid = :id", ['id' => $reviewID])->find();

view('hotel/review/review.remove.view.php', ['review' => $review]);
