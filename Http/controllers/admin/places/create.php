<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$districts = $db->query("SELECT * FROM districts ORDER BY district")->get();

view("admin/places/create.view.php", [
    'heading' => 'Locations',
    'districts' => $districts,
    'errors' => []
]);