<?php

use Core\App;
use Core\Database;

$errors = [];

$db = App::resolve(Database::class);

$areaadminid = (int)$_POST['areaadminid'];
$password = $_POST['password'];

// $admin = $db->query(
//     'SELECT * FROM mainadmin'
// )->find();

// $passwordhash = $admin['passwordhash'];

$areaadmin = $db->query('SELECT probation FROM areaadmins WHERE areaadminid = :areaadminid', [
    'areaadminid' => $areaadminid
])->find();


$newstatus = isset($areaadmin['probation']) ? !$areaadmin['probation'] : true;

// if (password_verify($password, $passwordhash)) {
//     $errors['incorrect'] = 'Incorrect password.';
// }

$db->query('UPDATE areaadmins SET probation = :newstatus WHERE areaadminid = :areaadminid', [
            'newstatus' => false,
            'areaadminid' => $areaadminid
]);



return view('admin/areaadmins/probationpassword.view.php', [
    'errors' => $errors,
]);