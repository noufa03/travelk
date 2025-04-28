<?php

use Core\App;
use Core\Database;
use Core\Mail;

$db = App::resolve(Database::class);

$mailer=App::resolve(Mail::class);

$accepted = $db->query(
  'SELECT * FROM applications WHERE areaadminid = :id',
  ['id' => $_POST['areaadminid']]
)->find();

$district = $db->query('SELECT district FROM districts WHERE districtid = :districtid', [
  'districtid' => $accepted['district']])->find();



function generateRandomNumber() {
  return rand(1000, 9999);
}

function getCurrentDateTime() {
  return date('Y-m-d H:i:s');
}

$now = getCurrentDateTime();

$otp = generateRandomNumber();

function url($base, $params = []) {
  $base = 'http://localhost:8080' . $base;
  return $base . '?' . http_build_query($params);
}

$db->query('INSERT INTO acceptancemail(email, created_on, otp) VALUES (?, ?, ?)' , [
  $accepted['email'], $now, $otp
]);

$url = url('/areaadmin/setpassword', ['otp' => $otp, 'email' => $accepted['email']]);



$email = $accepted['email'];


$mailer->send($email,"Congratulations!!! you have been recruited the area administrator for the district of {$district['district']}.","{$url} \n Use this link to login next time -> http://localhost:8080/areaadmin/login");

header('Location: /admin/applications');
exit;