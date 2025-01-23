<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];
$profile = $_FILES['profile'] ?? null;

$profilePath = null;

$errors = [];
if (!Validator::email($email)) {
   $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}

// Handle profile picture upload if provided
if (!empty($profile['name'])) {
    if ($profile['error'] === UPLOAD_ERR_OK) {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExtension = strtolower(pathinfo($profile['name'], PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedExtensions)) {
            $form->error('profile', 'Only JPG, JPEG, PNG, and GIF files are allowed');
        } else {
            // Save the profile picture
            $uploadDir = BASE_PATH . 'public/assets/uploads/profiles/travelers/';
            $newFileName = uniqid('traveler_', true) . '.' . $fileExtension;
            $destination = $uploadDir . $newFileName;

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if (!move_uploaded_file($profile['tmp_name'], $destination)) {
                $form->error('profile', 'Failed to upload profile picture');
            } else {
                $profilePath = '/assets/uploads/profiles/travelers/' . $newFileName;
            }
        }
    } else {
        $form->error('profile', 'Error uploading profile picture');
    }
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    header('location: /');
    exit();
} else {
    $user = $db->query('INSERT INTO users("email", "password","role") VALUES(:email, :password,:role)', [
        'role' => 'traveler',
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);
    $lastInsertedId = $db->connection->lastInsertId();
    
    $travelers = $db->query('INSERT INTO Travelers ("traid", "user_name", "profile") VALUES (:id,:user_name, :profile)',[
        'id' => $lastInsertedId,
        'user_name' => $_POST['user_name'],
        'profile' => $profilePath
    ]);

    (new Authenticator)->login(['email' => $email,'role'=>'traveler']);

    header('location: /');
    exit();
}
