<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$districtid = 10;

$restaurants = $db->query("
    SELECT 
        l.*, 
        d.district
    FROM 
        locations l
    JOIN 
        districts d ON l.districtid = d.districtid
    WHERE 
        l.location_type = 'restaurant' AND l.districtid =:districtid", [
            'districtid' => $districtid
        ])->get();

view("areaadmin/restaurants/show.view.php", [
    'heading' => 'Restaurants',
    'restaurants' => $restaurants
]);