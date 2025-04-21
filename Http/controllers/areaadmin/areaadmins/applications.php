<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Fetch all area admins with their district names
$applications = $db->query("
    SELECT * FROM applications
")->get();

//dd($applications);

// Pass data to view
view("admin/areaadmins/applications.view.php", [
    'heading' => 'Applications',
    'applications' => $applications
]);