<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
// dd($_POST);

$user = authUser();

$userid=$user['userid'];

// // find the corresponding note
$details = $db->query('select * from restaurant_details where "id" = :id', [
    'id' => $_GET['id']
])->findOrFail();

// // authorize that the current user can edit the cuisine
authorize($details['id'] === $userid);






// validate the form
$errors = [];

// if (! Validator::string($_POST['body'], 1, 10)) {
//     $errors['body'] = 'A body of no more than 1,000 characters is required.';
// }

// if no validation errors, update the record in the cuisines database table.
if (count($errors)) {
    return view('restaurant/Details/details.edit.view.php', [
        'heading' => 'Edit cuisine',
        'errors' => $errors,
        'details' => $details
    ]);
    
}


//photos
// Check if at least one file is uploaded
$photos = $_POST['photos']; // Keep existing if not updated
$logo = $_POST['logo'];     // Keep existing if not updated
$profile =(!empty($_POST['profile']))?$_POST['profile']:'no'; // Keep existing if not updated

if (!empty($_FILES['photos']['tmp_name'])) {
    $fileTmp = $_FILES['photos']['tmp_name'];
    $filename = $_FILES['photos']['name'];
    $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);
    $newfilename = md5(time() . $filename) . "." . $fileExtension;

    $targetdir = base_path("/public/restaurants/folder$userid/locations/");
    $targetFile = $targetdir . $newfilename;

    move_uploaded_file($fileTmp, $targetFile);
    $photos = "restaurants/folder$userid/locations/$newfilename";

    if (!empty($_POST['photos'])) {
        unlink(base_path("/public/") . $_POST['photos']); // Delete old file
    }
}

if (!empty($_FILES['logo']['tmp_name'])) {
    $fileTmp = $_FILES['logo']['tmp_name'];
    $filename = $_FILES['logo']['name'];
    $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);
    $newfilename = md5(time() . $filename) . "." . $fileExtension;

    $targetdir = base_path("/public/restaurants/folder$userid/logo/");
    $targetFile = $targetdir . $newfilename;

    move_uploaded_file($fileTmp, $targetFile);
    $logo = "restaurants/folder$userid/logo/$newfilename";

    if (!empty($_POST['logo'])) {
        unlink(base_path("/public/") . $_POST['logo']); // Delete old file
    }
}

if (!empty($_FILES['profile']['tmp_name'])) {
    $fileTmp = $_FILES['profile']['tmp_name'];
    $filename = $_FILES['profile']['name'];
    $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);
    $newfilename = md5(time() . $filename) . "." . $fileExtension;

    $targetdir = base_path("/public/restaurants/folder$userid/profile/");
    $targetFile = $targetdir . $newfilename;

    move_uploaded_file($fileTmp, $targetFile);
    $profile = "restaurants/folder$userid/profile/$newfilename";

    if ($_POST['profile'] != 'no') {
        unlink(base_path("/public/") . $_POST['profile']); // Delete old file
    }
}

// Update restaurant details
$ddd = $db->query(
    'UPDATE restaurant_details 
    SET "operatingHoursFrom" = :from,
        "seatingCapacity" = :seat,
        "deliveryOptions" = :delivery,
        "paymentMethods" = :pay,
        "profile" = :profile,
        "logo" = :logo,
        "operatingHoursTo" = :to
    WHERE "id" = :id',
    [
        'id' => $_GET['id'],
        'from' => $_POST['operatingHoursFrom'],
        'seat' => $_POST['seatingCapacity'],
        'delivery' => $_POST['deliveryOptions'],
        'pay' => $_POST['paymentMethods'],
        'profile' => $profile,
        'logo' => $logo,
        'to' => $_POST['operatingHoursTo'],
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
        'location_type' => 'Restaurant Location',
        'name' => 'a Restaurant',
        'display_name' => $_POST['display_name'],
        'street_address' => $_POST['street_address'],
        'city' => $_POST['city'],
        'google_map_link' => $_POST['google_map_link'],
        'districtid' => $districtid,
        'photos' => $photos,
        'hot_line' => $_POST['hot_line']
    ]
);

// Redirect user
header('Location: /details_rest/edit?id='.$userid);
exit();
