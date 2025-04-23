<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$restaurants = $db->query("
    SELECT 
        l.*, 
        d.district
    FROM 
        locations l
    JOIN 
        districts d ON l.districtid = d.districtid
    WHERE 
        l.location_type = 'restaurant';
")->get();

view("admin/restaurants/show.view.php", [
    'heading' => 'Restaurants',
    'restaurants' => $restaurants
]);