<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;
use Http\Forms\UpdateDriver;


$db = App::resolve(Database::class);
$user = authUser();
$userid = $user['userid'];


$form=UpdateDriver::validate($attributes=[
    'name' => $_POST['driver_name']??'',
    'license_number' => $_POST['license_number']??'',
    'phone_number' => $_POST['phone_number']??'',
    'hourlyrate_driver'=>$_POST['hourlyrate_driver']??'',
    'license_issue_date'=>$_POST['license_issue_date']??'',
    'license_expiry_date'=>$_POST['license_expiry_date']??''
]);


if($attributes['license_expiry_date'] <= $attributes['license_issue_date']){
    $form->error('license_date','Invalid dates')
    ->throw();
}




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
