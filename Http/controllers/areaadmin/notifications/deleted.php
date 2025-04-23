<?php

use Core\App;
use Core\Database;

$districtid = 20;

$db = App::resolve(Database::class);

$notifications = $db->query("
SELECT * FROM deleted_areaadmin_notifications WHERE districtid =:districtid", [
    'districtid' => $districtid
])->get();

view("areaadmin/notifications/deleted.view.php", [
    'heading' => 'Deleted Notifications',
    'notifications' => $notifications
]);