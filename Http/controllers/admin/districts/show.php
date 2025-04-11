<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$districts = $db->query("
    SELECT * FROM districts
")->get();

view("admin/districts/show.view.php", [
    'heading' => 'Districts',
    'districts' => $districts
]);