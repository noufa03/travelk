<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = $_GET['id'] ?? null;
if (!$id) {
    die('Invalid request. Area Admin ID is required.');
}

$areaadmin = $db->query("
  SELECT * FROM areaadmins WHERE areaadminid = :id", [
    'id' => $id
  ])->find();

//dd($areaadmin);

view("admin/areaadmins/profile.view.php", [
  'heading' => 'Area Admins',
  'areaadmin' => $areaadmin
]);