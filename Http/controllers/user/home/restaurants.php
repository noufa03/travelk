<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$restaurants = $db->query('select * from places where "category" = "restaurants"')->get();

view("user/home/restaurants.view.php", ['restaurants' => $restaurants]);