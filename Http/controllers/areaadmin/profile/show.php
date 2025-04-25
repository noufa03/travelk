<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = $_POST['areaadminid'] ?? null;

// if (!$id) {
//     die('Invalid request. Area Admin ID is required.');
// }

$areaadmin = $db->query("
  SELECT * FROM areaadmins WHERE areaadminid = :id", [
    'id' => $id
  ])->find();

view("/areaadmin/profile/show.view.php", [
  'heading' => 'Area Admins',
  'areaadmin' => $areaadmin
]);
