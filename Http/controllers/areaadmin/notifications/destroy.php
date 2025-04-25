<?php

use Core\App;
use Core\Database;

$districtid = $districtid = $_SESSION['user']['districtid'] ?? null;

$db = App::resolve(Database::class);

$now = (new DateTime('now', new DateTimeZone('Asia/Colombo')))->format('Y-m-d H:i:s');

// 1. Fetch the notification
$notification = $db->query(
    'SELECT * FROM areaadmin_notifications WHERE id =:id',
    ['id' => $_POST['id']]
)->find();

if ($notification) {
    // 2. Insert into deleted_admin_notifications
    $db->query(
        'INSERT INTO deleted_areaadmin_notifications (id, body, created_at, deleted_at, adminid, recipient, districtid)
         VALUES (:id, :body, :created_at, :deleted_at, :adminid, :recipient, :districtid)',
        [
            'id' => $notification['id'],
            'body' => $notification['body'],
            'created_at' => $notification['created_at'],
            'adminid' => $notification['adminid'],
            'deleted_at' => $now,
            'recipient' => $notification['recipient'],
            'districtid' => $districtid
        ]
    );

    // 3. Delete from admin_notifications
    $db->query('DELETE FROM areaadmin_notifications WHERE id = :id', [
        'id' => $_POST['id']
    ]);
}

header('location: /areaadmin/notifications');
exit();