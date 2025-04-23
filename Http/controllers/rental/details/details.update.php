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


$details = $db->query('select * from drivers where "driverid" = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($details['driverid'] === $userid);

$form = EditRentalProfile::validate($attributes = [
    'first_name' => $_POST['first_name'] ?? '',
    'last_name' => $_POST['last_name'] ?? '',
    'address' => $_POST['address'] ?? '',
    'phone_number' => $_POST['phone_number'] ?? '',
    'date_of_birth' => $_POST['date_of_birth'] ?? '',
    'license_number' => $_POST['license_number'] ?? '',
    'license_issue_date' => $_POST['license_issue_date'] ?? '',
    'license_expiry_date' => $_POST['license_expiry_date'] ?? '',
    'membership_status' => $_POST['membership_status'] ?? '',
    // 'profile_picture' => $_FILES['profile_picture'] ?? '',
    'payment_methods' => $_POST['payment_methods'] ?? '',
    'vehicle_type' => $_POST['vehicle_type'] ?? '',
    'vehicle_model' => $_POST['vehicle_model'] ?? '',
    'street_address' => $_POST['street_address'] ?? '',
    'city' => $_POST['city'] ?? '',
    'district' => $_POST['district'] ?? '',
    'google_map_link' => $_POST['google_map_link'] ?? '',
    'gender' => $_POST['gender'] ?? '',
]);

$license_number = Rental::findByLicenseNo($attributes['license_number']);



//status
if ($attributes['membership_status'] === 'inactive') {

    $form->error('membership_status', 'status must be active')
        ->throw();
}


//photos
// Check if at least one file is uploaded
// Keep existing if not updated
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
        unlink(base_path("/public/") . $_POST['profile_picture']); // Delete old file
    }
}

$district = $db->query(
    '
    SELECT districtid FROM districts WHERE district = :district',
    ['district' => $_POST['district']]
)->find();
$districtid = $district['districtid'];

$driver_details = $db->query(
    'UPDATE driver_details 
    SET "payment_methods" = :pm,
        "vehicle_type" = :vehicle_type,
        "vehicle_model" = :vm,
        "profile_picture"=:profile,
        "street_address"=:street_address,
        "city"=:city,
        "districtid"=:districtid,
        "google_map_link"=:google_map_link
    WHERE "id" = :id',
    [
        'id' => $_GET['id'],
        'pm' => $_POST['payment_methods'],
        'vehicle_type' => $_POST['vehicle_type'],
        'vm' => $_POST['vehicle_model'],
        'profile' => $profile,
        'street_address' => $_POST['street_address'],
        'city' => $_POST['city'],
        'districtid' => $districtid,
        'google_map_link' => $_POST['google_map_link']
    ]
);
$caruser = $db->query('
    UPDATE drivers SET 
        "first_name" = :first_name,
        "last_name" = :last_name,
        "phone_number" = :phone_number,
        "address" = :address,
        "date_of_birth" = :date_of_birth,
        "gender" = :gender,
        "license_number" = :license_number,
        "license_issue_date" = :license_issue_date,
        "license_expiry_date" = :license_expiry_date,
        "membership_status" = :membership_status
    WHERE "driverid" = :id
', [
    'id' => $_GET['id'],
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'phone_number' => $_POST['phone_number'],
    'address' => $_POST['address'],
    'date_of_birth' => $_POST['date_of_birth'],
    'gender' => $_POST['gender'],
    'license_number' => $_POST['license_number'],
    'license_issue_date' => $_POST['license_issue_date'],
    'license_expiry_date' => $_POST['license_expiry_date'],
    'membership_status' => isset($_POST['membership_status']) ? $_POST['membership_status'] : 'Active',
]);



header('Location: /dashboard_rental');
Session::flash('toast','Profile updated successfully');
exit();
