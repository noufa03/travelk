<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$districts = $db->query('
    SELECT districtid, district FROM districts
')->get();

view("admin/areaadmin.login.view.php", [
    'errors' => [],
    'districts' => $districts
]);