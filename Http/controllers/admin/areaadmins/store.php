<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$errors = [];


$now = (new DateTime('now', new DateTimeZone('Asia/Colombo')))->format('Y-m-d H:i:s');




$db->query(
    'INSERT INTO applications (
        first_name, last_name, email, nic, con_num,
        dob, address, district, language_spk_eng, language_sin, language_tam,
        linkedin
    ) VALUES (
        :first_name, :last_name, :email, :nic, :con_num,
        :dob, :address, :district, :eng, :sin, :tam,
        :linkedin
    )',
    [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'nic' => $_POST['nic'],
        'con_num' => $_POST['con_num'],
        'dob' => $_POST['dob'],
        'address' => $_POST['address'],
        'district' => $_POST['district_id'],
        'eng' => isset($_POST['language_eng']) ? 1 : 0,
        'sin' => isset($_POST['language_sin']) ? 1 : 0,
        'tam' => isset($_POST['language_tam']) ? 1 : 0,
        'linkedin' => $_POST['linkedin'] ?? null
    ]
);


$areaAdmin = $db->query(
    'SELECT * FROM applications WHERE nic = :nic',
    [
        'nic' => $_POST['nic']
    ]
  )->find();


if (isset($_FILES['profile']) && $_FILES['profile']['error'] === UPLOAD_ERR_OK) {

    $profileTmpName = $_FILES['profile']['tmp_name'];
    $profileExtension = pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION);
    $profileFileName = strtolower($_POST['first_name'] . $_POST['last_name'] . $areaAdmin['areaadminid'] . '.' . $profileExtension);
    $profileFilePath = '/assets/admins/areaadmins/profilepictures/' . $profileFileName;


    if (move_uploaded_file($profileTmpName, base_path('public/assets/admins/areaadmins/profilepictures/') . $profileFileName)) {

        $db->query(
            'UPDATE applications SET profile = :profile_picture WHERE areaadminid = :id',
            [
                'profile_picture' => $profileFilePath,
                'id' => $areaAdmin['areaadminid']
            ]
        );
    } else {
        $errors['profile'] = 'There was an error uploading the profile picture.';
    }
}


if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {

  $cvTmpName = $_FILES['cv']['tmp_name'];
  $cvExtension = pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION);
  $cvFileName = strtolower($_POST['first_name'] . $_POST['last_name'] . $areaAdmin['areaadminid'] . '.' . $cvExtension);
  $cvFilePath = '/assets/admins/areaadmins/cv/' . $cvFileName;


  if (move_uploaded_file($cvTmpName, base_path('public/assets/admins/areaadmins/cv/') . $cvFileName)) {

      $db->query(
          'UPDATE applications SET cv = :cv WHERE areaadminid = :id',
          [
              'cv' => $cvFilePath,
              'id' => $areaAdmin['areaadminid']
          ]
      );
  } else {
      $errors['cv'] = 'There was an error uploading the CV.';
  }
}


if (!empty($errors)) {
    return view("admin/recruitments/create.view.php", [
        'heading' => 'New Recruitment',
        'errors' => $errors
    ]);
}


header('Location: /');
exit;