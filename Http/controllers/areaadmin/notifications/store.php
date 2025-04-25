<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$errors = [];

// Get values from session
$adminid = $_SESSION['user']['areaadminid'] ?? null;
$districtid = $_SESSION['user']['districtid'] ?? null;

// Optional: basic session-based safety check
if (!$adminid || !$districtid) {
    die("Unauthorized: Missing session information.");
}

$now = (new DateTime('now', new DateTimeZone('Asia/Colombo')))->format('Y-m-d H:i:s');

// Insert into the database
$db->query(
    'INSERT INTO areaadmin_notifications (body, adminid, recipient, created_at, districtid) VALUES (:body, :adminid, :recipient, :created_at, :districtid)',
    [
        'body' => $_POST['body'],
        'adminid' => $adminid,
        'recipient' => $_POST['recipient'],
        'created_at' => $now,
        'districtid' => $districtid
    ]
);

// Redirect after successful insert
header('Location: /areaadmin/notifications');
exit;