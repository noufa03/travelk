<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);



$business_type = isset($_POST['businessType']) ? trim($_POST['businessType']) : null;

//contact info
$phone_number=$_POST['hot_line'];
$email=$_POST['email'];



$gps=$_POST['gps'];

$operatingHours=$_POST['operatingHours'];
// menu and services



$specialOffers=$_POST['specialOffers'];

//additional features
$seatingCapacity=$_POST['seatingCapacity'];

$deliveryOptions=$_POST['deliveryOptions'];
$paymentMethods=$_POST['paymentMethods'];

//media
$logo=$_POST['logo'];
$images=$_POST['photos'];

//management details
$ownerName=$_POST['ownerName'];
$emergencyContact=$_POST['emergencyContact'];
$password=$_POST['password'];

//legal and compilances
$businessRegNo=$_POST['businessRegNo'];
$licensingInfo=$_POST['licensingInfo'];



//upload logo
$fileTmp=$_FILES['logo']['tmp_name'];//old path
//dd($fileTmp);// "/tmp/phpJvfKJu"
$filename=$_FILES['logo']['name'];
$filenameCops=explode('.',$filename);//explode the file name
$fileExtension=end($filenameCops);//extension eka gaththa

$newfilename=md5(time().$filename);//make a new file name
$newlogoname=$newfilename.".".$fileExtension;

$targetdir=base_path('public/storage/logos/');

$targetFile=$targetdir.$newlogoname;//new path

move_uploaded_file($fileTmp,$targetFile);


//upload images
$fileTmp=$_FILES['photos']['tmp_name'];//old path
//dd($fileTmp);// "/tmp/phpJvfKJu"
$filename=$_FILES['photos']['name'];
$filenameCops=explode('.',$filename);//explode the file name
$fileExtension=end($filenameCops);//extension eka gaththa

$newfilename=md5(time().$filename);//make a new file name
$newphotosname=$newfilename.".".$fileExtension;

$targetdir=base_path('public/storage/images/');

$targetFile=$targetdir.$newphotosname;//new path

move_uploaded_file($fileTmp,$targetFile);


//error checking
$errors = [];


if (empty($business_type)) {
    $errors['businessType'] = "Business Type cannot be empty.";
}
//contact info
if (empty($phone_number) || !preg_match('/^\+?[0-9]{7,15}$/', $phone_number)) {
    $errors['hot_line'] = 'Please provide a valid phone number.';
}


//location details

if (empty($gps) || !preg_match('/^-?\d{1,3}\.\d+,\s*-?\d{1,3}\.\d+$/', $gps)) {
    $errors['gps'] = 'Please provide valid GPS coordinates (e.g., "12.3456, -98.7654").';
}

//additional features
if(empty($seatingCapacity)){
    $errors['seatingCapacity']='seating capacity cannot be empty and negative';
}
if(empty($deliveryOptions)){
    $errors['deliveryOptions']='delivery options cannot be empty';
}
if(empty($paymentMethods)){
    $errors['paymentMethods']='payment method cannot be empty';
}

//management details

if(empty($ownerName)){
    $errors['ownerName']='owner name has to be filled';
}

if (empty($emergencyContact) || !preg_match('/^\+?[0-9]{7,15}$/', $emergencyContact)) {
    $errors['emergencyContact'] = 'Please provide a valid phone number.';
}

if (empty($password)) {
    $errors['password'] = 'The password cannot be less than 7 characters and more than 255 characters';
}

//legal and compilances
if(empty($businessRegNo)){
    $errors['businessRegNO']='Registration Number cannot be empty';
}
if(empty($licensingInfo)){
    $errors['licensingInfo']='Info cannot be empty';
}



if (!Validator::email($email)) {
   $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}
$errors = [];
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    header('location: /');
    exit();
   
} else {
  
    $reuser = $db->query('INSERT INTO restaurants (
       businessType,  gps, operatingHours,specialOffers ,seatingCapacity,hot_line,
       deliveryOptions, paymentMethods, logo, ownerName,emergencyContact, businessRegNo, licensingInfo
    ) VALUES (
       :businessType, :gps, :operatingHours, :specialOffers, :seatingCapacity,:hot_line,
       :deliveryOptions, :paymentMethods, :logo, :ownerName, :emergencyContact, :businessRegNo, :licensingInfo
    )',[
    'businessType' => $business_type,
    
   
    'gps' => $gps,
    'operatingHours' => $operatingHours,
    'specialOffers' => $specialOffers,
    'seatingCapacity' => $seatingCapacity,
    'hot_line'=>$phone_number,
    'deliveryOptions' => $deliveryOptions,
    'paymentMethods' => $paymentMethods,
    'logo' => $newfilename,
    'ownerName' => $ownerName,
    'emergencyContact' => $emergencyContact,

    'businessRegNo' => $businessRegNo,
    'licensingInfo' => $licensingInfo,
    ]
    
    
);

$user = $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT)
]);

// if (!empty($errors)) {
//     // You can modify this to display errors as needed
//     return view('registration/rest_create.view.php', [
//         'errors' => $errors,
//         'reuser'=>$reuser,
//         'user'=>$user,
        

    
//     ]);
// }

    // dd($users);

    (new Authenticator)->login(['email' => $email]);

    header('location: /');
    exit();
}



  
  



   
    

 
 







    