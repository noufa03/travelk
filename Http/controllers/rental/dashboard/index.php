<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();

$userid=$user['userid'];

$totalreviews = $db->query(
    'SELECT COUNT(*) AS totalreviews FROM reviews WHERE reviewee_type_id = :id', 
    ['id' => $userid]
)->find();

$totalreviews=$totalreviews['totalreviews'];

$reviews = $db->query(
    'SELECT * FROM reviews r  
     JOIN travelers t ON r.traid = t.traid   
     WHERE r.reviewee_type_id = :id 
     ORDER BY r.reviewid DESC 
     LIMIT 2', 
    ['id' => $userid]
)->get();




$totaltrips = $db->query(
    'SELECT COUNT(*) AS totaltrips FROM vehiclebooking WHERE driverid = :id', 
    ['id' => $userid]
)->find();

$ratings = $db->query('
    SELECT driverid, CAST(AVG(rating) AS DECIMAL(10,2)) AS average_rating
    FROM vehiclebooking
    WHERE driverid = :id
    GROUP BY driverid;
', [
    'id' => $userid
])->find();
$name=$db->query('select first_name,last_name from drivers where "driverid"=:id',[
'id'=>$userid
])->find();



//pending 
$notifications=$db->query('select * from vehiclebooking where "driverid"=:id and "pickupdate" >=NOW() and "confirmation_of_driver"=:confirm' ,[
'id'=>$userid,
'confirm'=>'false'
])->get();

$confirmed_bookings=$db->query('select * from vehiclebooking where "driverid"=:id and "pickupdate" >=NOW() and "confirmation_of_driver"=:confirm' ,[
'id'=>$userid,
'confirm'=>'true'
])->get();

//past bookings
$past_bookings=$db->query('SELECT * FROM vehiclebooking WHERE "driverid"= :id and "pickupdate" < NOW()',[
'id'=>$userid,



])->get();

$add_details=$db->query('select * from driver_details where "id"=:id',[
'id'=>$userid

])->find();
$detailsID=$add_details['id'];

$count_add_details=isset($add_details)?1:0;

$ratings=isset($ratings['average_rating'])?$ratings['average_rating']:NULL;



$totaltrips=$totaltrips['totaltrips'];
// trip cancellation
$today = date('Y-m-d');

          
$upcomingrides=$db->query('select * from vehiclebooking where   "driverid"=:id and "pickupdate" > :today',[

'today'=>$today,
'id'=>$userid
])->get();          





          
$acceptanceRate=$db->query('select count(*)  as accepttrips from vehiclebooking where "confirmation_of_driver"=:confirm and  "driverid"=:id and "pickupdate" < :today',[
'confirm'=>'true',
'today'=>$today,
'id'=>$userid
])->find();          
$acceptanceRate = $acceptanceRate['accepttrips'];
$acceptanceRate=$acceptanceRate/$totaltrips;

view("rental/dashboard/index.view.php",[
    'heading' => 'Driver Dashboard',
    'userid'=>$userid,
    'totaltrips'=>$totaltrips,
    'ratings'=>$ratings,
    'name'=>$name,
    'notifications'=>$notifications,
    'confirmed_bookings'=>$confirmed_bookings,
    'past_bookings'=>$past_bookings,
    'add_details'=>$add_details,
    'count_add_details'=>$count_add_details,
    'detailsID'=>$detailsID,
    'upcomingrides'=>$upcomingrides,
    'acceptanceRate'=>$acceptanceRate,
    'totalreviews'=>$totalreviews,
    'reviews' => $reviews,
    
]);