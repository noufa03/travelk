<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;
use Http\Forms\EditRentalProfile;

use Models\Rental;
use Models\User;

$db = App::resolve(Database::class);
$user = authUser();
$userid = $user['userid'];



$details = $db->query('select * from vehicle_owner where "userid" = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($details['userid'] === $userid);

$form = EditRentalProfile::validate($attributes = [
    'first_name' => $_POST['first_name'] ?? '',
    'last_name' => $_POST['last_name'] ?? '',
    'address' => $_POST['address'] ?? '',
    'phone_number' => $_POST['phone_number'] ?? '',
    'date_of_birth' => $_POST['date_of_birth'] ?? '',
    'numberplate'=>$_POST['numberplate']??'',
 

    'payment_methods' => $_POST['payment_methods'] ?? '',
    'vehicle_type' => $_POST['vehicle_type'] ?? '',
    'vehicle_model' => $_POST['vehicle_model'] ?? '',
    'street_address' => $_POST['street_address'] ?? '',
    'city' => $_POST['city'] ?? '',
    'district' => $_POST['district'] ?? '',
    'google_map_link' => $_POST['google_map_link'] ?? '',
    'gender' => $_POST['gender'] ?? '',
    'hourlyrate'=>$_POST['hourlyrate'],
]);






$profile = (!empty($_POST['old_profile_picture'])) ? $_POST['old_profile_picture'] : 'no'; // Keep existing if not updated

if (!empty($_FILES['profile_picture']['tmp_name'])) {
    $fileTmp = $_FILES['profile_picture']['tmp_name'];
    $filename = $_FILES['profile_picture']['name'];
    $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);
    $newfilename = md5(time() . $filename) . "." . $fileExtension;

    $targetdir = base_path("/public/rental/folder$userid/profile/");
    $targetFile = $targetdir . $newfilename;

    move_uploaded_file($fileTmp, $targetFile);
    $profile = "rental/folder$userid/profile/$newfilename";

    if (!empty($_POST['profile_picture'])) {
        unlink(base_path("/public/") . $_POST['profile_picture']); 
    }
}



$district = $db->query(
    '
    SELECT districtid FROM districts WHERE district = :district',
    ['district' => $_POST['district']]
)->find();
$districtid = $district['districtid'];



$driver_details = $db->query(
    'UPDATE vehicle_details 
    SET "payment_methods" = :pm,
        "vehicle_type" = :vehicle_type,
        "vehicle_model" = :vm,
        "profile_picture"=:profile,
        "street_address"=:street_address,
        "city"=:city,
        "districtid"=:districtid,
        "google_map_link"=:google_map_link,
      
        "hourlyrate"=:rate,
        "numberplate"=:plate_num
       
    WHERE "id" = :id',
    [
        'id' => $_GET['id'],
        'pm' => $_POST['payment_methods'],
        'vehicle_type' =>strtoupper($_POST['vehicle_type']),
        'vm' => $_POST['vehicle_model'],
        'profile' => $profile,
        'street_address' => $_POST['street_address'],
        'city' => $_POST['city'],
        'districtid' => $districtid,
        'google_map_link' => $_POST['google_map_link'],
        'rate'=>$_POST['hourlyrate'],
        'plate_num'=>$_POST['numberplate']
    ]
);

$caruser = $db->query('
    UPDATE vehicle_owner SET 
        "first_name" = :first_name,
        "last_name" = :last_name,
        "phone_number" = :phone_number,
        "address" = :address,
        "date_of_birth" = :date_of_birth,
        "gender" = :gender
    WHERE "userid" = :id
', [
    'id' => $_GET['id'],
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'phone_number' => $_POST['phone_number'],
    'address' => $_POST['address'],
    'date_of_birth' => $_POST['date_of_birth'],
    'gender' => $_POST['gender']
]);



header('Location: /dashboard_rental');
Session::flash('toast','Profile updated successfully');
exit();
