<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;
use Http\Forms\RegisterFormHotel;
use Models\Hotel;
use Models\User;

$db = App::resolve(Database::class);


$form = RegisterFormHotel::validate($attributes = [
    'email' => $_POST['email'] ?? '',
    'password' => $_POST['password'] ?? '',
    'business_reg_num'=>$_POST['business_reg_num']??'',
    'owner_name' => $_POST['owner_name'],
    'owner_contact'=>$_POST['owner_contact']
    
  
]);


$email=$attributes['email'];
$user=User::findByEmail($email);
$businessRegNo=Hotel::findByBusRegNo($attributes['business_reg_num']);
$password=$attributes['password'];

 if ($user) {
     $form->error('email', 'email is already taken')
        ->throw();

           
     } 


if($businessRegNo){
    $form->error('business_reg_num','Business Registration number is already taken')
        ->throw();

}



    $user = $db->query('INSERT INTO users("email", "password","role") VALUES(:email, :password,:role)', [
        'role' => 'accommodation',
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);
    

    $lastInsertedId = $db->connection->lastInsertId();
    
    
    $hoteluser=$db->query('INSERT INTO accommodation ("accid",
  
    "business_reg_num", "owner_name", "owner_contact"

        ) VALUES (?,?,?,?
        )',[
        
         $lastInsertedId,
        
        
        $_POST['business_reg_num'],
        
        $_POST['owner_name'],
        $_POST['owner_contact'],

]);



     
    

(new Authenticator)->login(['email' => $email,'role'=>'accommodation']);

    header('location: /dashboard_hotel');
    exit();

























//this goes a different page get details
//  $hoteldetails=$db->query('INSERT INTO accommodation ("id"
//     "star_rating", "no_rooms", "amenities", "payment_credit", 
//     "payment_debit", "payment_cash", "checkin", "checkout", "logo"
//     , "licensing_info", 
//     "booking_confirmation"
// ) VALUES (?,?,?,?,?,?,?,?,?,?,?
// )',[
// $userid
// $_POST['star_rating'],
// $_POST['no_rooms'],
// $_POST['amenities'],
// isset($_POST['payment_credit']) ? 1 : 0,
// isset($_POST['payment_debit']) ? 1 : 0,
// isset($_POST['payment_cash']) ? 1 : 0,
// $_POST['checkin'],
// $_POST['checkout'],
// $_POST['logo'],

// $_POST['licensing_info'],

// isset($_POST['booking_confirmation'])? 1:0,




// ]);