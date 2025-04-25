<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;
use Http\Forms\RegisterFormRental;
use Models\Rental;
use Models\User;

$db = App::resolve(Database::class);


$form = RegisterFormRental::validate($attributes = [
    'email' => $_POST['email'] ?? '',
    'password' => $_POST['password'] ?? '',
    'first_name' => $_POST['first_name'] ?? '',
    'last_name' => $_POST['last_name'] ?? '',
    'address' => $_POST['address'] ?? '',
    'gender' => $_POST['gender'] ?? '',
    'phone_number' => $_POST['phone_number'] ?? '',
    'date_of_birth' => $_POST['date_of_birth'] ?? ''
]);



$email=$attributes['email'];
$user=User::findByEmail($email);
// $license_number=Rental::findByLicenseNo($attributes['license_number']);
$password=$attributes['password'];

//email
 if ($user) {
           
      $form->error('email','email is already taken')     
      ->throw();
           
  } 
    



 $user = $db->query('INSERT INTO users("email", "password","role") VALUES(:email, :password,:role)', [
        'role'=>'driver',
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);
  
    $lastInsertedId = $db->connection->lastInsertId();
    $caruser = $db->query('INSERT INTO vehicle_owner ("userid",
        "first_name", "last_name", "phone_number", "address", "date_of_birth", "gender"
    ) VALUES (:id,
        :first_name, :last_name, :phone_number, :address, :date_of_birth, :gender
    )', [
        'id'=>$lastInsertedId,
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'phone_number' => $_POST['phone_number'],
        'address' => $_POST['address'],
        'date_of_birth' => $_POST['date_of_birth'],
        'gender' => $_POST['gender']
    ]);
   
    

    (new Authenticator)->login(['email' => $email,'role'=>'driver']);
$folder = 'folder' . $lastInsertedId;


$basePath = 'rental/'; 


$fullPath = $basePath . $folder;


$subfolders = ['profile'];

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


    header('location: /dashboard_rental');
    exit();

