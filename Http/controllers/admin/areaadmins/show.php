<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$areaadmins = $db->query("
    SELECT 
    areaadmins.*, 
    districts.district
    FROM areaadmins
    LEFT JOIN districts ON areaadmins.district = districts.districtid
")->get();


view("admin/areaadmins/show.view.php", [
    'heading' => 'Area Admins',
    'areaadmins' => $areaadmins
]);