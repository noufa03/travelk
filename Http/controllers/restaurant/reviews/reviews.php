<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();
$userid=$user['userid'];


$reviews = $db->query('select * from restaurant_reviews where "userid" = :userID',[
'userID'=>$userid

])->get();

$totalreviews=$db->query('select COUNT(*) as totalreviews from restaurant_reviews where "userid"=:userID',[

    'userID'=>$userid
    ])->get();


 

view("restaurant/reviews/reviews.view.php", [
    'heading' => 'My reviews',
    'reviews' => $reviews,
    'totalreviews'=>$totalreviews,
   
    
]);
