<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

//getting all the issues
$issues = $db->query('select * from issues where "userid"=:id ', [
    'id' => $userid
])->get();

view("restaurant/issues/index.view.php", [
    'heading' => 'Report Issue',
    'issues' => $issues
]);
