<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$districts = $db->query(
    "SELECT * FROM districts"
)->get();



view("admin/areaadmins/recruit.view.php", [
    'errors' => [],
    'districts' => $districts
]);