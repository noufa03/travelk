<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

// $errors = [];
// if (!Validator::email($email)) {
//    $errors['email'] = 'Please provide a valid email address.';
// }

// if (!Validator::string($password, 7, 255)) {
//     $errors['password'] = 'Please provide a password of at least seven characters.';
// }

// if (! empty($errors)) {
//     return view('registration/create.view.php', [
//         'errors' => $errors
//     ]);
// }



$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    header('location: /');
    exit();
} else {


    $user = $db->query('INSERT INTO users("email", "password","role") VALUES(:email, :password,:role)', [
        'role' => 'accommodation',
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);
    

    $lastInsertedId = $db->connection->lastInsertId();
    
    
    $hoteluser=$db->query('INSERT INTO accommodation ("accid",
    "star_rating", "no_rooms", "amenities", "payment_credit", 
    "payment_debit", "payment_cash", "checkin", "checkout", "logo", 
    "business_reg_num", "licensing_info", "owner_name", "owner_contact", 
    "booking_confirmation"
) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?
)',[

 $lastInsertedId,
$_POST['star_rating'],
$_POST['no_rooms'],
$_POST['amenities'],
isset($_POST['payment_credit']) ? 1 : 0,
isset($_POST['payment_debit']) ? 1 : 0,
isset($_POST['payment_cash']) ? 1 : 0,
$_POST['checkin'],
$_POST['checkout'],
$_POST['logo'],
$_POST['business_reg_num'],
$_POST['licensing_info'],
$_POST['owner_name'],
$_POST['owner_contact'],
isset($_POST['booking_confirmation'])? 1:0,




]);


     
    

(new Authenticator)->login(['email' => $email,'role'=>'hotel']);

    header('location: /');
    exit();
}
