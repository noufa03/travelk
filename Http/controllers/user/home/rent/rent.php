<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];
// dd($_GET);
if (isset($_GET) && !empty($_GET)) {

    $driver = ($_GET['driver'] == 'with_driver') ? "true": "false";
    // dd($driver);
    $getavailablecars = $db->query('select * from vehicle_details vd join drivers d on d."driverid"=vd."driverid" where vd."vehicle_type"=:type and vd."driver_availability"=:available and vd."status"=:status', [
        'type' => strtoupper($_GET['vehicle_type']),
        'available' => $driver,
        'status' => 1


    ])->get();
}

$getavailablecars=$getavailablecars??null;
// dd($getavailablecars);
view("user/home/rent.view.php", [
'getavailablecars'=>$getavailablecars,
'userid'=>$userid

]);
