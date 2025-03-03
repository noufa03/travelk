<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$locations = $db->query("
    SELECT l.*, p.*
    FROM locations l
    LEFT JOIN places p ON l.locationid = p.placeid
")->get();

view("admin/locations/show.view.php", [
    'heading' => 'Locations',
    'locations' => $locations
]);