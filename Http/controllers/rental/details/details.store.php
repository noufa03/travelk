<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$user = authUser();
$userid=$user['userid'];

 $driver_user = $db->query('INSERT INTO driver_details (
    "id",
        
       "payment_methods","vehicle_type","vehicle_model"
    ) VALUES (:id,:payment_methods, 
       :vehicle_type, :vehicle_model
    )',[
    
   'id'=>$userid,
   
  'payment_methods' => ($_POST['payment_methods'] == 'yes') ? "credit,debit,cash" : "cash",

  
    
   
    'vehicle_type' => $_POST['vehicle_type'],
    'vehicle_model' => $_POST['vehicle_model'],
  
   
    
    ]
    
    
);

$district = $db->query('
    SELECT districtid 
    FROM districts 
    WHERE district = :district', [
    'district' => $_POST['district']
])->find();

$district=$district['districtid'];

$location = $db->query('
    INSERT INTO locations ( "location_type", "name", "display_name", "street_address", "city", "google_map_link", "districtid", "photos", "hot_line", "userid")
    VALUES ( :location_type, :name, :display_name, :street_address, :city, :google_map_link, :districtid, :photos, :hot_line, :userid)', [
   
    'location_type' => 'Driver Location',
    'name' => 'a Driver',
    'display_name' => 'Nothing',
    'street_address' => $_POST['street_address'],
    'city' => $_POST['city'],
    'google_map_link' => $_POST['google_map_link'],
    'districtid' => $district,
    'photos' => 'nothing',
    'hot_line' => 'nothing',
    'userid' =>$userid,
]);




    header('location: /dashboard_rental');
    exit();
  