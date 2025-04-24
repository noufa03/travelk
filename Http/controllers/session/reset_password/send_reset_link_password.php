<?php

use Core\Session;
use Models\User;
use Core\App;
use Core\Database;
use Core\Mail;

$mailer=App::resolve(Mail::class);

$db=App::resolve(Database::class);

$email=trim($_POST['email']);
$user=User::findByEmail($email);


if(!$user){
    Session::flash('toast','Email not found');
    redirect('/forget_password');

}

$token=generateToken();
$expiry=date('Y-m-d H:i:s',strtotime('+1 hour'));

$db->query('INSERT INTO password_resets (email, token, expiry) VALUES (?, ?, ?) ON CONFLICT (email) DO UPDATE SET token = ?, expiry = ?',[
$email,$token,$expiry,
$token,$expiry

]);



//this is the url we sent via email
$url=url('/reset_password',['token'=>$token,'email'=>$email]);

$mailer->send($email,'Reset your password',$url);
Session::flash('toast','We have emailed you a password reset link,please check your inbox');
redirect('/forget_password');




function url($base, $params = []) {
    $base = 'http://localhost:3000' . $base;
    return $base . '?' . http_build_query($params);
}



function generateToken() {
    return bin2hex(random_bytes(32)); // Generates a 64-character secure token
}


