<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$userid=14;
$reviews = $db->query('select * from restaurant_reviews where userID = :userID',[
'userID'=>$userid

])->get();

$totalreviews=$db->query('select COUNT(*) as totalreviews from restaurant_reviews where userID=:userID',[

    'userID'=>$userid
    ])->get();


 

view("restaurant/reviews/reviews.view.php", [
    'heading' => 'My reviews',
    'reviews' => $reviews,
    'totalreviews'=>$totalreviews,
   
    
]);
