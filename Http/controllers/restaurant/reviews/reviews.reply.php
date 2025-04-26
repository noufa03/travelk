<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];
//getting the review from the travler
$review = $db->query(' SELECT * 
    FROM  reviews r
    JOIN travelers t ON r."traid" = t."traid"
    WHERE r."reviewee_type_id" = :id and r."reviewid"=:rid ', [

    'id' => $userid,
    'rid' => $_GET['id']

])->find();

$heading = (isset($review['reply']) && !empty($review['reply'])) ? 'Edit Reply' : 'Reply';

view("restaurant/reviews/reviews.reply.view.php", [
    'heading' => $heading,
    'review' => $review,
    'userid' => $userid
]);
