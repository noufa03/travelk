<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);
$user = authUser();
$userid = $user['userid'];


$driver_details = $db->query(
    'UPDATE drivers SET "name"=:name, "license_number"=:l_num, "phone_number"=:p_num, "hourlyrate_driver"=:rate,"license_issue_date"=:issue,"license_expiry_date"=:expiry WHERE "driverid"=:id ',
    [   'id'=>$_POST['driverid'],
        'name' => $_POST['driver_name'],
        'l_num' => $_POST['license_number'],
        'p_num' => $_POST['phone_number'],
        'rate'=>$_POST['hourlyrate_driver'],
        'issue'=>$_POST['license_issue_date'],
        'expiry'=>$_POST['license_expiry_date']
    ]
);



header('Location:/details_rental/edit');
Session::flash('toast','Driver is updated successfully');
exit();
