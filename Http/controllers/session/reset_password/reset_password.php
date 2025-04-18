<?php

$email=$_GET['email'];
$token=$_GET['token'];

view('session/reset_password/reset_password.view.php', [
'email'=>$email,
'token'=>$token,
'errors' => $_SESSION['_flash']['errors'] ?? [],
  
]);