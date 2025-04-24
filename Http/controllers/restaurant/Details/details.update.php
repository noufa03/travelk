<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validator;

$db = App::resolve(Database::class);


$user = authUser();

$userid = $user['userid'];

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


$logo = $_POST['logo'];
// Keep existing if not updated

$count = (int)$_POST['count']; //count=no of old photos
$photos = [];


// Step 1: Get all old photos initially
for ($i = 0; $i < $count; $i++) {
    $photos[$i] = $_POST["old_photos"][$i]; // Default to old photo
}
//update the old photos if updated
// Step 2: Check for new uploads and replace corresponding photo
if (!empty($_FILES['photos']['tmp_name'])) { // Check first one to see if any file is uploaded
    for ($i = 0; $i < $count; $i++) {
        if (!empty($_FILES['photos']['tmp_name'][$i])) {
            $fileTmp = $_FILES['photos']['tmp_name'][$i];
            $filename = $_FILES['photos']['name'][$i];
            $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);
            $newfilename = md5(time() . $filename . $i) . "." . $fileExtension; // Add $i to avoid collision

            $targetdir = base_path("/public/restaurants/folder$userid/locations/");
            $targetFile = $targetdir . $newfilename;

            move_uploaded_file($fileTmp, $targetFile);
            $photos[$i] = "restaurants/folder$userid/locations/$newfilename"; // Update only the relevant photo

            if (!empty($_POST['old_photos'][$i])) {
                unlink(base_path("/public/") . $_POST['old_photos'][$i]); // Delete old file
            }
        }
    }
}


// add new photos
if (!empty($_FILES['new_photos']['tmp_name'])) {
    for ($i = 0; $i < count($_FILES['new_photos']['name']); $i++) {
        $fileTmp = $_FILES['new_photos']['tmp_name'][$i]; //old path
        //dd($fileTmp);// "/tmp/phpJvfKJu"
        $filename = $_FILES['new_photos']['name'][$i];
        $filenameCops = explode('.', $filename); //explode the file name
        $fileExtension = end($filenameCops); //extension eka gaththa

        $newfilename = md5(time() . $filename); //make a new file name
        $photo = $newfilename . "." . $fileExtension;

        // in the location table photos of the restuarant goes
        $targetdir = base_path("/public/restaurants/folder$userid/locations/");

        $targetFile = $targetdir . $photo; //new path


        move_uploaded_file($fileTmp, $targetFile);
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




// Update restaurant details
$ddd = $db->query(
    'UPDATE restaurant_details 
     SET "operatingHoursFrom" = :from,
         "seatingCapacity" = :seat,
         "deliveryOptions" = :delivery,
         "paymentMethods" = :pay,
       
         "logo" = :logo,
         "operatingHoursTo" = :to
     WHERE "id" = :id',
    [
        'from' => $_POST['operatingHoursFrom'] ?? null,
        'seat' => $_POST['seatingCapacity'] ?? null,
        'delivery' => is_array($_POST['deliveryOptions']) ? implode(',', $_POST['deliveryOptions']) : $_POST['deliveryOptions'],
        'pay' => is_array($_POST['paymentMethods']) ? implode(',', $_POST['paymentMethods']) : $_POST['paymentMethods'],

        'logo' => $logo ?? null,
        'to' => $_POST['operatingHoursTo'] ?? null,
        'id' => $_GET['id'] ?? null,
    ]
);


// Update location details
$district = $db->query(
    '
    SELECT districtid FROM districts WHERE district = :district',
    ['district' => $_POST['district']]
)->find();

$districtid = $district['districtid'];

$location = $db->query(
    '
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
        'location_type' => 'restaurant',
        'name' => 'a Restaurant',
        'display_name' => $_POST['display_name'],
        'street_address' => $_POST['street_address'],
        'city' => $_POST['city'],
        'google_map_link' => $_POST['google_map_link'],
        'districtid' => $districtid,
        'photos' => 'restaurants/folder' . $userid . '/locations/',
        'hot_line' => $_POST['hot_line']
    ]
);


Session::flash('toast', 'Profile updated successfully');

// Redirect user
header('Location: /details_rest/edit');
exit();
