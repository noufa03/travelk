<?php

use Core\App;
use Core\Authenticator;
use Core\Database;

use Core\Validator;
use Http\Forms\RentalProfile;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$form = RentalProfile::validate($attributes = [

    'profile_picture' => $_FILES['profile_picture'] ?? '',
    'payment_methods' => $_POST['payment_methods'] ?? '',
    'vehicle_type' => $_POST['vehicle_type'] ?? '',
    'vehicle_model' => $_POST['vehicle_model'] ?? '',
    'street_address' => $_POST['street_address'] ?? '',
    'city' => $_POST['city'] ?? '',
    'district' => $_POST['district'] ?? '',
    'google_map_link' => $_POST['google_map_link'] ?? '',
    'phone_number'=>$_POST['phone_number']??'',
    'license_number'=>$_POST['license_number']??'',
    'license_issue_date'=>$_POST['license_issue_date']??'',
    'license_expiry_date'=>$_POST['license_expiry_date']??'',
    'hourlyrate_driver'=>$_POST['hourlyrate_driver']??'',
    'hourlyrate'=>$_POST['hourlyrate']??'',
    'numberplate'=>$_POST['numberplate']??''


]);


$fileTmp = $_FILES['profile_picture']['tmp_name']; 

$filename = $_FILES['profile_picture']['name'];
$filenameCops = explode('.', $filename); 
$fileExtension = end($filenameCops); 

$profile = md5(time() . $filename); 
$profile = $profile . "." . $fileExtension;

$targetdir = base_path("/public/rental/folder$userid/profile/");

$targetFile = $targetdir . $profile; 

move_uploaded_file($fileTmp, $targetFile);
$uploadedimg = 'rental/folder' . $userid . '/profile/' . $profile;

$district = $db->query('
    SELECT districtid 
    FROM districts 
    WHERE district = :district', [
    'district' => $_POST['district']
])->find();
$districtid = isset($district['districtid']) ? $district['districtid'] : NULL;


if(isset($_POST['name']) && !empty($_POST['name'])){

$driver_details=$db->query('INSERT INTO drivers (name, license_number, phone_number,hourlyrate_driver,license_issue_date,license_expiry_date) VALUES (:name, :l_num, :p_num,:rate,:issue,:expiry)',
    [
        'name' => $_POST['name'],
        'l_num' => $_POST['license_number'],
        'p_num' => $_POST['phone_number'],
        'rate'=>$_POST['hourlyrate_driver'],
        'issue'=>$_POST['license_issue_date'],
        'expiry'=>$_POST['license_expiry_date']
    ]);
 $driverid=$db->connection->lastInsertId();

}


 
$driver_user = $db->query(
    'INSERT INTO vehicle_details (
    "id", "payment_methods","vehicle_type","vehicle_model","profile_picture","street_address","city","districtid","google_map_link","driver_availability","driverid","hourlyrate","numberplate"
    ) VALUES (:id,:payment_methods, 
       :vehicle_type, :vehicle_model,:profile,:street_address,:city,:districtid,:google_map_link,:availability,:driverid,:rate,:plate_num
    )',
    [

        'id' => $userid,
        'payment_methods' => ($_POST['payment_methods'] == 'yes') ? "credit,debit,cash" : "cash",
        'vehicle_type' =>strtoupper( $_POST['vehicle_type']),
        'vehicle_model' => $_POST['vehicle_model'],
        'profile' => $uploadedimg,
        'street_address' => $_POST['street_address'],
        'city' => $_POST['city'],
        'districtid' => $districtid,
        'google_map_link' => $_POST['google_map_link'],
        'availability'=>isset($driverid)? 'true':'false',// driverid have means we have a driver
        'driverid'=>$driverid??NULL,
        'rate'=>$_POST['hourlyrate'],
        'plate_num'=>$_POST['numberplate']
    ]
);
header('location: /dashboard_rental');

exit();
