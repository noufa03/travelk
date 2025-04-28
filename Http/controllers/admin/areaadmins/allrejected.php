<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$allrejected = $db->query("
    SELECT * FROM rejected_applications
")->get();



view("admin/areaadmins/allrejected.view.php", [
    'heading' => 'Rejected Applications',
    'allrejected' => $allrejected
]);