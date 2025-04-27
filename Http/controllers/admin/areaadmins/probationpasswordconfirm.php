<?php

use Core\App;
use Core\Database;

$errors = [];

$db = App::resolve(Database::class);

$areaadminid = (int)$_POST['areaadminid'];
$password = $_POST['password'];

$admin = $db->query(
    'SELECT * FROM mainadmin'
)->find();

$passwordhash = $admin['passwordhash'];

$areaadmin = $db->query('SELECT probation FROM areaadmins WHERE areaadminid = :areaadminid', [
    'areaadminid' => $areaadminid
])->find();

$newstatus = 3;

if ($areaadmin['probation'] === true) {
    $newstatus = 0;
} else if ($areaadmin['probation'] === false){
    $newstatus = 1;
};


if (!password_verify($password, $passwordhash)) {
    $errors['incorrect'] = 'Incorrect password.';
    return view('admin/areaadmins/probationpassword.view.php', [
        'errors' => $errors,
    ]);
}

$db->query('UPDATE areaadmins SET probation = :newstatus WHERE areaadminid = :areaadminid', [
            'newstatus' => $newstatus,
            'areaadminid' => $areaadminid
]);

header('Location: /admin/areaadmins');
exit;