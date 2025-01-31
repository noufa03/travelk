<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$user = authUser();

$userid=$user['userid'];

$details = $db->query('select * from restaurant_details where "id" = :id', [
    'id' => $_GET['id']
])->findOrFail();

$locations = $db->query('select * from locations where "locationid" = :id', [
    'id' => $_GET['id'].'01'
])->findOrFail();


$district = $db->query('select district from districts where "districtid" = :id', [
    'id' => $locations['districtid']
])->findOrFail();


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