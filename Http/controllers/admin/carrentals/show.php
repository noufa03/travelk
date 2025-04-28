<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$drivers = $db->query("
    SELECT * FROM drivers
")->get();

view("admin/carrentals/show.view.php", [
    'heading' => 'Drivers',
    'drivers' => $drivers
]);