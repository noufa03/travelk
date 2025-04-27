<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Fetch all area admins with their district names
$areaadmins = $db->query("
    SELECT 
    areaadmins.*, 
    districts.district
    FROM areaadmins
    LEFT JOIN districts ON areaadmins.district = districts.districtid
")->get();

// Pass data to view
view("admin/areaadmins/show.view.php", [
    'heading' => 'Area Admins',
    'areaadmins' => $areaadmins
]);