<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];
$license_number=$_POST['license_number'];

$errors = [];
if (!Validator::email($email)) {
   $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}
if (empty($license_number)) {
    // Handle the error, maybe return a message or exit the process
    $errors['license_number']= "License Number is required.";
 
}

if (! empty($errors)) {
    return view('registration/rental_create.view.php', [
        'errors' => $errors
    ]);
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    header('location: /');
    exit();
} else {

    $user = $db->query('INSERT INTO users("email", "password","role") VALUES(:email, :password,:role)', [
        'role'=>'driver',
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);
  
    $lastInsertedId = $db->connection->lastInsertId();
    $caruser = $db->query('INSERT INTO Drivers ("driverid",
        "first_name", "last_name", "phone_number", "address", "date_of_birth", "gender",
        "license_number", "license_issue_date", "license_expiry_date", "profile_picture", "membership_status"
    ) VALUES (:id,
        :first_name, :last_name, :phone_number, :address, :date_of_birth, :gender,
        :license_number, :license_issue_date, :license_expiry_date, :profile_picture, :membership_status
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
        'profile_picture' => isset($_POST['profile_picture']) ? $_POST['profile_picture'] : null,  // Handle potential NULL
        'membership_status' => isset($_POST['membership_status']) ? $_POST['membership_status'] : 'Active', // Handle default value
    ]);
   
    

    (new Authenticator)->login(['email' => $email,'role'=>'driver']);

    header('location: /');
    exit();
}
