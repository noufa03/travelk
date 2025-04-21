<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Fetch the accepted application details
$accepted = $db->query(
  'SELECT * FROM applications WHERE areaadminid = :id',
  ['id' => $_POST['areaadminid']]
)->find();

// Insert into areaadmins table
$db->query(
  'INSERT INTO areaadmins (
      areaadminid, first_name, last_name, email, nic, con_num,
      dob, address, district, language_spk_eng, language_sin, language_tam,
      linkedin, cv, profile
  ) VALUES (
      :areaadminid, :first_name, :last_name, :email, :nic, :con_num,
      :dob, :address, :district, :eng, :sin, :tam,
      :linkedin, :cv, :profile
  )',
  [
      'areaadminid' => $accepted['areaadminid'],
      'first_name' => $accepted['first_name'],
      'last_name' => $accepted['last_name'],
      'email' => $accepted['email'],
      'nic' => $accepted['nic'],
      'con_num' => $accepted['con_num'],
      'dob' => $accepted['dob'],
      'address' => $accepted['address'],
      'district' => $accepted['district'],
      'eng' => $accepted['language_spk_eng'],
      'sin' => $accepted['language_sin'],
      'tam' => $accepted['language_tam'],
      'linkedin' => $accepted['linkedin'],
      'cv' => $accepted['cv'],
      'profile' => $accepted['profile']
  ]
);

// Update district with the new areaadminid
$db->query(
  "UPDATE districts SET adminid = :areaadminid WHERE districtid = :districtid", 
  [
    'areaadminid' => $accepted['areaadminid'],
    'districtid' => $accepted['district']
  ]
);

// Generate password hash using NIC
$passwordHash = password_hash($accepted['nic'], PASSWORD_DEFAULT);

// Insert login credentials into areaadminlogin table
$db->query(
  'INSERT INTO areaadminlogin (areaadminid, email, district, passwordhash)
   VALUES (:areaadminid, :email, :district, :passwordhash)',
  [
    'areaadminid' => $accepted['areaadminid'],
    'email' => $accepted['email'],
    'district' => $accepted['district'],
    'passwordhash' => $passwordHash
  ]
);

// Redirect to applications list
header('Location: /admin/applications');
exit;