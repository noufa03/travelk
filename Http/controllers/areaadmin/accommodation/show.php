<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$locations = $db->query("
    SELECT l.*, p.*
    FROM locations l
    LEFT JOIN places p ON l.locationid = p.placeid
    WHERE l.location_type = 'place'
")->get();

view("areaadmin/accommodation/show.view.php", [
    'heading' => 'Accommodation',
    'locations' => $locations
]);