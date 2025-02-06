<?php

use Core\App;

use Core\Database;
use Core\Validator;


use Core\Authenticator;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$signedIn = (new Authenticator)->attempt(
    $attributes['email'], $attributes['password']
);

if (!$signedIn) {
    $form->error(
        'email', 'No matching account found for that email address and password.'
    )->throw();
}

$role = $db->query('select role from users where email = :email', [
    'email' => $_POST['email']
])->find();
$role=$role['role'];

if ($role==='traveler'){
redirect('/');
}
else if ($role==='restaurant'){
redirect('/dashboard_rest');
}
else if ($role==='hotel'){
redirect('/dashboard_hotel');
}
else if ($role==='admin'){
redirect('/dashboard_admin');
}
else if ($role==='driver'){
redirect('/dashboard_rental');
}
else{
redirect('/');
}

