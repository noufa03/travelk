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
$operatingHoursFrom = date("h A", strtotime($operatingHoursFrom));



$operatingHoursTo=isset($operatingHours['operatingHoursTo'])?$operatingHours['operatingHoursTo']:'Not set yet';
$operatingHoursTo = date("h A", strtotime($operatingHoursTo));

//opening days
$operatingDays=$db->query('select "operatingdaysFrom","operatingdaysTo" from restaurant_details where "id"=:resID',[
'resID'=>$userid])->find();

$operatingDaysFrom=isset($operatingDays['operatingdaysFrom'])?$operatingDays['operatingdaysFrom']:NULL;
$operatingDaysTo=isset($operatingDays['operatingdaysTo'])?$operatingDays['operatingdaysTo']:NULL;

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
// dd($totalreviews);

$totalcuisinereviews=$db->query('select COUNT(*) as totalreviews from cuisine_review cr join cuisine c on c."cuisineID"=cr."cuisineID"  where c."resID"=:id',[

    'id'=>$userid
    ])->get();
$totalcuisinereviews=$totalcuisinereviews[0]['totalreviews'];

//store+cuiisne revieews
$totalreviews=$totalreviews+$totalcuisinereviews;
//ratings
$Average_store_ratings = $db->query('SELECT AVG(ratings) AS avg_store_rating FROM reviews WHERE "reviewee_type_id" = :id', [
    'id' => $userid
])->find();

$Average_cuisine_ratings = $db->query('SELECT AVG(cr.ratings) AS avg_cuisine_rating FROM cuisine_review cr join cuisine c on c."cuisineID"=cr."cuisineID" WHERE c."resID" = :id', [
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




$photos=$db->query('select photos from locations where "locationid"=:id',[
'id'=>$userid."01"

])->find();
$photos=isset($photos['photos'])?$photos['photos']:null;

$name=$db->query('select display_name from locations where "userid" = :id', [
    'id' => $userid
])->find();

$name=isset($name['display_name'])?$name['display_name']:null;






$reservations = $db->query('
    SELECT * 
    FROM tablereservations tb
    JOIN restaurant_table rt ON tb."tableid" = rt."tableid"
    JOIN travelers tr ON tb."traid" = tr."traid"
    
    WHERE rt."resID" = :id  AND tb."reservation_date" > NOW()
', [
    'id' => $userid
])->get();


// notifications
$notifications= $db->query('select * from notifications where "userid"=:id and is_read=:read',[
'id'=>$userid,
'read'=>'false'
]
)->get();



view("restaurant/dashboard/index.view.php", [
    'heading' => 'Dashboard',
    'totalMenus'=>$totalMenus,
    'userid'=>$userid,
    'operatingHoursFrom'=>$operatingHoursFrom,
    'operatingHoursTo'=>$operatingHoursTo,
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
  
    // 'confirmed_bookings'=>$confirmed_bookings
    'reservations'=>$reservations,
    'notifications'=>$notifications,
    'operatingDays'=>$operatingDays,
    'operatingDaysFrom'=>$operatingDaysFrom,
    'operatingDaysTo'=>$operatingDaysTo
]);