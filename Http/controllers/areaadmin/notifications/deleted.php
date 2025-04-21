<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$notifications = $db->query("
SELECT * FROM deleted_admin_notifications
")->get();

view("admin/notifications/deleted.view.php", [
    'heading' => 'Deleted Notifications',
    'notifications' => $notifications
]);