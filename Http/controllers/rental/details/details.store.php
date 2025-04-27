<?php

use Core\App;
use Core\Authenticator;
use Core\Database;

use Core\Validator;
use Http\Forms\RentalProfile;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];
//validating the form
$form = RentalProfile::validate($attributes = [

    'profile_picture' => $_FILES['profile_picture'] ?? '',
    'payment_methods' => $_POST['payment_methods'] ?? '',
    'vehicle_type' => $_POST['vehicle_type'] ?? '',
    'vehicle_model' => $_POST['vehicle_model'] ?? '',
    'street_address' => $_POST['street_address'] ?? '',
    'city' => $_POST['city'] ?? '',
    'district' => $_POST['district'] ?? '',
    'google_map_link' => $_POST['google_map_link'] ?? '',
    'phone_number'=>$_POST['phone_number']??'',
    'license_number'=>$_POST['license_number']??'',
    'license_issue_date'=>$_POST['license_issue_date']??'',
    'license_expiry_date'=>$_POST['license_expiry_date']??'',
    'hourlyrate_driver'=>$_POST['hourlyrate_driver']??'',
    'hourlyrate'=>$_POST['hourlyrate']??'',
    'numberplate'=>$_POST['numberplate']??''


]);


$fileTmp = $_FILES['profile_picture']['tmp_name']; //old path
//dd($fileTmp);// "/tmp/phpJvfKJu"
$filename = $_FILES['profile_picture']['name'];
$filenameCops = explode('.', $filename); //explode the file name,explode(seperator,filename);sepearator eka thiyana tanin seperate the filename;here it is the extansiion
$fileExtension = end($filenameCops); //extension eka gaththa,filenamecops is an arry;e array eke last element eka  gannawa

$profile = md5(time() . $filename); //make a new file name,md5(input,output);here only inout has been passed;input=time().filnema,md5 will give me a unique hash
$profile = $profile . "." . $fileExtension;// i will join the file extnesion(hashedfilename+myoldextensiom)

$targetdir = base_path("/public/rental/folder$userid/profile/");//yanna ona tana

$targetFile = $targetdir . $profile; //new path

move_uploaded_file($fileTmp, $targetFile);//move(from,to)
$uploadedimg = 'rental/folder' . $userid . '/profile/' . $profile;//save this path to the database

//from the formi will get the district ,and from the db i will change that to the district id
$district = $db->query('
    SELECT districtid 
    FROM districts 
    WHERE district = :district', [
    'district' => $_POST['district']
])->find();
$districtid = isset($district['districtid']) ? $district['districtid'] : NULL;

//driver details dala nam ekak hari execute this
if(isset($_POST['name']) && !empty($_POST['name'])){

$driver_details=$db->query('INSERT INTO drivers (name, license_number, phone_number,hourlyrate_driver,license_issue_date,license_expiry_date) VALUES (:name, :l_num, :p_num,:rate,:issue,:expiry)',
    [
        'name' => $_POST['name'],
        'l_num' => $_POST['license_number'],
        'p_num' => $_POST['phone_number'],
        'rate'=>$_POST['hourlyrate_driver'],
        'issue'=>$_POST['license_issue_date'],
        'expiry'=>$_POST['license_expiry_date']
    ]);
 $driverid=$db->connection->lastInsertId();

}

//get the last inserted id from the drivers table and put it in the vehicle details table
 
$driver_user = $db->query(
    'INSERT INTO vehicle_details (
    "id", "payment_methods","vehicle_type","vehicle_model","profile_picture","street_address","city","districtid","google_map_link","driver_availability","driverid","hourlyrate","numberplate"
    ) VALUES (:id,:payment_methods, 
       :vehicle_type, :vehicle_model,:profile,:street_address,:city,:districtid,:google_map_link,:availability,:driverid,:rate,:plate_num
    )',
    [
// vehicle details id is the owner id
        'id' => $userid,
        'payment_methods' => ($_POST['payment_methods'] == 'yes') ? "credit,debit,cash" : "cash",
        'vehicle_type' =>strtoupper( $_POST['vehicle_type']),
        'vehicle_model' => $_POST['vehicle_model'],
        'profile' => $uploadedimg,
        'street_address' => $_POST['street_address'],
        'city' => $_POST['city'],
        'districtid' => $districtid,
        'google_map_link' => $_POST['google_map_link'],
        'availability'=>isset($driverid)? 'true':'false',// driverid have means we have a driver
        'driverid'=>$driverid??NULL,
        'rate'=>$_POST['hourlyrate'],
        'plate_num'=>$_POST['numberplate']
    ]
);
header('location: /dashboard_rental');

exit();
