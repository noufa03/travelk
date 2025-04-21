<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Get the notification ID from the URL
$id = $_GET['id'] ?? null;

if (!$id) {
    die('Invalid request. Notification ID is required.');
}

// Fetch the notification
$notification = $db->query('SELECT * FROM areaadmin_notifications WHERE id = :id', [
    'id' => $id
])->find();

if (!$notification) {
    die('Notification not found.');
}

// Check if already invalid
if ($notification['status'] === 'invalid') {
    die('This notification has already been marked as invalid and cannot be changed.');
}

// Update the status to invalid
$db->query('UPDATE areaadmin_notifications SET status = :status WHERE id = :id', [
    'status' => 'invalid',
    'id' => $id
]);

// Redirect to the notifications list
header('Location: /areaadmin/notifications');
die();