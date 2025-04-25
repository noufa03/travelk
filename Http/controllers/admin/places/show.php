<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$places = $db->query("
    SELECT l.*, p.*, d.district
    FROM locations l
    RIGHT JOIN places p ON p.placeid = l.locationid
    LEFT JOIN districts d ON l.districtid = d.districtid;
")->get();

view("admin/places/show.view.php", [
    'heading' => 'Places',
    'places' => $places
]);