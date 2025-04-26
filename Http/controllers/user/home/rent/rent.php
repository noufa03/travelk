<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];
// dd($_GET);
if (!empty($_GET['driver']) && !empty($_GET['vehicle_type'])) {

    $driver = ($_GET['driver'] === 'with_driver') ? "true" : "false";

    $getavailablecars = $db->query(
        'SELECT * FROM vehicle_details vd 
         JOIN drivers d ON d."driverid" = vd."driverid"
         WHERE vd."vehicle_type" = :type 
         AND vd."driver_availability" = :available 
         AND vd."status" = :status',
        [
            'type' => strtoupper($_GET['vehicle_type']),
            'available' => $driver,
            'status' => 1// avaialable
        ]
    )->get();
    // dd($getavailablecars);
}
//status=1, available 

$getavailablecars=$getavailablecars??null;
// dd($getavailablecars);
view("user/home/rent.view.php", [
'getavailablecars'=>$getavailablecars,
'userid'=>$userid

]);
