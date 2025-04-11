<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();

$userid=$user['userid'];

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

view("restaurant/notifications/index.view.php", [
'heading'=>'Notifications',
  'detail_fill_notifications'=>$detail_fill_notifications,
     'dailyoffers_expires'=>$dailyoffers_expires
     
     ]);
