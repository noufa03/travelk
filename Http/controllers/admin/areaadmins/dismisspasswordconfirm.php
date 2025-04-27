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


if (!password_verify($password, $passwordhash)) {
    $errors['incorrect'] = 'Incorrect password.';
    return view('admin/areaadmins/probationpassword.view.php', [
        'errors' => $errors,
    ]);
}



$used = $db->query('SELECT email, first_name, last_name FROM areaadmins WHERE areaadminid = :areaadminid', [
    'areaadminid' => $areaadminid
])->find();


$email = $used['email'];
$firstname = $used['first_name'];
$lastname = $used['last_name'];

$db->query(
    'INSERT INTO dismissed(usedid, usedemail, firstname, lastname) VALUES (:usedid, :usedemail, :firstname, :lastname)', [
        'usedid' => $areaadminid,
        'usedemail' => $email,
        'firstname' => $firstname,
        'lastname' => $lastname
    ]
);

$db->query(
    'DELETE FROM areaadmins where areaadminid = :areaadminid', [
        'areaadminid' => $areaadminid
    ]
);

$db->query(
    'DELETE FROM areaadminlogin where areaadminid = :areaadminid', [
        'areaadminid' => $areaadminid
    ]
);

$db->query(
    "UPDATE districts SET adminid = :unassigned WHERE adminid = :adminid", [
        'unassigned' => null,
        'adminid' => $areaadminid
    ]
);

header('Location: /admin/areaadmins');
exit;
