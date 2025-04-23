<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];
$districtId = $_POST['district_id'];

$areaAdmin = $db->query(
    'SELECT * FROM areaadminlogin WHERE email = :email AND districtid = :districtid',
    [
        'email' => $email,
        'districtid' => $districtId
    ]
)->find();

$errors = [];

if (!$areaAdmin || !password_verify($password, $areaAdmin['passwordhash'])) {
    $errors['login'] = 'Invalid credentials.';

    $districts = $db->query('SELECT districtid, district FROM districts')->get();

    return view("admin/areaadmin.login.view.php", [
        'districts' => $districts,
        'errors' => $errors,
    ]);
}

// Login success: set session
$_SESSION['area_admin'] = [
    'id' => $areaAdmin['id'],
    'email' => $areaAdmin['email'],
    'districtid' => $areaAdmin['districtid'],
];

// Redirect to area admin dashboard
header('Location: /admin');
exit;