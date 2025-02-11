<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

$locationid = 1;

$locations = $db->query("select * from locations")->get();

view("admin/locations/show.view.php", [
    'heading' => 'locations',
    'locations' => $locations
]);