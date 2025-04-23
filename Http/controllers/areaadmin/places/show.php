<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$districid = 20;

$places = $db->query("
    SELECT l.*, p.*
    FROM locations l
    INNER JOIN places p ON l.locationid = p.placeid
    WHERE l.location_type = 'place'
    AND l.districtid = :districtid" ,[
        'districtid' => $districid
    ])->get();

view("areaadmin/places/show.view.php", [
    'heading' => 'Places',
    'places' => $places
]);