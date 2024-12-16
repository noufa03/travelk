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
//TraID=UserID
    $userid=$db->query("SELECT MAX(userID) AS maxuserID FROM users")->get() ;
    $userid=$userid[0]['maxuserID']+1;
   
    $user = $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);
    
    
    $travelers=$db->query('INSERT INTO Travelers (TraID, user_name, profile) VALUES (:id,:user_name, :profile)',[
        'id'=>$userid,
        'user_name'=>$_POST['user_name'],
        'profile'=>$_POST['profile']
    ]);
     
     
    

    (new Authenticator)->login(['email' => $email]);

    header('location: /');
    exit();
}
