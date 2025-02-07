<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();

$userid=$user['userid'];


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

$notifications=$db->query('select * from vehiclebooking where "driverid"=:id and "pickupdate" >=NOW() and "confirmation_of_driver"=:confirm' ,[
'id'=>$userid,
'confirm'=>'false'
])->get();

$confirmed_bookings=$db->query('select * from vehiclebooking where "driverid"=:id and "pickupdate" >=NOW() and "confirmation_of_driver"=:confirm' ,[
'id'=>$userid,
'confirm'=>'true'
])->get();

$ratings=$ratings['average_rating'];
$totaltrips=$totaltrips['totaltrips'];
view("rental/dashboard/index.view.php",[
    'heading' => 'Driver Dashboard',
    'userid'=>$userid,
    'totaltrips'=>$totaltrips,
    'ratings'=>$ratings,
    'name'=>$name,
    'notifications'=>$notifications,
    'confirmed_bookings'=>$confirmed_bookings
]);