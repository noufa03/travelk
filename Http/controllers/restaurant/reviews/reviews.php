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


 
//stars
$fivestar=$db->query('select COUNT(rating) as five_stars from restaurant_reviews  where "rating"=5')->find();
$fivestar=$fivestar['five_stars'];



$fourstar=$db->query('select COUNT(rating) as four_stars from restaurant_reviews  where "rating"=4')->find();
$fourstar=$fourstar['four_stars'];


$threestar=$db->query('select COUNT(rating) as three_stars from restaurant_reviews  where "rating"=3')->find();

$threestar=$threestar['three_stars'];

$twostar=$db->query('select COUNT(rating) as two_stars from restaurant_reviews  where "rating"=2')->find();

$twostar=$twostar['two_stars'];

$onestar=$db->query('select COUNT(rating) as one_stars from restaurant_reviews  where "rating"=1')->find();

$onestar=$onestar['one_stars'];
view("restaurant/reviews/reviews.view.php", [
    'heading' => 'My reviews',
    'reviews' => $reviews,
    'totalreviews'=>$totalreviews,
   
    
]);
