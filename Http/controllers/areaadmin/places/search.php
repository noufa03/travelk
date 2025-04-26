<?php

use Core\App;
use Core\Database;

header('Content-Type: application/json');

$db = App::resolve(Database::class);

$query = $_GET['q'] ?? '';
$query = trim($query);

// Get districtid from session
$districtid = $_SESSION['user']['districtid'] ?? null;

if (!$districtid) {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized: district ID not found in session.']);
    exit;
}

if ($query !== '') {
    // Search within the same district
    $places = $db->query("
        SELECT l.*, p.*
        FROM locations l
        RIGHT JOIN places p ON p.placeid = l.locationid
        WHERE l.districtid = :districtid
        AND (l.name ILIKE :query OR l.city ILIKE :query)
    ", [
        'districtid' => $districtid,
        'query' => "%{$query}%"
    ])->get();
} else {
    // Default district-specific query
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