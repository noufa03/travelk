<?php


use Core\App;
use Core\Database;
use Core\Session;



$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

//vehcile details id is same as the ownerid so it will be same as the userid
$details = $db->query('select * from vehicle_details where "id" = :id', [
    'id' => $userid
])->findOrFail();

// driver details i will get the id from the vehicle details table
$driver_details=$db->query('select * from drivers where "driverid"=:id',[
'id'=>$details['driverid']

])->find();


$driver_details??'No drivers';

//drivers availability from vehcile details table
$driver_availability=$details['driver_availability']==true? 'yes':'no';

//geting the district from the district table uing the district id from the vechile detail table
$district = $db->query('select district from districts d join vehicle_details cd on  cd."districtid"=d."districtid" where  cd."id" = :id', [
    'id' => $userid
])->findOrFail();

authorize($details['id'] === $userid);// first the condtion if it is not true reurn the status(403)

//vehicle owner details
$driver_profile = $db->query('select * from  vehicle_owner where "userid"=:id', [
    'id' => $userid
])->find();

//profilepic is the vehcile details table
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
