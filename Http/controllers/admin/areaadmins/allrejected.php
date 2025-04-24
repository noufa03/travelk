<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Fetch all area admins with their district names
$allrejected = $db->query("
    SELECT * FROM rejected_applications
")->get();


// Pass data to view
view("admin/areaadmins/allrejected.view.php", [
    'heading' => 'Rejected Applications',
    'allrejected' => $allrejected
]);