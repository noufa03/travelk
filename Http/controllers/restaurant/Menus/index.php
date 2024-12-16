<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$cuisines = $db->query('select * from cuisine where resID = 23')->get();

view("restaurant/Menus/index.view.php", [
    'heading' => 'My Menu',
    'cuisines' => $cuisines
]);