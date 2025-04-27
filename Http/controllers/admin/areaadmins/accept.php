<?php

use Core\App;
use Core\Database;
use Core\Mail;

$db = App::resolve(Database::class);

$mailer=App::resolve(Mail::class);

// Fetch the accepted application details
$accepted = $db->query(
  'SELECT * FROM applications WHERE areaadminid = :id',
  ['id' => $_POST['areaadminid']]
)->find();

// Insert into areaadmins table
// $db->query(
//   'INSERT INTO areaadmins (
//       areaadminid, first_name, last_name, email, nic, con_num,
//       dob, address, district, language_eng, language_sin, language_tam,
//       linkedin, cv, profile
//   ) VALUES (
//       :areaadminid, :first_name, :last_name, :email, :nic, :con_num,
//       :dob, :address, :district, :eng, :sin, :tam,
//       :linkedin, :cv, :profile
//   )',
//   [
//       'areaadminid' => $accepted['areaadminid'],
//       'first_name' => $accepted['first_name'],
//       'last_name' => $accepted['last_name'],
//       'email' => $accepted['email'],
//       'nic' => $accepted['nic'],
//       'con_num' => $accepted['con_num'],
//       'dob' => $accepted['dob'],
//       'address' => $accepted['address'],
//       'district' => $accepted['district'],
//       'eng' => $accepted['language_spk_eng'] ? 1 : 0,
//       'sin' => $accepted['language_sin'] ? 1 : 0,
//       'tam' => $accepted['language_tam'] ? 1 : 0,
//       'linkedin' => $accepted['linkedin'],
//       'cv' => $accepted['cv'],
//       'profile' => $accepted['profile']
//   ]
// );

// Update district with the new areaadminid
// $db->query(
//   "UPDATE districts SET adminid = :areaadminid WHERE districtid = :districtid", 
//   [
//     'areaadminid' => $accepted['areaadminid'],
//     'districtid' => $accepted['district']
//   ]
// );

$district = $db->query('SELECT district FROM districts WHERE districtid = :districtid', [
  'districtid' => $accepted['district']])->find();

// Generate password hash using NIC

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

//$email = $accepted['email'];

$email = 'harithyamilaksha@gmail.com';


$mailer->send($email,"Congratulations!!! you have been recruited the area administrator for the district of {$district['district']}.",$url);

// Insert login credentials into areaadminlogin table
// $db->query(
//   'INSERT INTO areaadminlogin (areaadminid, email, districtid, passwordhash)
//    VALUES (:areaadminid, :email, :districtid, :passwordhash)',
//   [
//     'areaadminid' => $accepted['areaadminid'],
//     'email' => $accepted['email'],
//     'districtid' => $accepted['district'],
//     'passwordhash' => $passwordHash
//   ]
// );

// $db->query(
//   'DELETE FROM applications WHERE areaadminid = :areaadminid', [
//     'areaadminid' => $accepted['areaadminid']
//   ]
// );

// Redirect to applications list
header('Location: /admin/applications');
exit;