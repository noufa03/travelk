<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$errors = [];

// Validate fields (validation logic can be re-added as necessary)
$now = (new DateTime('now', new DateTimeZone('Asia/Colombo')))->format('Y-m-d H:i:s');

//dd($_POST);

// Insert into database without profile picture and CV
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

// Get the ID of the newly inserted area admin
$areaAdmin = $db->query(
    'SELECT * FROM applications WHERE nic = :nic',
    [
        'nic' => $_POST['nic']
    ]
  )->find();

// $db->query(
//     'UPDATE districts SET adminid = :areaadminid WHERE districtid = :district',
//     [
//         'areaadminid' => $areaAdmin['areaadminid'],
//         'district' => $areaAdmin['district']
//     ]

// );

// Handle profile picture upload
if (isset($_FILES['profile']) && $_FILES['profile']['error'] === UPLOAD_ERR_OK) {
    // Get file info
    $profileTmpName = $_FILES['profile']['tmp_name'];
    $profileExtension = pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION);
    $profileFileName = strtolower($_POST['first_name'] . $_POST['last_name'] . $areaAdmin['areaadminid'] . '.' . $profileExtension);
    $profileFilePath = '/assets/admins/areaadmins/profilepictures/' . $profileFileName;

    // Move the uploaded file to the desired folder
    if (move_uploaded_file($profileTmpName, base_path('public/assets/admins/areaadmins/profilepictures/') . $profileFileName)) {
        // Update database with the profile picture path
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

// Handle CV upload
if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
  // Get file info
  $cvTmpName = $_FILES['cv']['tmp_name'];
  $cvExtension = pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION);
  $cvFileName = strtolower($_POST['first_name'] . $_POST['last_name'] . $areaAdmin['areaadminid'] . '.' . $cvExtension);
  $cvFilePath = '/assets/admins/areaadmins/cv/' . $cvFileName;

  // Move the uploaded file to the desired folder
  if (move_uploaded_file($cvTmpName, base_path('public/assets/admins/areaadmins/cv/') . $cvFileName)) {
      // Update database with the CV file path
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

// If errors occur, return to view with errors
if (!empty($errors)) {
    return view("admin/recruitments/create.view.php", [
        'heading' => 'New Recruitment',
        'errors' => $errors
    ]);
}

// Redirect
header('Location: /');
exit;