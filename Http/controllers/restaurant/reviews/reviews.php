<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$reviews = $db->query(' SELECT * 
    FROM  reviews r
    JOIN travelers t ON r."traid" = t."traid"
  
    
    WHERE r."reviewee_type_id" = :id ', [

    'id' => $userid

])->get();


$cuisineReviews = $db->query('select * from cuisine_review cr  join travelers t on cr."traid"=t."traid" left join cuisine c on c."cuisineID"=cr."cuisineID" where c."resID"=:id ', [
    'id' => $userid

])->get();


$FlaggedReviews = $db->query('select * from cuisine_review cr  join travelers t on cr."traid"=t."traid" left join cuisine c on c."cuisineID"=cr."cuisineID" where c."resID"=:id and cr."status"=:status ', [
    'id' => $userid,
    'status' => "flagged"

])->get();


$FlaggedStoreReviews = $db->query('select * from reviews r  join travelers t on r."traid"=t."traid"  where r."reviewee_type_id"=:id and r."status"=:status ', [
    'id' => $userid,
    'status' => "flagged"

])->get();



view("restaurant/reviews/reviews.view.php", [
    'heading' => 'My reviews',
    'reviews' => $reviews,
    'cuisineReviews' => $cuisineReviews,
    'FlaggedReviews' => $FlaggedReviews,
    'FlaggedStoreReviews' => $FlaggedStoreReviews
]);
