<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$restaurants = $db->query("
    SELECT * FROM locations WHERE location_type LIKE '%Restaurant%'
")->get();

view("admin/restaurants/show.view.php", [
    'heading' => 'Restaurants',
    'restaurants' => $restaurants
]);