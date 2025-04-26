<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$user = authUser();
$userid = $user['userid'];

//get all the detals of 1 from size id
$cuisinesize = $db->query('select * from cuisinesizes where "sizeID" = :id', [
    'id' => $_GET['id']
])->findOrFail();



// authorize($cuisine['resID'] === $userid);

view("restaurant/Menus/sizes/size.edit.view.php", [
    'heading' => 'Edit Size',
    'errors' => [],
    'cuisinesize' => $cuisinesize,
    'userid' => $userid,
 
]);
