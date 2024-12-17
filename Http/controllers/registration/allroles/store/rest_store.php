<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);



$user = $db->query('select * from users where email = :email', [
    'email' => $_POST['email']
])->find();

if ($user) {
    header('location: /');
    exit();
   
} else {
    $user = $db->query('INSERT INTO users(email, password,role) VALUES(:email, :password,:role)', [
        'role' => 'restaurant',
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
    ]);
    
    $lastInsertedId = $db->connection->lastInsertId();
  
    $reuser = $db->query('INSERT INTO restaurants (resID,
       businessType,  gps, operatingHours,specialOffers ,seatingCapacity,
       deliveryOptions, paymentMethods, logo, ownerName,emergencyContact, businessRegNo, licensingInfo
    ) VALUES (:id,
       :businessType, :gps, :operatingHours, :specialOffers, :seatingCapacity,
       :deliveryOptions, :paymentMethods, :logo, :ownerName, :emergencyContact, :businessRegNo, :licensingInfo
    )',[
    'id'=>$lastInsertedId,
    'businessType' => $_POST['businessType'],
    
   
    'gps' => $_POST['gps'],
    'operatingHours' => $_POST['operatingHours'],
    'specialOffers' => $_POST['specialOffers'],
    'seatingCapacity' => $_POST['seatingCapacity'],
   
    'deliveryOptions' => $_POST['deliveryOptions'],
    'paymentMethods' => $_POST['paymentMethods'],
    'logo' => $_POST['logo'],
    'ownerName' => $_POST['ownerName'],
    'emergencyContact' => $_POST['emergencyContact'],

    'businessRegNo' => $_POST['businessRegNo'],
    'licensingInfo' => $_POST['licensingInfo'],
    ]
    
    
);

    $location=$db->query('INSERT INTO locations(hot_line) VALUES(:hot_line)',[
    'hot_line'=>$_POST['hot_line']
    
    ]);




    (new Authenticator)->login(['email' => $_POST['email']]);

    header('location: /');
    exit();
}



  
  



   
    

 
 







    