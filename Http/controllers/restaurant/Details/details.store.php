<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$user = authUser();
$userid=$user['userid'];

$fileTmp=$_FILES['photos']['tmp_name'];//old path
//dd($fileTmp);// "/tmp/phpJvfKJu"
$filename=$_FILES['photos']['name'];
$filenameCops=explode('.',$filename);//explode the file name
$fileExtension=end($filenameCops);//extension eka gaththa

$newfilename=md5(time().$filename);//make a new file name
$newfilename=$newfilename.".".$fileExtension;

// in the location table photos of the restuarant goes
$targetdir = base_path("/public/restaurants/folder$userid/locations/");

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

$targetdir=base_path("/public/restaurants/folder$userid/logo/");

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
       "deliveryOptions", "paymentMethods", "logo","operatingHoursTo"
    ) VALUES (:id,:operatingHoursFrom, :seatingCapacity,
       :deliveryOptions, :paymentMethods,:logo,:operatingHoursTo
    )',[
    
   'id'=>$userid,
   
    'operatingHoursFrom' => $_POST['operatingHoursFrom'],
  
    'seatingCapacity' => $_POST['seatingCapacity'],
   
    'deliveryOptions' => $_POST['deliveryOptions'],
    'paymentMethods' => $_POST['paymentMethods'],
  
    'logo'=>$logo,
     'operatingHoursTo' =>$_POST['operatingHoursTo'],
    
    ]
    
    
);









// Prepare the query with locationid included in the VALUES clause
$location = $db->query('
    INSERT INTO locations ( "location_type", "name", "display_name", "street_address", "city", "google_map_link", "districtid", "photos", "hot_line", "userid","latitude","longitude")
    VALUES ( :location_type, :name, :display_name, :street_address, :city, :google_map_link, :districtid, :photos, :hot_line, :userid,:latitude,:longitude)', [
   
    'location_type' => 'Restaurant Location',
    'name' => 'a Restaurant',
    'display_name' => $_POST['display_name'],
    'street_address' => $_POST['street_address'],
    'city' => $_POST['city'],
    'google_map_link' => $_POST['google_map_link'],
    'districtid' => $district,
    'photos' => $newfilename,
    'hot_line' => $_POST['hot_line'],
    'userid' =>$userid,
    'latitude'=>6.927079,
    'longitude'=>79.861244
]);




    header('location: /dashboard_rest');
    exit();
  
  



   
    

 
 







    