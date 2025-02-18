<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();

$userid=$user['userid'];
// dd(urlIs('/dashboard_rest'));
//hardcording resID=23
$totalMenus = $db->query('SELECT COUNT(*) as total FROM cuisine WHERE "resID"=:resID',[
'resID'=>$userid
])->get();
$totalMenus=$totalMenus[0]['total'];

$operatingHours=$db->query('select "operatingHoursFrom","operatingHoursTo" from restaurant_details where "id"=:resID',[
'resID'=>$userid])->find();

$operatingHoursFrom=isset($operatingHours['operatingHoursFrom'])?$operatingHours['operatingHoursFrom']:'Not set Yet' ;

$operatingHoursTo=isset($operatingHours['operatingHoursTo'])?$operatingHours['operatingHoursTo']:'Not set yet';




$specailOffers=$db->query('select COUNT(*) as offers from dailyoffers where "resID"=:resID',[
'resID'=>$userid
])->get();


$specailOffers=$specailOffers[0]['offers'];

$dailyoffers=$db->query('select * from dailyoffers where "resID"=:resID',[

'resID'=>$userid
])->get();

$totaldailyoffers=$db->query('select COUNT(*) as totaloffers from dailyoffers where "resID"=:resID',[

    'resID'=>$userid
    ])->get();
$totaldailyoffers=$totaldailyoffers[0]['totaloffers'];
//reviews



$totalreviews=$db->query('select COUNT(*) as totalreviews from reviews where reviewee_type_id=:id',[

    'id'=>$userid
    ])->get();



$totalreviews=$totalreviews[0]['totalreviews'];

$totalcuisinereviews=$db->query('select COUNT(*) as totalreviews from cuisine where "resID"=:id',[

    'id'=>$userid
    ])->get();
$totalcuisinereviews=$totalcuisinereviews[0]['totalreviews'];

//store+cuiisne revieews
$totalreviews=$totalreviews+$totalcuisinereviews;
//ratings
$Average_store_ratings = $db->query('SELECT AVG(ratings) AS avg_store_rating FROM reviews WHERE "reviewee_type_id" = :id', [
    'id' => $userid
])->find();

$Average_cuisine_ratings = $db->query('SELECT AVG(ratings) AS avg_cuisine_rating FROM cuisine WHERE "resID" = :id', [
    'id' => $userid
])->find();


$storeRating = $Average_store_ratings['avg_store_rating'] ?? 0;
$cuisineRating = $Average_cuisine_ratings['avg_cuisine_rating'] ?? 0;


$Averageratings = ($storeRating + $cuisineRating) / 2;



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
$detailsID=isset($detailsID['id'])?$detailsID['id']:null;

$pageis='dashboard';

$logo = $db->query('select logo from restaurant_details where "id" = :id', [
    'id' => $userid
])->find();

$logo=isset($logo['logo'])?$logo['logo']:null;

$profile = $db->query('select profile from restaurant_details where "id" = :id', [
    'id' => $userid
])->find();

$profile=isset($profile)?$profile['profile']:'';


$photos=$db->query('select photos from locations where "locationid"=:id',[
'id'=>$userid."01"

])->find();
$photos=isset($photos['photos'])?$photos['photos']:null;

$name=$db->query('select display_name from locations where "userid" = :id', [
    'id' => $userid
])->find();

$name=isset($name['display_name'])?$name['display_name']:null;

$detail_fill_notifications=$db->query('select * from restaurant_details where "id"=:id' ,[
'id'=>$userid,

])->get();


$currentTime = date('Y-m-d H:i:s'); // Get current time in MySQL-compatible format

$dailyoffers_expires = $db->query(
    'SELECT * FROM dailyoffers WHERE "end_time" < :current_time AND "resID" = :id',
    [
        'current_time' => $currentTime,
        'id' => $userid
    ]
)->get();


$reservations = $db->query('
    SELECT * 
    FROM tablereservations tb
    JOIN restaurant_table rt ON tb."tableid" = rt."tableid"
    JOIN travelers tr ON tb."traid" = tr."traid"
    
    WHERE rt."resID" = :id 
', [
    'id' => $userid
])->get();


view("restaurant/dashboard/index.view.php", [
    'heading' => 'Dashboard',
    'totalMenus'=>$totalMenus,
    'userid'=>$userid,
    'operatingHours'=>$operatingHours,
    'specialOffers'=>$specailOffers,
    'dailyoffers'=>$dailyoffers,
    'totaldailyoffers'=>$totaldailyoffers,
    'totalreviews'=>$totalreviews,
   'profile'=>$profile,
    
    'Averageratings'=>$Averageratings,
    'totalTables'=>$totalTables,
   'src'=>$src,
   'location'=>$location,
    'detailsID'=>$detailsID,
    'pageis'=>$pageis,
    'logo'=>$logo,
    'photos'=>$photos,
    'name'=>$name,
     'detail_fill_notifications'=>$detail_fill_notifications,
     'dailyoffers_expires'=>$dailyoffers_expires,
    // 'confirmed_bookings'=>$confirmed_bookings
    'reservations'=>$reservations
]);