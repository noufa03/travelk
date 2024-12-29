<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
//current userid
$userid=$user['userid'];

$table = $db->query('select * from restaurant_table where tableid = :id', [
    'id' => $_POST['tableid']
])->findOrFail();

authorize($table['resID'] === $userid);

$db->query('delete from restaurant_table where tableid = :id', [
    'id' => $_POST['tableid']
]);

header('location: /tables');
exit();
