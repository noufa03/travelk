<?php

use Http\Forms\ResetPassword;



$form = ResetPassword::validate($attributes = [
    'password' => $_POST['password'],
    'confirm_password' => $_POST['confirm_password'],
    'email' => $_POST['email'],
    'token' => $_POST['token'],
]);

if($attributes['password'] !== $attributes['confirm_password']){
    
    $form->error('password','passwords do not match')->throw();
}