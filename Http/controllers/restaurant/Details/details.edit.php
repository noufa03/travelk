<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

//res details
$details = $db->query('select * from restaurant_details where "id" = :id', [
    'id' => $userid
])->find();
//location details
$locations = $db->query('select * from locations where "userid" = :id', [
    'id' => $userid
])->find();

//folder path from locations table
$folderPath = $locations['photos']??'';

//just by path get the all the files in the folder 
$photos = glob($folderPath . '*'); // * matches all files,glob(pattern),pattern mathed paths return karanawa
$district = $db->query('select district from districts where "districtid" = :id', [
    'id' => $locations['districtid']
])->find();

$pageis = 'editpage';
view("restaurant/Details/details.edit.view.php", [
    'heading' => 'Edit details',
    'errors' => [],
    'details' => $details,
    'userid' => $userid,
    'pageis' => $pageis,
    'locations' => $locations,
    'district' => $district,
    'photos' => $photos,
    'errors'=>Session::get('errors')

]);
