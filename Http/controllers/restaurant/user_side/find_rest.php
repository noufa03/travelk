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


 

view("restaurant/user_side/find_rest.view.php", [
    'heading' => 'Find your perfect restaurant',
    'reviews' => $reviews,
    'totalreviews'=>$totalreviews,
   
    
]);
