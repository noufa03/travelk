<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$user = authUser();

$userid=$user['userid'];

$details = $db->query('select * from restaurant_details where "id" = :id', [
    'id' => $userid
])->find();

$locations = $db->query('select * from locations where "userid" = :id', [
    'id' => $userid
])->find();



$district = $db->query('select district from districts where "districtid" = :id', [
    'id' => $locations['districtid']
])->find();


authorize($details['id'] === $userid);

$pageis='editpage';
view("restaurant/Details/details.edit.view.php", [
    'heading' => 'Edit details',
    'errors' => [],
    'details' => $details,
    'userid'=>$userid,
    'pageis'=>$pageis,
    'locations'=>$locations,
    'district'=>$district

]);