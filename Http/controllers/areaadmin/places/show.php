<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Get districtid from session
$districtid = $_SESSION['user']['districtid'] ?? null;

if (!$districtid) {
    http_response_code(403);
    die('Unauthorized: district ID not found in session.');
}

$places = $db->query("
    SELECT l.*, p.*
    FROM locations l
    INNER JOIN places p ON l.locationid = p.placeid
    WHERE l.location_type = 'place'
    AND l.districtid = :districtid
", [
    'districtid' => $districtid
])->get();

view("areaadmin/places/show.view.php", [
    'heading' => 'Places',
    'places' => $places
]);