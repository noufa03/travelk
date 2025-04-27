<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$user = authUser();

$userid=$user['userid'];

$notifications = $db->query("UPDATE notifications SET is_read = :read WHERE userid = :id and id=:nid", [
    'read' => true, 
    'id' => $userid,
    'nid'=>$_GET['id']
]);



header('location:/dashboard_rental');
die();


