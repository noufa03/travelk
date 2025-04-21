<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$accepted = $db->query(
  'SELECT * FROM applications WHERE areaadminid = :id',
  ['id' => $_POST['areaadminid']]
)->find();

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

$db->query(
  "UPDATE districts SET adminid =:areaadminid WHERE districtid = :districtid", [
    'areaadminid' => $accepted['areaadminid'],
    'districtid' => $accepted['district']
  ]
);

header('Location: /admin/applications');
exit;