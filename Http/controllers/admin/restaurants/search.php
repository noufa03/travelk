<?php

use Core\App;
use Core\Database;

header('Content-Type: application/json');

$db = App::resolve(Database::class);

$query = $_GET['q'] ?? '';
$query = trim($query);

$restaurants = $db->query("
    SELECT l.locationid, l.display_name, l.city, l.hot_line, d.district
    FROM locations l
    JOIN districts d ON l.districtid = d.districtid
    WHERE l.location_type = 'restaurant'
    AND (l.display_name ILIKE :query OR l.city ILIKE :query)
", [
    'query' => "%{$query}%"
])->get();

echo json_encode($restaurants);