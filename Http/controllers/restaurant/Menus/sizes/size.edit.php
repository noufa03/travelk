<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];


$cuisinesize = $db->query('select * from cuisinesizes where "sizeID" = :id', [
    'id' => $_GET['id']
])->findOrFail();


view("restaurant/Menus/sizes/size.edit.view.php", [
    'heading' => 'Edit Size',
    'errors' => [],
    'cuisinesize' => $cuisinesize,
    'userid' => $userid,
 
]);
