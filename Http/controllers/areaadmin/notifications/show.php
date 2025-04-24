<?php

use Core\App;
use Core\Database;

$districtid = 20;

$db = App::resolve(Database::class);

$notifications = $db->query("
SELECT * FROM areaadmin_notifications WHERE districtid =:districtid", [
    'districtid' => $districtid
])->get();

view("areaadmin/notifications/show.view.php", [
    'heading' => 'Sent Notifications',
    'notifications' => $notifications
]);