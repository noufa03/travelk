<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);


$user = authUser();

$userid=$user['userid'];

// // find the corresponding note
$details = $db->query('select * from drivers where "driverid" = :id', [
    'id' => $_GET['id']
])->findOrFail();

// // authorize that the current user can edit the cuisine
authorize($details['driverid'] === $userid);






// validate the form
$errors = [];

// if (! Validator::string($_POST['body'], 1, 10)) {
//     $errors['body'] = 'A body of no more than 1,000 characters is required.';
// }

// if no validation errors, update the record in the cuisines database table.
if (count($errors)) {
    return view('rental/details/details.edit.view.php', [
        'heading' => 'Edit Profile',
        'errors' => $errors,
        'details' => $details
    ]);
    
}


//photos
// Check if at least one file is uploaded
    // Keep existing if not updated
$profile =(!empty($_POST['old_profile_picture']))?$_POST['old_profile_picture']:'no'; // Keep existing if not updated

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





$driver_details = $db->query(
    'UPDATE driver_details 
    SET "payment_methods" = :pm,
        "vehicle_type" = :vehicle_type,
        "vehicle_model" = :vm
    WHERE "id" = :id',
    [
        'id' => $_GET['id'],
        'pm' => $_POST['payment_methods'],
        'vehicle_type' => $_POST['vehicle_type'],
        'vm' => $_POST['vehicle_model'],
    ]
);

$drivers=$db->query(
    'UPDATE drivers 
    SET "profile_picture" = :profile
        
    WHERE "driverid" = :id',
    [
        'id' => $_GET['id'],
     'profile' => $profile,
        
    ]
);

// Update location details
$district = $db->query('
    SELECT districtid FROM districts WHERE district = :district',
    ['district' => $_POST['district']]
)->find();

$districtid = $district['districtid'];

$location = $db->query('
    UPDATE locations
    SET "location_type" = :location_type,
        "name" = :name,
        "display_name" = :display_name,
        "street_address" = :street_address,
        "city" = :city,
        "google_map_link" = :google_map_link,
        "districtid" = :districtid,
        "photos" = :photos,
        "hot_line" = :hot_line
    WHERE "userid" = :userid',
    [
        'userid' => $userid,
        'location_type' => 'driver Location',
        'name' => 'a driver',
        'display_name' => isset($_POST['display_name'])??'null',
        'street_address' => $_POST['street_address'],
        'city' => $_POST['city'],
        'google_map_link' => $_POST['google_map_link'],
        'districtid' => $districtid,
        'photos' => 'no photos',
        'hot_line' => $_POST['phone_number']
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
        "profile_picture" = :profile_picture,
        "membership_status" = :membership_status
    WHERE "driverid" = :id
', [
    'id' => $_GET['id'], // Use the existing ID from the form (not $lastInsertedId)
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'phone_number' => $_POST['phone_number'],
    'address' => $_POST['address'],
    'date_of_birth' => $_POST['date_of_birth'],
    'gender' => $_POST['gender'],
    'license_number' => $_POST['license_number'],
    'license_issue_date' => $_POST['license_issue_date'],
    'license_expiry_date' => $_POST['license_expiry_date'],
    'profile_picture' =>$profile,
    'membership_status' => isset($_POST['membership_status']) ? $_POST['membership_status'] : 'Active',
]);

// Redirect user
header('Location: /dashboard_rental?id='.$userid);
exit();
