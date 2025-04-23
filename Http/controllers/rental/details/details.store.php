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
    'google_map_link' => $_POST['google_map_link'] ?? ''


]);

$fileTmp = $_FILES['profile_picture']['tmp_name']; //old path
//dd($fileTmp);// "/tmp/phpJvfKJu"
$filename = $_FILES['profile_picture']['name'];
$filenameCops = explode('.', $filename); //explode the file name
$fileExtension = end($filenameCops); //extension eka gaththa

$profile = md5(time() . $filename); //make a new file name
$profile = $profile . "." . $fileExtension;

$targetdir = base_path("/public/rental/folder$userid/profile/");

$targetFile = $targetdir . $profile; //new path

move_uploaded_file($fileTmp, $targetFile);
$uploadedimg = 'rental/folder' . $userid . '/profile/' . $profile;


$district = $db->query('
    SELECT districtid 
    FROM districts 
    WHERE district = :district', [
    'district' => $_POST['district']
])->find();
$districtid = isset($district['districtid']) ? $district['districtid'] : NULL;

$driver_user = $db->query(
    'INSERT INTO driver_details (
    "id", "payment_methods","vehicle_type","vehicle_model","profile_picture","street_address","city","districtid","google_map_link"
    ) VALUES (:id,:payment_methods, 
       :vehicle_type, :vehicle_model,:profile,:street_address,:city,:districtid,:google_map_link
    )',
    [

        'id' => $userid,
        'payment_methods' => ($_POST['payment_methods'] == 'yes') ? "credit,debit,cash" : "cash",
        'vehicle_type' => $_POST['vehicle_type'],
        'vehicle_model' => $_POST['vehicle_model'],
        'profile' => $uploadedimg,
        'street_address' => $_POST['street_address'],
        'city' => $_POST['city'],
        'districtid' => $districtid,
        'google_map_link' => $_POST['google_map_link']
    ]
);
header('location: /dashboard_rental');

exit();
