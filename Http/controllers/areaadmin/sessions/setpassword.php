<?php


$email = $_GET['email'];
$otp = $_GET['otp'];

view("admin/areaadmins/sessions/setpassword.view.php", [
  'email' => $email,
  'otp' => $otp
]);