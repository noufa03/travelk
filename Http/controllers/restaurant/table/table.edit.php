<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

$table = $db->query('select * from restaurant_table where "tableid" = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($table['resID'] === $userid);

view("restaurant/table/table.edit.view.php", [
    'heading' => 'Edit table',
    'errors' => [],
    'table' => $table,
    'userid' => $userid
]);
