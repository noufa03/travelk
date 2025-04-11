<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$user = authUser();

$userid=$user['userid'];

$details = $db->query('select * from driver_details where "id" = :id', [
    'id' => $userid
])->findOrFail();

$locations = $db->query('select * from locations where "userid" = :id', [
    'id' => $userid
])->findOrFail();


$district = $db->query('select district from districts where "districtid" = :id', [
    'id' => $locations['districtid']
])->findOrFail();


authorize($details['id'] === $userid);

$driver_profile=$db->query('select * from drivers where "driverid"=:id',[


'id'=>$userid
])->find();

$pageis='editpage';
view("rental/details/details.edit.view.php", [
    'heading' => 'Edit details',
    'errors' => [],
    'details' => $details,
    'userid'=>$userid,
    'pageis'=>$pageis,
    'locations'=>$locations,
    'district'=>$district,
      'driver_profile'=>$driver_profile

]);