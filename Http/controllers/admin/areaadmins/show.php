<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Fetch all area admins with their district names
$areaadmins = $db->query("
    SELECT 
    areaadmins.*, 
    districts.district, 
    areaadminstatus.type AS status_type
    FROM areaadmins
    LEFT JOIN districts ON areaadmins.district = districts.districtid
    LEFT JOIN areaadminstatus ON areaadmins.statusid = areaadminstatus.statusid;
")->get();


// Pass data to view
view("admin/areaadmins/show.view.php", [
    'heading' => 'Area Admins',
    'areaadmins' => $areaadmins
]);