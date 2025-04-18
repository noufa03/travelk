<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();
$userid=$user['userid'];

$details = $db->query('select * from driver_details where "id" = :id', [
    'id' => $userid
])->findOrFail();

$district = $db->query('select district from districts d join driver_details dd on  dd."districtid"=d."districtid" where  dd."id" = :id', [
    'id' => $userid
])->findOrFail();

authorize($details['id'] === $userid);

$driver_profile=$db->query('select * from drivers where "driverid"=:id',[
    'id'=>$userid
])->find();

$profile=$details['profile_picture'];

$pageis='editpage';

view("rental/details/details.edit.view.php", [
    'heading' => 'Edit details',
    'errors' => [],
    'details' => $details,
    'userid'=>$userid,
    'pageis'=>$pageis,
    'district'=>$district,
    'driver_profile'=>$driver_profile,
    'profile'=>$profile

]);