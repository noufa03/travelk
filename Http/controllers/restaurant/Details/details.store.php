<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$user = authUser();
$userid=$user['userid'];

  
 $reuser = $db->query('INSERT INTO restaurant_details (
    "id",
        "operatingHours","seatingCapacity",
       "deliveryOptions", "paymentMethods", "images", 
    ) VALUES (:id,:operatingHours, :seatingCapacity,
       :deliveryOptions, :paymentMethods, :images
    )',[
    
   'id'=>$userid,
   
    'operatingHours' => $_POST['operatingHours'],
 
    'seatingCapacity' => $_POST['seatingCapacity'],
   
    'deliveryOptions' => $_POST['deliveryOptions'],
    'paymentMethods' => $_POST['paymentMethods'],
    'images' => $_POST['images'],
    
    ]
    
    
);
dd($reuser);


    $location=$db->query('INSERT INTO locations("hot_line") VALUES(:hot_line)',[
    'hot_line'=>$_POST['hot_line']
    
    ]);




    header('location: /dashboard_rest');
    exit();
  
  



   
    

 
 







    