<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 21;

$cuisine = $db->query('select * from cuisine where cuisineID = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($cuisine['resID'] === $currentUserId);

view("restaurant/Menus/menus.edit.view.php", [
    'heading' => 'Edit cuisine',
    'errors' => [],
    'cuisine' => $cuisine
]);