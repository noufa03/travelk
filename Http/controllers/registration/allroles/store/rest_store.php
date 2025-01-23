<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];

$user = $db->query('select * from users where email = :email', [
    'email' => $_POST['email']
])->find();

if ($user) {
    header('location: /');
    echo "email already taken";
    exit();
   
} else {
    $user = $db->query('INSERT INTO users("email", "password","role") VALUES(:email, :password,:role)', [
        'role' => 'restaurant',
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
    ]);
  
    $lastInsertedId = $db->connection->lastInsertId();

    $reuser = $db->query('INSERT INTO restaurants ("resID",
       "businessType",
     "ownerName","emergencyContact", "businessRegNo", "licensingInfo"
    ) VALUES (:id,
       :businessType, 
      :ownerName, :emergencyContact, :businessRegNo, :licensingInfo
    )',[
    'id'=>$lastInsertedId,
    'businessType' => $_POST['businessType'],
    
   
   

   

    
    'ownerName' => $_POST['ownerName'],
    'emergencyContact' => $_POST['emergencyContact'],

    'businessRegNo' => $_POST['businessRegNo'],
    'licensingInfo' => $_POST['licensingInfo'],
    ]
    
    
);


$location= $db->query('INSERT INTO locations("locationid", "location_type","name","display_name","street_address","city","google_map_link","districtid","photos","hot_line") VALUES(:locationid, :location_type,:name,:display_name,:street_address,:city,:google_map_link,:districtid,:photos,:hot_line)', [
        'locationid'=>$lastInsertedId, 'location_type'=>'restuarant location',
        'name'=>'a resturant',
        'display_name'=>'resturant_name',
           'street_address' => isset($_POST['street_address']) ? $_POST['street_address'] : 'Nothing',
        'city'=>isset($_POST['city']) ? $_POST['city'] : 'Nothing',
        'google_map_link' => isset($_POST['google_map_link']) ? $_POST['google_map_link'] : 'No link',
        'hot_line' => isset($_POST['hot_line']) ? $_POST['hot_line'] : 'No hotline',
         'districtid' => $_POST['districtid'] ?? 'Unknown'  
    
    ]);
  





(new Authenticator)->login(['email' => $email,'role'=>'restaurant']);

header('location: /');
exit();
}




  
  



   
    

 
 







    