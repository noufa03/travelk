<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();
$userid=$user['userid'];

$dailyoffers = $db->query('select * from dailyoffers where "resID" = :resID',[
'resID'=>$userid

])->get();

$totaldailyoffers=$db->query('select COUNT(*) as totaloffers from dailyoffers where "resID"=:resID',[

    'resID'=>$userid
    ])->get();
$totaldailyoffers=$totaldailyoffers[0]['totaloffers'];

view("restaurant/offers/offers.view.php", [
    'heading' => 'My Offers',
    'dailyoffers' => $dailyoffers,
    'totaldailyoffers'=>$totaldailyoffers,
    'userid'=>$userid
]);