<?php

use Core\App;
use Core\Database;

header('Content-Type: application/json');

$db = App::resolve(Database::class);

$search = $_GET['q'] ?? '';
$params = [];

$sql = "
    SELECT l.*, p.*
    FROM locations l
    RIGHT JOIN places p ON p.placeid = l.locationid
";

if (!empty($search)) {
    $sql .= " WHERE p.name ILIKE :search OR l.city ILIKE :search";
    $params['search'] = '%' . $search . '%';
}

$places = $db->query($sql, $params)->get();

// Return JSON
echo json_encode($places);