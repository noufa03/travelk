<?php

use Core\App;
use Core\Database;

header('Content-Type: application/json');

$db = App::resolve(Database::class);

$query = $_GET['q'] ?? '';
$query = trim($query);

if ($query !== '') {
    // Simple search by name or city
    $places = $db->query("
        SELECT l.*, p.*
        FROM locations l
        RIGHT JOIN places p ON p.placeid = l.locationid
        WHERE l.name ILIKE :query OR l.city ILIKE :query
    ", [
        'query' => "%{$query}%"
    ])->get();
} else {
    // Default district-specific query
    $districtid = 20;
    $places = $db->query("
        SELECT l.*, p.*
        FROM locations l
        INNER JOIN places p ON l.locationid = p.placeid
        WHERE l.location_type = 'place'
        AND l.districtid = :districtid
    ", [
        'districtid' => $districtid
    ])->get();
}

echo json_encode($places);