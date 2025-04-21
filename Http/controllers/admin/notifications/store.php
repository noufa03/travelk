<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$errors = [];

// Validation
if (!Validator::string($_POST['body'], 1, 500)) {
    $errors['body'] = 'Notification message is required and should be less than 500 characters.';
}

//if (!filter_var($_POST['adminid'], FILTER_VALIDATE_INT)) {
//    $errors['adminid'] = 'Admin ID must be a valid number.';
//}

// If there are validation errors, show the form again
if (!empty($errors)) {
    return view("admin/notifications/create.view.php", [
        'heading' => 'Add Notification',
        'errors' => $errors
    ]);
}

$now = (new DateTime('now', new DateTimeZone('Asia/Colombo')))->format('Y-m-d H:i:s');

// Insert into the database
$db->query(
    'INSERT INTO admin_notifications (body, adminid, recipient, created_at) VALUES (:body, :adminid, :recipient, :created_at)',
    [
        'body' => $_POST['body'],
        'adminid' => 1,
        'recipient' => $_POST['recipient'],
        'created_at' => $now
    ]
);

// Redirect after successful insert
header('Location: /admin/notifications');
exit;