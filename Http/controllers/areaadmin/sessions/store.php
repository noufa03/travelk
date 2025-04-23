<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$districts = $db->query("SELECT * FROM districts ORDER BY district")->get();

function login($user)
{
    $_SESSION['user'] = [
        'email' => $user['email'],
        'areaadminid' => $user['areaadminid'],
        'districtid' => $user['districtid']
    ];

    // Store role separately for middleware
    $_SESSION['area_admin'] = [
        'role' => 'areaadmin'
    ];

    session_regenerate_id(true);
}

// Extract POST data safely
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$districtId = $_POST['district_id'] ?? '';

$errors = [];

// Basic validation
if (!$email || !$password || !$districtId) {
    $errors['form'] = 'All fields are required.';
} else {
    // Attempt to find user
    $user = $db->query(
        'SELECT * FROM areaadminlogin WHERE email = :email AND districtid = :districtid',
        [
            'email' => $email,
            'districtid' => $districtId
        ]
    )->find();

    if ($user && password_verify($password, $user['passwordhash'])) {
        login($user);
        header('Location: /areaadmin');
        exit;
    } else {
        $errors['auth'] = 'Invalid email, district, or password.';
    }
}

//dd($errors);

// Show login view again if something failed
return view('areaadmin/sessions/create.view.php', [
    'errors' => $errors,
    'districts' => $districts,
    'old' => [
        'email' => $email,
        'district_id' => $districtId
    ]
]);