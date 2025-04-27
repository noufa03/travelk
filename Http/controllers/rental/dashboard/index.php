<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];


$totalreviews = $db->query(
    'SELECT COUNT(*) AS totalreviews FROM reviews WHERE reviewee_type_id = :id',
    ['id' => $userid]
)->find();
$totalreviews = $totalreviews['totalreviews'];


$totaltrips = $db->query(
    'SELECT COUNT(*) AS totaltrips FROM vehiclebooking WHERE carid = :id',
    ['id' => $userid]
)->find();


$ratings = $db->query('
    SELECT carid, CAST(AVG(rating) AS DECIMAL(10,2)) AS average_rating
    FROM vehiclebooking
    WHERE carid = :id
    GROUP BY carid;
', [
    'id' => $userid
])->find();


$name = $db->query('select first_name,last_name from vehicle_owner where "userid"=:id', [
    'id' => $userid
])->find();

$notifications = $db->query('select * from notifications where "userid"=:id and  "is_read"=:read', [
    'id' => $userid,
   
    'read'=>'false'
])->get();



$past_bookings = $db->query('SELECT * FROM vehiclebooking WHERE "carid"= :id and "pickupdate" < NOW()', [
    'id' => $userid,
])->get();

$add_details = $db->query('select * from vehicle_details where "id"=:id', [
    'id' => $userid

])->find();

$detailsID = isset($add_details['id']) ? $add_details['id'] : NULL;



$ratings = isset($ratings['average_rating']) ? $ratings['average_rating'] : NULL;

$totaltrips = $totaltrips['totaltrips'];

$today = date('Y-m-d');
$upcomingrides = $db->query('select * from vehiclebooking where   "carid"=:id and "pickupdate" > :today', [

    'today' => $today,
    'id' => $userid
])->get();

$acceptanceRate = $db->query('select count(*)  as accepttrips from vehiclebooking where "confirmation_of_driver"=:confirm and  "carid"=:id and "pickupdate" < :today', [
    'confirm' => 'true',
    'today' => $today,
    'id' => $userid
])->find();

$acceptanceRate = $acceptanceRate['accepttrips'];

$acceptanceRate = (isset($acceptanceRate) && isset($totaltrips) && $totaltrips != 0)
    ? ($acceptanceRate / $totaltrips)
    : 0;


$profile = isset($add_details['profile_picture']) ? $add_details['profile_picture'] : 'no';
// dd($profile);
view("rental/dashboard/index.view.php", [
    'heading' => 'Rental Dashboard',
    'userid' => $userid,
    'totaltrips' => $totaltrips,
    'ratings' => $ratings,
    'name' => $name,
    'notifications' => $notifications,

    'past_bookings' => $past_bookings,
    'add_details' => $add_details,

    'detailsID' => $detailsID,
    'upcomingrides' => $upcomingrides,
    'acceptanceRate' => $acceptanceRate,
    'totalreviews' => $totalreviews,
    
    'profile' => $profile

]);
