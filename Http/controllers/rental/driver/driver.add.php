<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);
$user = authUser();
$userid = $user['userid'];


// add a driver to the drivers table

$driver_details = $db->query(
    'INSERT INTO drivers (name, license_number, phone_number,hourlyrate_driver,license_issue_date,license_expiry_date) VALUES (:name, :l_num, :p_num,:rate,:issue,:expiry)',
    [
        'name' => $_POST['name'],
        'l_num' => $_POST['license_number'],
        'p_num' => $_POST['phone_number'],
        'rate'=>$_POST['hourlyrate_driver'],
        'issue'=>$_POST['license_issue_date'],
        'expiry'=>$_POST['license_expiry_date']
    ]
);

//add the driverid to  the vechicle details table

$driverid=$db->connection->lastInsertId();
//updat ethe vehcile detials table 
$driver_details = $db->query(
    'UPDATE vehicle_details 
    SET "driverid"=:driverid,
    "driver_availability"=:available
    WHERE "id" = :id',
    [
        'id' => $_POST['vehicle_details_id'],
        'driverid'=>$driverid,
        'available'=>isset($driverid)? 'true':'false',
    ]
);




header('Location:/details_rental/edit');
Session::flash('toast','Driver is Added successfully');
exit();
