<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$applications = $db->query("
    SELECT a.*, d.district AS district_name
    FROM public.applications a
    LEFT JOIN public.districts d ON a.district = d.districtid
")->get();


view("admin/areaadmins/applications.view.php", [
    'heading' => 'Applications',
    'applications' => $applications
]);