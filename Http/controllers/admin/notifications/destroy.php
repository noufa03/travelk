<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$now = (new DateTime('now', new DateTimeZone('Asia/Colombo')))->format('Y-m-d H:i:s');

// 1. Fetch the notification
$notification = $db->query(
    'SELECT body, created_at, adminid FROM admin_notifications WHERE id = :id',
    ['id' => $_POST['id']]
)->find();

if ($notification) {
    // 2. Insert into deleted_admin_notifications
    $db->query(
        'INSERT INTO deleted_admin_notifications (body, created_at, deleted_at, adminid)
         VALUES (:body, :created_at, :deleted_at, :adminid)',
        [
            'body' => $notification['body'],
            'created_at' => $notification['created_at'],
            'adminid' => $notification['adminid'],
            'deleted_at' => $now
        ]
    );

    // 3. Delete from admin_notifications
    $db->query('DELETE FROM admin_notifications WHERE id = :id', [
        'id' => $_POST['id']
    ]);
}

header('location: /admin/notifications');
exit();