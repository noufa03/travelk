<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = $_GET['id'] ?? null;
if (!$id) {
    die('Invalid request. Area Admin ID is required.');
}

$application = $db->query("
  SELECT * FROM applications WHERE areaadminid = :id", [
    'id' => $id
  ])->find();

view("admin/areaadmins/application.view.php", [
  'heading' => 'Application',
  'application' => $application
]);