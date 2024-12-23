<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();

$userid=$user['userid'];

//hardcording resID=23
$totalMenus = $db->query('SELECT COUNT(*) as total FROM cuisine WHERE "resID"=:resID',[
'resID'=>$userid
])->get();
$totalMenus=$totalMenus[0]['total'];

$operatingHours=$db->query('select "operatingHours" from restaurants where "resID"=:resID',[
'resID'=>$userid])->get();

$operatingHours=$operatingHours[0]['operatingHours'];

$specailOffers=$db->query('select "specialOffers" from restaurants where "resID"=:resID',[
'resID'=>$userid
])->get();


$specailOffers=$specailOffers[0]['specialOffers'];

$dailyoffers=$db->query('select "offer_title","offer_description" from dailyoffers where "resID"=:resID',[

'resID'=>$userid
])->get();

$totaldailyoffers=$db->query('select COUNT(*) as totaloffers from dailyoffers where "resID"=:resID',[

    'resID'=>$userid
    ])->get();
$totaldailyoffers=$totaldailyoffers[0]['totaloffers'];
//reviews



$totalreviews=$db->query('select COUNT(*) as totalreviews from restaurant_reviews where "userid"=:userID',[

    'userID'=>$userid
    ])->get();

$totalreviews=$totalreviews[0]['totalreviews'];

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

$totalnoofratings=$db->query('select COUNT(rating) as totalrates from restaurant_reviews where userid=:userid',[
'userid'=>$userid

])->find();
$totalnoofratings=$totalnoofratings['totalrates'];


$totalTables=$db->query('select COUNT(*) as totaltables from restaurant_table where "resID"=:userid',[
    'userid'=>$userid
])->find();
$totalTables=$totalTables['totaltables'];

view("restaurant/dashboard/index.view.php", [
    'heading' => 'My Dashboard',
    'totalMenus'=>$totalMenus,
    'userid'=>$userid,
    'operatingHours'=>$operatingHours,
    'specialOffers'=>$specailOffers,
    'dailyoffers'=>$dailyoffers,
    'totaldailyoffers'=>$totaldailyoffers,
    'totalreviews'=>$totalreviews,
   
    'fivestar'=>$fivestar,
    'fourstar'=>$fourstar,
    'threestar'=>$threestar,
    'twostar'=>$twostar,
    'onestar'=>$onestar,
    'totalnoofratings'=>$totalnoofratings,
    'totalTables'=>$totalTables
    
]);