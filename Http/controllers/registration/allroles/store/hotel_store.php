<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
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



$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    header('location: /');
    exit();
} else {


    $user = $db->query('INSERT INTO users(email, password,role) VALUES(:email, :password,:role)', [
        'role' => 'hotel',
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    $lastInsertedId = $db->connection->lastInsertId();
    
    
    $hoteluser=$db->query("INSERT INTO accommodation (accID,
    star_rating, no_rooms, amenities, payment_credit, 
    payment_debit, payment_cash, checkIn, checkOut, logo, 
    business_reg_num, licensing_info, owner_name, owner_contact, 
    booking_confirmation, locationID
) VALUES (:id,
    :star_rating,  :no_rooms, :amenities, :payment_credit, 
    :payment_debit, :payment_cash, :checkIn, :checkOut, :logo, 
    :business_reg_num, :licensing_info, :owner_name, :owner_contact, 
    :booking_confirmation, :locationID
)",[

'id' => $lastInsertedId,
'star_rating'=>$_POST['star_rating'],
'no_rooms'=>$_POST['no_rooms'],
'amenities'=>$_POST['amenities'],
'payment_credit'=>isset($_POST['payment_credit']) ? 1 : 0,
'payment_debit'=>isset($_POST['payment_debit']) ? 1 : 0,
'payment_cash'=>isset($_POST['payment_cash']) ? 1 : 0,
'checkIn'=>$_POST['checkIn'],
'checkOut'=>$_POST['checkOut'],
'logo'=>$_POST['logo'],
'business_reg_num'=>$_POST['business_reg_num'],
'licensing_info'=>$_POST['licensing_info'],
'owner_name'=>$_POST['owner_name'],
'owner_contact'=>$_POST['owner_contact'],
'booking_confirmation'=>isset($_POST['booking_confirmation'])? 1:0,
'locationID'=>$_POST['locationID'],



]);

     
     
    

    (new Authenticator)->login(['email' => $email]);

    header('location: /');
    exit();
}
