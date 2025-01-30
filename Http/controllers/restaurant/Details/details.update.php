<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);


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
$ddd=$db->query('update restaurant_details set "id"= :id, "operatingHoursFrom" =:from,"seatingCapacity"=:seat,"deliveryOptions"=:delivery,"paymentMethods"=:pay,"images"=:img,"logo"=:logo,"operatingHoursTo"=:to  where "id" = :id', [
    'id' => $_GET['id'],
    'from' => $_POST['operatingHoursFrom'],
    'seat'=>$_POST['seatingCapacity'],
    'delivery'=>$_POST['deliveryOptions'],
    'pay'=>$_POST['paymentMethods'],
  
  'logo' => isset($_POST['logo']) ? $_POST['logo'] : NULL,
    'to' => $_POST['operatingHoursTo'],

    
    
]);

$district = $db->query('
    SELECT districtid 
    FROM districts 
    WHERE district = :district', [
    'district' => $_POST['district']
])->find();

$district=$district['districtid'];

$locationid = $_GET['id'];
$location = $db->query('
    UPDATE locations
    SET 
        "location_type" = :location_type,
        "name" = :name,
        "display_name" = :display_name,
        "street_address" = :street_address,
        "city" = :city,
        "google_map_link" = :google_map_link,
        "districtid" = :districtid,
        "photos" = :photos,
        "hot_line" = :hot_line,
        "userid" = :userid
    WHERE "userid" = :userid', [
    'userid'=>$userid,
    'location_type' => 'Restaurant Location',
    'name' => 'a Restaurant',
    'display_name' => $_POST['display_name'],
    'street_address' => $_POST['street_address'],
    'city' => $_POST['city'],
    'google_map_link' => $_POST['google_map_link'],
    'districtid' => $district,
    'photos' => $newfilename,
    'hot_line' => $_POST['hot_line'],
   
]);


// redirect the user
header('location: /dashboard_rest');
die();
