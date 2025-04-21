<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();

$userid=$user['userid'];

$notifications = $db->query("UPDATE notifications SET is_read = :read WHERE userid = :id and expires_at < NOW()", [
    'read' => true, // Use `true` to set it as read
    'id' => $userid
]);



header('location:/dashboard_rest');
die();


