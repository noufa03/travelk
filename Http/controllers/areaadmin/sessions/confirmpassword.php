<?php

use Core\App;
use Core\Database;
use Core\Authenticator;

$email = $_POST["email"];
$otp = $_POST["otp"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

$passwordhash = password_hash($password, PASSWORD_DEFAULT);



$db = App::resolve(Database::class);

$acceptanceemail = $db->query('SELECT * FROM acceptancemail WHERE email = :email' ,[
  'email' => $email
])->find();


$accepted = $db->query('SELECT * FROM applications WHERE email = :email' ,[
  'email' => $email
])->find();



if($acceptanceemail['otp'] == $otp) {

  $db->query(
    'INSERT INTO areaadmins (
        areaadminid, first_name, last_name, email, nic, con_num,
        dob, address, district, language_eng, language_sin, language_tam,
        linkedin, cv, profile, passwordhash
    ) VALUES (
        :areaadminid, :first_name, :last_name, :email, :nic, :con_num,
        :dob, :address, :district, :eng, :sin, :tam,
        :linkedin, :cv, :profile, :passwordhash
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
        'eng' => $accepted['language_spk_eng'] ? 1 : 0,
        'sin' => $accepted['language_sin'] ? 1 : 0,
        'tam' => $accepted['language_tam'] ? 1 : 0,
        'linkedin' => $accepted['linkedin'],
        'cv' => $accepted['cv'],
        'profile' => $accepted['profile'],
        'passwordhash' => $passwordhash
    ]

  );

  $db->query('UPDATE districts SET adminid = :adminid WHERE districtid = :district', [
    'adminid' => $accepted["areaadminid"],
    'district' => $accepted["district"]
  ]);



  $db->query(
      'DELETE FROM applications WHERE areaadminid = :areaadminid', [
        'areaadminid' => $accepted['areaadminid']
      ]);

  header('Location: /areaadmin/login');
  exit();
}

header('Location: /');

exit();