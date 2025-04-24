<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = $_GET['id'] ?? null;
if (!$id) {
    die('Invalid request. Area Admin ID is required.');
}

$rejected = $db->query("
  SELECT * FROM rejected_applications WHERE areaadminid = :id", [
    'id' => $id
  ])->find();

view("admin/areaadmins/rejected.view.php", [
  'heading' => 'Rejected Application',
  'areaadmin' => $rejected
]);
