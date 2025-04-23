<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$cuisineReview = $db->query('select * from cuisine_review cr  join travelers t on cr."traid"=t."traid" left join cuisine c on c."cuisineID"=cr."cuisineID" where c."resID"=:id and cr."reviewid"=:rid ', [
    'rid' => $_GET['id'],

    'id' => $userid

])->find();

$heading = (isset($cuisineReview['reply']) && !empty($cuisineReview['reply'])) ? 'Edit Reply' : 'Reply';


view("restaurant/reviews/reviews.reply.cuisinereview.view.php", [
    'heading' => $heading,
    'cuisineReview' => $cuisineReview,
    'userid' => $userid
]);
