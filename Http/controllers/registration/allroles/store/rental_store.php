<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);


$email = $_POST['email'];
$password = $_POST['password'];
$license_number=$_POST['license_number'];

$user = $db->query('select * from users where "email" = :email', [
    'email' => $email
])->find();

$errors = [];

// names
if (empty($_POST['first_name'])) {
    $errors['first_name'] = 'Name cannot be empty';
}

if (empty($_POST['last_name'])) {
    $errors['last_name'] = 'Name cannot be empty';
}
//email
if(Validator::email($_POST['email'])){

        
            if ($user) {
           
                 $errors['email'] = 'email is already taken';
           
            } 
    

}else{
  $errors['email'] = 'Invalid email'; 

}

//phone number

if(! Validator::isValidPhoneNumber($_POST['phone_number'])){
    $errors['phone_number'] = 'Invalid number,please check again';

}
//address

if (empty($_POST['address'])) {
    $errors['address'] = 'address cannot be empty';
}
//DOB
if(! Validator::isValidDob(($_POST['date_of_birth']))){
    $errors['date_of_birth']='Invalid DOB';

}
//gender
if (empty($_POST['gender'])) {
    $errors['gender'] = 'Select gender';
}


//  each license number must be unique
$license_number_from_db=$db->query('select "license_number" from drivers where "license_number"=:license_number',[
'license_number'=>$license_number

])->find();



//license number
if (empty($license_number)) {
    // Handle the error, maybe return a message or exit the process
    $errors['license_number']= "License Number is required.";
 
}
if($license_number_from_db){
    $errors['license_number']="License Number already exists";
}
//license issue date and expiry date
if(!Validator::isValidPastDate($_POST['license_issue_date'])){
$errors['license_issue_date']='Invalid issue date';

}
// return true for  expiry
if(Validator::isValidPastDate($_POST['license_expiry_date'])){
$errors['license_expiry_date']='Invalid expiry date';

}

//status
if($_POST['membership_status']=='Inactive'){

$errors['membership_status']='status must be active';
}

//password
if(! Validator::isValidPassword($_POST['password'])){
$errors['password'] = 'Password must be at least 9 characters long, include at least one uppercase letter, one lowercase letter, one digit, and one special character.';

}




if (! empty($errors)) {


    return view('registration/rental_create.view.php', [
         'heading'=>'',
        'errors' => $errors
    ]);
}




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
}
