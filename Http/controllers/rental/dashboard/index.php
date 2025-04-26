<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
//authuser is a function i made in the functions.php,it will just return the data from the db with respect to the email i provide
$user = authUser();
$userid = $user['userid'];

//reviewee_type_id=> whom to the review is belongs to.
$totalreviews = $db->query(
    'SELECT COUNT(*) AS totalreviews FROM reviews WHERE reviewee_type_id = :id',
    ['id' => $userid]
)->find();
$totalreviews = $totalreviews['totalreviews'];// asper his userid will getthe number of reviews he has

//totoaltrips from vehicle bookings table according to the vehicle id
$totaltrips = $db->query(
    'SELECT COUNT(*) AS totaltrips FROM vehiclebooking WHERE carid = :id',
    ['id' => $userid]
)->find();

//geeting the average rating of the vehicle from the vehicle booking table to get it ratings
$ratings = $db->query('
    SELECT carid, CAST(AVG(rating) AS DECIMAL(10,2)) AS average_rating
    FROM vehiclebooking
    WHERE carid = :id
    GROUP BY carid;
', [
    'id' => $userid
])->find();

//geting the vehicle owner name 
$name = $db->query('select first_name,last_name from vehicle_owner where "userid"=:id', [
    'id' => $userid
])->find();
//pending 
$notifications = $db->query('select * from notifications where "userid"=:id and  "is_read"=:read', [
    'id' => $userid,
   
    'read'=>'false'
])->get();


// $confirmed_bookings = $db->query('select * from vehiclebooking where "carid"=:id and "pickupdate" >=NOW() and "confirmation_of_driver"=:confirm', [
//     'id' => $userid,
//     'confirm' => 'true'
// ])->get();

//past bookings,vechicle booking table eken ganne
$past_bookings = $db->query('SELECT * FROM vehiclebooking WHERE "carid"= :id and "pickupdate" < NOW()', [
    'id' => $userid,
])->get();

$add_details = $db->query('select * from vehicle_details where "id"=:id', [
    'id' => $userid

])->find();
//checkingif the vehcile details table is fill or not 
$detailsID = isset($add_details['id']) ? $add_details['id'] : NULL;

// $count_add_details = isset($add_details) ? 1 : 0;

$ratings = isset($ratings['average_rating']) ? $ratings['average_rating'] : NULL;

$totaltrips = $totaltrips['totaltrips'];

$today = date('Y-m-d');//geting today from date function Y capital other two are simple
$upcomingrides = $db->query('select * from vehiclebooking where   "carid"=:id and "pickupdate" > :today', [

    'today' => $today,
    'id' => $userid
])->get();
//upcoming ride -> vehicle booking table eken pickupdate eka wadi nam
$acceptanceRate = $db->query('select count(*)  as accepttrips from vehiclebooking where "confirmation_of_driver"=:confirm and  "carid"=:id and "pickupdate" < :today', [
    'confirm' => 'true',
    'today' => $today,
    'id' => $userid
])->find();
//confirm karapu past bookings
$acceptanceRate = $acceptanceRate['accepttrips'];
// acceptance rate =acceptancerate/totaltrips
$acceptanceRate = (isset($acceptanceRate) && isset($totaltrips) && $totaltrips != 0)
    ? ($acceptanceRate / $totaltrips)
    : 0;

//profile pic is in the vehcile details table
$profile = isset($add_details['profile_picture']) ? $add_details['profile_picture'] : 'no';

view("rental/dashboard/index.view.php", [
    'heading' => 'Rental Dashboard',
    'userid' => $userid,
    'totaltrips' => $totaltrips,
    'ratings' => $ratings,
    'name' => $name,
    'notifications' => $notifications,
    // 'confirmed_bookings' => $confirmed_bookings,
    'past_bookings' => $past_bookings,
    'add_details' => $add_details,
    // 'count_add_details' => $count_add_details,
    'detailsID' => $detailsID,
    'upcomingrides' => $upcomingrides,
    'acceptanceRate' => $acceptanceRate,
    'totalreviews' => $totalreviews,
    
    'profile' => $profile

]);
