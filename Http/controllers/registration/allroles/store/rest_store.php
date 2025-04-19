<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;
use Http\Forms\RegisterFormRestaurant;
use Models\Restuarant;
use Models\User;

$db = App::resolve(Database::class);


$form=RegisterFormRestaurant::validate($attributes=[
    'email' => $_POST['email'],
    'password'=> $_POST['password'],
    'emergencyContact' => $_POST['emergencyContact'],
    'businessRegNo' =>$_POST['businessRegNo'],
    'businessType'  => $_POST['businessType'],
    'ownerName' => $_POST['ownerName']
    

]);

$email=$attributes['email'];
$user=User::findByEmail($email);
$regno=Restuarant::findByRegno($attributes['businessRegNo']);

 if ($user) {
     $form->error('email', 'email is already taken')
        ->throw();

           
     } 
    
if($regno){
    $form->error('businessRegNo','Business Registration number is already taken')
        ->throw();

}


//no errors insert the user
 $user = $db->query('INSERT INTO users("email", "password","role") VALUES(:email, :password,:role)', [
        'role' => 'restaurant',
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
    ]);
  
    $lastInsertedId = $db->connection->lastInsertId();

    $reuser = $db->query('INSERT INTO restaurants ("resID",
       "businessType",
     "ownerName","emergencyContact", "businessRegNo"
    ) VALUES (:id,
       :businessType, 
      :ownerName, :emergencyContact, :businessRegNo
    )',[
    'id'=>$lastInsertedId,
    'businessType' => $_POST['businessType'],
    
   
   

   

    
    'ownerName' => $_POST['ownerName'],
    'emergencyContact' => $_POST['emergencyContact'],

    'businessRegNo' => $_POST['businessRegNo'],
    
    ]
    
    
);
(new Authenticator)->login(['email' => $email,'role'=>'restaurant']);


$folder = 'folder' . $lastInsertedId;


$basePath = 'restaurants/'; 


$fullPath = $basePath . $folder;


$subfolders = ['locations', 'menus', 'logo','profile'];

if (file_exists($basePath)) {
  
    if (!file_exists($fullPath)) {
       
        mkdir($fullPath, 0755);
       
    } else {
       
    }

   
    foreach ($subfolders as $subfolder) {
        $subfolderPath = $fullPath . '/' . $subfolder;

        if (!file_exists($subfolderPath)) {
            mkdir($subfolderPath, 0755);
         
        }
    }
} 




 header('location: /dashboard_rest');
    exit();

















  
  



   
    

 
 







    