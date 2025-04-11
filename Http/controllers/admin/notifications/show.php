<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$notifications = $db->query("
SELECT * FROM admin_notifications
")->get();

view("admin/notifications/show.view.php", [
    'heading' => 'Sent Notifications',
    'notifications' => $notifications
]);