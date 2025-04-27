<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


// Extract POST data safely
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$errors = [];

// Basic validation
if (!$email || !$password) {
    $errors['form'] = 'All fields are required.';
} else {
    // Attempt to find user
    $user = $db->query(
        'SELECT * FROM mainadmin WHERE email = :email',
        [
            'email' => $email
        ]
    )->find();

    if ($user && password_verify($password, $user['passwordhash'])) {
        // Set proper session for area admin
        $_SESSION['user'] = [
            'email' => $user['email'],
            'adminid' => $user['adminid'],
            'role' => 'admin'
        ];

        session_regenerate_id(true); // prevent session fixation

        header('Location: /admin');
        exit;
    } else {
        $errors['auth'] = 'Invalid email, district, or password.';
    }
}

// If login failed, show form again
return view('admin/sessions/create.view.php', [
    'errors' => $errors,
    //'districts' => $districts,
    'old' => [
        'email' => $email,
        //
    ]
]);