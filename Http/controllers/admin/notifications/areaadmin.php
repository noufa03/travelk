<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$notifications = $db->query("
SELECT * FROM areaadmin_notifications
")->get();

view("admin/notifications/areaadmin.view.php", [
    'heading' => 'Area Admin Notifications',
    'notifications' => $notifications
]);