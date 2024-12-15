<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$resid=23;
//hardcording resID=23
$totalMenus = $db->query('SELECT COUNT(*) as total FROM cuisine WHERE resID=:resID',[
'resID'=>$resid
])->get();
$totalMenus=$totalMenus[0]['total'];

$operatingHours=$db->query('select operatingHours from restaurants where resID=:resID',[
'resID'=>$resid])->get();
$operatingHours=$operatingHours[0]['operatingHours'];

$specailOffers=$db->query('select specialOffers from restaurants where resID=:resID',[
'resID'=>$resid
])->get();


$specailOffers=$specailOffers[0]['specialOffers'];

$dailyoffers=$db->query('select offer_title,offer_description from dailyoffers where resID=:resID',[

'resID'=>$resid
])->get();

$totaldailyoffers=$db->query('select COUNT(*) as totaloffers from dailyoffers where resID=:resID',[

    'resID'=>$resid
    ])->get();
$totaldailyoffers=$totaldailyoffers[0]['totaloffers'];
//reviews
$userid=14;


$totalreviews=$db->query('select COUNT(*) as totalreviews from restaurant_reviews where userID=:userID',[

    'userID'=>$userid
    ])->get();

$totalreviews=$totalreviews[0]['totalreviews'];

//stars
$fivestar=$db->query("select COUNT(rating) as five_stars from restaurant_reviews  where rating=5")->get();
$fivestar=$fivestar[0]['five_stars'];


$fourstar=$db->query("select COUNT(rating) as four_stars from restaurant_reviews  where rating=4")->get();
$fourstar=$fourstar[0]['four_stars'];


$threestar=$db->query("select COUNT(rating) as three_stars from restaurant_reviews  where rating=3")->get();

$threestar=$threestar[0]['three_stars'];

$twostar=$db->query("select COUNT(rating) as two_stars from restaurant_reviews  where rating=2")->get();

$twostar=$twostar[0]['two_stars'];

$onestar=$db->query("select COUNT(rating) as one_stars from restaurant_reviews  where rating=1")->get();

$onestar=$onestar[0]['one_stars'];

$totalnoofratings=$db->query("select COUNT(rating) as totalrates from restaurant_reviews")->get();
$totalnoofratings=$totalnoofratings[0]['totalrates'];
view("restaurant/dashboard/index.view.php", [
    'heading' => 'My Dashboard',
    'totalMenus'=>$totalMenus,
    'resid'=>$resid,
    'operatingHours'=>$operatingHours,
    'specialOffers'=>$specailOffers,
    'dailyoffers'=>$dailyoffers,
    'totaldailyoffers'=>$totaldailyoffers,
    'totalreviews'=>$totalreviews,
    'reviews'=>$reviews,
    'fivestar'=>$fivestar,
    'fourstar'=>$fourstar,
    'threestar'=>$threestar,
    'twostar'=>$twostar,
    'onestar'=>$onestar,
    'totalnoofratings'=>$totalnoofratings
    
]);