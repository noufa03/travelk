<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email=$_POST['email'];

$user = $db->query('select * from users where "email" = :email', [
    'email' => $_POST['email']
])->find();

$regno=$db->query('select "businessRegNo"  from restaurants where "businessRegNo"=:businessRegNo', [
    'businessRegNo' => $_POST['businessRegNo']
])->find();




if(Validator::email($_POST['email'])){

        
            if ($user) {
           
                 $errors['email'] = 'email is already taken';
           
            } 
    

}else{
  $errors['email'] = 'Invalid email'; 

}

if($regno){

   $errors['businessRegNo'] = 'Business Registration number is already taken';
}


if (empty($_POST['businessType'])) {
    $errors['businessType'] = 'Select a Business type';
}


if (empty($_POST['ownerName'])) {
    $errors['ownerName'] = 'Owner Name cannot be empty';
}

if(! Validator::isValidPhoneNumber($_POST['emergencyContact'])){
    $errors['emergencyContact'] = 'Invalid number,please check again';

}

if(! Validator::isValidPassword($_POST['password'])){
$errors['password'] = 'Password must be at least 9 characters long, include at least one uppercase letter, one lowercase letter, one digit, and one special character.';

}

if (! empty($errors)) {
    return view("registration/rest_create.view.php", [
        'heading' => ' ',
        'errors' => $errors
    ]);
}
   
 else {







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

}















  
  



   
    

 
 







    