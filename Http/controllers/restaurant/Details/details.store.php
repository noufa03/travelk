<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

use Http\Forms\RestaurantProfile;


$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];


$form = RestaurantProfile::validate($attributes = [
    'operatingHoursFrom' => $_POST['operatingHoursFrom']??'',
    'seatingCapacity' => $_POST['seatingCapacity']??'',
    'deliveryOptions' => $_POST['deliveryOptions']??'',
    'paymentMethods' => $_POST['paymentMethods']??'',
    'logo' => $_FILES['logo']??'',
    'operatingHoursTo' => $_POST['operatingHoursTo']??'',
    'operatingdaysFrom' => $_POST['operatingdaysFrom']??'',
    'operatingdaysTo' => $_POST['operatingdaysTo']??'',
    'profile' => $_FILES['profile']??'',
     'display_name' => $_POST['display_name']??'',
    'street_address' => $_POST['street_address']??'',
    'city' => $_POST['city']??'',
    'google_map_link' => $_POST['google_map_link']??'',
    'district' => $_POST['district']??'',
    'photos' => $_FILES['photos']??'',
    'hot_line' => $_POST['hot_line']??'',
]);

if ($attributes['operatingHoursFrom'] >= $attributes['operatingHoursTo']) {
    $form->error('operatingHours', 'The opening time must be earlier than the closing time.')
         ->throw();
}



$fileTmp = $_FILES['profile']['tmp_name']; 

$filename = $_FILES['profile']['name'];
$filenameCops = explode('.', $filename);
$fileExtension = end($filenameCops);

$profile = md5(time() . $filename); 
$profile = $profile . "." . $fileExtension;

$targetdir = base_path("/public/restaurants/folder$userid/profile/");

$targetFile = $targetdir . $profile; 

move_uploaded_file($fileTmp, $targetFile);



for ($i = 0; $i < count($_FILES['photos']['name']); $i++) {
    $fileTmp = $_FILES['photos']['tmp_name'][$i]; 
 
    $filename = $_FILES['photos']['name'][$i];
    $filenameCops = explode('.', $filename);
    $fileExtension = end($filenameCops); 

    $newfilename = md5(time() . $filename); 
    $photo = $newfilename . "." . $fileExtension;


    $targetdir = base_path("/public/restaurants/folder$userid/locations/");

    $targetFile = $targetdir . $photo; 


    move_uploaded_file($fileTmp, $targetFile);
}

$fileTmp = $_FILES['logo']['tmp_name'];

$filename = $_FILES['logo']['name'];
$filenameCops = explode('.', $filename); 
$fileExtension = end($filenameCops); 

$logo = md5(time() . $filename);
$logo = $logo . "." . $fileExtension;

$targetdir = base_path("/public/restaurants/folder$userid/logo/");

$targetFile = $targetdir . $logo; //new path

move_uploaded_file($fileTmp, $targetFile);
$district = $db->query('
    SELECT districtid 
    FROM districts 
    WHERE district = :district', [

    'district' => $attributes['district']

])->find();

$district = $district['districtid'];


$deliveryoptions = implode(",", $attributes['deliveryOptions']); 
$paymentmethods = implode(",", $attributes['paymentMethods']);


$reuser = $db->query(
    'INSERT INTO restaurant_details (
    "id",
        "operatingHoursFrom","seatingCapacity",
       "deliveryOptions", "paymentMethods", "logo","operatingdaysFrom","operatingdaysTo","operatingHoursTo","profile"
    ) VALUES (:id,:operatingHoursFrom, :seatingCapacity,
       :deliveryOptions, :paymentMethods,:logo,:operatingdaysFrom,:operatingdaysTo,  :operatingHoursTo,:profile
    )',
    [

        'id' => $userid,

        'operatingHoursFrom' => $_POST['operatingHoursFrom'],

        'seatingCapacity' => $_POST['seatingCapacity'],

        'deliveryOptions' => $deliveryoptions,
        'paymentMethods' => $paymentmethods,

        'logo' => 'restaurants/folder' . $userid . '/logo/' . $logo,
        'operatingHoursTo' => $_POST['operatingHoursTo'],
        'operatingdaysFrom' => $_POST['operatingdaysFrom'],
        'operatingdaysTo' => $_POST['operatingdaysTo'],
        'profile' => 'restaurants/folder' . $userid . '/profile/' . $profile

    ]


);

$location = $db->query('
    INSERT INTO locations ( "location_type", "name", "display_name", "street_address", "city", "google_map_link", "districtid", "photos", "hot_line", "userid","latitude","longitude")
    VALUES ( :location_type, :name, :display_name, :street_address, :city, :google_map_link, :districtid, :photos, :hot_line, :userid,:latitude,:longitude)', [

    'location_type' => 'restaurant',
    'name' => 'a Restaurant',
    'display_name' => $_POST['display_name'],
    'street_address' => $_POST['street_address'],
    'city' => $_POST['city'],
    'google_map_link' => $_POST['google_map_link'],
    'districtid' => $district,
    'photos' => 'restaurants/folder' . $userid . '/locations/',
    'hot_line' => $_POST['hot_line'],
    'userid' => $userid,
    'latitude' => 6.927079,
    'longitude' => 79.861244
]);

header('location: /dashboard_rest');
exit();
