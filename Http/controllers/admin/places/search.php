<?php

use Core\App;
use Core\Database;

header('Content-Type: application/json');

$db = App::resolve(Database::class);

$query = $_GET['q'] ?? '';
$query = trim($query);

// Simple search by name or city
$places = $db->query("
    SELECT p.placeid, p.name, l.city, d.district
    FROM places p
    RIGHT JOIN locations l ON p.placeid = l.locationid
    LEFT JOIN districts d ON l.districtid = d.districtid
    WHERE l.name ILIKE :query OR l.city ILIKE :query
", [
    'query' => "%{$query}%"
])->get();

echo json_encode($places);