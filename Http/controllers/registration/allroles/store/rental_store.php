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
    'membership_status' => $_POST['membership_status'] ?? '',
    'license_number' => $_POST['license_number'] ?? '',
    'license_issue_date' => $_POST['license_issue_date'] ?? '',
    'license_expiry_date' => $_POST['license_expiry_date'] ?? '',
    'phone_number' => $_POST['phone_number'] ?? '',
    'date_of_birth' => $_POST['date_of_birth'] ?? ''
]);



$email=$attributes['email'];
$user=User::findByEmail($email);
$license_number=Rental::findByLicenseNo($attributes['license_number']);
$password=$attributes['password'];

//email
 if ($user) {
           
      $form->error('email','email is already taken')     
      ->throw();
           
  } 
    
if($license_number){
    $form->error('license_number','License Number already taken')
    ->throw();

}

//status
if($attributes['membership_status']=='Inactive'){

    $form->error('membership_status','status must be active')
    ->throw();

}


 $user = $db->query('INSERT INTO users("email", "password","role") VALUES(:email, :password,:role)', [
        'role'=>'driver',
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);
  
    $lastInsertedId = $db->connection->lastInsertId();
    $caruser = $db->query('INSERT INTO Drivers ("driverid",
        "first_name", "last_name", "phone_number", "address", "date_of_birth", "gender",
        "license_number", "license_issue_date", "license_expiry_date", "membership_status"
    ) VALUES (:id,
        :first_name, :last_name, :phone_number, :address, :date_of_birth, :gender,
        :license_number, :license_issue_date, :license_expiry_date, :membership_status
    )', [
        'id'=>$lastInsertedId,
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
    
        'phone_number' => $_POST['phone_number'],
        'address' => $_POST['address'],
        'date_of_birth' => $_POST['date_of_birth'],
        'gender' => $_POST['gender'],
        'license_number' => $_POST['license_number'],
        'license_issue_date' => $_POST['license_issue_date'],
        'license_expiry_date' => $_POST['license_expiry_date'],
   
        'membership_status' => isset($_POST['membership_status']) ? $_POST['membership_status'] : 'Active', // Handle default value
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

