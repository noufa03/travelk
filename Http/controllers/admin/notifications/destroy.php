<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// 1. Fetch the notification
$notification = $db->query(
    'SELECT body, created_at, adminid FROM admin_notifications WHERE id = :id',
    ['id' => $_POST['id']]
)->find();

if ($notification) {
    // 2. Insert into deleted_admin_notifications
    $db->query(
        'INSERT INTO deleted_admin_notifications (body, created_at, deleted_at, adminid)
         VALUES (:body, :created_at, NOW(), :adminid)',
        [
            'body' => $notification['body'],
            'created_at' => $notification['created_at'],
            'adminid' => $notification['adminid']
        ]
    );

    // 3. Delete from admin_notifications
    $db->query('DELETE FROM admin_notifications WHERE id = :id', [
        'id' => $_POST['id']
    ]);
}

header('location: /admin/notifications');
exit();