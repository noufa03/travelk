<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$user = authUser();
$userid=$user['userid'];

// images
$fileTmp=$_FILES['photo']['tmp_name'];//old path
//dd($fileTmp);// "/tmp/phpJvfKJu"
$filename=$_FILES['photo']['name'];
$filenameCops=explode('.',$filename);//explode the file name
$fileExtension=end($filenameCops);//extension eka gaththa

$newfilename=md5(time().$filename);//make a new file name
$newfilename=$newfilename.".".$fileExtension;

$targetdir=base_path('public/restaurants/storage/images/');

$targetFile=$targetdir.$newfilename;//new path

move_uploaded_file($fileTmp,$targetFile);

// logo

$fileTmp=$_FILES['logo']['tmp_name'];//old path
//dd($fileTmp);// "/tmp/phpJvfKJu"
$filename=$_FILES['logo']['name'];
$filenameCops=explode('.',$filename);//explode the file name
$fileExtension=end($filenameCops);//extension eka gaththa

$logo=md5(time().$filename);//make a new file name
$logo=$logo.".".$fileExtension;

$targetdir=base_path('public/restaurants/storage/logo/');

$targetFile=$targetdir.$logo;//new path

move_uploaded_file($fileTmp,$targetFile);

$district = $db->query('
    SELECT districtid 
    FROM districts 
    WHERE district = :district', [
    'district' => $_POST['district']
])->find();

$district=$district['districtid'];

 $reuser = $db->query('INSERT INTO restaurant_details (
    "id",
        "operatingHoursFrom","seatingCapacity",
       "deliveryOptions", "paymentMethods", "images", "logo","operatingHoursTo"
    ) VALUES (:id,:operatingHoursFrom, :seatingCapacity,
       :deliveryOptions, :paymentMethods, :images,:logo,:operatingHoursTo
    )',[
    
   'id'=>$userid,
   
    'operatingHoursFrom' => $_POST['operatingHoursFrom'],
  
    'seatingCapacity' => $_POST['seatingCapacity'],
   
    'deliveryOptions' => $_POST['deliveryOptions'],
    'paymentMethods' => $_POST['paymentMethods'],
    'images' => $newfilename,
    'logo'=>$logo,
     'operatingHoursTo' =>$_POST['operatingHoursTo'],
    
    ]
    
    
);


$locationid = $userid .mt_rand(1, 100);

// Prepare the query with locationid included in the VALUES clause
$location = $db->query('
    INSERT INTO locations ("locationid", "location_type", "name", "display_name", "street_address", "city", "google_map_link", "districtid", "photos", "hot_line", "area_adid")
    VALUES (:locationid, :location_type, :name, :display_name, :street_address, :city, :google_map_link, :districtid, :photos, :hot_line, :area_adid)', [
    'locationid' => $locationid, // Include the generated locationid
    'location_type' => 'Restaurant Location',
    'name' => 'a Restaurant',
    'display_name' => $_POST['display_name'],
    'street_address' => $_POST['street_address'],
    'city' => $_POST['city'],
    'google_map_link' => $_POST['google_map_link'],
    'districtid' => $district,
    'photos' => isset($_POST['photos']) ? $_POST['photos'] : "Not set yet",
    'hot_line' => $_POST['hot_line'],
    'area_adid' => isset($_POST['area_adid']) ? $_POST['area_adid'] :null,
]);




    header('location: /dashboard_rest');
    exit();
  
  



   
    

 
 







    