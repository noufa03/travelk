<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();

$userid=$user['userid'];
//updating after clicking mark as read
$notifications = $db->query("UPDATE notifications SET is_read = :read WHERE userid = :id  and id=:nid", [
    'read' => true, // Use `true` to set it as read
    'id' => $userid,
    'nid'=>$_GET['id']
]);



header('location:/dashboard_rest');
die();


