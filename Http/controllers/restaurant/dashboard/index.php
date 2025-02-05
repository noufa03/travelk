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

$operatingHours=$db->query('select "operatingHoursFrom","operatingHoursTo" from restaurant_details where "id"=:resID',[
'resID'=>$userid])->get();

$operatingHoursFrom=isset($operatingHours[0]['operatingHoursFrom'])?$operatingHours[0]['operatingHoursFrom']:'Not set Yet' ;

$operatingHoursTo=isset($operatingHours[0]['operatingHoursTo'])?$operatingHours[0]['operatingHoursTo']:'Not set yet';
$operatingHours = isset($operatingHoursFrom) && isset($operatingHoursTo) 
    ? $operatingHoursFrom . '-' . $operatingHoursTo 
    : 'Not set yet';



$specailOffers=$db->query('select COUNT(*) as offers from dailyoffers where "resID"=:resID',[
'resID'=>$userid
])->get();


$specailOffers=$specailOffers[0]['offers'];

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

$location=$db->query('select "google_map_link" as location from locations where "locationid"=:userid',[
    'userid'=>$userid
])->find();


$location=isset($location['location'])?$location['location']:'Not Set Yet';

$srilanka='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2023603.439953353!2d79.38415628281706!3d7.8583418941754175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2593cf65a1e9d%3A0xe13da4b400e2d38c!2sSri%20Lanka!5e0!3m2!1sen!2slk!4v1735185881605!5m2!1sen!2slk';
$src = isset($location) && !empty($location) ? htmlspecialchars($location) : htmlspecialchars($srilanka);

$detailsID=$db->query('select id from restaurant_details where "id"=:userid',[

  'userid'=>$userid
])->find();
$detailsID=isset($detailsID['id'])?$detailsID['id']:'Not set yet';

$pageis='dashboard';

$logo = $db->query('select logo from restaurant_details where "id" = :id', [
    'id' => $userid
])->find();

$logo=isset($logo['logo'])?$logo['logo']:null;

$photos=$db->query('select photos from locations where "locationid"=:id',[
'id'=>$userid."01"

])->find();
$photos=isset($photos['photos'])?$photos['photos']:null;

$name=$db->query('select display_name from locations where "locationid" = :id', [
    'id' => $userid."01"
])->find();

$name=isset($name['display_name'])?$name['display_name']:null;

$No_of_notifications=12;

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
    'totalTables'=>$totalTables,
   'src'=>$src,
   'location'=>$location,
    'detailsID'=>$detailsID,
    'pageis'=>$pageis,
    'logo'=>$logo,
    'photos'=>$photos,
    'name'=>$name,
    '$No_of_notifications'=>$No_of_notifications
]);