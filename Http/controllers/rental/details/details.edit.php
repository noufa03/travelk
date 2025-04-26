<?php


use Core\App;
use Core\Database;
use Core\Session;



$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$details = $db->query('select * from vehicle_details where "id" = :id', [
    'id' => $userid
])->findOrFail();

// dd($details);
$driver_details=$db->query('select * from drivers where "driverid"=:id',[
'id'=>$details['driverid']

])->find();

$driver_details??'No drivers';


$driver_availability=$details['driver_availability']==true? 'yes':'no';


$district = $db->query('select district from districts d join vehicle_details cd on  cd."districtid"=d."districtid" where  cd."id" = :id', [
    'id' => $userid
])->findOrFail();

authorize($details['id'] === $userid);

$driver_profile = $db->query('select * from  vehicle_owner where "userid"=:id', [
    'id' => $userid
])->find();

$profile = $details['profile_picture'];

$pageis = 'editpage';

view("rental/details/details.edit.view.php", [
    'heading' => 'Edit details',
    'errors' => [],
    'details' => $details,
    'userid' => $userid,
    'pageis' => $pageis,
    'district' => $district,
    'driver_profile' => $driver_profile,
    'profile' => $profile,
    'driver_availability'=>$driver_availability,
    'driver_details'=>$driver_details,
    'errors'=>Session::get('errors')

]);
