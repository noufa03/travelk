<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Fetch all districts
$districts = $db->query("SELECT * FROM districts ORDER BY district")->get();

// Optional: You can pass error messages from session or validation
$errors = $_SESSION['errors'] ?? '';
unset($_SESSION['errors']);

view("areaadmin/sessions/create.view.php", [
    'errors' => $errors,
    'districts' => $districts
]);