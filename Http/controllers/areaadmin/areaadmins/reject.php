<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$rejected = $db->query(
  'SELECT * FROM applications WHERE areaadminid = :id',
  ['id' => $_POST['areaadminid']]
)->find();

$db->query(
  'INSERT INTO rejected_applications (
      areaadminid, first_name, last_name, email, nic, con_num,
      dob, address, district, language_spk_eng, language_sin, language_tam,
      linkedin, cv, profile
  ) VALUES (
      :areaadminid, :first_name, :last_name, :email, :nic, :con_num,
      :dob, :address, :district, :eng, :sin, :tam,
      :linkedin, :cv, :profile
  )',
  [
      'areaadminid' => $rejected['areaadminid'],
      'first_name' => $rejected['first_name'],
      'last_name' => $rejected['last_name'],
      'email' => $rejected['email'],
      'nic' => $rejected['nic'],
      'con_num' => $rejected['con_num'],
      'dob' => $rejected['dob'],
      'address' => $rejected['address'],
      'district' => $rejected['district'],
      'eng' => $rejected['language_spk_eng'],
      'sin' => $rejected['language_sin'],
      'tam' => $rejected['language_tam'],
      'linkedin' => $rejected['linkedin'],
      'cv' => $rejected['cv'],
      'profile' => $rejected['profile']
  ]
);

$db->query('DELETE FROM applications where areaadminid = :id', [
  'id' => $_POST['areaadminid']
]);

header('Location: /admin/applications');
exit;